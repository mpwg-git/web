var xluerzer_media_detail = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_media_detail";
		}

		this.getInstance = function(config) {
			return new xluerzer_media_detail_(config);
			return instance;
		}
	}
})();

var xluerzer_media_detail_ = function(config) {
	this.config = config || {};
};

xluerzer_media_detail_.prototype = {


	getTab_media: function()
	{

		this.panel_media_print = Ext.widget({

			border: false,
			columnWidth: 0.4,
			minWidth: 550,
			xtype: 'form',
			height: '100%',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [
			{
				xtype: 'text',
				text: 'Media Image File',
				height: 50
			},
			{
				scope: this,
				getUploadUrl: function() {
					return xluerzer.getInstance().getAjaxPath('media/uploadLowResPrint/'+this.eam_id);
				},
				xtype: 'field_file_logic',
				fieldLabel: 'Image File',
				name: 'eam_record_img_s_id',
			}
			]
		});


		this.panel_media = Ext.widget({

			xtype: 'panel',
			layout: 'column',

			defaults: {
				layout: 'anchor',
				defaults: {
					anchor: '100%',

				},
				bodyPadding: 20,
			},


			title: 'Media',
			autoScroll: true,
			items: [

			this.panel_media_print
			]

		});


	},


	getCreditsItemList: function(creditsInput)
	{

		var items = [];

		Ext.each(creditsInput,function(d){

			var c2m_c_id = parseInt(d.c2m_c_id,10);
			var xtype = false;

			switch(c2m_c_id)
			{
				case 7:
				xtype= 'xluerzer_credit_client_company' // 7
				break;
				case 2:
				xtype= 'xluerzer_credit_ad_agency' // 2
				break;
				case 16:
				xtype= 'xluerzer_credit_creative_director' // 16
				break;
				case 8:
				xtype= 'xluerzer_credit_director' // 16
				break;
				case 3:
				xtype= 'xluerzer_credit_copywriter' // 3
				break;
				case 4:
				xtype= 'xluerzer_credit_illustrator' // 4
				break;
				case 5:
				xtype= 'xluerzer_credit_art_director' // 5
				break;
				case 1:
				xtype= 'xluerzer_credit_photographer' // 1
				break;
				case 14:
				xtype= 'xluerzer_credit_digital_artist' // 14
				break;
				case  6:
				xtype= 'xluerzer_credit_production_company' // 6
				break;
				case  9:
				xtype= 'xluerzer_credit_representative' // 9
				break;
				case 10:
				xtype= 'xluerzer_credit_customer' // 10
				break;
				case 11:
				xtype= 'xluerzer_credit_stuff' // 11
				break;
				case 12:
				xtype= 'xluerzer_credit_institute' // 12
				break;
				case 13:
				xtype= 'xluerzer_credit_typographer' // 13
				break;
				case 15:
				xtype= 'xluerzer_credit_instructor' // 15
				break;
				default: break;
			}

			if (!xtype) return;
			items.push({
				xtype: xtype
			});

		},this);

		return items;

	},


	getTab_credits: function(creditsInput)
	{

		if (typeof creditsInput == 'undefined') creditsInput = false;

		if (!creditsInput)
		{
			var items = [
			{
				xtype: 'text',
				text: 'Backend - Credits',
				height: 50
			},
			{
				xtype: 'xluerzer_credit_client_company' // 7
			},
			{
				xtype: 'xluerzer_credit_ad_agency' // 2
			},
			{
				xtype: 'xluerzer_credit_creative_director' // 16
			},
			{
				xtype: 'xluerzer_credit_director' // 16
			},
			{
				xtype: 'xluerzer_credit_copywriter' // 3
			},
			{
				xtype: 'xluerzer_credit_illustrator' // 4
			},
			{
				xtype: 'xluerzer_credit_art_director' // 5
			},
			{
				xtype: 'xluerzer_credit_photographer' // 1
			},
			{
				xtype: 'xluerzer_credit_digital_artist' // 14
			},
			{
				xtype: 'xluerzer_credit_production_company' // 6
			},
			{
				xtype: 'xluerzer_credit_representative' // 9
			},
			{
				xtype: 'xluerzer_credit_customer' // 10
			},
			{
				xtype: 'xluerzer_credit_stuff' // 11
			},
			{
				xtype: 'xluerzer_credit_institute' // 12
			},
			{
				xtype: 'xluerzer_credit_typographer' // 13
			},
			{
				xtype: 'xluerzer_credit_instructor' // 15
			}];

		}

		/*

		#################################################################
		#################################################################
		#################################################################	CREDITS
		#################################################################	CREDITS
		#################################################################
		#################################################################

		*/

		if (creditsInput)
		{

			var itemsx  = this.getCreditsItemList(creditsInput);
			var items = [
			{
				xtype: 'text',
				text: 'Backend - Credits',
				height: 50
			}];

			Ext.each(itemsx,function(o){
				items.push(o);
			},this);
		}

		if (!this.panel_credits)
		{
			this.panel_credits = Ext.widget({

				border: false,
				columnWidth: 0.4,
				minWidth: 550,
				xtype: 'form',
				height: '100%',
				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},
				items: items
			});
		} else {
			this.panel_credits.removeAll();
			this.panel_credits.add(items);
			this.panel_credits.doLayout();
		}



		/*

		#################################################################
		#################################################################
		#################################################################	COPY DATA
		#################################################################	COPY DATA
		#################################################################
		#################################################################

		*/

		if (!this.tab_credits)
		{

			this.tab_credits = Ext.widget({

				xtype: 'panel',
				layout: 'column',

				defaults: {
					layout: 'anchor',
					defaults: {
						anchor: '100%',

					},
					bodyPadding: 20,
				},


				title: 'Credits',
				autoScroll: true,
				items: [

				this.panel_credits

				],

				tbar: ['->',{
					text: 'Publish Credits',
					iconCls: 'xl_publish',
					scope: this,
					handler: function() {
						this.saveCredits();
					}
				}],

				listeners: {

					scope: this,
					afterrender: function()
					{
						Ext.defer(function(){
							this.tab_credits.updateLayout();
							this.tab_credits.doLayout();
						},100,this);
					}
				}

			});

		}


	},

	getTab_overall: function()
	{


		this.panel_basic_infos = Ext.widget({

			border: false,
			columnWidth: 0.33,
			minWidth: 300,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},

			items: [


			{
				xtype:'fieldset',
				title: 'Basic Media-Infos',

				padding: 25,
				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},

				items: [
				{
					name: 'eam_id',
					fieldLabel: 'Media ID',
				},
				{
					name: 'eam_specials_submission_id',
					fieldLabel: 'Submission ID',
				},
				{
					name: 'eam_created_ts',
					fieldLabel: 'Published',
				}
				]
			}]


		});


		/*
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		*/


		this.panel_change = Ext.widget({

			border: false,
			columnWidth: 0.33,
			minWidth: 300,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},

			items: [

			{
				xtype:'fieldset',
				padding: 25,
				title: 'Backend-Configurations',

				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},

				items: [
				{
					xtype: 'xluerzer_magazine',
					name: 'eam_magazine_id',
					fieldLabel: 'Change mag to'
				},
				{
					xtype: 'xluerzer_submission_category',
					name: 'eam_specials_category_id',
					fieldLabel: 'Category'
				},
				{
					xtype: 'xluerzer_country',
					name: 'eam_specials_country_id',
					fieldLabel: 'Country'
				},
				{
					name: 'eam_specials_archivNr',
					fieldLabel: 'Archive Nr.'
				},
				/*{
				name: 'eam_specials_qrQode',
				fieldLabel: 'QR-Code'
				},*/
				{
					name: 'eam_record_campaign_id',
					xtype: 'numberfield',
					fieldLabel: 'Campaign'
				},
				{
					name: 'eam_record_title',
					fieldLabel: 'Ad Title'
				},
				{
					xtype: 'xr_field_html',
					name: 'eam_record_infotext',
					fieldLabel: 'Infotext',
					height: 200
				}
				]
			}
			]
		});


		/*
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		*/


		this.btn_videoDownload = Ext.id();
		this.btn_highRes = Ext.id();
		var submission_img_medium_src = xluerzer.getInstance().getAjaxPath('media/img_medium/'+this.eam_id);
		this.artworkImgPreviewId = 'artwork_'+Ext.id();
		this.panel_imageInfotext = Ext.widget({

			border: false,
			columnWidth: 0.33,
			minWidth: 550,
			xtype: 'form',
			defaultType: 'textfield',
			layout: 'vbox',
			defaults: {
				width: '100%'
			},

			items: [


			{
				xtype:'fieldset',
				padding: 25,
				title: 'Artwork',

				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},

				items: [
				{
					readOnly: true,
					name: 'eam_type',
					fieldLabel: 'Media Type'
				},
				{
					xtype: 'fieldcontainer',
					fieldLabel: 'Artwork Preview',
					items: [{
						layout: 'vbox',
						border: false,
						items: [
						{
							id: this.artworkImgPreviewId,
							xtype : "component",
							cls: 'submission_artwork_detail',
							autoEl : {
								tag : "img",
								src : '',
								width: 400,
								height: 400,
							}
						},

						{
							xtype : "text",
							height: 10
						},

						{
							layout: 'hbox',
							border: false,
							items: [
							{
								text: 'Download Image Media',
								xtype: 'button',
								scope: this,
								handler: function() {


									var url = xluerzer.getInstance().getAjaxPath('media/downloadMedia/'+this.eam_id);
									window.open(url,'DOWNLOAD');

								}
							},{
								xtype : "text",
								width: 10
							},
							{
								id: this.btn_videoDownload,
								text: 'Download Video Media',
								xtype: 'button',
								scope: this,
								handler: function() {


									var url = xluerzer.getInstance().getAjaxPath('media/downloadVideo/'+this.eam_id);
									window.open(url,'DOWNLOAD');

								}
							},{
								xtype : "text",
								width: 10
							}
							]

						},

						{
							xtype : "text",
							height: 10
						},

						] // vbox
					}] // field - container
				}]
			}
			]

		});


		/*
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		#####################################################################################################
		*/

		this.tab_overall = Ext.widget({

			xtype: 'panel',
			layout: 'column',

			defaults: {
				layout: 'anchor',
				defaults: {
					anchor: '100%',

				},
				bodyPadding: 20,
			},


			title: 'Overall',
			autoScroll: true,
			items: [

			this.panel_basic_infos,
			this.panel_change,
			this.panel_imageInfotext,

			],

			tbar: ['->',{
				text: 'Unpublish',
				iconCls: 'xf_unpublish',
				scope: this,
				handler: function() {
					this.unpublishData();
				}
			},{
				text: 'Publish',
				iconCls: 'xl_publish',
				scope: this,
				handler: function() {
					this.saveOverall();
				}
			}]

		});

		return this.tab_overall;
	},

	saveCredits: function()
	{

		var credits = {};
		// credits
		Ext.each(this.panel_credits.items.items,function(inp){
			if (typeof inp['getContacts'] != 'function') return;
			var cfg = inp.getContacts.call(inp);
			credits[cfg.contactType] = cfg.contactIds;
		},this);


		var params = {
			eam_id: this.eam_id,
			credits: Ext.encode(credits)
		}

		this.masterTab.mask('Saving Credits ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('media/saveCredits/'+this.eam_id),
			params : params,
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
			}
		});

	},

	unpublishData: function()
	{

		this.masterTab.mask('unpublishing ...');
		xframe.ajax({
			scope: this,
			type: 'post',
			url: xluerzer.getInstance().getAjaxPath('publish/e_unpublish/'),
			params : {
				id: this.eam_id,
				scopex: 'e_archive_media',
				record: {}
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				this.masterTab.close();
				if (!success) return;
			}
		});
	},


	load: function(delta)
	{
		var me = this;
		if (typeof delta == 'undefined') delta = 0;
		this.masterTab.mask('Loading Media ...');

		this.panel_video_left.getForm().setValues({'es_video_480_mp4_s_id':0});

		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('media/loadData/'+this.eam_id),
			params : {
				eam_id: this.eam_id,
				delta: delta
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;

				if (json.eam_id == 0) {
					xframe.alert("Info","No Media found.");
					return;
				}

				this.getTab_credits(json.creditsInput);

				

				this.tab_video.setDisabled((json.media.eam_type != 2));
				Ext.getCmp(this.btn_videoDownload).setDisabled((json.media.eam_type != 2));

				switch(json.media.eam_type)
				{
					case '1':
					json.media.eam_type = "Print";
					break;
					case '2':
					json.media.eam_type = "Film";
					break;
					case '3':
					json.media.eam_type = "Student";
					break;
					case '4':
					json.media.eam_type = "Website";
					break;
					case '5':
					json.media.eam_type = "App";
					break;
					default: break;
				}

				var backup_focus = $$("*:focus");



				var title = "Media: "+json.eam_id;

				// LAST COMMAND
				xluerzer.getInstance().saveLastCommand({
					title: title,
					classx: 'xluerzer_media',
					fn: 'openMedia',
					param_0: json.eam_id,
				});

				// UPDATE PANELS
				this.eam_id = json.eam_id;
				this.masterTab.setTitle(title);

				this.panel_basic_infos.getForm().setValues(json.media);
				this.panel_change.getForm().setValues(json.media);
				this.panel_imageInfotext.getForm().setValues(json.media);




				this.panel_video_left.getForm().setValues(json.media);
				this.panel_video_right.getForm().setValues(json.media);

				// CREDITS PATCHING
				this.panel_credits.getForm().setValues(json.credits);

				// restoring focus
				backup_focus.first().focus();

				Ext.defer(function(){
					this.tab_credits.updateLayout();
					this.tab_credits.doLayout();
					backup_focus.first().focus();
				},10,this);

				// High Res

				console.info('Media Infos: ',json.media);


				// MEDIA
				this.panel_media_print.getForm().setValues(json.media);


				this.tab_log.setNewRecordId(this.eam_id);
				this.updateArtWorkPreviews();
			}
		});

	},


	updateArtWorkPreviews: function()
	{
		var me = this;
		var submission_img_medium_src = xluerzer.getInstance().getAjaxPath('media/img_medium/'+this.eam_id);
		var container = Ext.getCmp(this.artworkImgPreviewId).up('fieldcontainer');

		if (!this.latestUrlOfImage) this.latestUrlOfImage = "";

		container.mask("Loading Image ...");
		$$('#'+this.artworkImgPreviewId).unbind('load');
		$$('#'+this.artworkImgPreviewId).attr('src','');


		$$('#'+this.artworkImgPreviewId).load(function() {
			container.unmask();
		});
		$$('#'+this.artworkImgPreviewId).attr('src',submission_img_medium_src);

		this.latestUrlOfImage = submission_img_medium_src;

	},

	getTab_video: function()
	{

		this.selectedThumb = Ext.id();

		this.panel_video_left = Ext.widget({

			border: false,
			columnWidth: 0.33,
			minWidth: 620,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},


			items: [
			{
				xtype: 'text',
				text: 'Video',
				height: 30
			},
			
			{
				maxWidth: 600,
				minWidth: 600,
				xtype: 'xluerzer_video',
				name: 'eam_record_video_s_id'
			}
			
			]
		});


		this.panel_video_right = Ext.widget({

			border: false,
			columnWidth: 0.33,
			minWidth: 300,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items:
			[
			{	
				scope: this,
				getUploadUrl: function() {
					return xluerzer.getInstance().getAjaxPath('media/uploadHighResVideo/'+this.eam_id);
				},
				xtype: 'field_file_logic',
				fieldLabel: 'Video',
				name: 'eam_record_video_s_id',
			},
			]
		});



		this.vidEncodeButton = Ext.id();

		this.tab_video = Ext.widget({

			xtype: 'panel',
			layout: 'column',

			defaults: {
				layout: 'anchor',
				defaults: {
					anchor: '100%',

				},
				bodyPadding: 20,
			},


			title: 'Video',
			autoScroll: true,
			items: [

			this.panel_video_left,
			this.panel_video_right,

			],

			tbar: ['->',{
				id: this.vidEncodeButton,
				text: 'Encode Video',
				iconCls: 'xl_video_encode',
				scope: this,
				handler: function() {
					this.encodeVideoNow();
				}
			},{
				text: 'Save Video',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.saveVideo();
				}
			}]

		});



	},

	saveOverall: function()
	{
		var overallData = {};

		var fp_1 = this.panel_basic_infos.getForm().getValues();
		var fp_2 = this.panel_change.getForm().getValues();
		var fp_3 = this.panel_imageInfotext.getForm().getValues();

		var packs = [fp_1,fp_2,fp_3];

		Ext.each(packs,function(pack){

			Ext.iterate(pack,function(k,v){
				overallData[k] = v;
			},this);

		},this);

		delete(overallData.eam_type);

		console.info("saveOverall",overallData);

		this.masterTab.mask('Saving overall data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('media/saveOverall/'+this.eam_id),
			params : {
				eam_id: this.eam_id,
				data: Ext.encode(overallData)
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
			}
		});


	},

	encodeVideoNow: function()
	{
		var url = xluerzer.getInstance().getAjaxPath('media/encodeVideo/'+this.eam_id);
		window.open(url,"ENCODE_VIDEO");
	},

	saveVideo: function()
	{

		var saveData = this.panel_video_right.getForm().getValues();
		console.info("saveVideo",saveData);

		this.masterTab.mask('Saving video data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('media/saveVideo/'+this.eam_id),
			params : {
				eam_id: this.eam_id,
				data: Ext.encode(saveData)
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
			}
		});


	},

	open: function(eam_id)
	{
		var me = this;
		this.eam_id = eam_id;

		var title = 'Media: '+eam_id;
		console.info(title);

		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_media',
			fn: 'openMedia',
			param_0: eam_id,
		});

		this.getTab_media();
		this.getTab_credits();
		this.getTab_overall();
		this.getTab_video();

		this.tab_log = xluerzer_gui.getInstance().getDefaultTabPanel_log({
			prefix: 'eam_',
			scopex: 'e_archive_media'
		},this.eam_id);

		this.masterTab = Ext.create('Ext.tab.Panel', {
			activeTab: 0,
			title: title,
			layout: 'fit',
			items: [this.tab_overall,this.tab_credits,this.tab_video,this.panel_media,this.tab_log],
			plugins: Ext.create('Ext.ux.TabCloseMenu'),
			listeners: {

				scope: this,
				afterrender: function() {
					this.load();
				} // afterrender


			},
			tbar:[/*{
				text: 'Previous',
				iconCls: 'xf_back',
				scope: this,
				handler: function() {
					this.load(-1);
				}
			},{
				text: 'Next',
				iconCls: 'xf_next',
				scope: this,
				handler: function() {
					this.load(1);
				}
			},'-',{
				text: 'Latest',
				iconCls: 'xf_next_stop',
				scope: this,
				handler: function() {
					this.load(3);
				}
			},*/'->',{
				text: 'Re-Load',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.load(0);
				}
			}]
		});




		xluerzer.getInstance().showContent(this.masterTab);
	}

}