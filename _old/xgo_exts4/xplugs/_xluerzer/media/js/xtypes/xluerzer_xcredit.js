
Ext.define('Ext.xluerzer.xCredit', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xluerzer_xcredit',
	config: {
		height: 20
	},
	constructor: function()
	{
		this.credit_type_internal = "xcredit"; 
		this.name = "xcredits_"+this.idx;
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

	setSubmissionId: function(es_id,mainSubmissionPanel)
	{
		this.es_id = es_id;
		this.mainSubmissionPanel = mainSubmissionPanel;

		if (!this.iAmRendered) return;
		this.tokenInstance.tokenInput("updateUrl",'submissions/search_xcredits/?type='+this.idx+'&es_id='+this.es_id);
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

		var holderId = this.id+'-bodyEl';

		var bubbles = $$('li.token-input-token-xcredit',$$('#'+holderId));
		
		
		
		//$$('li.token-input-input-token-xcredit',$$('#'+holderId)).css({'height':'26px'});
		$$('ul.token-input-list-xcredit input',$$('#'+holderId)).prop('disabled', true);
		//$$('ul.token-input-list-xcredit input',$$('#'+holderId)).hide();
		//$$('span',bubbles).remove();
		$$('.token-input-dropdown-xcredit').remove();
		
		
		var idxx = Ext.id();
		var me = this;
		var menux = Ext.create('Ext.menu.Menu', {
			items: [{
				id: idxx,
				text: 'Open Contact: ',
				iconCls: 'xf_contact',
				handler: function() {
					xluerzer_contactsFromSubmission.getInstance().import_xCredit(this.openId,function(){
						me.mainSubmissionPanel.load.call(me.mainSubmissionPanel,0);
					});
				}
			}]
		});

		bubbles.unbind('contextmenu');
		bubbles.contextmenu(function(e){
			e.preventDefault();

			var p 		= $$('p',this).html();
			var id 		= parseInt(p.split('[')[1],10);
			var name 	= p.split('[')[0];

			if ((id == -1) || (id == -2)) return false;
			
			Ext.getCmp(idxx).setText('Import into Backend: '+name);
			Ext.getCmp(idxx).openId = id;
			menux.showAt(e.pageX,e.pageY);

			return false;
		});

	},

	afterRender: function() {

		this.iAmRendered = true;

		var url = xluerzer.getInstance().getAjaxPath('submissions/search_xcredits/?type='+this.idx+'&es_id='+this.es_id);
		this.tokenInstance = $$("#"+this.inputId);
		this.tokenInstance.tokenInput(url, {
			hintText: "Enter search ...",
			noResultsText: "no records found",
			searchingText: "searching...",
			theme: "xcredit",
			dontTouchMe: true
		});

		Ext.defer(this.updateTokens,10,this);
	}



});