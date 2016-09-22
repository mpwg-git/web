var xmarketing_reports = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xmarketing_reports";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xmarketing_reports_(config);
			}
			return instance;
		}
	}
})();

var xmarketing_reports_ = function(config) {
	this.config = config || {};
};


xmarketing_reports_.prototype = {

	changeEmission : function(xme_id)
	{
		
		this.xme_id = xme_id;
		this.getPieChartStore().load();
	},

	getStore_OpeningClicks : function()
	{
		if (this.savedStore) return this.savedStore;

		var url 		= xmarketing.getInstance().getAjaxPath('/reports/openingClicks');
		var mName 		= 'ChartOpeningsClicks';
		var extraParams = {};

		Ext.define(mName, {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'd',     type: 'string'},
			{name: 'oT',    type: 'int'},
			{name: 'oU', 	type: 'int'},
			{name: 'cT',	type: 'int'},
			{name: 'cU',  	type: 'int'}
			]
		});

		var store = Ext.create('Ext.data.Store', {
			autoDestroy: true,
			model: mName,
			remoteSort: true,
			proxy: {
				extraParams: extraParams,
				type: 'ajax',
				url: url,
				reader: {
					root: 'root',
					totalProperty: 'totalCount'
				},
				listeners: {
					exception: function(proxy, response, operation){

						var json = Ext.decode(response.responseText);
						if (json.DEBUG)
						{
							var win = xframe.win({
								modal:true,
								title: 'Server Debugnachricht',
								items: {xtype:'panel',html:json.DEBUG,autoScroll:true},
								buttons:[{
									text:'OK',
									handler:function(){
										win.destroy();
									}
								}]
							});
							win.show();
						}
					}
				}
			}
		});

		//this.xme_id = -1;
		store.on('beforeload', function(s) {
			store.proxy.extraParams['xme_id'] = this.xme_id;
		},this);

		this.savedStore = store;
		return store;
	},

	getChartsPanel : function()
	{
		var storeOpenClicks = this.getStore_OpeningClicks();

		var series = [];
		var fields = ['d', 'oT', 'oU','cT','cU'];


		Ext.each(fields,function(key){
			if (key == 'd') return;
			series.push({
				type: 'line',
				highlight: {
					size: 7,
					radius: 7
				},
				axis: 'left',
				xField: 'd',
				yField: key,
				markerConfig: {
					type: 'cross',
					size: 4,
					radius: 4,
					'stroke-width': 0
				},
				tips: {
					trackMouse: true,
					width: 80,
					height: 40,
					renderer: function(storeItem, item) {
						this.setTitle(storeItem.get('d'));
						this.update(storeItem.get(key));
					}
				}
			});
		});

		var chart = Ext.create('Ext.chart.Chart', {
			xtype: 'chart',
			style: 'background:#fff',
			animate: true,
			store: storeOpenClicks,
			shadow: true,
			theme: 'Category1',
			legend: {
				position: 'right'
			},
			axes: [{
				type: 'Numeric',
				minimum: 0,
				position: 'left',
				fields: fields,
				title: 'Openings/Clicks',
				minorTickSteps: 1,
				grid: {
					odd: {
						opacity: 1,
						fill: '#ddd',
						stroke: '#bbb',
						'stroke-width': 0.5
					}
				}
			}, {
				type: 'Category',
				position: 'bottom',
				fields: ['d'],
				title: 'Tage'
			}],
			series: series
		});

		chart.on('render',function(){
			storeOpenClicks.load();
		},this);


		return chart;
	},


	getChartsPanelRangeRedraw: function()
	{
		new Dygraph(
		document.getElementById("showThaFullOpenings"),
		xmarketing.getInstance().getAjaxPath('/reports/openingClicksAsCSVstyle')+'?xme_id='+this.xme_id,
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
		this.getPieChartStore().load();
	},

	getChartsPanelRange : function()
	{
		var me = this;
		var gui = Ext.create('Ext.Panel',{
			layout: 'fit',
			region: 'center',
			border: false,
			height: 80,
			html: "<div id='showThaFullOpenings' style='width:95%;height:90%;'></div><iframe name='downloadDailyReport' width=0 height=0 frameborder=0 style='display:none;'></iframe>"
		});
		gui.on('afterrender',function(){
			//			this.getChartsPanelRangeRedraw();
		},this,{buffer:1});
		return gui;
	},

	getPieChartStore : function()
	{
		if (this.getPieChartStoreCache) return this.getPieChartStoreCache;

		var url 		= xmarketing.getInstance().getAjaxPath('/reports/getPieChartInfos');
		var mName 		= 'getPieChartInfos';
		var extraParams = {};

		Ext.define(mName, {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'tag',   	type: 'string'},
			{name: 'name',   	type: 'string'},
			{name: 'data',	   	type: 'int'}
			]
		});

		var store = Ext.create('Ext.data.Store', {
			autoDestroy: true,
			model: mName,
			remoteSort: true,
			proxy: {
				extraParams: extraParams,
				type: 'ajax',
				url: url,
				reader: {
					root: 'root',
					totalProperty: 'totalCount'
				},
				listeners: {
					exception: function(proxy, response, operation){

						var json = Ext.decode(response.responseText);
						if (json.DEBUG)
						{
							var win = xframe.win({
								modal:true,
								title: 'Server Debugnachricht',
								items: {xtype:'panel',html:json.DEBUG,autoScroll:true},
								buttons:[{
									text:'OK',
									handler:function(){
										win.destroy();
									}
								}]
							});
							win.show();
						}
					}
				}
			}
		});

		store.on('beforeload', function(s) {
			store.proxy.extraParams['xme_id'] = this.xme_id;
		},this);


		this.getPieChartStoreCache = store;

		return store;
	},

	format : function(tthis)
	{
		var k = 2;
		var fixLength = false;
		if(!k) k = 0;
		var neu = '';

		// Runden
		var f = Math.pow(10, k);
		var zahl = '' + parseInt(tthis * f + (.5 * (tthis > 0 ? 1 : -1)) ) / f ;

		// Komma ermittlen
		var idx = zahl.indexOf('.');
		// fehlende Nullen einfügen
		if(fixLength && k) {
			zahl += (idx == -1 ? '.' : '' )
			+ f.toString().substring(1);
		}

		// Nachkommastellen ermittlen
		idx = zahl.indexOf('.');
		if(idx == -1) idx = zahl.length;
		else neu = ',' + zahl.substr(idx + 1, k);

		// Tausendertrennzeichen
		while(idx > 0)
		{
			if(idx - 3 > 0)
			neu = '.' + zahl.substring( idx - 3, idx) + neu;
			else
			neu = zahl.substring(0, idx) + neu;
			idx -= 3;
		}
		return neu;
	},

	getMoreDetails : function()
	{
		var me	  = this;
		var store = this.getPieChartStore();

		var chart = Ext.create('Ext.chart.Chart', {
			xtype: 'chart',
			animate: false,
			store: store,
			shadow: false,
			legend: false,
			insetPadding: 60,
			theme: 'Base:gradients',
			series: [{
				type: 'pie',
				field: 'data',
				showInLegend: true,
				tips: {
					trackMouse: true,
					width: 140,
					height: 28,
					renderer: function(storeItem, item) {
						//calculate percentage.
						try {
							var total = 0;
							store.each(function(rec) {
								total += rec.get('data');
							});
							this.setTitle(storeItem.get('name') + ': ' + Math.round(storeItem.get('data') / total * 100) + '%');
						} catch (e) {};
					}
				},
				highlight2: {
					segment: {
						margin: 20
					}
				},
				label: {
					field: 'name',
					display: 'rotate',
					contrast: true,
					font: '14px Arial'
				}
			}]
		});

		var details = Ext.create('Ext.Panel',{
			layout: 'fit',
			region: 'east',
			width: 400,
			border: false,
			html: ''
		});

		var chartPanel = Ext.create('Ext.Panel',{
			region: 'center',
			layout: 'fit',
			border: 'false',
			border: false,
			html: "<div id='donutChart' style='width:95%;height:90%;text-align:center;'></div>"
		});

		chartPanel.on('afterrender',function(){

			var width = 500,
			height = 500,
			radius = Math.min(width, height) / 2;

			var arc = d3.svg.arc()
			.outerRadius(radius - 10)
			.innerRadius(radius - 70);

			var pie = d3.layout.pie()
			.sort(null)
			.value(function(d) { return d.data; });

			var svg = d3.select("#donutChart").append("svg")
			.attr("width", width)
			.attr("height", height)
			.append("g")
			.attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

			var store 	= this.getPieChartStore();
			var data  	= [];
			var total 	= 0;

			store.each(function(rec) {
				data.push(rec.data);
				total += rec.get('data');
			});

			if (total == 0)
			{
				total	= 0;
				data  	= [];
				
				store.each(function(rec) {
					rec.set('data',1);
					
					data.push(rec.data);
					total += rec.get('data');
				});

			}


			


			var g = svg.selectAll(".arc")
			.data(pie(data))
			.enter().append("g")
			.attr("class", "arc");

			g.append("path")
			.attr("d", arc)
			.style("fill", function(d) {
				switch (d.data.tag)
				{
					case 'uO':
					color = "#3edaff";
					break;
					case 'nO':
					color = "#9592ff";
					break;
					case 'B':
					color = "#FF0000";
					break;
					default: color = "#000000";
				}
				return color;
			});

			g.append("text")
			.attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")"; })
			.attr("dy", ".35em")
			.style("text-anchor", "middle")
			.style("font-weight", "bold")
			.text(function(d) {
				return d.data.name + ': ' + Math.round(d.data.data / total * 100) + '%';
			});


		},this,{buffer:100})

		store.on('load',function(s){

			xframe.ajax({
				scope: me,
				url: xmarketing.getInstance().getAjaxPath('/reports/getPieChartInfosTotal'),
				params : {
					xme_id : me.xme_id
				},
				success: function(d) {
					var html 	= "";
					var total 	= d['total'];

					var d_u 		= Math.round(d['uO'] / total * 100)
					var d_b 		= Math.round(d['bounces'] / total * 100)
					var d_n 		= Math.round(d['nO'] / total * 100)
					var d_unsubs 	= Math.round(d['uSubs'] / total * 100)

					if (isNaN(d_u)) 		d_u = 0;
					if (isNaN(d_b)) 		d_b = 0;
					if (isNaN(d_n)) 		d_n = 0;
					if (isNaN(d_unsubs)) 	d_unsubs = 0;


					html += "<span class='xmReport_total'>"+me.format(d['total'])+"</span> Total Adressen <br><br>";
					html += "<span class='xmReport_perc'>"+d_u+"</span>% ("+me.format(d['uO'])+"x) <b>Geöffnet</b> - Unique <br>";
					html += "<span class='xmReport_perc'>"+d_b+"</span>% ("+me.format(d['bounces'])+"x) Bounces <br>";
					html += "<span class='xmReport_perc'>"+d_n+"</span>% ("+me.format(d['nO'])+"x) <b>Nicht Geöffnet</b><br>";
					html += "<span class='xmReport_perc'>"+me.format(d['runTime'])+"</span> Tage<br><br><br>";

					html += "<span class='xmReport_mid'>"+me.format(d['tO'])+"</span> Total - Geöffnet<br>";
					html += "<span class='xmReport_mid'>"+me.format(d['tC'])+"</span> Total - Klicks<br><br>";

					html += "<span class='xmReport_perc'>"+me.format(d['cU'])+"</span> Klicks (Unique)<br>";
					html += "<span class='xmReport_perc'>"+me.format(d['uSubs'])+"</span> ("+d_unsubs+"%) Abmeldungen<br>";

					details.update(html);
				},
				stateless: function(json)
				{
				}
			});

		},this);

		var gui = Ext.create('Ext.Panel',{
			layout: 'fit',
			region: 'south',
			border: false,
			height: 500,
			items : [{
				xtype: 'panel',
				layout: 'border',
				border: false,
				items: [chartPanel,details]
			}]
		});

		return gui;
	},

	getCharts : function() {

		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			border: false,
			height: 80,
			items: [this.getChartsPanelRange(),this.getMoreDetails()]
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
					var url = xmarketing.getInstance().getAjaxPath('/reports/downloadDailyInfos')+'?xme_id='+this.xme_id;
					window.open(url,"downloadDailyReport");
				}
			},{
				scope : me,
				iconCls: 'xf_magnet',
				text: 'Detail-Report öffnen',
				handler: function() {
					var url = "/xgo/xplugs/xmarketing/ajax/reports/getUserFlow?xme_id="+this.xme_id;
					window.open(url,"detailReport");
				}
			}],
			items: [this.getCharts()]
		});

		gui.on('activate',function(){
			this.refreshReport();
		},this,{buffer:10});

		return gui;
	}
}