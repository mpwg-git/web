var xluerzer_batch = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_batch";
		}

		this.getInstance = function(config) {
			return new xluerzer_batch_(config);
			return instance;
		}
	}
})();

var xluerzer_batch_ = function(config) {
	this.config = config || {};
};

xluerzer_batch_.prototype = {

	open_overview: function()
	{

		var panelId = Ext.id();
		var cfg = xluerzer_gui.getInstance().simplyCombo({
			fieldLabel: '1. Function',
			name: 'fn',
			value: '',
			data: [{k:'1',v:'assocNotesContact'},{k:'2',v:'categories'},{k:'3',v:'co'},{k:'4',v:'contactDteails'},{k:'5',v:'creditedFirstCampagne'},{k:'6',v:'delete'},
			{k:'7',v:'duplicates ids inserted by the user'},{k:'8',v:'emails'},{k:'9',v:'exportAdAgencyfromSubmissions'},{k:'10',v:'exportContactDetails1'},
			{k:'11',v:'exportIlluPhotofromMagazine'},{k:'12',v:'exportIlluPhotofromSubmissions'},{k:'13',v:'exportNotes'},{k:'14',v:'insertAssocIds'},{k:'15',v:'listDuplicates'},{k:'16',v:'log'},{k:'17',v:'searchContacts'}],
			emptyText: 'Choose Function ...'
		});
		cfg.maxWidth = 450;
		
		var fns = Ext.widget(cfg);
		
		this.gui = Ext.widget({
			padding: 20,
			title: 'Batch CRM-GUI',
			xtype: 'form',
			items: [fns,{
				scope: this,
				uploadDone: function(txt) {
					
					var out = txt.output;
					if (!out)
					{
						out = 'Task could not be processed.'
					} else {
						out = "<pre>"+out+"</pre>";
					}
					
					Ext.getCmp(panelId).update(out);
				},
				getUploadUrl: function() {
					
					if (fns.getValue() == "") return false;
					
					return xluerzer.getInstance().getAjaxPath('batchwork/process_input/'+fns.getValue());
				},
				xtype: 'field_file_logic_2',
				fieldLabel: '2. File',
				name: 'input_file',
			},
			{
				hidden: true,
				xtype: 'button',
				text: 'Process',
				maxWidth: fns.maxWidth
			},{
				fieldLabel: 'Output',
				id: panelId,
				xtype: 'panel',
				html: 'Output: -',
				height: 400,
				autoScroll: true
				
			}],
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
		});


		xluerzer.getInstance().showContent(this.gui);
	}


}