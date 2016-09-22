var xkalt = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xkalt_(config);
			}
			return instance;
		}
	}
})();

var xkalt_ = function(config) {
	this.config = config || {};
};




xkalt_.prototype = {


	renderer_bestellung: function(value,meta,r)
	{

		if (r.data.wz_BEARBEITET == 'N')
		{
			meta.style = 'background-color:red;color:white;';
		} else
		{
			meta.style = 'background-color:#7FFF00;color:black;';
		}

		return value;
	},



	createPanel_bestellungen: function()
	{
		this.panel_bestellungen = Ext.create('Ext.Panel',{
			title: 'Bestellungen',
			region: 'west',
			layout: 'fit',
			width: 400,
			split: true,
			border: false,
			items:[]
		});


		var fields = [

		{name: 'wz_id',				text:'Nummer',					type:'int',		hidden: false, 	folder: true, header:true, width: 50, flex: 0, renderer: this.renderer_bestellung, renderer_scope: this},
		{name: 'wz_created',		text:'Erstellt',				type:'string' , hidden: false, 	header:true, width: 120},

		{name: 'images_cnt',		text:'Bilder',					type:'string' , hidden: false, 	header:true, width: 40},
		{name: 'quelle',			text:'Quelle',					type:'string' , hidden: false, 	header:true},
		{name: 'url',				text:'Quell-URL',				type:'string' , hidden: true, 	header:true},
		{name: 'size',				text:'m²',						type:'string' , hidden: false, 	header:true, width: 40},
		{name: 'total',				text:'€',						type:'string' , hidden: false, 	header:true, width: 60},

		{name: 'wz_HASH',			text:'Hash',					type:'string' , hidden: false, 	header:true},
		{name: 'wz_BEARBEITET',		text:'Erledigt',				type:'string' , hidden: true, 	header:true, width: 50},
		{name: 'user',				text:'E-Benutzer',				type:'string' , hidden: false, 	header:true},
		{name: 'wz_BEARBEITET_TS',	text:'Erledigt-Zeitpunkt',		type:'string' , hidden: false, 	header:true, width: 130},
		//{name: 'wz_NOTE',			text:'Notiz',					type:'string' , hidden: false,	header:true, width: 130},
		
		];

		this.panel_bestellungen = xframe_pattern.getInstance().genGrid({


			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			title: 'Bestellungen',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:false,
			search: true,
			records_move: false,
			pager: true,
			toolbar_top: [],

			xstore: {
				load: 	'/xgo/xplugs/xkalt/call/xkalt/overview/load',
				remove: '/xgo/xplugs/xkalt/call/xkalt/overview/remove',
				params: {
					initSort: Ext.encode([{

					'property' : 'images_cnt',
					'direction' : 'desc',

					}])
				},
				pid: 	'wz_id',
				fields: fields
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});

		this.panel_bestellungen.on('selectionchange',function(view,selections,options){

			var bestellId 	= 0;
			var hash 		= 0;
			var r 			= false;
			
			
			if (selections.length == 1)
			{
				bestellId   = selections[0].data.wz_id;
				hash		= selections[0].raw.wz_HASH;
				r			= selections[0].raw;
			}

			this.loadBestellung(bestellId,hash,r);
		},this);



		return this.panel_bestellungen;
	},

	loadBestellung: function(id,latestHash,r)
	{
		var me = this;
		this.latestBestellungShown 	= id;
		this.latestHash 			= latestHash;
		this.latestRecord			= r;

		this.panel_details.setDisabled((id == 0));

		if (id == 0)
		{
			this.panel_order.loadSrc("about:blank");
			this.panel_details.setTitle('Keinen Room aktuell ausgewählt');
		}
		else
		{
			this.panel_order.mask('Lade Raum ...');
			var sel = '#'+this.panel_order.id+' iframe';

			$$(sel).unbind('load');
			$$(sel).load(function () {
				me.panel_order.unmask();
			});

			//914b5fc9e60739d6930025d3a9404788
			
			this.panel_order.loadSrc("/de/room/"+this.latestBestellungShown+"?h="+this.latestHash);
			this.panel_details.setTitle('Aktionen für: '+id);

		}

		this.panel_details.store.proxy.extraParams['b_id'] = id;

		setTimeout(function(){
			me.panel_details.store.load();
		},10);
	},

	createPanel_order: function()
	{
		this.panel_order = Ext.widget({
			region: 'center',
			xtype: 'xr_iframe',
			title: 'Bestell Details',
			layout: 'fit',
			src: ''
		});

		return this.panel_order;
	},


	button_done: function()
	{

		xframe.yn({
			title:'Bestellung abschließen',
			msg: 'Bestellung #'+this.latestBestellungShown+' als nicht ERLEDIGT setzen ?',
			scope:this,
			handler: function(btn)
			{

				if (btn != 'yes') return;

				xframe.ajax({
					scope:this,
					url: '/xgo/xplugs/xkalt/call/xkalt/done/',
					params: {
						b_id: this.latestBestellungShown
					},
					stateless: function(succ,json) {
						this.panel_details.store.load();
						this.panel_bestellungen.store.load();
					}
				});


			}
		});

	},

	
	button_openQuelle: function()
	{
		var quelle  = this.latestRecord['quelle'];
		var baseUrl = ""; 
		
		switch(quelle)
		{
			case 'wg-gesucht':
			baseUrl = "http://wg-gesucht.de/";
			break;
			default: break;
		}
		
		var link = this.latestRecord['url'];
		var l = baseUrl + link;
		
		window.open(l,link);
	},
	
	button_openRoom: function()
	{
		var l = "/de/room/"+this.latestBestellungShown+"?h="+this.latestHash;
		window.open(l,this.latestHash);
	},
	
	button_notDone: function()
	{

		xframe.yn({
			title:'Room',
			msg: 'Room #'+this.latestBestellungShown+'als nicht NICHT erledigt setzen ?',
			scope:this,
			handler: function(btn)
			{

				if (btn != 'yes') return;

				xframe.ajax({
					scope:this,
					url: '/xgo/xplugs/xkalt/call/xkalt/notDone/',
					params: {
						b_id: this.latestBestellungShown
					},
					stateless: function(succ,json) {
						this.panel_details.store.load();
						this.panel_bestellungen.store.load();
					}
				});

			}
		});

	},

	button_sendMail: function()
	{

		var email = this.getEmail2Resend();
		xframe.yn({
			title:'Room Einladung senden',
			msg: 'Raum #'+this.latestBestellungShown+' an <b>'+email+'</b> senden ?',
			scope:this,
			handler: function(btn)
			{

				if (btn != 'yes') return;

				xframe.ajax({
					scope:this,
					url: '/xgo/xplugs/xkalt/call/xkalt/sendMail/',
					params: {
						b_id: this.latestBestellungShown,
						email: email
					},
					stateless: function(succ,json) {
						this.panel_details.store.load();
						this.panel_bestellungen.store.load();
					}
				});


			}
		});

	},

	getEmail2Resend: function()
	{
		return Ext.getCmp(this.email2sendId).getValue();
	},

	createPanel_details: function()
	{

		this.email2sendId = Ext.id();

		var fields = [
		{name: 'wz_id',				text:'ID',					type:'int',		hidden: false, 	folder: true, header:true, width: 50, flex: 0},
		{name: 'wz_created',		text:'Zeitpunkt',			type:'string' , hidden: false, 	header:true, width: 120},
		{name: 'user',				text:'Benutzer',			type:'string' , hidden: false, 	header:true, width: 80},
		{name: 'wz_log',			text:'Info',				type:'string' , hidden: false, 	header:true},
		];

		this.panel_details = xframe_pattern.getInstance().genGrid({


			disabled: true,
			region:'east',
			width: 400,
			forceFit:true,
			border:false,
			title: 'Aktionen',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: false,
			toolbar_top: [

			{

				height: 50,
				text: '>Raum',
				style: {
				'text-color': 'white',
				background: 'lightblue'
				},
				scope: this,
				handler: this.button_openRoom

			},
			{

				height: 50,
				text: '>Quelle',
				style: {
				'text-color': 'white',
				background: 'lightblue'
				},
				scope: this,
				handler: this.button_openQuelle

			},
			{

				hidden: true,
				height: 50,
				text: 'Online',
				style: {
				'text-color': 'white',
				background: 'lightgreen'
				},
				scope: this,
				handler: this.button_done

			},
			{


				height: 50,
				text: 'Nicht erledigt',
				style: {
				'text-color': 'white !important;',
				background: 'red'
				},
				scope: this,
				handler: this.button_notDone


			},

			'-',

			{
				id: this.email2sendId,
				xtype: 'textfield',
				emptyText: 'an E-Mail senden'
			},

			{
				text: 'Senden',
				scope: this,
				handler: this.button_sendMail
			}
			
			],

			xstore: {
				load: 	'/xgo/xplugs/xkalt/call/xkalt/logs/load',
				params: {
					b_id: -1,
					initSort: Ext.encode([{

					'property' : 'wz_id',
					'direction' : 'desc',

					}])
				},
				pid: 	'wz_id',
				fields: fields
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});


		/*
		this.panel_details = Ext.create('Ext.Panel',{
		title: 'Details',
		region: 'east',
		width: 400,
		layout: 'fit',
		border: false,
		split: true,



		items:[this.grid]
		});

		*/

		return this.panel_details;
	},


	createAllPanels: function()
	{
		this.createPanel_bestellungen();
		this.createPanel_order();
		this.createPanel_details();
	},

	getMainPanel : function()
	{
		this.createAllPanels();

		this.panel_main = Ext.create('Ext.Panel',{
			region: 'center',
			layout: 'border',
			border:false,
			items:[ this.panel_bestellungen,  this.panel_order,  this.panel_details]
		});

		return this.panel_main;
	},



}