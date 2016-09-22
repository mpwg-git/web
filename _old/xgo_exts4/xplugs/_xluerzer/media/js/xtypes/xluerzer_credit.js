
Ext.define('Ext.xluerzer.Credit', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xluerzer_credit',
	config: {
		height: 20
	},
	constructor: function()
	{
		//console.info('CCCCCC',this,this.addNewContact);
		if (arguments[0].addNewContact)
		{
			this.addNewId = Ext.id();
			this.afterSubTpl = "<a href='#' id='"+this.addNewId+"'>Add new credit</a>";
		}
		this.name = "credits_"+this.idx;
		this.iAmRendered = false;
		this.callParent(arguments);
	},

	setValue: function(value)
	{ 
		this.value = value;
		if (this.iAmRendered) this.updateTokens();
	},

	getContacts: function()
	{
		if (!this.iAmRendered) return this.value;
		var data = this.tokenInstance.tokenInput("get");
		return {
			contactType: this.idx,
			contactIds: Ext.encode(data)
		}
	},

	updateTokens: function()
	{
		this.tokenInstance.tokenInput("clear");
		var tokens = Ext.decode(this.value,true);
		if (!tokens) return;

		if (tokens.length>0)
		{
			Ext.each(tokens,function(tok){
				this.tokenInstance.tokenInput("add",tok);
			},this);
		}


		this.updateContextMenue();

		this.updateTokensDone = true;

	},


	updateContextMenue: function()
	{
		var holderId = this.id+'-bodyEl';

		var bubbles = $$('li.token-input-token-credit',$$('#'+holderId));
		var idxx = Ext.id();
		var menux = Ext.create('Ext.menu.Menu', {
			items: [{
				id: idxx,
				text: 'Open Contact: ',
				iconCls: 'xf_contact',
				handler: function() {
					//console.info("Open Contact: ",this.openId);
					xluerzer_contacts_detail.getInstance().open(this.openId);
				}
			}]
		});

		bubbles.unbind('contextmenu');
		bubbles.contextmenu(function(e){
			e.preventDefault();

			var p 		= $$('p',this).html();
			var id 		= parseInt(p.split('[')[1],10);
			var name 	= p.split('[')[0];

			Ext.getCmp(idxx).setText('Open Contact: '+name);
			Ext.getCmp(idxx).openId = id;
			menux.showAt(e.pageX,e.pageY);

			return false;
		});

	},


	afterRender: function() {

		var me = this;
		this.iAmRendered = true;

		var url = xluerzer.getInstance().getAjaxPath('submissions/search_credits/?type='+this.idx);
		this.tokenInstance = $$("#"+this.inputId);
		this.tokenInstance.tokenInput(url, {
			hintText: "Enter search ...",
			noResultsText: "no records found",
			searchingText: "searching...",
			theme: "credit",
			onAdd: function (item) {
				if (me.updateTokensDone)
				{
					me.updateContextMenue.call(me);
				}
			},
			onDelete: function (item) {

			}

		});


		if (this.addNewContact)
		{

			$$('#'+this.addNewId).click(function(){

				xframe.ajax({
					scope: me,
					url: xluerzer.getInstance().getAjaxPath('contacts/createNewEmpty/'),
					params : {
					},
					stateless: function(success, json)
					{
						if (!success) return;
						me.tokenInstance.tokenInput("add",{
							id: json.ec_id, name: 'NEW CONTACT (SAVE AND RELOAD)'
						});
						xluerzer_contacts_detail.getInstance().open(json.ec_id);
					}
				});

			});

		}

		Ext.defer(this.updateTokens,10,this);
	}



});