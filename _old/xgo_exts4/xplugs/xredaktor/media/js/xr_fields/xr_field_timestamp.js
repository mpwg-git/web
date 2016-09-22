Ext.define('Ext.xr.field_timestamp', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_timestamp',
	config: {
		fieldlabel: 'Timestamp'
	},


	updateValue: function(value) {

		try {
			var splitted = value.split(' ');
			var time = splitted[1].split(':')[0]+':'+splitted[1].split(':')[1];
			Ext.getCmp(this.id_date).setValue(splitted[0]);
			Ext.getCmp(this.id_time).setValue(time);
		} catch(e) { }

	},

	getValue: function()
	{
		return 	this.hiddenX.getValue();
	},

	getRawValue: function()
	{
		return 	this.hiddenX.getValue();
	},

	setValue: function(value)
	{
		return 	this.hiddenX.setValue(value);
	},

	constructor:function(cnfg){

		this.id_date = Ext.id();
		this.id_time = Ext.id();

		var x_date 	= "";
		var x_time 	= "";

		try{

			var v = cnfg.value;
			if (v != "0000-00-00 00:00:00") {

				var vs 	= v.split(' ');
				var t 	= vs[1].split(':');

				x_date 	= vs[0];
				x_time	= t[0]+':'+t[1];

			} else {

			}

		} catch (e) {}

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);

		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			listeners:{
				scope: this,
				buffer: 1,
				change: function(hf,value) {
					console.info('changeddd',value);
					this.updateValue(value);
				}
			}

		});
		this.add(this.hiddenX);

		this.add({
			xtype: 'fieldcontainer',
			width: '100%',
			layout: 'hbox',
			items: [{
				id: this.id_date,
				xtype: 'datefield',
				fieldLabel: 'Datum',
				labelAlign: 'right',
				labelWidth: 50,
				value: x_date,
				flex: 1,
				listeners: {
					scope: this,
					change: function(t,genericDate){

						var time = this.hiddenX.getValue().split(' ')[1];
						var date = Ext.Date.format(genericDate,"Y-m-d");
						var fin  = date+' '+time;

						console.info("CHANGE DATE",fin);

						this.hiddenX.suspendEvents();
						this.hiddenX.setValue(fin);
						this.hiddenX.resumeEvents();

					}
				}
			}, {
				xtype: 'splitter'
			}, {
				id: this.id_time,
				xtype: 'timefield',
				fieldLabel: 'Uhrzeit',
				labelAlign: 'right',
				labelWidth: 50,
				value: x_time,
				flex: 1,
				listeners: {
					scope: this,
					change: function(t,genericDate){

						var date = this.hiddenX.getValue().split(' ')[0];
						var time = Ext.Date.format(genericDate,"H:i:s");
						var fin  = date+' '+time;

						console.info("CHANGE TIME",fin);

						this.hiddenX.suspendEvents();
						this.hiddenX.setValue(fin);
						this.hiddenX.resumeEvents();
					}
				}
			}]
		});


	}

});

