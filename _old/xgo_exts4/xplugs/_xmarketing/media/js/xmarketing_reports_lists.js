var xmarketing_reports_lists = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xmarketing_reports_lists";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xmarketing_reports_lists_(config);
			}
			return instance;
		}
	}
})();

var xmarketing_reports_lists_ = function(config) {
	this.config = config || {};
};


xmarketing_reports_lists_.prototype = {

	changeList : function(xml_id)
	{
		console.info('xml_id',xml_id);
		this.xml_id = xml_id;
		this.getChartsPanelRangeRedraw();
	},

	getChartsPanelRangeRedraw: function()
	{
		new Dygraph(
		document.getElementById("showListStats"),
		xmarketing.getInstance().getAjaxPath('/lists_reports/overallReportShow')+'?xml_id='+this.xml_id,
		{
			fractions: false,
			animatedZooms: false,
			title: 'Tages-Report',
			ylabel: 'Anzahl',
			legend: 'always',
			labelsDivStyles: { 'textAlign': 'right' },
			showRangeSelector: true,
			rangeSelectorHeight: 100,
			rangeSelectorPlotStrokeColor: '#3edaff',
			rangeSelectorPlotFillColor: '#9592ff',
			errorBars: false,
			includeZero: true,
			drawAxesAtZero: true,
			digitsAfterDecimal: 0,
			labelsSeparateLines: true,
			delimiter: ';'
		});
	},

	refreshReport: function()
	{
		this.getChartsPanelRangeRedraw();
	},

	getChartsPanelRange : function()
	{
		var me = this;
		var gui = Ext.create('Ext.Panel',{
			layout: 'fit',
			region: 'center',
			border: false,
			height: 80,
			html: "<div id='showListStats' style='width:95%;height:90%;'></div><iframe name='downloadDailyReportLists' width=0 height=0 frameborder=0 style='display:none;'></iframe>"
		});
		gui.on('afterrender',function(){
			this.getChartsPanelRangeRedraw();
		},this,{buffer:1});
		return gui;
	},

	getCharts : function() {
		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			border: false,
			height: 80,
			items: [this.getChartsPanelRange()]
		});
		return gui;
	},

	getMainPanel : function()
	{
		var me = this;
		var gui = Ext.create('Ext.Panel',{
			layout: 'fit',
			border: false,
			height: 80,
			title: 'Report',
			tbar : [{
				scope : me,
				iconCls: 'xf_reload',
				text: 'Ansicht aktualisieren',
				handler: function() {
					this.refreshReport();
				}
			},{
				scope : me,
				iconCls: 'xf_csv',
				text: 'Tages-Report downloaden',
				handler: function() {
					var url = xmarketing.getInstance().getAjaxPath('/lists_reports/overallReportDownload')+'?xml_id='+this.xml_id;
					window.open(url,"downloadDailyReportLists");
				}
			}],
			items: [this.getCharts()]
		});

		gui.on('activate',function(){
			this.getChartsPanelRangeRedraw();
		},this,{buffer:1});

		return gui;
	}
}