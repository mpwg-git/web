var xcrm_gui = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xcrm_gui";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xcrm_gui_(config);
			}
			return instance;
		}
	}
})();

var xcrm_gui_ = function(config) {
	this.config = config || {};
};

xcrm_gui_.prototype = {

	getFrag : function(a_id,cfg)
	{
		var me = this;
		xframe.ajax({
			scope: me,
			url: xcrm.getInstance().getAjaxPath('/gui/getFragment'),
			params : {
				a_id : a_id
			},
			success: function(d) {
				cfg.fn.call(cfg.scope,d.tpl);
			},
			stateless: function(json)
			{
			}
		});
	},

	getMainPanels : function() {

	},

	tabs2init: function()
	{
	},


	tabsInit: function(doStart)
	{
		this.tabs2init();
		if (typeof doStart == 'undefined') doStart = true;

		var me = this;
		$ = $$;

		this.fixTabs();



		if (doStart)
		{

			$(doStart+" .xcrm_tabs .xcrm_tabs_nav li").unbind("click");
			$(doStart+" .xcrm_tabs .xcrm_tabs_nav li").click(function (event) {
				event.preventDefault();
				var id = $(this).attr('data');
				$(doStart+" .xcrm_tabs .xcrm_tabs_content").hide();
				$("#"+id).show();

				$(doStart+" .xcrm_tabs_active").removeClass('xcrm_tabs_active');
				$(this).addClass('xcrm_tabs_active');


				$(doStart+" .xcrm_ga_geo_map").each(function(){
					google.maps.event.trigger(this.mapxxx, 'resize');
				});

			});

			$(doStart+" .xcrm_tabs .xcrm_tabs_nav li").each(function (i) {
				if (i >= 1) return;
				$(this).addClass('xcrm_tabs_active');
			});

			$(doStart+" .xcrm_tabs .xcrm_tabs_content").each(function (i) {
				if (i == 0) return;
				$(this).hide();
			});

		}

		$('.xcrm_acc_t_left').unbind('click');
		$('.xcrm_acc_t_left').click(function(){
			$(this).parent().find('.tbar_updown').click();
		});


		$('.tbar_updown').unbind('click');
		$('.tbar_updown').bind('click',function(event){
			event.preventDefault();
			if ($(this).hasClass("active_arrow")) {

				$(this).removeClass("active_arrow");
				$(this).parent().parent().parent().find(".xcrm_content").first().hide();
				//$(this).parent().parent().parent().find(".xcrm_content").first().slideUp("fast", function() {});

			} else {

				$(this).addClass("active_arrow");
				$(this).parent().parent().parent().find(".xcrm_content").first().show();
				//$(this).parent().parent().parent().find(".xcrm_content").first().slideDown("fast", function() {});

				$('.xcrm_ga_geo_map').each(function(){
					google.maps.event.trigger(this.mapxxx, 'resize');
				});
			}



		});


		$('.tbar_updown').each(function(i,obj){
			if (i!=0) return;
			//$(this).click();
		});

		$('.new_generic_data').unbind('click');
		$('.new_generic_data').click(function(){

			var haupt 		= $(this).attr('haupt');
			var papsch 		= $(this).attr('papsch');
			var new_record 	= $(this).attr('new_record');
			var div 		= $(this).attr('data');

			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/newMultRecord'),
				params : {
					haupt : haupt,
					new_record : new_record,
					papsch : papsch
				},
				success: function(json) {

					$('#'+div).html(json.html);
					me.tabsInit(false);

				},
				stateless: function(json)
				{
				}
			});

		});



		$('.tbar_del').unbind('click');
		$('.tbar_del').click(function(){

			var check = confirm("Wollen Sie diesen Datensatz wirklich löschen ?");
			if (check == false) return false;

			var papsch 		= $(this).attr('papsch');
			var del_id 		= $(this).attr('del_id');
			var formCfgId 	= $(this).attr('formCfgId');
			var div 		= $(this).attr('data');

			var txx = $(this).parent().parent();

			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/delMultRecord'),
				params : {
					papsch : papsch,
					del_id : del_id,
					formCfgId : formCfgId
				},
				success: function(json) {

					txx.hide();

				},
				stateless: function(json)
				{
				}
			});//f

		});




		this.initFiles(doStart);
		this.initGeo();
		this.initTags();
		this.initWizardRecord();
		this.initCombos();
		this.initCheckBoxes();
		this.initMainFunctions();
		this.initTimeDateTimestamp();
		this.initBD();

		this.initFieldsExtraFunctions();

	},

	initFieldsExtraFunctions : function() {

		
			$('.xcrm_f_input input').unbind('change');
		$('.xcrm_f_input input').change(function(){
			console.info('CHANGE');
		});

	
		
		jQuery(".iamaform2check").validationEngine({scroll: true});
		$(".iamaform2check").bind("jqv.field.result", function(event, field, errorFound, prompText){
			console.log(errorFound)
		})

		$('.xcrm_tabs_scroller').scroll(function(){
			$('.iamaform2check').validationEngine('hide');
		});

	},

	initBD : function()
	{
		var me = this;
		$ = $$;

		$('#search_image_database').tagit({
			singleField: true,
			singleFieldNode: $('#hidden_tags_input'),
			tagSource: function( request, response ) {

				$.ajax({
					url: xcrm.getInstance().getAjaxPath('/gui/bd_fetchTags'),
					data: { term:request.term },
					dataType: "json",
					success: function( data ) {
						response( $.map( data.tags, function( item ) {
							return {
								label: item.wz_KEYWORD,
								value: item.wz_ids
							}
						}));
					}
				});

			}
		});

		var images = [];

		$('.luppi_wrapper').unbind('click');
		$('.luppi_wrapper').click(function(){

			var s = $('#hidden_tags_input').val();

			var inputs 	= $('#bilddatenbank_menu_left').find('.search_input');
			var search 	= me.collectSearchData(inputs);


			$('.xcrm_image_uploading').hide();
			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/bd_search'),
				params : {
					s:s,
					search: Ext.encode(search),
					pos: 0
				},
				success: function(json) {
					$('#real_images').html(json.html);
					me.initBD();
					$('#bilddatenbank_main').screw({
						callBack : function() {

							me.initBD();


						}
					});
				},
				stateless: function(json)
				{
				}
			});




		});
















		$('.bd_image').unbind('click');
		$('.bd_image').click(function(){

			var del_id 	= $(this).attr('del_id');
			var title 	= $(this).attr('title');

			if (title == "") {
				title = "Bild "+del_id;
			}

			me.loadTabPanel({
				id: 'img'+del_id,
				title: title,
				loader : {
					url: xcrm.getInstance().getAjaxPath('/gui/image_settings'),
					params: {
						id : del_id
					}
				}
			});

		});


		$('.xcrm_hidden_fileupload_bd').fileupload({
			dataType: 'json'
		}).bind('change',function (e, data) {
			images = [];
			$('#real_images').html('');
			$('#xcrm_image_uploading_bd').show();
			console.info("clear");
		}).bind('fileuploadalways',function (e, data) {
			console.info("fileuploadalways");
			images.push(data.result.id);

		}).bind('fileuploadsend',function(e,data){
			$('#real_images').html('');
		}).bind('fileuploadprogressall',function(e,data){
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#xcrm_image_uploading_bd').html(progress+' %');

			if (progress == 100)
			{

				setTimeout(function(){

					$('.xcrm_image_uploading').hide();
					xframe.ajax({
						scope: me,
						url: xcrm.getInstance().getAjaxPath('/gui/getImagesOfBD'),
						params : {
							ids : images.join(',')
						},
						success: function(json) {
							$('#real_images').html(json.html);
							me.initBD();
						},
						stateless: function(json)
						{
						}
					});
				},100);
			}

		});

		me.fixTabs();
	},


	initTimeDateTimestamp: function(){

		$ = $$;

		$('.xcrm_inject_time').timepicker({
		});

		$('.xcrm_inject_date').datepicker({
		});

		$('.xcrm_inject_timestamp').datetimepicker({
		});

	},


	collectData : function(form_cfg_id,form_wz_id)
	{
		var me = this;
		$ = $$;

		var idx 	= form_cfg_id+"_"+form_wz_id+"_formPanel";
		var data 	= {};

		// YN
		$('#'+idx+' .xcrm_f_bool_box').each(function(){
			var as_id 		= $(this).attr('as_id');
			var xchecked 	= $(this).attr('xchecked');
			data[''+as_id] 	= (xchecked == 'on') ? 'on' : 'off';
		});

		// CHECKBOXES
		$('#'+idx+' .xcrm_f_checkbox_cb').each(function(){
			var as_id 		= $(this).attr('as_id');
			var as_id_2		= $(this).attr('as_id_2');
			var xchecked 	= $(this).attr('xchecked');

			if (typeof data[as_id] == 'undefined')
			{
				data[as_id] = {};
			}
			data[''+as_id][as_id_2] = (xchecked == 'on') ? 'on' : 'off';
		});

		// COMBO
		$('#'+idx+' .xcrm_f_combo_content').each(function(){
			var as_id 		= $(this).attr('data');
			var value 		= $(this).attr('value');
			data[''+as_id] 	= value;
		});

		// IMAGES & FILES
		$('#'+idx+' .xcrm_f_img').each(function(){
			var as_id 		= $(this).attr('as_id');
			var del_id 		= $(this).attr('del_id');
			if (typeof data[as_id] == 'undefined')
			{
				data[as_id] = [];
			}
			data[''+as_id].push(del_id);
		});

		// TAGS
		$('#'+idx+' .xcrm_f_tag_content').each(function(){

			var as_id 		= $(this).attr('data');
			var del_id 		= $(this).attr('del_id');
			var value		= $(this).attr('value');

			if (typeof data[as_id] == 'undefined')
			{
				data[as_id] = [];
			}
			data[''+as_id].push({'del_id':del_id,'id':value});
		});

		// TEXT
		$('#'+idx+' .xcrm_f_input input').each(function(){
			var as_id 		= $(this).attr('as_id');
			var value		= $(this).val();
			data[''+as_id] 	= value;
		});

		// TEXTAREA
		$('#'+idx+' .xcrm_f_input textarea').each(function(){
			var as_id 		= $(this).attr('as_id');
			var value		= $(this).val();
			data[''+as_id] 	= value;
		});

		// WIZARD
		$('#'+idx+' .xcrm_f_wizard_content').each(function(){
			var as_id 		= $(this).attr('data');
			var wz_id		= $(this).attr('value');
			data[''+as_id] 	= wz_id;
		});

		// GEO_POINT
		$('#'+idx+' .xcrm_f_geo_lang_lat').each(function(){

			var as_id 		= $(this).attr('as_id');
			var lon			= $(this).find('.xcrm_f_geo_point_long input').val();
			var lat			= $(this).find('.xcrm_f_geo_point_lat input').val();

			var geo	= {
			'lat' : lat,
			'long' : lon
			};

			data[''+as_id] 	= Ext.encode(geo);
		});

		return data;
	},

	initMainFunctions : function()
	{
		var me = this;
		$ = $$;

		$('.xcrm_fields_save').unbind('click');
		$('.xcrm_fields_save').click(function(){

			var me2 = this;
			me.right.setDisabled(true);

			var form_cfg_id = $(this).attr('form_cfg_id');
			var form_wz_id 	= $(this).attr('form_wz_id');

			var data = me.collectData(form_cfg_id,form_wz_id);

			var savePack = {
				form_cfg_id : form_cfg_id,
				form_wz_id : form_wz_id,
				data : data
			}

			var transportSavePack = Ext.encode(savePack);

			var idx = form_cfg_id+"_"+form_wz_id+"_formPanel";
			$('#'+idx).css({ 'opacity' : 0.7 });

			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/saveRecordData'),
				params : {
					savePack : transportSavePack
				},
				success: function(json) {
					$(me2).parents('.xcrm_form_panel:first').find(".xcrm_acc_t_left span").html(json.title);
				},
				stateless: function(json)
				{
					$('#'+idx).css({ 'opacity' : 1 });
					me.right.setDisabled(false);
				}
			});
		});


		$('.xcrm_fields_delete').unbind('click');
		$('.xcrm_fields_delete').click(function(){

			var check = confirm("Wollen Sie diesen Datensatz wirklich löschen ?");
			if (check == false) return false;

			var me2 = this;
			me.right.setDisabled(true);

			var form_cfg_id = $(this).attr('form_cfg_id');
			var form_wz_id 	= $(this).attr('form_wz_id');

			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/deleteRecord'),
				params : {
					form_cfg_id : form_cfg_id,
					form_wz_id : form_wz_id
				},
				success: function(json) {
					$('.xcrm_tabs_records_active .xcrm_tabs_records_close').click();
				},
				stateless: function(json)
				{
					me.right.setDisabled(false);
				}
			});
		});

	},

	initFiles : function(doStart)
	{
		if (typeof doStart == 'undefined') doStart=false;
		var me 			= this;
		var latestData 	= false;
		var m_id		= false;
		var f_id		= false;
		var wz_id		= false;

		$ = $$;


		if (doStart)
		{
			console.info('doStart',doStart,$(doStart+' .xcrm_tabs_content'));
			$(doStart+" img.lazy").show().lazyload({
				container: $(doStart+' .xcrm_tabs_scroller')
			});
		}

		console.info('xcrm_hidden_fileupload');
		$('.xcrm_hidden_fileupload').fileupload({
			dataType: 'json'
		}).bind('fileuploadalways',function (e, data) {

			console.info('a',arguments);

			if (data.result.success)
			{
				console.info('id',data.result.id);
				latestData = data;
			}
		}).bind('fileuploadsend',function(e){
			
			console.info('a',arguments);

			m_id = $(e.srcElement).attr('m_id');
			f_id = $(e.srcElement).attr('f_id');
			wz_id = $(e.srcElement).attr('wz_id');

			console.info(m_id,f_id,wz_id);

			$('#'+m_id+'_uploading_info').show();

		}).bind('fileuploadprogressall',function(e,data){
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('.xcrm_image_uploading').html(progress+' %');

			if (progress == 100)
			{
				$('.xcrm_image_uploading').hide();

				setTimeout(function(){
					xframe.ajax({
						scope: me,
						url: xcrm.getInstance().getAjaxPath('/gui/getImages'),
						params : {
							f_id : f_id,
							r_id : wz_id
						},
						success: function(json) {
							$('#'+m_id+'_imgs_only').html(json.html);
							me.initFiles();
						},
						stateless: function(json)
						{
						}
					});
				},100);
			}

		});

		$('.xcrm_f_img').unbind('hover');
		$('.xcrm_f_img').hover(function() {
			$(this).find('.xcrm_f_img_title').show();
			$(this).find('.xcrm_f_img_del').show();
		}, function() {
			$(this).find('.xcrm_f_img_title').hide();
			$(this).find('.xcrm_f_img_del').hide();
		});

		$('.xcrm_f_img_del').unbind('click');
		$('.xcrm_f_img_del').click(function(){

			var check = confirm("Wollen Sie die Datei wirklich löschen ?");
			if (check == false) return false;

			var del_id 			= $(this).attr('del_id');
			var as_id 			= $(this).attr('as_id');
			var imgContainer 	= $(this).parent();

			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/delFile'),
				params : {
					as_id : as_id,
					del_id : del_id
				},
				success: function(json) {
					imgContainer.hide();
				},
				stateless: function(json)
				{
				}
			});

		});

		$( ".xcrm_images_sortable" ).sortable();
		$( ".xcrm_images_sortable" ).disableSelection();

	},

	codeAddress : function (address,map,marker) {

		console.info("Search in Map :: ",address);

		var geocoder = new google.maps.Geocoder();
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				//In this case it creates a marker, but you can get the lat and lng from the location.LatLng

				var lat 	= (results[0].geometry.location['$a']);
				var lang 	= (results[0].geometry.location['ab']);

				$('.xcrm_f_geo_point_lat input').val(lat);
				$('.xcrm_f_geo_point_long input').val(lang);

				map.setCenter(results[0].geometry.location);
				if (!marker)
				{
					marker = new google.maps.Marker({
						position: position,
						map: map
					});
				} else
				{
					marker.setPosition(results[0].geometry.location);
				}

			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		});
	},

	initGeo : function()
	{
		var me = this;

		$('.xcrm_ga_geo_map').each(function(){

			var idx = $(this).attr('id');
			console.info('GA_MAP',idx);
			var mapOptions = {
				zoom: 10,
				center: new google.maps.LatLng(47.845555555556, 16.518888888889),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var map = new google.maps.Map(document.getElementById(idx),mapOptions);
			this.mapxxx = map;

			var data 		= $(this).attr('data');
			var loc 		= Ext.decode(data,true);
			var position 	= false;
			var marker 		= false;

			try{
				position = new google.maps.LatLng(loc['lat'], loc['long']);
			} catch (e) {};

			if (position)
			{
				map.setCenter(position);
				marker = new google.maps.Marker({
					zoom: 8,
					position: position,
					map: map
				});

			}

			$('#'+idx).parent().find('.xcrm_f_geo_point_q input').keypress(function(event) {
				if ( event.which == 13 ) {
					event.preventDefault();
					me.codeAddress($(this).val(),map,marker);
				}
			});

		});

	},

	initCheckBoxes : function()
	{
		//xcrm_f_checkbox_cb_checked





		$('.xcrm_f_bool_box,.xcrm_f_bool_headline').unbind('click');
		$('.xcrm_f_bool_box,.xcrm_f_bool_headline').click(function(){

			var me = this;

			if ($(this).hasClass('xcrm_f_bool_headline')) {
				me = $(this).next();
			}

			var checked = ($(me).attr('xchecked') == 'on');

			if (checked) {
				$(me).attr('xchecked','off');
				$(me).removeClass('xcrm_f_bool_checked');
			} else {
				$(me).attr('xchecked','on');
				$(me).addClass('xcrm_f_bool_checked');
			}

		});





		$('.xcrm_f_checkbox_cb,.xcrm_f_checkbox_title').unbind('click');
		$('.xcrm_f_checkbox_cb,.xcrm_f_checkbox_title').click(function(){

			var me = this;

			if ($(this).hasClass('xcrm_f_checkbox_title')) {
				me = $(this).prev();
			}

			var checked = ($(me).attr('xchecked') == 'on');

			if (checked) {
				$(me).attr('xchecked','off');
				$(me).removeClass('xcrm_f_checkbox_cb_checked');
			} else {
				$(me).attr('xchecked','on');
				$(me).addClass('xcrm_f_checkbox_cb_checked');
			}

		});

	},


	initWizardRecord : function()
	{
		var me = this;
		$ = $$;

		$('.xcrm_f_wizard_content_alternate').appendTo("body");


		$('.divContainerXX:first-child').scroll(function () {
			$('.xcrm_f_wizard_content[rel=1]').click();
		});

		$(window).resize(function() {
			$('.xcrm_f_wizard_content[rel=1]').click();
		});

		$('.xcrm_f_wizard_content').unbind('click');
		$('.xcrm_f_wizard_content').click(function(){

			var master	= this;
			var id 		= $(this).attr('id');
			var as_id 	= $(this).attr('data');
			var value 	= $(this).attr('value');

			var div_alt_cont 			= '#'+id+'_altCont';
			var div_alt_cont_options 	= '#'+id+'_altCont_options';

			console.info(div_alt_cont,div_alt_cont_options);


			var open = ($(this).attr('rel') == '1');

			if (open)
			{
				$(this).attr('rel','0');
				$(div_alt_cont).hide();
			} else
			{
				$('.xcrm_f_wizard_content[rel=1]').click();

				$(this).attr('rel','1');

				$(div_alt_cont).hiddenPosition({
				'of' : '#'+id,
				'my' : 'center top',
				'at' : 'center bottom'
				});

				$(div_alt_cont).show();

				if ($(this).attr('data_loaded') != "1")
				{
					$(this).attr('data_loaded','1');

					xframe.ajax({
						scope: me,
						url: xcrm.getInstance().getAjaxPath('/gui/getWizardsTags'),
						params : {
							as_id : as_id
						},
						success: function(json) {

							$(div_alt_cont_options).html(json.html);

							console.info('DIVVV',$(div_alt_cont_options));

							setTimeout(function(){


								var h = $(div_alt_cont_options).height();
								if (h < 200) {
									var fixDesign = 30;
									$(div_alt_cont).height(h+fixDesign);
								}

								var has2select = $(div_alt_cont_options + ' .xcrm_f_wizard_option[data='+value+']');
								has2select.addClass('xcrm_f_wizard_option_sel');

								try{
									var pos = has2select.position().top - 10;
									if (pos < 0) pos = 0;
									$(div_alt_cont).scrollTop(pos);
								} catch (e) {}

								$('.xcrm_f_wizard_option').each(function() {
									$(this).unbind('hover');
									$(this).hover(function() {
										$(this).addClass('xcrm_f_wizard_option_hoover');
									}, function() {
										$(this).removeClass('xcrm_f_wizard_option_hoover');
									});
								});


								$(div_alt_cont_options + ' .xcrm_f_wizard_option').unbind('click');
								$(div_alt_cont_options + ' .xcrm_f_wizard_option').click(function() {

									console.info('CLICK');

									if (!$(this).hasClass('xcrm_f_wizard_option_sel'))
									{
										$(div_alt_cont+' .xcrm_f_wizard_option_sel').removeClass('xcrm_f_wizard_option_sel');
										$(this).addClass('xcrm_f_wizard_option_sel');

										$(master).attr('value',$(this).attr('data'));
										$(master).html($(this).html());
										$(master).click();

									} else {
										//$(this).removeClass('xcrm_f_wizard_option_sel');
									}

								});
							},5);

						},
						stateless: function(json)
						{
							$(div_alt_cont+' .xcrm_f_wizard_content_alternate_loading').hide();
						}
					});
				}
			}



		});

	},

	initCombos : function()
	{
		var me = this;
		$ = $$;

		$('.xcrm_f_combo_content_alternate').appendTo("body");


		$('.divContainerXX:first-child').scroll(function () {
			$('.xcrm_f_combo_content[rel=1]').click();
		});

		$(window).resize(function() {
			$('.xcrm_f_combo_content[rel=1]').click();
		});

		$('.xcrm_f_combo_content').unbind('click');
		$('.xcrm_f_combo_content').click(function(){

			var master	= this;
			var id 		= $(this).attr('id');
			var as_id 	= $(this).attr('data');
			var value 	= $(this).attr('value');

			var div_alt_cont 			= '#'+id+'_altCont';
			var div_alt_cont_options 	= '#'+id+'_altCont_options';

			console.info(div_alt_cont,div_alt_cont_options);


			var open = ($(this).attr('rel') == '1');

			if (open)
			{
				$(this).attr('rel','0');
				$(div_alt_cont).hide();
			} else
			{
				$('.xcrm_f_combo_content[rel=1]').click();

				$(this).attr('rel','1');

				$(div_alt_cont).hiddenPosition({
				'of' : '#'+id,
				'my' : 'center top',
				'at' : 'center bottom'
				});

				console.info('SHIIIIIIW');
				$(div_alt_cont).show();

				if ($(this).attr('data_loaded') != "1")
				{
					$(this).attr('data_loaded','1');

					console.info('DIVVV',$(div_alt_cont_options));

					var h = $(div_alt_cont_options).height();
					if (h < 200) {
						var fixDesign = 30;
						$(div_alt_cont).height(h+fixDesign);
					}

					var has2select = $(div_alt_cont_options + ' .xcrm_f_combo_option[data="'+value+'"]');
					has2select.addClass('xcrm_f_combo_option_sel');

					try{
						var pos = has2select.position().top - 10;
						if (pos < 0) pos = 0;
						$(div_alt_cont).scrollTop(pos);
					} catch (e) {};

					$('.xcrm_f_combo_option').each(function() {
						$(this).unbind('hover');
						$(this).hover(function() {
							$(this).addClass('xcrm_f_combo_option_hoover');
						}, function() {
							$(this).removeClass('xcrm_f_combo_option_hoover');
						});
					});


					$(div_alt_cont_options + ' .xcrm_f_combo_option').unbind('click');
					$(div_alt_cont_options + ' .xcrm_f_combo_option').click(function() {

						console.info('CLICK');

						if (!$(this).hasClass('xcrm_f_combo_option_sel'))
						{
							$(div_alt_cont+' .xcrm_f_combo_option_sel').removeClass('xcrm_f_combo_option_sel');
							$(this).addClass('xcrm_f_combo_option_sel');

							$(master).attr('value',$(this).attr('data'));
							$(master).html($(this).html());
							$(master).click();

						} else {
							//$(this).removeClass('xcrm_f_combo_option_sel');
						}

					});

				}
			}

		});


	},

	initTags : function() {

		var me = this;
		$ = $$;

		$('.xcrm_f_tag_new').unbind('click');
		$('.xcrm_f_tag_new').click(function(){

			var wz_id 			= $(this).attr('wz_id');
			var as_id 			= $(this).attr('as_id');

			var box_container	= $('#' + $(this).attr('uId') + '_container_boxes');

			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/addTag'),
				params : {
					as_id : as_id,
					wz_id : wz_id
				},
				success: function(json) {

					if (!json.added) {
						alert("Es gibt keine weiteren Auswahlmöglichkeiten.");
						return;
					}

					box_container.html(json.html);
					me.initTags();
				},
				stateless: function(json)
				{
				}
			});


		});

		$('.xcrm_f_tag_del').unbind('click');
		$('.xcrm_f_tag_del').click(function(){

			var check = confirm("Wollen Sie die Zugehörigkeit wirklich entfernen ?");
			if (check == false) return false;

			var del_id 			= $(this).attr('del_id');
			var as_id 			= $(this).attr('as_id');
			var container2kick	= $(this).parent().parent().parent();

			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/delTag'),
				params : {
					as_id : as_id,
					del_id : del_id
				},
				success: function(json) {
					container2kick.hide();
				},
				stateless: function(json)
				{
				}
			});
		});

		$('.xcrm_f_tags_save').unbind('click');
		$('.xcrm_f_tags_save').click(function(){
			$('.xcrm_fields_save').click();
		});

		$('.xcrm_f_tag_content_alternate').appendTo("body");


		$('.divContainerXX:first-child').scroll(function () {
			$('.xcrm_f_tag_content[rel=1]').click();
		});

		$(window).resize(function() {
			$('.xcrm_f_tag_content[rel=1]').click();
		});

		$('.xcrm_f_tag_content').unbind('click');
		$('.xcrm_f_tag_content').click(function(){

			var master	= this;
			var id 		= $(this).attr('id');
			var as_id 	= $(this).attr('data');
			var value 	= $(this).attr('value');

			var div_alt_cont 			= '#'+id+'_altCont';
			var div_alt_cont_options 	= '#'+id+'_altCont_options';

			var open = ($(this).attr('rel') == '1');

			if (open)
			{
				$(this).attr('rel','0');
				$(div_alt_cont).hide();
			} else
			{
				$('.xcrm_f_tag_content[rel=1]').click();

				$(this).attr('rel','1');

				$(div_alt_cont).hiddenPosition({
				'of' : '#'+id,
				'my' : 'center top',
				'at' : 'center bottom'
				});

				$(div_alt_cont).show();

				if ($(this).attr('data_loaded') != "1")
				{
					$(this).attr('data_loaded','1');

					xframe.ajax({
						scope: me,
						url: xcrm.getInstance().getAjaxPath('/gui/getTags'),
						params : {
							as_id : as_id
						},
						success: function(json) {

							$(div_alt_cont_options).html(json.html);

							setTimeout(function(){


								var h = $(div_alt_cont_options).height();
								if (h < 200) {
									var fixDesign = 30;
									$(div_alt_cont).height(h+fixDesign);
								}

								var has2select = $(div_alt_cont_options + ' .xcrm_f_tag_option[data='+value+']');
								has2select.addClass('xcrm_f_tag_option_sel');

								try {
									var pos = has2select.position().top - 10;
									if (pos < 0) pos = 0;
									$(div_alt_cont).scrollTop(pos);
								} catch (e) {}



								$('.xcrm_f_tag_option').each(function() {
									$(this).unbind('hover');
									$(this).hover(function() {
										$(this).addClass('xcrm_f_tag_option_hoover');
									}, function() {
										$(this).removeClass('xcrm_f_tag_option_hoover');
									});
								});


								$(div_alt_cont_options + ' .xcrm_f_tag_option').unbind('click');
								$(div_alt_cont_options + ' .xcrm_f_tag_option').click(function() {

									if (!$(this).hasClass('xcrm_f_tag_option_sel'))
									{
										$(div_alt_cont+' .xcrm_f_tag_option_sel').removeClass('xcrm_f_tag_option_sel');
										$(this).addClass('xcrm_f_tag_option_sel');

										$(master).attr('value',$(this).attr('data'));
										$(master).html($(this).html());
										$(master).click();

									} else {
										//$(this).removeClass('xcrm_f_tag_option_sel');
									}

								});
							},5);

						},
						stateless: function(json)
						{
							$(div_alt_cont+' .xcrm_f_tag_content_alternate_loading').hide();
						}
					});
				}
			}



		});

	},

	collectSearchData : function(fields)
	{
		$ = $$;
		var data = {};

		console.info('fields',fields);

		$(fields).each(function(){
			var nName = $(this).get(0).nodeName;
			switch (nName)
			{
				case 'INPUT':
				data[$(this).attr('as_id')] = $(this).val();
				break;

				case 'DIV':
				var as_id 		= $(this).attr('as_id');
				var as_id_2		= $(this).attr('as_id_2');
				var xchecked 	= $(this).attr('xchecked');
				if (typeof data[as_id] == 'undefined')
				{
					data[as_id] = {};
				}
				data[''+as_id][as_id_2] = (xchecked == 'on') ? 'on' : 'off';
				break;
				default : return;
			}
		});

		return data;
	},

	accordionInit: function() {

		$ = $$;
		var me = this;

		$(".accordion .headline").unbind("click");
		$(".accordion .headline").click(function (event) {
			event.preventDefault()


			$(".accordion .content").slideUp();
			$(".active_arrow").removeClass("active_arrow");

			// Wenn eingeblendet dann bei Klick auf Headline Content ausblenden, sonst einblenden
			if ($(this).parent(".accordion").find(".content").first().is(":visible")) {
				$(this).parent(".accordion").find(".content").first().slideUp();
				$(this).parent(".accordion").find(".tool_btn_arrow").removeClass("active_arrow");
			} else {
				console.info('slidedown');
				$(this).parent(".accordion").find(".content").first().slideDown("fast", function() {
				});
				$(this).parent(".accordion").find(".tool_btn_arrow").addClass("active_arrow");
			}

			return false;
		});


		$('.accordion .btn_search').unbind('click');
		$('.accordion .btn_search').click(function(){

			$ = $$;

			var inputs 	= $(this).parents('.accordion').find('.search_input');
			var search 	= me.collectSearchData(inputs);
			var type 	= $(this).attr('data');

			$('.betriebe_loading_data').show();

			me.frame_center.getLoader().load({
				url: xcrm.getInstance().getAjaxPath('/gui/html_center'),
				params: {
					search 	: Ext.encode(search),
					type 	: type
				}
			});

		});

		$('.search_input').unbind('keypress');
		$('.search_input').bind('keypress', function(e) {

			var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) {
				$(this).parents('.accordion').find('.btn_search').click();
			}

		});

		$('input[as_type=TIME]').timepicker({});
		$('input[as_type=DATE]').datepicker({});
		$('input[as_type=TIMESTAMP]').datetimepicker({});

		this.initCheckBoxes();

		$('.bilddatenbank').unbind('click');
		$('.bilddatenbank').click(function(){


			me.loadTabPanel({
				id: 'bilddatenbank',
				title: 'BILDDATENBANK',
				loader : {
					url: xcrm.getInstance().getAjaxPath('/gui/show_bilddatenbank'),
					params: {
					}
				}

			});


		});


		$('.accordion .btn_create_new').unbind('click');
		$('.accordion .btn_create_new').click(function(){


			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/newBetrieb'),
				params : {
				},
				success: function(json) {
					var id = json.newBetrieb;
					this.loadBetrieb(id,"Neuer Betrieb ("+id+")");

				},
				stateless: function(json)
				{
				}
			});


		});


	},




	loadTabPanel : function(cfg) {

		var id 		= cfg.id;
		var title	= cfg.title;

		var me = this;
		$ = $$;

		var tabId = "record_"+id;
		var boxId = "xcrm_tabs_records_content_"+id;

		if ($('#record_'+id).length == 0)
		{
			var betrieb_tab = $('#betrieb_tab').html();
			betrieb_tab = betrieb_tab.split('##ID##').join(id);
			betrieb_tab = betrieb_tab.split('##TITLE##').join(title);
			$('#xcrm_tabs_records_nav').append(betrieb_tab);

			$('#xcrm_tabs_records_content').append("<div class='xcrm_tabs_records_content_box' style='' id='"+boxId+"'><div class='betriebe_loading_data_content'></div></div>");

			$('#'+tabId+' .xcrm_tabs_records_title').unbind('click');
			$('#'+tabId+' .xcrm_tabs_records_title').click(function(){

				$('.xcrm_tabs_records_tab').removeClass('xcrm_tabs_records_active');
				$('#'+tabId).addClass('xcrm_tabs_records_active');


				me.latestOpenTab = boxId;
				$('.xcrm_tabs_records_content_box').hide();
				$('#'+boxId).show();
			});

			$('#'+tabId+' .xcrm_tabs_records_close').unbind('click');
			$('#'+tabId+' .xcrm_tabs_records_close').click(function(){
				$('#'+tabId).remove();
				$('#'+boxId).remove();
				$('.xcrm_tabs_records_nav .xcrm_tabs_records_title').last().click();
			});

			$('.xcrm_tabs_records_tab').removeClass('xcrm_tabs_records_active');
			$('#'+tabId).addClass('xcrm_tabs_records_active');

			// load content

			$('.xcrm_tabs_records_content_box').hide();
			$('#'+boxId).show();

			xframe.ajax({
				scope: me,
				url: cfg.loader.url,
				params : cfg.loader.params,
				success: function(json) {
					$('#'+boxId).html(json.html);
					me.latestOpenTab = boxId;
					me.fixTabs();
					me.tabsInit('#'+boxId);
					if (typeof cfg.callback == 'function')
					{
						setTimeout(function(){
							cfg.callback.call(me);
						},100);
					}
				},
				stateless: function(json)
				{
				}
			});


		} else {
			$('#'+tabId+' .xcrm_tabs_records_title').click();
			if (typeof cfg.callback == 'function')
			{
				setTimeout(function(){
					cfg.callback.call(me);
				},100);
			}
		}

	},

	fixTabs : function()
	{
		var me = this;

		/*
		if (this.viewport.getWidth() < 1000)
		{
		this.left.setWidth(210);
		} else
		{
		this.left.setWidth(300);
		}
		*/

		this.left.setWidth(320);

		var w2 = this.viewport.getWidth() - this.left.getWidth();


		var min_w_center = 320;

		var w_right 	= w2 / 100 * 80;
		var w_center 	= w2 - w_right;


		//if (w_center < min_w_center)
		{
			w_center = min_w_center;
			w_right  = w2 - w_center;
		}


		this.center.setWidth(w_center);
		this.right.setWidth(w_right);

		var containerHeight = this.left.getHeight() - $('#xcrm_tabs_records_nav_wrapper').height();
		$('.xcrm_tabs_records_content').height(containerHeight);
		$('.xcrm_tabs_records_content_box').height(containerHeight);

		$('#'+me.latestOpenTab+' .xcrm_tabs_scroller').height(containerHeight-$('#'+me.latestOpenTab+' .xcrm_tabs_nav').height());
		$('#bilddatenbank_menu_right').width(w_right - $('#bilddatenbank_menu_left').width()-50);


		/*
		var me = this;
		$ = $$;

		$('.xcrm_tabs .xcrm_tabs_nav').width(w2-20);
		var h = $('.xcrm_tabs_nav').height();
		$('.xcrm_tabs_content').css({
		'padding-top': h + 70
		});
		*/

	},


	loadBetrieb : function(wz_id,title,callback) {

		if (typeof callback == 'undefined') callback = false;

		this.loadTabPanel({
			callback: callback,
			id: 'b_'+wz_id,
			title: title,
			loader : {
				url: xcrm.getInstance().getAjaxPath('/gui/show_betrieb'),
				params: {
					betrieb : wz_id,
					iam : 'b'
				}
			}

		});
	},

	centerInit : function()
	{
		var me = this;
		$ = $$;

		$('.betriebe_loading_data').hide();

		var heightOfHeadline = this.left.getHeight() - $('#list_betriebe_headline_wrapper').height();
		$('.list_betriebe').height(heightOfHeadline);

		$('.betrieb_poster .betrieb_poster_edit, .betrieb_poster .betrieb_poster_img').unbind('click');
		$('.betrieb_poster .betrieb_poster_edit, .betrieb_poster .betrieb_poster_img').click(function(){

			var xtype		= $(this).parent().attr('xtype');
			var wz_id 		= $(this).parent().attr('wz_id');
			var wz_title 	= $(this).parent().attr('wz_title');

			console.info('xtype',xtype);

			switch(xtype)
			{
				case 'b':
				me.loadBetrieb.call(me,wz_id,wz_title);
				break;
				case 'a':
				case 'e':

				xframe.ajax({
					scope: me,
					url: xcrm.getInstance().getAjaxPath('/gui/get_betrieb'),
					params : {
						idx: wz_id,
						iam: xtype
					},
					success: function(d) {

						var idx = d.betrieb_id;
						me.loadBetrieb.call(me,idx,d.title,function(){
							switch(xtype)
							{
								case 'a':
								$('.xtab_6_b_'+idx).click();
								$('#xcrm_tabs_records_content_b_'+idx+' .tbar_updown').removeClass("active_arrow");
								$('#xcrm_tabs_records_content_b_'+idx+' .xcrm_content').hide();
								$('#212_'+wz_id+'_formPanel_opener .tbar_updown').click();
								break;
								case 'e':
								$('.xtab_5_b_'+idx).click();
								$('#xcrm_tabs_records_content_b_'+idx+' .tbar_updown').removeClass("active_arrow");
								$('#xcrm_tabs_records_content_b_'+idx+' .xcrm_content').hide();
								$('#213_'+wz_id+'_formPanel_opener .tbar_updown').click();
								break;
								default: break;
							}
						});
					},
					stateless: function(json)
					{
					}
				});

				break;
				break;
				default: break;
			}


		});

	},

	buildDesktop : function()
	{
		xframe.setAppTitle("Die Burgenland Datenbank");

		var me = this;
		$ = $$;

		this.getFrag(247,{
			scope: me,
			fn: function(html) {
				//xredaktor.getInstance().viewport_master.removeAll();
				//xredaktor.getInstance().viewport_master.add(html);
				//Ext.getBody().update(html);
			}
		});




		this.top = Ext.create('Ext.Panel',{
			layout: 'fit',
			region: 'north',
			border: false,
			html: '<div id="xcrm_logo_customer"></div><div id="zapf"></div><div id="bt_abmelden"></div>',
			baseCls: 'xcrm_top_header',
			height: 110
		});

		this.top.on('afterrender',function(){
			$('#bt_abmelden').unbind('click');
			$('#bt_abmelden').click(function(){
				top.logoff();
				setTimeout(function(){
					top.location.reload();
				},100);
			});
		},this);

		this.top.on('resize',function(){

			var left 	= this.top.getWidth()-120;
			var top 	= 40;

			$('#bt_abmelden').css({
			'left':left,
			'top': top
			});

		},this);




		this.frame_center = new Ext.Component({
			loader: {
				url: xcrm.getInstance().getAjaxPath('/gui/html_center'),
				renderer: 'html',
				autoLoad: true,
				scripts: true,
				listeners : {
					scope: me,
					load: {
						buffer: 10,
						fn: function() {
							this.centerInit();
						}
					}
				}
			}
		});

		this.center = Ext.create('Ext.Panel',{
			layout: 'fit',
			border: false,
			region: 'center',
			items: [this.frame_center]
		});

		this.frame_right = new Ext.Component({
			loader: {
				url: xcrm.getInstance().getAjaxPath('/gui/html_right'),
				renderer: 'html',
				autoLoad: true,
				scripts: true,
				listeners : {
					scope: me,
					load: {
						buffer: 10,
						fn: function() {
							this.fixTabs();
							//this.tabsInit();
						}
					}
				}
			}
		});

		this.right = Ext.create('Ext.Panel',{
			layout: 'fit',
			border: false,
			region: 'east',
			width: 400,
			bodyCls: 'divContainerXX',
			items: [this.frame_right]
		});

		this.left = Ext.create('Ext.Panel',{
			layout: 'fit',
			region: 'west',
			border: false,
			autoScroll: true,
			bodyCls: 'scrollMenuLeft',
			/*bodyStyle: 'overflow-x: hidden; overflow-y: auto;',*/
			width: 300,
			items: [new Ext.Component({
				loader: {
					url: xcrm.getInstance().getAjaxPath('/gui/html_left'),
					renderer: 'html',
					autoLoad: true,
					scripts: true,
					listeners : {
						scope: me,
						load: {
							buffer: 10,
							fn: function() {
								this.accordionInit();
							}
						}
					}
				}
			})]
		});

		this.mp = Ext.create('Ext.Panel',{
			region: 'center',
			layout: 'border',
			border: false,
			items: [this.top,this.center,this.left,this.right]
		});

		xredaktor.getInstance().viewport_master.removeAll();
		xredaktor.getInstance().viewport_master.doLayout();

		var viewport = Ext.create('Ext.Viewport', {
			layout: {
				type: 'border'
			},
			defaults: {
				split: true
			},
			items: [this.mp]
		});

		this.viewport = viewport;

		viewport.on('afterrender',function(m,w,h){
			this.fixTabs();
		},this,{buffer:10});

		viewport.on('resize',function(m,w,h){
			this.fixTabs();
		},this,{buffer:10});



	}
}
