Ext.define('Ext.xr.field_html', {
	extend: 'Ext.panel.Panel',
	alias: 'widget.xr_field_html',

	config: {
		border: false,

	},

	getValue: function()
	{
		console.info(this);
		return this.hiddenX.getValue();
	},

	setValue: function(html)
	{
		this.hiddenX.setValue(html);
	},

	constructor:function(cnfg){

		cnfg.minWidth = 300;

		var me = this;
		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			scope: this,
			listeners:{
				scope: this,
				buffer: 1,
				change: function(hf,value) {

					this.startWithThisValue = value;

					if (!me.tinymce) {
						$$('#'+this.runner).html(value);
						return;
					}

					if (value != me.tinymce.getContent()) {
						me.tinymce.setContent(value);
					}

				}

			}
		});

		xredaktor_tinymce.getInstance().registerAllPlugins();

		var id = this.runner = Ext.id();
		var tb = Ext.id();

		var fieldLabel 	= "";
		var height		= cnfg.height || 300;

		if (cnfg.fieldLabel)
		{
			fieldLabel = "<div class='x-form-item-label'>"+cnfg.fieldLabel+":</div>";
			height -= 18;
		}

		height -= 10;

		if (!cnfg.value) cnfg.value = "";
		if (typeof cnfg.value == 'undefined') {
			cnfg.value = "";
		}

		cnfg.html 	= "<div><div id='"+tb+"' style='position:reative; z-index:1000;'></div>"+fieldLabel+"<div id='"+this.runner+"' style='border: 1px solid #cccccc;overflow-y:scroll;height:"+height+"px;'>"+cnfg.value+"</div></div>";
		cnfg.items 	= [this.hiddenX]





		cnfg.listeners =  {

			buffer: 100,
			afterrender: function() {

				tinymce.init({

				//	content_css:'/assets/compressed/packed-174.min.css',

					inline: true,
					menubar: false,
					extended_valid_elements : "span[!class]",
					selector: "#"+id,
					fixed_toolbar_container: "#"+tb+" #toolBar",

					relative_urls: false,
					convert_urls: false,

					init_instance_callback : function(editor) {
						me.tinymce = editor;
						if (me.startWithThisValue) {
							editor.setContent(me.startWithThisValue);
						}
					},

					setup : function(editor) {
						editor.on('change', function(e) {
							me.hiddenX.suspendEvent('change');
							me.hiddenX.setValue(editor.getContent());
							me.hiddenX.resumeEvent('change');
							me.fireEvent('change', me, editor.getContent());
						});
					},

					//	language : 'de_AT',

					plugins: [
					"fullscreen xr_link xr_img  advlist print preview anchor",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor media"
					],
					toolbar: "xr_link xr_img  | "+
					"visualblocks visualchars code fullscreen media | "+
					"bold italic underline forecolor backcolor | undo redo",
					contextmenu: "xr_link xr_img xr_video | link image media | inserttable | cell row column deletetable"
				});
			}

		};


		if ($$('#'+id).is(":visible"))
		{
			//console.info("VISIBLE");
		} else
		{
			//cnfg.listeners = {};
		}



		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});