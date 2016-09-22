Ext.define('Ext.xr.field_container_files', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_container_files',
	config: {
		height: 	200,
		title: 		'FILES',
		imagesOnly:	false
	},

	constructor:function(cnfg){

		this.url_meta	= "/xgo/xplugs/xredaktor/ajax/gui/container-files-meta";
		this.url_add 	= "/xgo/xplugs/xredaktor/ajax/gui/container-files-add";
		this.url_upload = "/xgo/xplugs/xredaktor/ajax/gui/container-files-upload";
		this.url_load 	= "/xgo/xplugs/xredaktor/ajax/gui/container-files-load";
		this.url_del 	= "/xgo/xplugs/xredaktor/ajax/gui/container-files-delete";
		this.url_sort 	= "/xgo/xplugs/xredaktor/ajax/gui/container-files-sort";

		this.cnfg = cnfg;
		this.callParent(arguments);//Calling the parent class constructor
		this.initConfig(cnfg);//Initializing the component
		this.makeIt();
	},

	getValue: function()
	{
		return "";
	},
	

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Verzeichnis',
				fields: [{
					xtype: 'xr_field_dir',
					name: 'as_config',
					fieldLabel: 'Verzeichnis-Root'
				}]
			});

		}
	},


	getDivData_files:function(files) {

		var uId  	= this.cnfg['uId'];
		var wz_id  	= this.cnfg['wz_id'];
		var as_id  	= this.cnfg['as']['as_id'];
		var as_type	= this.cnfg['as']['as_type'];

		var html = "";

		html += '<ul class="xcrm_images_sortable">';

		Ext.iterate(files,function(img){

			html += '	<li class="xcrm_f_img" del_id="'+img.del_id+'" as_id="'+img.as_id+'">';
			html += '    <div class="xcrm_f_img_del" style="display:none;" del_id="'+img.del_id+'" as_id="'+img.as_id+'"></div>';
			html += '	    <div class="xcrm_f_img_title" style="display:none;">'+img.title+'</div>';
			html += '    <a href="'+img.webSrc+'" class="colorbox_'+uId+'" title="'+img.title+'" target="_blank" data-id="'+uId+'">';
			html += '    <div class="xcrm_f_img_open" style="display:none;" show_id="'+img.del_id+'" as_id="'+img.as_id+'"></div>';
			html += '    </a>';
			html += '		<img src="'+img.src+'" width="156" height="121" class="';
			if (as_type == 'CONTAINER-FILES') html += "non_black_background";
			html += '">';

			html += '	</li>';

		},this);

		html += '</ul>';

		return html;

	},

	getDivData_all: function(files) {

		var uploadUrl = this.url_upload;

		var uId  	= this.cnfg['uId'];
		var wz_id  	= this.cnfg['wz_id'];
		var as_id  	= this.cnfg['as']['as_id'];
		var as_type	= this.cnfg['as']['as_type'];

		var html = "";

		this.formId = Ext.id();

		html += '<div class="xcrm_f_images_container_only" id="'+uId+'_imgs_only">';
		html += this.getDivData_files(files);
		html += '</div>';

		html += '<div class="xcrm_image_uploading" id="'+uId+'_uploading_info" style="display:none;">0%</div>';

		html += '<form id="'+this.formId+'" class="xcrm_hidden_fileupload" action="'+uploadUrl+'?f_id='+as_id+'&r_id='+wz_id+'&m_id='+uId+'" method="POST" enctype="multipart/form-data">';
		html += '<div class="xf_f_img_fa"></div>';
		html += '<div class="xcrm_f_img_new">';
		html += '    <input type="file" name="files" multiple m_id="'+uId+'" wz_id="'+wz_id+'" f_id="'+as_id+'" as_type="'+as_type+'">';
		html += '</div>';
		html += '</form>';
		html += '<div style="clear:both;"></div>';

		return html;
	},

	repaintDiv : function(files) {

		$ = $$;
		$("#"+this.divId).html(this.getDivData_all(files));

		Ext.defer(function(){
			var h = $("#"+this.divId).height();
			this.masterPanel.setHeight(h);
		},100,this);

		this.initFileFunctions();

	},

	initFileFunctions: function() {

		var me 			= this;
		var latestData 	= false;
		var m_id		= false;
		var f_id		= false;
		var wz_id		= false;

		$ = $$;

		$("#"+me.divId+" .xcrm_f_img").dblclick(function() {

			var del_id 			= $(this).attr('del_id');
			var as_id 			= $(this).attr('as_id');

			console.info(del_id,as_id);

			var simple = Ext.create('Ext.form.Panel', {
				bodyStyle:'padding:5px 5px 0',
				fieldDefaults: {
					labelAlign: 'top'
				},
				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},

				items: [{
					fieldLabel: 'Bildrechte',
					name: 'copyright'
				},{
					fieldLabel: 'Alternative Beschreibung',
					name: 'alt'
				},{
					xtype: 'textarea',
					fieldLabel: 'Beschreibung',
					name: 'description'
				}]
			});

			var win = Ext.create('widget.window', {
				modal: true,
				bbar: ['->',{
					iconCls: 'xf_save',
					text: 'Speichern',
					handler: function() {


						xframe.ajax({
							scope: me,
							url: me.url_meta,
							params : {
								del_id: del_id,
								as_id: as_id,
								data: Ext.encode(simple.getForm().getValues())
							},
							success: function(json) {
								
							},
							stateless: function(json)
							{

							}
						});

						win.close();

					}
				}],
				title: 'Bild-Einstellungen',
				closable: true,
				width: 600,
				height: 350,
				layout: 'fit',
				items: [simple]
			});

			win.on('afterrender',function(){

				win.mask('Lade Daten ...');
				xframe.ajax({
					scope: me,
					url: me.url_meta,
					params : {
						del_id: del_id,
						as_id: as_id
					},
					stateless: function(state,json)
					{
						win.unmask();
						simple.getForm().setValues(Ext.decode(json.cfg.wz_meta_data,true));
					}
				});

			},this);

			win.show();

		});

		$("#"+me.divId+" .xf_f_img_fa").click(function(){


			if (!me.xstorage) me.xstorage = xredaktor_storage.getInstance();

			me.xstorage.showFileDialog({
				s_storage_scope: xredaktor.getInstance().getCurrentBasicStorage(),
				site_id: xredaktor.getInstance().getCurrentSiteId(),
				preSelect: 0,
				latestSaved : 0,
				scope:me,
				callBack:function(datax)
				{
					var data = datax[0].data;
					if (!Ext.isNumeric(data.s_id)) return;
					var s_id = data.s_id;

					var wz_id  	= me.cnfg['wz_id'];
					var f_id  	= me.cnfg['as']['as_id'];


					xframe.ajax({
						scope: me,
						url: me.url_add,
						params : {
							f_id : f_id,
							r_id : wz_id,
							s_id : s_id
						},
						success: function(json) {


							xframe.ajax({
								scope: me,
								url: me.url_load,
								params : {
									f_id : f_id,
									r_id : wz_id
								},
								success: function(json) {



									me.repaintDiv.call(me,json.cfg.items);
								},
								stateless: function(json)
								{
								}
							});


						},
						stateless: function(json)
						{
						}
					});


				}
			});








		});




		$('#'+this.formId).fileupload({
			dataType: 'json',
			autoUpload: true,
			
			
			
			/*
			done: function (e, data) {
				
				var wz_id  	= me.cnfg['wz_id'];
				var f_id  	= me.cnfg['as']['as_id'];
				
				setTimeout(function(){
					xframe.ajax({
						scope: me,
						url: me.url_load,
						params : {
							f_id : f_id,
							r_id : wz_id
						},
						success: function(json) {
							$("#"+me.divId+" .xcrm_image_uploading").hide();
							me.repaintDiv.call(me,json.cfg.items);
						},
						stateless: function(json)
						{
						}
					});
				},500);
			}
			*/
			
			
			
			
			
		}).bind('fileuploadalways',function (e, data) {

			console.info('data',data);

			if (data.result.ok)
			{
				
				console.info('id',data.result.id,data);
			} else {
				xframe.alert('Datei-Tranfser fehlgeschlagen',data.result.error);
			}


		}).bind('fileuploadsend2',function(e,r){

			//console.info('a',arguments);

			m_id = $(e.srcElement).attr('m_id');
			f_id = $(e.srcElement).attr('f_id');
			wz_id = $(e.srcElement).attr('wz_id');

			console.info(m_id,f_id,wz_id);
			
			$("#"+me.divId+" .xcrm_image_uploading").show();

		}).bind('fileuploadprogressall2',function(e,data){

			console.info('fileuploadprogressall',data);

			var progress = parseInt(data.loaded / data.total * 100, 10);
			$("#"+me.divId+" .xcrm_image_uploading").html(progress+' %');

			if (progress == 1001)
			{

				var wz_id  	= me.cnfg['wz_id'];
				var f_id  	= me.cnfg['as']['as_id'];

				setTimeout(function(){
					xframe.ajax({
						scope: me,
						url: me.url_load,
						params : {
							f_id : f_id,
							r_id : wz_id
						},
						success: function(json) {
							$("#"+me.divId+" .xcrm_image_uploading").hide();
							me.repaintDiv.call(me,json.cfg.items);
						},
						stateless: function(json)
						{
						}
					});
				},500);

			}

		});

		// ALL - MESSY ?

		$('.xcrm_f_img').unbind('hover');
		$('.xcrm_f_img').hover(function() {
			$(this).find('.xcrm_f_img_title').show();
			$(this).find('.xcrm_f_img_del').show();
			$(this).find('.xcrm_f_img_open').show();
		}, function() {
			$(this).find('.xcrm_f_img_title').hide();
			$(this).find('.xcrm_f_img_del').hide();
			$(this).find('.xcrm_f_img_open').hide();
		});

		$('.xcrm_f_img_del').unbind('click');
		$('.xcrm_f_img_del').click(function(){



			xframe.yn({
				title: '',
				msg: 'Wollen Sie die Datei wirklich löschen?',
				scope: this,
				handler: function(yn) {
					if (yn != 'yes') return;

					var del_id 			= $(this).attr('del_id');
					var as_id 			= $(this).attr('as_id');
					var imgContainer 	= $(this).parent();

					xframe.ajax({
						scope: me,
						url: me.url_del,
						params : {
							as_id : as_id,
							del_id : del_id
						},
						success: function(json) {
							imgContainer.hide();


							Ext.defer(function(){
								var h = $("#"+this.divId).height();
								this.masterPanel.setHeight(h);
							},100,this);

						},
						stateless: function(json)
						{
						}
					});
				}

			});

			return;



		});

		try {
			$( "#"+this.divId+" .xcrm_images_sortable" ).sortable('destroy');
		} catch (e) {}

		$( "#"+this.divId+" .xcrm_images_sortable" ).sortable({
			change: function( event, ui ) {
				me.updatePositionChange.call(me);
			}
		});

		$( "#"+this.divId+" .xcrm_images_sortable" ).disableSelection();


		try
		{
			jQuery('a.colorbox_'+this.wz_id+'_1164').colorbox({
				rel:'image',
				transition:"fade"
			});

			jQuery('a.colorbox_'+this.wz_id+'_1156').colorbox({
				rel:'image',
				transition:"fade"
			});

			/*
			jQuery('.pirobox_'+this.wz_id+'_1164').piroBox({
			my_speed: 300, //animation speed
			bg_alpha: 0.5, //background opacity
			slideShow : 'true', // true == slideshow on, false == slideshow off
			slideSpeed : 3, //slideshow
			close_all : '.piro_close' // add class .piro_overlay(with comma)if you want overlay click close piroBox
			});

			jQuery('.pirobox_'+this.wz_id+'_1156').piroBox({
			my_speed: 300, //animation speed
			bg_alpha: 0.5, //background opacity
			slideShow : 'true', // true == slideshow on, false == slideshow off
			slideSpeed : 3, //slideshow
			close_all : '.piro_close' // add class .piro_overlay(with comma)if you want overlay click close piroBox
			});
			*/
		}
		catch(e){}

	},

	getSorting : function() {

		$ = $$;
		var sort = [];

		$( "#"+this.divId+" .xcrm_f_img" ).each(function(){
			sort.push($(this).attr('del_id'));
		});

		return sort;
	},

	updatePositionChange : function() {

		var me = this;
		xframe.delay(this.divId,1500,function(){

			var sort 	= this.getSorting();
			var wz_id  	= this.cnfg['wz_id'];
			var as_id  	= this.cnfg['as']['as_id'];

			xframe.ajax({
				scope: me,
				url: me.url_sort,
				params : {
					wz_id : wz_id,
					as_id : as_id,
					sort: sort.join(',')
				},
				success: function(json) {

				},
				stateless: function(json)
				{
				}
			});


		},this);
	},

	makeIt: function() {

		this.divId = Ext.id();
		this.masterPanel = Ext.create('Ext.Component',{
			html:'<div style="" id="'+this.divId+'">'+this.getDivData_all(this.cnfg.files)+'</div>'
		});

		this.masterPanel.on('afterrender',this.initFileFunctions,this,{buffer:1});

		this.add(this.masterPanel);
	}


});