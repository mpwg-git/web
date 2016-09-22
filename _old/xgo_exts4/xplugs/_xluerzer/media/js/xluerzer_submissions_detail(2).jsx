var xluerzer_submissions_detail = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_submissions_detail";
		}

		this.getInstance = function(config) {
			var instance = new xluerzer_submissions_detail_(config);
			return instance;
		}
	}
})();

var xluerzer_submissions_detail_ = function(config) {
	this.config = config || {};
};

xluerzer_submissions_detail_.prototype = {


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
				text: 'Print Media Files',
				height: 50
			},
			{
				scope: this,
				uploadDone: function() {
					console.info('Upload Done.');
				},
				getUploadUrl: function() {
					return xluerzer.getInstance().getAjaxPath('submissions/uploadHighResPrint/'+this.es_id);
				},
				xtype: 'field_file_logic',
				fieldLabel: 'HIGHRES Print',
				name: 'es_image_highRes_s_id',
			},
			{
				scope: this,
				getUploadUrl: function() {
					return xluerzer.getInstance().getAjaxPath('submissions/uploadLowResPrint/'+this.es_id);
				},
				xtype: 'field_file_logic',
				fieldLabel: 'LOWRES Print',
				name: 'es_image_s_id',
			}
			]
		});

		this.panel_media_video = Ext.widget({

			border: false,
			columnWidth: 0.4,
			minWidth: 550,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},

			items: [
			{
				xtype: 'text',
				text: 'Video Media Files',
				height: 50
			},
			{
				scope: this,
				getUploadUrl: function() {
					return xluerzer.getInstance().getAjaxPath('submissions/uploadHighResVideo/'+this.es_id);
				},
				xtype: 'field_file_logic',
				fieldLabel: 'HIGHRES Video',
				name: 'es_video_highRes_s_id',
			},
			{
				scope: this,
				getUploadUrl: function() {
					return xluerzer.getInstance().getAjaxPath('submissions/uploadLowResVideo/'+this.es_id);
				},
				xtype: 'field_file_logic',
				fieldLabel: 'LOWRES Video',
				name: 'es_video_s_id',

			},{
				xtype: 'text',
				height: 20
			},{
				maxWidth: 200,
				minWidth: 200,
				xtype: 'button',
				text: 'Encode Video',
				iconCls: 'xl_video_encode',
				scope: this,
				handler: function() {
					this.encodeVideoNow();
				}
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

			this.panel_media_print,
			this.panel_media_video,

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
				addNewContact: true,
				xtype: xtype
			});
			items.push({
				addNewContact: true,
				xtype: xtype.split('xluerzer_credit').join('xluerzer_xcredit')
			});

		},this);

		return items;

	},

	getXCreditsItemList: function(creditsInput)
	{

		var items = [];

		Ext.each(creditsInput,function(d){

			var c2m_c_id = parseInt(d.c2m_c_id,10);
			var xtype = false;

			switch(c2m_c_id)
			{
				case 7:
				xtype= 'xluerzer_xcredit_client_company' // 7
				break;
				case 2:
				xtype= 'xluerzer_xcredit_ad_agency' // 2
				break;
				case 16:
				xtype= 'xluerzer_xcredit_creative_director' // 16
				break;
				case 8:
				xtype= 'xluerzer_xcredit_director' // 16
				break;
				case 3:
				xtype= 'xluerzer_xcredit_copywriter' // 3
				break;
				case 4:
				xtype= 'xluerzer_xcredit_illustrator' // 4
				break;
				case 5:
				xtype= 'xluerzer_xcredit_art_director' // 5
				break;
				case 1:
				xtype= 'xluerzer_xcredit_photographer' // 1
				break;
				case 14:
				xtype= 'xluerzer_xcredit_digital_artist' // 14
				break;
				case  6:
				xtype= 'xluerzer_xcredit_production_company' // 6
				break;
				case  9:
				xtype= 'xluerzer_xcredit_representative' // 9
				break;
				case 10:
				xtype= 'xluerzer_xcredit_customer' // 10
				break;
				case 11:
				xtype= 'xluerzer_xcredit_stuff' // 11
				break;
				case 12:
				xtype= 'xluerzer_xcredit_institute' // 12
				break;
				case 13:
				xtype= 'xluerzer_xcredit_typographer' // 13
				break;
				case 15:
				xtype= 'xluerzer_xcredit_instructor' // 15
				break;
				default: break;
			}

			if (!xtype) return;
			items.push({
				addNewContact: true,
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
				xtype: 'xluerzer_credit_typographer' // 13
			}];


			var xitems = [
			{
				xtype: 'text',
				text: 'Submitter - Credits',
				height: 50
			},
			{
				xtype: 'xluerzer_xcredit_client_company'
			},
			{
				xtype: 'xluerzer_xcredit_ad_agency'
			},
			{
				xtype: 'xluerzer_xcredit_creative_director'
			},
			{
				xtype: 'xluerzer_xcredit_director'
			},
			{
				xtype: 'xluerzer_xcredit_copywriter'
			},
			{
				xtype: 'xluerzer_xcredit_illustrator'
			},
			{
				xtype: 'xluerzer_xcredit_art_director'
			},
			{
				xtype: 'xluerzer_xcredit_photographer'
			},
			{
				xtype: 'xluerzer_xcredit_digital_artist'
			},
			{
				xtype: 'xluerzer_xcredit_production_company'
			},
			{
				xtype: 'xluerzer_xcredit_typographer'
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

		console.info("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",this.panel_credits);

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
		#################################################################	xCREDITS
		#################################################################	xCREDITS
		#################################################################
		#################################################################

		*/

		if (creditsInput)
		{

			var itemsx  = this.getXCreditsItemList(creditsInput);
			var xitems = [
			{
				xtype: 'text',
				text: 'Submitter Credits (xCredits)',
				height: 50
			}];

			Ext.each(itemsx,function(o){
				xitems.push(o);
			},this);
		}

		if (!this.panel_xcredits)
		{
			this.panel_xcredits = Ext.widget({

				border: false,
				columnWidth: 0.4,
				minWidth: 550,
				xtype: 'form',
				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},

				items: xitems
			});
		} else {
			this.panel_xcredits.removeAll();
			this.panel_xcredits.add(xitems);
			this.panel_xcredits.doLayout();
		}

		/*

		#################################################################
		#################################################################
		#################################################################	COPY DATA
		#################################################################	COPY DATA
		#################################################################
		#################################################################

		*/

		if (!this.panel_credits2copy)
		{

			this.panel_credits2copyPanel = Ext.widget({
				labelAlign:'top',
				fieldLabel: 'View',
				name: 'es_copy_credits_issue_html',
				//height: 150,
				xtype: 'panel'
			});

			this.panel_credits2copy = Ext.widget({

				border: false,
				columnWidth: 0.2,
				minWidth: 100,
				xtype: 'form',
				height: '100%',
				defaultType: 'textarea',
				defaults: {
					anchor: '100%'
				},
				items: [
				{
					xtype: 'text',
					text: 'Credits to View & Copy',
					height: 50
				},

				this.panel_credits2copyPanel

				,
				{
					labelAlign:'top',
					//fieldLabel: 'Copy',
					name: 'es_copy_credits_issue',
					height: 150
				},
				/*{
				labelAlign:'top',
				fieldLabel: 'Special',
				name: 'es_copy_credits_special',
				height: 150
				}*/
				]
			});



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

				this.panel_credits,
				this.panel_xcredits,
				this.panel_credits2copy

				],

				tbar: [{
					text: 'Save Credits',
					iconCls: 'xf_save',
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
				title: 'Basic Submission-Infos',

				padding: 25,
				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},

				items: [
				{
					name: 'es_id',
					fieldLabel: 'Submission ID',
				},
				{
					name: 'es_fe_user_id',
					fieldLabel: 'FE-User ID',
				},
				{
					name: 'es_created_ts',
					fieldLabel: 'Created',
				}
				]
			},

			{
				xtype:'fieldset',
				title: 'Submitter-Infos',

				padding: 25,
				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},

				items: [

				{
					name: 'es_submittedBy',
					fieldLabel: 'Submitted by',
				},
				
				{
					name: 'es_firstname',
					fieldLabel: 'Firstname',
				},
				{
					name: 'es_lastname',
					fieldLabel: 'Lastname',
				},


				
				{
					name: 'es_submittedFor',
					fieldLabel: 'Submitted for',
				},
				{
					name: 'es_client',
					fieldLabel: 'Client',
				},
				/*{
				name: 'es_product',
				fieldLabel: 'Product',
				},*/
				{
					name: 'es_ad_title',
					fieldLabel: 'AD Title',
				},
				{
					name: 'es_campaign',
					fieldLabel: 'AD Campaign',
				},
				{
					name: 'es_releaseDate',
					fieldLabel: 'Date of Release',
				},
				{
					name: 'es_company',
					fieldLabel: 'Company',
				},
				{
					name: 'es_agency',
					fieldLabel: 'Ad Agency',
				},


				

				{
					xtype: 'xluerzer_shop_country',
					name: 'es_country_id',
					fieldLabel: 'Country',
				},
				{
					name: 'es_zip',
					fieldLabel: 'Zip',
				},
				{
					name: 'es_city',
					fieldLabel: 'City',
				},
				{
					xtype: 'textarea',
					name: 'es_address',
					fieldLabel: 'Address',
					height: 50
				},
				{
					name: 'es_phone_code',
					fieldLabel: 'Phone Code',
				},
				{
					name: 'es_phone',
					fieldLabel: 'Phone',
				},
				{
					name: 'es_email',
					fieldLabel: 'E-Mail',
				}
				,
				{
					name: 'es_keywords',
					fieldLabel: 'Keywords',
					xtype: 'textarea',
					height: 50
				},


				{
					xtype:'fieldset',
					title: 'Second-Contact',

					padding: 25,
					defaultType: 'textfield',
					defaults: {
						anchor: '100%'
					},

					items: [


					{
						name: 'es_second_name',
						fieldLabel: 'Name',
					},
					{
						name: 'es_second_phone_code',
						fieldLabel: 'Phone Code',
					},
					{
						name: 'es_second_phone',
						fieldLabel: 'Phone',
					},
					{
						name: 'es_second_email',
						fieldLabel: 'E-Mail',
					}

					]}



					]}


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

		var openAds = Ext.id();

		this.field_es_campaign_admin 	= Ext.id();
		this.field_es_archivNr 			= Ext.id();

		var ww = 400;

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
					name: 'es_magazine_id',
					fieldLabel: 'Change mag to'
					,maxWidth: ww,selectOnFocus : true
				},
				{
					xtype: 'xluerzer_submission_category',
					name: 'es_category_id',
					fieldLabel: 'Category'
					,maxWidth: ww,selectOnFocus : true
				},
				{
					xtype: 'xluerzer_submission_state',
					name: 'es_state',
					fieldLabel: 'Status',maxWidth: ww,selectOnFocus : true
				},

				/*
				{
				xtype: 'xluerzer_submission_artwork_state',
				name: 'es_artwork',
				fieldLabel: 'Artwork',maxWidth: ww
				},
				*/



				{
					xtype      : 'fieldcontainer',
					fieldLabel : 'Artwork',
					defaultType: 'radiofield',
					maxWidth: ww,
					defaults: {
						flex: 1
					},
					layout: 'hbox',
					items: [
					{
						boxLabel  : 'Missing',
						name      : 'es_artwork',
						inputValue: '0'
					}, {
						boxLabel  : 'Present',
						name      : 'es_artwork',
						inputValue: '1'
					}
					]
				},


				{
					xtype      : 'fieldcontainer',
					fieldLabel : 'Credits',
					defaultType: 'radiofield',
					maxWidth: ww,
					defaults: {
						flex: 1
					},
					layout: 'hbox',
					items: [
					{
						boxLabel  : 'Missing',
						name      : 'es_credits',
						inputValue: '0'
					}, {
						boxLabel  : 'Present',
						name      : 'es_credits',
						inputValue: '1'
					}
					]
				},










				/*

				{
				xtype: 'xluerzer_submission_credits_state',
				name: 'es_credits',
				fieldLabel: 'Credits',maxWidth: ww
				},

				*/
				{
					emptyText: 'xx.yyyy',
					name: 'es_archivNr',
					fieldLabel: 'Archive Nr.',
					id: this.field_es_archivNr,
					allowBlank: false,
					validateBlank: true,selectOnFocus : true
				},
				/*{
				name: 'es_qrCode',
				fieldLabel: 'QR-Code'
				},*/
				{
					emptyText: '!! ENTER CAMPAIGN NAME FOR A CORRECT RANKING',
					name: 'es_campaign_admin',
					fieldLabel: 'Campaign',
					allowBlank: false,
					validateBlank: true,
					id: this.field_es_campaign_admin,
					blankText: 'This field is required - in order to perform a correct ranking !',selectOnFocus : true
				},{
					iconCls: 'xf_import',
					xtype: 'button',
					text: 'import credits & campaign',
					maxWidth: 150,
					scope: this,
					handler: function(btn) {

						var win = false;
						var superCopy = Ext.id();

						var gui = Ext.widget({
							xtype: 'form',
							bodyPadding: 20,
							items: [{
								id: superCopy,
								labelAlign: 'top',
								xtype: 'xluerzer_submission_id_solo',
								fieldLabel: 'Select origin submission'
							}]
						});

						win = Ext.create('Ext.window.Window', {
							modal: true,
							title: 'Import from Submissions',
							height: 150,
							width: 500,
							layout: 'fit',
							items: [gui],
							bbar: ['->',{
								iconCls: 'xf_import',
								text: 'Import & Reload',
								scope: this,
								handler: function() {

									this.masterTab.mask("Updating Credits and Campaign ...");
									xframe.ajax({
										scope: this,
										url: xluerzer.getInstance().getAjaxPath('submissions/copySubmissionCampaignCredits'),
										params : {
											es_id: this.es_id,
											from_es_id: Ext.getCmp(superCopy).getValue()
										},
										stateless: function(success, json)
										{
											this.masterTab.unmask();
											if (!success) return;
											this.load();
											win.close();
										}
									});



								}
							}]
						});

						win.show();




					},
					margin: '0 0 10 0'
				},

				/*{
				name: 'es_ad_title_admin',
				fieldLabel: 'Ad Title'
				},*/

				/*{
				name: 'es_pictureIndex',
				fieldLabel: 'Picture Index'
				},*/{
				xtype: 'textfield',
				name: 'es_of_the_week',
				fieldLabel: 'AD OF THE WEEK',
				readOnly: true,
				listeners: {
					scope: this,
					change: function(tf) {
						var v = tf.getValue();
						if (v == 'NO') {
							Ext.getCmp(openAds).setDisabled(true);
							return;
						}
						Ext.getCmp(openAds).setDisabled(false);
						Ext.getCmp(openAds).adId = parseInt(v.split(" | ")[1],10);
					}
				}
				},
				{
					id: openAds,
					disabled: true,
					iconCls: 'xf_open',
					xtype: 'button',
					text: 'open ad of the week',
					maxWidth: 150,
					scope: this,
					handler: function(btn) {
						xluerzer_adsoftheweek.getInstance().openDetailsById(btn.adId);
					},
					margin: '0 0 10 0'
				},
				{
					xtype: 'textarea',
					fieldLabel: 'Comments',
					height: 100,
					name: 'es_comments',
					emptyText: 'no comments'
				},
				{
					xtype: 'textarea',
					name: 'es_infotext',
					fieldLabel: 'Infotext',
					height: 200,
					emptyText: 'no infotext'
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


		var me = this;
		this.btn_highRes = Ext.id();
		var submission_img_medium_src = xluerzer.getInstance().getAjaxPath('submissions/img_medium/'+this.es_id);
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
				title: 'Artwork - Informations',

				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},

				items: [
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
							},listeners: {
								scope: this,
								render: function(c){
									c.getEl().on({
										click: function() {
											var url = xluerzer.getInstance().getAjaxPath('submissions/img_orig/'+me.es_id);
											window.open(url,'_blank');
										}
									});
								}
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
								text: 'Download Submission',
								xtype: 'button',
								scope: this,
								handler: function() {


									var url = xluerzer.getInstance().getAjaxPath('submissions/downloadSubmission/'+this.es_id);
									window.open(url,'DOWNLOAD');

								}
							},{
								xtype : "text",
								width: 10
							},{
								id: this.btn_highRes,
								disabled: true,
								text: 'Download High-Resolution',
								xtype: 'button',
								scope: this,
								handler: function() {

									var url = xluerzer.getInstance().getAjaxPath('submissions/downloadSubmissionHighRes/'+this.es_id);
									window.open(url,'DOWNLOAD');

								}
							}
							]

						},

						{
							xtype : "text",
							height: 10
						},

						] // vbox
					}] // field - container
				},
				{
					xtype: 'textarea',
					name: 'es_notes',
					fieldLabel: 'Submitter Notes',
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

			tbar: ['->',
			{
				text: 'Send User Submission E-Mail',
				iconCls: 'xl_mail',
				scope: this,
				handler: function() {
					this.sendSubmissionEmail();
				}
			}
			,'-',{
				text: 'Unpublish',
				iconCls: 'xf_unpublish',
				scope: this,
				handler: function() {
					this.unpublish();
				}
			},{
				text: 'Publish',
				iconCls: 'xl_publish',
				scope: this,
				handler: function() {
					this.publish();
				}
			},
			'-',

			{
				text: 'Save',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.saveOverall();
				}
			}


			]

		});

		return this.tab_overall;
	},

	saveCredits: function()
	{

		var credits = {};
		var xcredits = {};

		// credits
		Ext.each(this.panel_credits.items.items,function(inp){
			if (typeof inp['getContacts'] != 'function') return;
			var cfg = inp.getContacts.call(inp);
			credits[cfg.contactType] = cfg.contactIds;
		},this);


		// xcredits
		Ext.each(this.panel_xcredits.items.items,function(inp){
			if (typeof inp['getContacts'] != 'function') return;
			var cfg = inp.getContacts.call(inp);
			xcredits[cfg.contactType] = cfg.contactIds;
		},this);


		var params = {
			es_id: this.es_id,
			credits: Ext.encode(credits),
			xcredits: Ext.encode(xcredits),
		}

		this.masterTab.mask('Saving Credits ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('submissions/saveCredits/'+this.es_id),
			params : params,
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				this.load(0);
				if (!success) return;
			}
		});

	},


	sendSubmissionEmail: function()
	{
		this.masterTab.mask('Sending E-Mail ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('submissions/resendSubmissionMail/'+this.es_id),
			params : {},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success)
				{
					//xframe.alert('Resending Submission E-Mail',"E-Mail was not sent.");
					return;
				}

				var gui = Ext.widget({
					xtype: 'form',
					bodyPadding: 20,
					layout: 'anchor',
					defaults: {
						anchor: '100%'
					},

					items: [{
						fieldLabel: 'Subject',
						xtype:'textfield',
						name: 'mail_subject'
					},{
						fieldLabel: 'To',
						xtype:'textfield',
						name: 'mail_to'
					},{
						fieldLabel: 'Bcc',
						xtype:'textfield',
						name: 'mail_bcc'
					},{
						fieldLabel: 'Message',
						xtype:'xr_field_html',
						name: 'mail_body',
						height: 400
					}]
				});

				var win = Ext.create('Ext.window.Window', {
					modal: true,
					title: 'Send Mail',
					height: 600,
					width: 700,
					layout: 'fit',
					items: [gui],
					listeners: {
						afterrender: function() {
							gui.getForm().setValues(json);
						}
					},
					bbar: ['->',{
						iconCls: 'xf_save',
						text: 'Send',
						scope: this,
						handler: function() {

							var data = gui.getForm().getValues();
							this.masterTab.mask('Sending E-Mail ...');
							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('submissions/resendSubmissionMailNow/'+this.es_id),
								params : {
									data: Ext.encode(data)
								},
								stateless: function(success, json)
								{
									this.masterTab.unmask();
									win.close();
									if (!success)
									{
										xframe.alert('Resending Submission E-Mail',"E-Mail was not sent.");
									} else {
										xframe.info('Resending Submission E-Mail',"E-Mail sent.");
									}
								}
							});


						}
					}]
				});



				win.show();

			}
		});
	},

	load: function(delta)
	{
		var me = this;
		if (typeof delta == 'undefined') delta = 0;
		this.masterTab.mask('Loading Submission ...');

		this.panel_video_left.getForm().setValues({'es_video_480_mp4_s_id':0});

		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('submissions/loadData/'+this.es_id+'/'+new Date()),
			params : {
				es_id: this.es_id,
				delta: delta
			},
			stateless: function(success, json)
			{
				this.getTab_credits(json.creditsInput);

				this.masterTab.unmask();
				if (!success) return;

				var backup_focus = $$("*:focus");

				if (json.es_id == 0) {
					xframe.alert("Info","No Submisison found.");
					return;
				}

				var title = "Submission: "+json.es_id;

				// LAST COMMAND
				xluerzer.getInstance().saveLastCommand({
					title: title,
					classx: 'xluerzer_submissions',
					fn: 'openSubmission',
					param_0: json.es_id,
				});

				// UPDATE PANELS
				this.es_id = json.es_id;
				this.masterTab.setTitle(title);

				this.panel_basic_infos.getForm().setValues(json.submission);



				switch(json.submission.es_state)
				{
					case '4':
					case '5':
					case '9':
					Ext.getCmp(this.field_es_campaign_admin).validate();
					Ext.getCmp(this.field_es_archivNr).validate();
					break;
					default:
				}

				this.panel_change.getForm().setValues(json.submission);
				this.panel_imageInfotext.getForm().setValues(json.submission);



				this.tab_video.setDisabled((json.submission.es_mediaType_id != 2));
				this.panel_video_left.getForm().setValues(json.submission);
				this.panel_video_right.getForm().setValues(json.submission);

				this.tab_submitter2backend.getForm().setValues(json.submission);
				//this.panel_credits2copy.getForm().setValues(json.submission);


				// CREDITS PATCHING
				this.panel_credits.getForm().setValues(json.credits);

				// XCREDITS PATCHING and updating fetcher !!
				Ext.each(this.panel_xcredits.items.items,function(inp){
					if (typeof inp['setSubmissionId'] != 'function') return;
					inp.setSubmissionId(json.es_id,this);
				},this);
				this.panel_xcredits.getForm().setValues(json.xcredits);



				// restoring focus
				backup_focus.first().focus();

				Ext.defer(function(){
					this.tab_credits.updateLayout();
					this.tab_credits.doLayout();
					backup_focus.first().focus();
				},10,this);

				// High Res

				console.info('Submission Infos: ',json.submission);

				Ext.getCmp(this.btn_highRes).setDisabled(true);
				if ((json.submission.es_image_highRes_status == 'PRESENT') && (json.submission.es_image_s_id))
				{
					Ext.getCmp(this.btn_highRes).setDisabled(false);
				}


				// BACKUP Submission Data
				var es_original_submitter_infos = Ext.decode(json.submission.es_original_submitter_infos,true);
				var backupData = {};

				Ext.iterate(es_original_submitter_infos,function(k,v){
					backupData['backup_'+k] = v;
				},this);

				this.panel_originalSubmissionData.getForm().setValues(backupData);

				// MEDIA

				this.panel_media_print.getForm().setValues(json.submission);
				this.panel_media_video.getForm().setValues(json.submission);



				this.panel_media_print.setVisible((json.submission.es_mediaType_id == 1));
				this.panel_media_video.setVisible((json.submission.es_mediaType_id == 2));




				// CREDITS 2 COPY

				var datax = {
					es_copy_credits_issue: json.ccopy_norm,
					es_copy_credits_special: json.ccopy_special,
					es_copy_credits_issue_html: json.ccopy_norm_html,
					es_copy_credits_special_html: json.ccopy_special_html
				};


				this.panel_credits2copyPanel.update(json.ccopy_norm_html);
				this.panel_credits2copy.getForm().setValues(datax);


				// DON't KNOW , NONE
				console.info('xcredits',json.xcredits);
				var fieldsAssoz = {};
				var fields = this.panel_credits.getForm().getFields();

				Ext.each(fields.items,function(c){
					console.info(c);
					var name = c.name;
					fieldsAssoz[name.split('_')[1]] = c;
					$$('#'+c.id+'-labelCell').removeClass('xf_tf_credit_none');
					$$('#'+c.id+'-labelCell').removeClass('xf_tf_credit_donotknow');
				},this);

				var specials = {};
				Ext.iterate(json.xcredits,function(k,v2){
					v2 = Ext.decode(v2,true);
					if (v2.length == 0) return;

					var contact_type_id = k.split('_')[1];
					console.info(k,v2,contact_type_id);

					var c 	= fieldsAssoz[contact_type_id];
					var id 	= c.id+'-labelCell';

					if (!Ext.getCmp(c.id).rendered)
					{
						Ext.getCmp(c.id).on('afterrender',function(){
							switch(''+v2[0]['id'])
							{
								case '-1':
								$$('#'+id).addClass('xf_tf_credit_none');
								break;
								case '-2':
								$$('#'+id).addClass('xf_tf_credit_donotknow');
								break;
								default:
								break;
							}
						},this);
					}

					switch(''+v2[0]['id'])
					{
						case '-1':
						$$('#'+id).addClass('xf_tf_credit_none');
						break;
						case '-2':
						$$('#'+id).addClass('xf_tf_credit_donotknow');
						break;
						default:
						break;
					}

				},this);

				// CREDITS & XCREDITS OLD
				this.panel_originalSubmissionXCredits.getForm().setValues(json.xcreditsOld);
				this.panel_originalSubmissionCredits.getForm().setValues(json.creditsOld);

				this.tab_log.setNewRecordId(this.es_id);



				this.updateArtWorkPreviews();
			}
		});

	},


	updateArtWorkPreviews: function()
	{
		var me = this;
		var submission_img_medium_src = xluerzer.getInstance().getAjaxPath('submissions/img_medium/'+this.es_id);
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

	getTab_originalSubmissionData: function()
	{
		this.panel_originalSubmissionData = Ext.widget({

			title: 'Overall',
			border: false,
			bodyPadding: 20,
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
				title: 'Submitter-Infos',

				padding: 25,
				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},

				items: [

				{
					name: 'backup_es_submittedBy',
					fieldLabel: 'Submitted by',
				},
				{
					name: 'backup_es_submittedFor',
					fieldLabel: 'Submitted for',
				},
				{
					name: 'backup_es_client',
					fieldLabel: 'Client',
				},
				{
					name: 'backup_es_product',
					fieldLabel: 'Product',
				},
				{
					name: 'backup_es_ad_title',
					fieldLabel: 'AD Title',
				},
				{
					name: 'backup_es_campaign',
					fieldLabel: 'AD Campaign',
				},
				{
					name: 'backup_es_releaseDate',
					fieldLabel: 'Date of Release',
				},
				{
					name: 'backup_es_company',
					fieldLabel: 'Company',
				},
				{
					name: 'backup_es_agency',
					fieldLabel: 'AdAgency',
				},


				{
					name: 'backup_es_firstname',
					fieldLabel: 'Firstname',
				},
				{
					name: 'backup_es_lastname',
					fieldLabel: 'Lastname',
				},



				{
					xtype: 'xluerzer_shop_country',
					name: 'backup_es_country_id',
					fieldLabel: 'Country',
				},
				{
					name: 'backup_es_zip',
					fieldLabel: 'Zip',
				},
				{
					name: 'backup_es_city',
					fieldLabel: 'City',
				},
				{
					xtype: 'textarea',
					name: 'backup_es_address',
					fieldLabel: 'Address',
					height: 50
				},
				{
					name: 'backup_es_phone_code',
					fieldLabel: 'Phone Code',
				},
				{
					name: 'backup_es_phone',
					fieldLabel: 'Phone',
				},
				{
					name: 'backup_es_email',
					fieldLabel: 'E-Mail',
				}
				,
				{
					name: 'backup_es_keywords',
					fieldLabel: 'Keywords',
					xtype: 'textarea',
					height: 50
				},


				{
					xtype:'fieldset',
					title: 'Second-Contact',

					padding: 25,
					defaultType: 'textfield',
					defaults: {
						anchor: '100%'
					},

					items: [


					{
						name: 'backup_es_second_name',
						fieldLabel: 'Name',
					},
					{
						name: 'backup_es_second_phone_code',
						fieldLabel: 'Phone Code',
					},
					{
						name: 'backup_es_second_phone',
						fieldLabel: 'Phone',
					},
					{
						name: 'backup_es_second_email',
						fieldLabel: 'E-Mail',
					}

					]}



					]}


					]


		});


		this.panel_originalSubmissionCredits = Ext.widget({

			border: false,
			bodyPadding: 20,
			columnWidth: 0.33,
			minWidth: 300,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},

			items: [
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
				xtype: 'xluerzer_credit_typographer' // 13
			},





			]

		});


		this.panel_originalSubmissionXCredits = Ext.widget({

			border: false,
			bodyPadding: 20,
			columnWidth: 0.33,
			minWidth: 300,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},

			items: [
			{
				xtype: 'text',
				text: 'Submitter - Credits',
				height: 50
			},
			{
				xtype: 'xluerzer_xcredit_client_company' // 7
			},
			{
				xtype: 'xluerzer_xcredit_ad_agency' // 2
			},
			{
				xtype: 'xluerzer_xcredit_creative_director' // 16
			},
			{
				xtype: 'xluerzer_xcredit_director' // 16
			},
			{
				xtype: 'xluerzer_xcredit_copywriter' // 3
			},
			{
				xtype: 'xluerzer_xcredit_illustrator' // 4
			},
			{
				xtype: 'xluerzer_xcredit_art_director' // 5
			},
			{
				xtype: 'xluerzer_xcredit_photographer' // 1
			},
			{
				xtype: 'xluerzer_xcredit_digital_artist' // 14
			},
			{
				xtype: 'xluerzer_xcredit_production_company' // 6
			},
			{
				xtype: 'xluerzer_xcredit_typographer' // 13
			}]

		});


		this.panel_originalSubmissionCreditsBoth = Ext.widget({
			title: 'Original Credits',
			xtype: 'panel',
			layout: 'column',
			items: [this.panel_originalSubmissionCredits, this.panel_originalSubmissionXCredits],
			listeners: {
				scope: this,
				afterrender: function()
				{
					Ext.defer(function(){
						this.panel_originalSubmissionCreditsBoth.updateLayout();
						this.panel_originalSubmissionCreditsBoth.doLayout();
					},100,this);
				}
			}
		});


		this.panel_originalSubmission = Ext.widget({
			title: 'Original Submission Data',
			xtype: 'tabpanel',
			layout: 'fit',
			items: [this.panel_originalSubmissionData, this.panel_originalSubmissionCreditsBoth]
		});

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
				maxWidth: 600,
				minWidth: 600,
				xtype: 'xluerzer_video',
				name: 'es_video_480_mp4_s_id'
			},
			{
				maxWidth: 600,
				minWidth: 600,
				xtype: 'xluerzer_video_thumbs',
				name: 'es_video_thumbs_json',
				updateFile: this.selectedThumb
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
				fieldLabel: 'Video - Encoded',
				name: 'es_video_encoded',
				readOnly: true,
				height: 30,
			},
			{
				xtype: 'text',
				height: 30
			},
			{
				xtype: 'text',
				text: 'Poster Image Settings',
				height: 30
			},

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Video Poster',
				name: 'es_video_poster_original_or_thumb',
				value: '',
				data: [{k:'ORIGINAL',v:'User uploaded'},{k:'THUMB',v:'Generated Thumb'}],
				emptyText: ''
			}),


			{
				xtype: 'xr_field_file',
				fieldLabel: 'Original Uploaded Still',
				name: 'es_video_poster_original_id'
			},

			{
				id: this.selectedThumb,
				xtype: 'xr_field_file',
				fieldLabel: 'Backend Selected Still',
				name: 'es_video_poster_s_id'
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

			tbar: [{
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
			},'-',{
				text: 'Publish',
				iconCls: 'xl_publish',
				scope: this,
				handler: function() {
					this.publish();
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

		console.info("saveOverall",overallData);

		this.masterTab.mask('Saving overall data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('submissions/saveOverall/'+this.es_id),
			params : {
				es_id: this.es_id,
				data: Ext.encode(overallData)
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
			}
		});


	},


	publish: function()
	{
		console.log("publish submission");

		this.masterTab.mask('Publishing Submission ...');
		xframe.ajax({
			scope: this,
			type: 'post',
			url: xluerzer.getInstance().getAjaxPath('publish/submission_publish/'),
			params : {
				id: this.es_id,
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
			}
		});

	},

	unpublish: function()
	{
		console.log("unpublish submission");

		this.masterTab.mask('Unpublishing Submission ...');
		xframe.ajax({
			scope: this,
			type: 'post',
			url: xluerzer.getInstance().getAjaxPath('publish/submission_unpublish/'),
			params : {
				id: this.es_id,
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
		var url = xluerzer.getInstance().getAjaxPath('submissions/encodeVideo/'+this.es_id);
		window.open(url,"ENCODE_VIDEO");
	},

	saveVideo: function()
	{

		var saveData = this.panel_video_right.getForm().getValues();
		console.info("saveVideo",saveData);

		this.masterTab.mask('Saving video data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('submissions/saveVideo/'+this.es_id),
			params : {
				es_id: this.es_id,
				data: Ext.encode(saveData)
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
			}
		});


	},

	getTab_submitter2backend: function()
	{
		this.tab_submitter2backend = xluerzer_contactsFromSubmission.getInstance().getSubmitter2backendPanel();
	},

	getTab_log: function()
	{
		this.tab_log = xluerzer_gui.getInstance().getDefaultTabPanel_log({
			prefix: 'es_',
			scopex: 'e_submissions'
		},this.es_id);
	},


	open: function(es_id)
	{
		var me = this;
		this.es_id = es_id;

		var title = 'Submission: '+es_id;
		console.info(title);

		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_submissions',
			fn: 'openSubmission',
			param_0: es_id,
		});

		this.getTab_media();
		this.getTab_credits();
		this.getTab_overall();
		this.getTab_video();
		this.getTab_submitter2backend();
		this.getTab_log();
		this.getTab_originalSubmissionData();

		this.masterTab = Ext.create('Ext.tab.Panel', {
			activeTab: 0,
			title: title,
			layout: 'fit',
			items: [this.tab_overall,this.tab_video,this.tab_credits,this.tab_submitter2backend,this.panel_originalSubmission,this.panel_media,this.tab_log],
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
			text: 'Previous Selected',
			iconCls: 'xf_back_stop',
			scope: this,
			handler: function() {
			this.load(-2);
			}
			},{
			text: 'Next Selected',
			iconCls: 'xf_next_stop',
			scope: this,
			handler: function() {
			this.load(2);
			}
			},{
			text: 'Latest',
			iconCls: 'xf_next_stop',
			scope: this,
			handler: function() {
			this.load(3);
			}
			},'->',*/'->',{
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