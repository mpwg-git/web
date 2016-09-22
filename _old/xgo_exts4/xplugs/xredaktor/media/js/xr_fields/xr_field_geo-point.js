Ext.define('Ext.xr.field_geo-point', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_geo-point',
	config: {
		height: 200,
		border: false,
		guiMode: 'point',
		isFieldLabelable: false
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
		this.doMapsLayout();
		this.on('afterrender',this.startGoogleMaps,this);
	},

	resizeHandler : function() {
		if (!this.mapxxx) return;
		google.maps.event.trigger(this.mapxxx, 'resize');
	},

	startGoogleMaps : function()
	{

		this.up('panel').on('resize',function(panel,w,h){
			if (!this.resizeMeIfUCan) return;
			var hx = h-7;
			if (hx < 200) return false;
			this.resizeMeIfUCan.setHeight(hx);
		},this);

		var me = this;
		var idx = this.map_idx;

		var startPoint  = new google.maps.LatLng(47.84637, 16.527960000000007);
		var position 	= false;
		if (!this.rawConfig['geo_lat']) 	this.rawConfig['geo_lat'] = "";
		if (!this.rawConfig['geo_long']) 	this.rawConfig['geo_long'] = "";

		if ((this.rawConfig['geo_lat'] == "") && (this.rawConfig['geo_long'] == ""))
		{
			position = startPoint;
		} else {
			Ext.getCmp(me.f_lat).setValue(this.rawConfig['geo_lat']);
			Ext.getCmp(me.f_long).setValue(this.rawConfig['geo_long']);
			position = new google.maps.LatLng(this.rawConfig['geo_lat'], this.rawConfig['geo_long']);
		};


		var mapOptions = {
			zoom: 10,
			center: position,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById(idx),mapOptions);
		this.mapxxx = map;

		var marker 		= false;
		this.marker		= marker;

		if (position)
		{

			google.maps.event.addListenerOnce(map, 'idle', function() {
				map.setCenter(position);
				marker = new google.maps.Marker({
					zoom: 8,
					position: position,
					map: map
				})
				map.panTo(marker.getPosition());;
			});

		}
	},

	doLatLngSearch : function() {

		var me	= this;
		var map	= this.mapxxx;

		var lat = Ext.getCmp(me.f_lat).getValue();
		var lon = Ext.getCmp(me.f_long).getValue();

		var pos	= new google.maps.LatLng(lat, lon);

		map.setCenter(pos);

		if (!me.marker)
		{
			me.marker = new google.maps.Marker({
				position: pos,
				map: map
			});
		} else
		{
			me.marker.setPosition(pos);
		}

	},

	doAdSearch: function() {

		var me		= this;
		var map 	= this.mapxxx;
		var address	= Ext.getCmp(this.f_address).getValue();

		var geocoder = new google.maps.Geocoder();
		geocoder.geocode( { 'address': address}, function(results, status) {

			if (status == google.maps.GeocoderStatus.OK) {
				//In this case it creates a marker, but you can get the lat and lng from the location.LatLng

				var lat 	= (results[0].geometry.location.lat());
				var lon 	= (results[0].geometry.location.lng());

				console.info(lat,lon,results[0].geometry);

				Ext.getCmp(me.f_lat).setValue(lat);
				Ext.getCmp(me.f_long).setValue(lon);

				map.setCenter(results[0].geometry.location);
				if (!me.marker)
				{
					me.marker = new google.maps.Marker({
						position: results[0].geometry.location,
						map: map
					});
				} else
				{
					me.marker.setPosition(results[0].geometry.location);
				}

			} else {

				switch(status)
				{
					case 'ZERO_RESULTS':
					xframe.alert("Google Maps","Keine Daten konnten gefunden werden.");
					break;
					default:
					alert("Geocode was not successful for the following reason: " + status);
				}


			}
		});


	},

	doMapsLayout: function() {

		this.map_idx 	= Ext.id();

		this.f_address 	= Ext.id();
		this.f_long		= Ext.id();
		this.f_lat		= Ext.id();

		var me	= this;



		var buttons = {
			title: this.as_label,
			xtype: 'form',
			plain: true,
			margin: '10 0 0 0',
			width: 10,
			height: 90,
			region: 'south',
			items: [{
				xtype: 'container',
				anchor: '100%',
				margin: '10 0 0 0',
				padding: 0,
				layout:'column',
				items:[{
					xtype: 'container',
					columnWidth:.5,
					layout: 'anchor',
					items: [{
						id: me.f_lat,
						xtype:'textfield',
						fieldLabel: 'Latitude',
						labelWidth: 70,
						labelAlign: 'right',
						name: 'first',
						anchor:'96%',
						listeners: {
							scope: me,
							blur: function(){
								this.doLatLngSearch();
							}
						}
					}, {
						id: me.f_address,
						xtype:'textfield',
						labelAlign: 'right',
						fieldLabel: 'Adresse',
						labelWidth: 70,
						name: 'company',
						anchor:'96%',
						listeners: {
							scope: me,
							specialkey: function(field, e){
								if (e.getKey() == e.ENTER) {
									this.doAdSearch();
								}
							}
						}
					}]
				},{
					xtype: 'container',
					columnWidth:.5,
					layout: 'anchor',
					items: [{
						id: me.f_long,
						labelWidth: 70,
						labelAlign: 'right',
						xtype:'textfield',
						fieldLabel: 'Longitude',
						name: 'last',
						anchor:'100%',
						listeners: {
							scope: me,
							blur: function(){
								this.doLatLngSearch();
							}
						}
					},{
						xtype:'button',
						text: 'via GoogleMaps suchen',
						iconCls: 'xf_search',
						scope: me,
						handler: function() {
							this.doAdSearch();
						}
					}]
				}]
			}]
		};

		var map = {
			xtype: 'component',
			region: 'center',
			layout: 'fit',
			height: 100,
			width: 100,
			frame: false,
			html: 	'<div id="'+this.map_idx+'" style="width:100%;height:100%;">Lade Google Maps ...</div>',
			listeners: {
				scope: me,
				resize: function() {
					this.resizeHandler();
				}
			}
		};


		var poly = {};

		switch (this.guiMode)
		{
			case 'point':

			this.resizeMeIfUCan = this.add({
				bodyStyle: {
					background: '#ffffff',
					padding: '10px'
				},
				defaults: {border:false},
				height: this.height,
				margin: '2 0 0 0',
				xtype: 'panel',
				layout: 'border',
				items: [map,buttons]
			});

			this.hiddenX = Ext.create('Ext.form.field.Hidden',{
				name: this.rawConfig.name,
				value: this.rawConfig.value
			});





			this.add(this.hiddenX);
			this.hiddenX.getSubmitData = function() {

				var lat = Ext.getCmp(me.f_lat).getValue();
				var lon = Ext.getCmp(me.f_long).getValue();

				var data = {};
				data[me.rawConfig.name] = Ext.encode({
				'lat': lat,
				'long': lon
				});

				return data;
			}

			break;

			case 'poly':
			this.resizeMeIfUCan = this.add({
				bodyStyle: {
					background: '#ffffff',
					padding: '10px'
				},
				defaults: {border:false},
				height: this.height,
				margin: '0 0 0 0',
				xtype: 'panel',
				layout: 'border',
				items: [map]
			});
			break;


			default: break;
		}


	}
});