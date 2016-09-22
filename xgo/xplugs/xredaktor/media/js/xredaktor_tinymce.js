var xredaktor_tinymce = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_tinymce_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_tinymce_ = function(config) {
	this.config = config || {};
};

xredaktor_tinymce_.prototype = {

	defRegister: function(name,human,fn,selector) {

		var me = this;

		tinymce.PluginManager.add(name, function(editor, url) {

			editor.addButton(name, {
				title: human,
				icon: false,
				stateSelector: selector,
				onclick: function() {
					fn.call(me,editor);
				}
			});

			//,stateSelector: 'a[href]'

			editor.addMenuItem(name, {
				text: human,
				context: 'tools',
				onclick: function() {
					fn.call(me,editor);
				}
			});

		});
	},

	registerAllPlugins: function() {
		this.defRegister('xr_img',	'CMS Image',this.xr_img,	'img[src]');
		this.defRegister('xr_link',	'CMS Link',	this.xr_link,	'a[href]');
	},

	defaultPopUp: function(cfg) {

		var me 	= this;
		var win = false;
		var fp 	= false;

		var h_final = cfg.height || 400;

		if (cfg.fp) {
			fp = cfg.fp;
			fp.on('afterrender',function(gui){


				var h = gui.getHeight();
				var w = gui.getWidth();

				if (cfg.width) {
					if (w < cfg.width) w = cfg.width;
				}

				if (cfg.height) {
					if (h < cfg.height) h = cfg.height;
				}

				win.setHeight(h_final);
				win.setWidth(w+20);
				win.center();

				if (typeof cfg.afterrender == 'function') {
					cfg.afterrender.call(me,gui);
				}

			},this,{buffer:10});

		} else {
			fp = xredaktor_gui.getInstance().renderFormViaVid({
				scope: me,
				listeners: {
					afterBuildFormPanel: function(fp) {
					},
					afterrender: function(gui) {

						var obj = $$('div:first','#'+gui.down('[cls=xr_forms_root_panel]').id);


						var h = oldh = obj.height();
						var w = obj.width();

						if (cfg.width) {
							if (w < cfg.width) w = cfg.width;
						}

						if (cfg.height) {
							if (h < cfg.height) h = cfg.height;
						}

						win.setHeight(h_final);
						win.setWidth(w+20);
						win.center();

						/*
						$$(window).click(function() {

						h = obj.height();

						if (cfg.height) {
						if (h < cfg.height) h = cfg.height;
						}

						if (oldh != h)
						{
						win.setHeight(h);
						}

						});
						*/

						/*
						obj.bind("resize", function() {
						alert("Box was resized from 100x100 to 200x200");
						});
						*/

						if (typeof cfg.afterrender == 'function') {
							cfg.afterrender.call(me,gui);
						}

					}
				},
				vid: cfg.vid,
				msg: 'Lade Formular...'
			});
		}


		if (!cfg.btns) cfg.btns = [];


		cfg.btns.push('->',{
			iconCls: cfg.btn_iconCls || 'xf_save',
			text: cfg.btn_title,
			scope:this,
			handler:function(btn)
			{
				if (typeof cfg.handler_save == "function")
				{
					cfg.handler_save();
				} else {
					win.close();
				}

			}
		},{
			iconCls:'xf_abort',
			text:'Abort',
			scope:this,
			handler:function(btn)
			{
				win.close();
			}
		});


		win = Ext.create('Ext.window.Window', {
			title: cfg.title,
			modal: true,
			height: h_final,
			width: 500 || cfg.width,
			layout: 'fit',
			items: fp,
			bbar: cfg.btns
		}).show();

		return win;
	},


	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/




	xr_img: function(editor) {



		var selection = false;
		try {
			selection = $$(editor.selection.getNode()).context.tagName.toLowerCase();
		} catch (e) {}


		var imgHolder 	= false;
		var value 		= false;
		var img_tag		= false;
		var insertedId	= Ext.id();


		var id_w 		= Ext.id();
		var id_h 		= Ext.id();
		var id_c 		= Ext.id();
		var id_crop 	= Ext.id();
		var id_dummy	= Ext.id();

		var fp = Ext.create('Ext.form.Panel', {
			bodyPadding: 5,
			width: 350,
			layout: 'anchor',
			defaults: {
				anchor: '100%',
				labelAlign: 'top'
			},

			defaultType: 'textfield',
			items: [{
				xtype: 'splitter',
				height: 10
			},{
				fieldLabel: 'Image',
				name: 'IMG',
				xtype: 'xr_field_file'
			}

			,{
				xtype: 'splitter',
				height: 10
			},{
				xtype: 'fieldcontainer',
				fieldLabel: 'Dimensions (Width x Height)',
				labelStyle: 'font-weight:bold;padding:0',
				layout: 'hbox',
				defaultType: 'numberfield',
				fieldDefaults: {
					left: 'top',
					allowDecimals:false
				},
				items: [{
					flex: 1,
					allowBlank: false,
					name: 'WIDTH',
					id: id_w
				},
				{
					flex: 1,
					margins: '0 0 0 5',
					name: 'HEIGHT',
					id: id_h
				}]
			},
			{
				xtype: 'checkbox',
				boxLabel: 'Constrain Proportions',
				name: 'constrain',
				checked: true,
				uncheckedValue: 'off',
				name: 'SAVE_WH',
				id: id_c
			},{
				xtype: 'splitter',
				height: 10
			},{
				labelAlign: 'left',
				fieldLabel: 'Scale-Mode',
				name: 'RMODE',
				xtype: 'combobox',
				typeAhead: true,
				triggerAction: 'all',
				selectOnTab: true,
				value: 'squeeze',
				store: [['cco','Center-Cut-Out'],['squeeze','Squeeze']]
			},{
				labelAlign: 'left',
				fieldLabel: 'Imge-Format',
				name: 'EXT',
				xtype: 'combobox',
				typeAhead: true,
				triggerAction: 'all',
				selectOnTab: true,
				value: 'jpg',
				store: [['jpg','JPEG'],['png','PNG']]
			},{
				xtype: 'hidden',
				name: 'CROP'
			},{
				id: id_crop,
				maxWidth: 100,
				height: 30,
				xtype: 'button',
				text: 'Crop image',
				scope: this,
				disabled: true,
				handler: function() {

					var values 			= fp.getForm().getValues();
					var cropDataBackup 	= values['CROP'];

					values['CROP'] = "";
					var config 	= Base64.encode(Ext.encode(values));
					var src 	= '/xgo/xplugs/xredaktor/ajax/storage/xr_img2/'+config;

					var sel		= "";

					if (cropDataBackup) {
						sel = Ext.decode(cropDataBackup,true);
					}

					this.cropThisImage(src,sel,function(cropData){
						fp.getForm().setValues({'CROP':Ext.encode(cropData)});
						console.info('cropData',cropData);
					});
				}
			},{
				xtype:'panel',
				height:0,
				html: '<img src="" id="'+id_dummy+'">'
			}]
		});


		var btn_title = 'Insert image';

		if (selection == 'img') {
			btn_title = 'Update image';
		}

		var win = this.defaultPopUp({
			fp: fp,
			height: 600,
			minHeight: 600,
			title: 'Insert image from file-archive ...',
			btn_title: btn_title,
			handler_save: function() {


				var values 	= fp.getForm().getValues();
				var config 	= Base64.encode(Ext.encode(values));
				var src 	= '/xgo/xplugs/xredaktor/ajax/storage/xr_img2/'+config;

				fp.mask("please wait, generating image ... ");

				$$('#'+id_dummy).load(function(){

					fp.unmask();

					var checker	= Ext.id();
					editor.insertContent('<img src="'+src+'" alt="'+config+'" id="'+checker+'">');
					setTimeout(function(){
						//$$('#'+checker).attr('width',values.WIDTH);
						//$$('#'+checker).attr('height',values.HEIGHT);
					},100);

					win.close();

				});

				$$('#'+id_dummy).attr('src',src);


			},
			afterrender: function(fp) {

				fp.down('xr_field_file').on('change',function(f,s_id) {

					console.info("ddddd");

					fp.mask("Lade Bild Informationen ...");

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/storage/getFileInfo',
						params: {
							s_id: s_id
						},
						stateless: function(succ,json) {

							fp.unmask();
							this.latestFileInfo = json.file_info;
							fp.getForm().setValues(d);

							Ext.getCmp(id_crop).setDisabled(false);

							if (!succ) {
								var d = {
								'WIDTH': 0,
								'HEIGHT': 0
								};
								fp.getForm().setValues(d);
								return;
							}

							var d = {
							'WIDTH': json.file_info.width,
							'HEIGHT': json.file_info.height
							};


							Ext.getCmp(id_w).suspendEvents();
							Ext.getCmp(id_h).suspendEvents();

							fp.getForm().setValues(d);

							Ext.getCmp(id_w).resumeEvents();
							Ext.getCmp(id_h).resumeEvents();



						}
					});

				},this);


				Ext.getCmp(id_w).on('change',function(f,value){
					if (!Ext.getCmp(id_c).checked) return;

					var newH = this.latestFileInfo.height/this.latestFileInfo.width * value;

					Ext.getCmp(id_w).suspendEvents();
					Ext.getCmp(id_h).suspendEvents();

					fp.getForm().setValues({
					'WIDTH': value,
					'HEIGHT': newH
					});

					Ext.getCmp(id_w).resumeEvents();
					Ext.getCmp(id_h).resumeEvents();

				},this);

				Ext.getCmp(id_h).on('change',function(f,value){
					if (!Ext.getCmp(id_c).checked) return;

					var newW = this.latestFileInfo.width/this.latestFileInfo.height * value;

					Ext.getCmp(id_w).suspendEvents();
					Ext.getCmp(id_h).suspendEvents();


					fp.getForm().setValues({
					'WIDTH': newW,
					'HEIGHT': value
					});

					Ext.getCmp(id_w).resumeEvents();
					Ext.getCmp(id_h).resumeEvents();


				},this);


				img_tag		= $$('img','#'+imgHolder.id);

				// Init

				if (selection == 'img') {

					var config = Ext.decode(Base64.decode($$(editor.selection.getNode()).attr('alt')),true);
					var s_id = parseInt(config.IMG,10);
					if (s_id > 0)
					{
						fp.mask('Lade Einstellungen ...');
						fp.down('xr_field_file').suspendEvent('change');
						Ext.getCmp(id_w).suspendEvents();
						Ext.getCmp(id_h).suspendEvents();


						fp.getForm().setValues(config);

						Ext.getCmp(id_w).resumeEvents();
						Ext.getCmp(id_h).resumeEvents();
						fp.down('xr_field_file').resumeEvents('change');


						xframe.ajax({
							scope:this,
							url: '/xgo/xplugs/xredaktor/ajax/storage/getFileInfo',
							params: {
								s_id: s_id
							},
							stateless: function(succ,json) {

								fp.unmask();
								this.latestFileInfo = json.file_info;
								Ext.getCmp(id_crop).setDisabled(false);
							}
						});



					}
				}

			}
		});
	},



	cropThisImage: function(src,selection,cb) {

		var width 	= window.innerWidth*0.9;
		var height 	= window.innerHeight*0.9;
		var cropper = Ext.id();
		var preview = Ext.id();
		var boundx 	= 0;
		var boundy 	= 0;

		var latest	= {};

		getCoords = function(c){
		
			latest = c;
			
			if (parseInt(c.w) > 0) {
				xsize = 130,
				ysize = 130;
				var rx = xsize / c.w;
				var ry = ysize / c.h;
				$pimg = $$('#'+preview);
				$pimg.css({
					width: Math.round(boundx*rx) + 'px',
					height: Math.round( boundy*ry) + 'px',
					marginLeft: '-' + Math.round(rx * c.x) + 'px',
					marginTop: '-' + Math.round(ry * c.y) + 'px'
				});
			}
		}

		var win = Ext.create('Ext.window.Window', {
			bbar: ['->',{
				scope: this,
				text: 'Choose area',
				iconCls: 'xf_crop',
				handler: function() {
					cb(latest);
					win.close();
				}
			},{
				text: 'Abort',
				iconCls: 'xf_abort',
				handler: function() {
					win.close();
				}
			}],
			title: 'Select an area ...',
			layout: 'border',
			width: width,
			height: height,
			listeners: {
				scope: this,
				buffer:10,
				afterrender: function() {

					var me = this;
					$$("#"+cropper).Jcrop({
						//aspectRatio: 1,
						minSize : [10,10],
						onSelect:getCoords,
						onChange:getCoords
					},function(){
						if (selection != "") {

							if (selection.x) {
								var tmp = [selection.x,selection.y,selection.x2,selection.y2];
								this.setSelect(tmp);
								var tmp2 = {x2:selection.x2,y2:selection.y2,x:selection.x,y:selection.y,w:selection.x2-selection.x,h:selection.y2-selection.y};
								setTimeout(function(){
									getCoords(tmp2);
								},100);
							}
						}
						var bounds = this.getBounds();
						boundx = bounds[0];
						boundy = bounds[1];
					});
				}
			},
			items: [
			{
				region: 'east',
				width: 200,
				items : [{
					xtype:'panel',
					width:130,
					height:130,
					items:[{
						xtype:'image',
						id : preview,
						src: src
					}]
				}]
			},{
				region: 'center',
				autoScroll: true,
				items: [{
					id:cropper,
					xtype:'image',
					src: src
				}]
			}]
		}).show();

	},




	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/
	/*****************************************************************************************************************************************/




	xr_link: function(editor) {

		var me 		= this;
		var form 	= false;

		var preFix		= '#XR_2LINK';
		var preFixOld	= '#XR_LINK';

		var selection = false;
		var node = editor.selection.getNode();

		try {
			selection = $$(node).context.tagName.toLowerCase();
		} catch (e) {}

		if (selection != 'a')
		{
			console.info('NOT FOUND HREF');
			if ($$(node).closest('a').length == 0)
			{
				// NADA
			} else {
				node = $$(node).closest('a');
				selection = "a";
			}
		}

		var cutted = "";
		if (selection == 'a') {

			var raw = $$(node).attr('href');
			if (raw) {

				if (raw.indexOf("#XR_") == -1)
				{

					var tmp = {
						sel: 'external',
						cfg: {
						'external' : {
							ext_url: raw
						}
						}
					};

					cutted = Base64.encode(Ext.encode(tmp));

				} else
				{
					if (raw.indexOf(preFixOld) != -1) {
						cutted = raw.substring(preFixOld.length);
					} else {
						cutted = raw.substring(preFix.length);
					}
				}
			}
		}

		var idx = Ext.id();

		var  win = Ext.create('Ext.window.Window', {
			title: 'Link',
			closable: true,
			width: 600,
			height: 400,
			modal: true,
			layout: 'fit',
			border: false,
			//bodyStyle: 'padding: 5px;',
			bodyStyle:{"background-color":"white","padding":"5px;"},
			items: [{
				id: idx,
				title: '',
				xtype: 'xr_field_link',
				value: cutted
			}],
			bbar: [{
				iconCls: 'xf_unlink',
				text: 'löschen',
				scope: me,
				disabled: (selection != 'a'),
				handler: function() {
					editor.execCommand('unlink');
					win.close();
				}
			},'->',{
				iconCls: 'xf_link',
				text: 'create',
				scope: me,
				//disabled: (selection != 'a'),
				handler: function() {
					var value = Ext.getCmp(idx).getValue();
					editor.execCommand('mceInsertLink', false, {
						href: preFix+value
					});
					win.close();
				}

			}]
		}).show();



		/*

		----------------------

		return;

		var latestSetting = "";
		var win = this.defaultPopUp({
		vid: 501,
		height: 400,
		width: 700,
		title: 'Verknüpfung erstellen ...',
		btn_title: 'Verknüpfung erstellen',
		btn_iconCls: 'xf_link',
		btns:[{
		iconCls: 'xf_unlink',
		text: 'Verknüpfung aufheben',
		scope: me,
		disabled: (selection != 'a'),
		handler: function() {
		editor.execCommand('unlink');
		win.close();
		}
		}],

		handler_save: function() {

		var value = form.getForm().getValues()['LINK'];
		editor.execCommand('mceInsertLink', false, {
		href: preFix+value
		});

		win.close();

		},
		afterrender: function(fp) {
		form = fp;

		if (selection == 'a') {

		var raw 	= $$(editor.selection.getNode()).attr('href');
		var cutted 	= raw.substring(preFix.length);
		var xr_data = Ext.decode(Base64.decode(cutted));

		if (xr_data)
		{
		if (xr_data.sel) {
		fp.getForm().setValues({'LINK':cutted});
		}
		}
		}


		}
		});


		*/

	}

}


