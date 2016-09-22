Ext.define('Ext.xr.field_json', {
	extend: 'Ext.tree.Panel',
	alias: 'widget.xr_field_json',

	config: {
		width: 200,
		height: 200,
		rootVisible: false,
	},


	json2leaf: function (json,store) {
		var ret = [];
		for (var i in json) {
			if (json.hasOwnProperty(i)) {
				if (json[i] === null) {
					ret.push({id: Ext.id(), idx: ''+i, vx: json[i], text: i + ' : null', leaf: true, iconCls: 'xr_json_null'});
				} else if (typeof json[i] === 'string') {
					ret.push({id: Ext.id(), idx: ''+i, vx: json[i],text: i + ' : "' + json[i] + '"', leaf: true, iconCls: 'xr_json_string'});
				} else if (typeof json[i] === 'number') {
					ret.push({id: Ext.id(), idx: ''+i, vx: json[i],text: i + ' : ' + json[i], leaf: true, iconCls: 'xr_json_number'});
				} else if (typeof json[i] === 'boolean') {
					ret.push({id: Ext.id(), idx: ''+i, vx: json[i], text: i + ' : ' + (json[i] ? 'true' : 'false'), leaf: true, iconCls: 'xr_json_boolean'});
				} else if (typeof json[i] === 'object') {
					ret.push({id: Ext.id(), idx: ''+i, vx: json[i], text: i, children: this.json2leaf(json[i],store), iconCls: Ext.isArray(json[i]) ? 'xr_json_array' : 'xr_json_object'});
				} else if (typeof json[i] === 'function') {
					ret.push({id: Ext.id(), idx: ''+i, vx: json[i], text: i + ' : function', leaf: true, iconCls: 'xr_json_function'});
				}
			}
		}

		Ext.each(ret,function(obj){
			var t = {
				name: 	''+obj.idx,
				value:	''+obj.vx,
				type:	''+typeof obj.vx,
				idx: 	''+obj.id
			};
			console.info(t);
			store.add(t);
		});

		return ret;
	},



	constructor:function(cnfg) {

		var me2 = this;
		if (typeof cnfg == 'undefined') cnfg = {};
		if (!cnfg.value) cnfg.value = {};

		var json = cnfg.value;

		if (typeof json == 'string') {
			json = Ext.decode(json,true);
		}

		var bufferdStore = Ext.create('Ext.data.Store', {
			fields:['name', 'value','type','idx'],
			data:{'items':[]},
			proxy: {
				type: 'memory',
				reader: {
					type: 'json',
					root: 'items'
				}
			}
		});

		cnfg.store = Ext.create('Ext.data.TreeStore', {
			root: {
				id: 0,
				text: 'JSON',
				expanded: true,
				iconCls: 'xr_field_json',
				children: this.json2leaf(json,bufferdStore),
				vx: json
			}
		});


		Ext.define('Ext.ux.form.MemSearch', {
			extend: 'Ext.form.field.Trigger',
			alias: 'widget.searchfieldmem',

			trigger1Cls: Ext.baseCSSPrefix + 'form-clear-trigger',
			trigger2Cls: Ext.baseCSSPrefix + 'form-search-trigger',

			hasSearch : false,
			paramName : 'query',

			initComponent: function() {
				var me = this;

				me.callParent(arguments);
				me.on('specialkey', function(f, e){
					if (e.getKey() == e.ENTER) {
						me.onTrigger2Click();
					}
				});

				// We're going to use filtering
				me.store.remoteFilter = false;

				// Set up the proxy to encode the filter in the simplest way as a name/value pair

				// If the Store has not been *configured* with a filterParam property, then use our filter parameter name
				if (!me.store.proxy.hasOwnProperty('filterParam')) {
					me.store.proxy.filterParam = me.paramName;
				}
				me.store.proxy.encodeFilters = function(filters) {
					return filters[0].value;
				}
			},

			afterRender: function(){
				this.callParent();
				this.triggerCell.item(0).setDisplayed(false);
			},

			onTrigger1Click : function(){
				var me = this;

				$$('.found_search_node').removeClass('found_search_node');

				if (me.hasSearch) {

					me.setValue('');
					me.store.clearFilter();
					me.hasSearch = false;
					me.triggerCell.item(0).setDisplayed(false);
					me.updateLayout();



				}
			},

			onTrigger2Click : function(){
				var me = this,
				value = me.getValue().toLowerCase();

				if (value.length > 0) {


					//console.info(me.store);
					var q = me.store.queryBy(function(record) {

						var state = false;

						Ext.each(['name','value'],function(s){
							if (state) return;

							var str = ''+record.get(s);
							if (!str) return;

							if (str.toLowerCase().indexOf(value) === -1) {

							} else {
								state = true;
							}
						});

						return state;
					});

					$$('.found_search_node').removeClass('found_search_node');

					Ext.each(q.items,function(r){

						var n = me2.getStore().getNodeById(r.raw.idx);
						if (!n) return;

						var p = n.getPath();

						me2.selectPath(p,'id','/',function(){
							var html_node = me2.getView().getNode(n);
							Ext.get(html_node).addCls('found_search_node');
						});

					},this);

					me.hasSearch = true;
					me.triggerCell.item(0).setDisplayed(true);
					me.updateLayout();
				}
			}
		});


		cnfg.tbar = [{
			store: bufferdStore,
			remoteFilter: false,
			xtype: 'searchfieldmem',
			emptyText: 'key/value',
			flex:1
		}];

		cnfg.rootVisible = true;
		cnfg.useArrows = true;

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);

		//console.info('cnfg',cnfg);

	},


	getKeyValueGrid: function(cfg) {

		var storeId = Ext.id();

		Ext.create('Ext.data.Store', {
			storeId:storeId,
			fields:['name', 'value','type','idx'],
			data:{'items':[]},
			proxy: {
				type: 'memory',
				reader: {
					type: 'json',
					root: 'items'
				}
			}
		});

		var cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
			clicksToEdit: 1
		});

		var store = Ext.data.StoreManager.lookup(storeId);



		var grid = Ext.create('Ext.grid.Panel', {
			columnLines: true,
			flex: 1,
			tbar: cfg.tbar,
			region: cfg.region,
			width: cfg.width,
			split: true,
			border: false,
			plain: true,
			layout: 'fit',
			store: store,
			plugins: [cellEditing],
			columns: [
			{ text: 'Name',   	dataIndex: 'name',	fieldy: {allowBlank: false}, flex: 1 },
			{ text: 'Wert', 	dataIndex: 'value',	fieldy: {allowBlank: false}, flex: 1 },
			{ text: 'Type', 	dataIndex: 'type',	flex: 1 },
			{ text: 'ID', 		dataIndex: 'idx',	flex: 1 , hidden: true},
			]
		});

		grid.setSource = function(json) {

			var data = [];

			Ext.each(json,function(p) {

				data.push({
					name: ''+p.raw.idx,
					value: ''+p.raw.vx,
					type: ''+ typeof p.raw.vx,
					idx: ''+ p.id,
				});

			},this);

			grid.getStore().loadData(data);
		}

		return grid;
	},



	showWin: function(cfg) {

		if (typeof cfg.json == 'undefined') cfg.json = {};

		this.path = Ext.create('Ext.form.field.Text',{
			value: '',
			felx: 1
		});


		var pg = this.getKeyValueGrid({
			width: 300,
			region: 'east',
			tbar: [{
				//disabled: true,
				text: 'Import',
				iconCls: 'xf_import',
				scope: this,
				handler: function() {
				}
			},{
				//disabled: true,
				text: 'Export',
				iconCls: 'xf_export',
				scope: this,
				handler: function() {
				}
			}]
		});

		var xx = false;

		pg.on('validateedit',function(editor, e){
			console.log(editor);
			var oldVal = editor.originalValue;
			var newVal = editor.value;

			var col = editor.context.field;

			/*

			name: ''+p.raw.idx,
			value: ''+p.raw.vx,
			type: ''+ typeof p.raw.vx,
			idx: ''+ p.id,

			*/

			var r = editor.context.record;
			switch (editor.context.field) {

				case 'name':

				//console.info('r',xx.store.getNodeById(r.id),r.id);

				return;

				r.raw.idx 	= newVal;
				r.raw.text 	= newVal;
				r.data.text = newVal;
				r.updateInfo();
				r.parentNode.collapse();
				r.parentNode.expand();

				break;

				default:


				break;

			}



			//console.info('treeStore',xx.getStore());
			//console.info('treeStore',xx.getStore().treeStore.getNodeById(editor.context.record.raw.idx));


		});

		var panel = Ext.create('Ext.panel.Panel',{
			border: false,
			split: true,
			layout: 'border',
			items: [(xx=Ext.widget({
				split: true,
				region: 'center',
				xtype: 'xr_field_json',
				value: cfg.json,
				listeners: {
					scope: this,
					buffer: 1,
					select: function(tree,node) {

						var parts 	= node.getPath().split('/');
						var path 	= [];

						Ext.each(parts,function(p){
							if (p == "") return;
							if (p == '0') return;
							
							
							var v = ''+xx.getStore().getNodeById(p).raw.idx;
							if (Ext.isNumeric(v)) {
								v = ".["+v+"]";
							}
							path.push(v);
							
							console.info(p,v);
							
						},this);

						this.path.setValue(path.join('.').split('..').join('.'));

						switch(node.raw.iconCls) {
							case "xr_field_json":
							case "xr_json_array":
							case "xr_json_object":

							var tmp = [];
							Ext.each(node.childNodes,function(nx) {
								//console.info('nx',nx,nx.id);
								tmp.push(nx);
							},this)
							pg.setSource(tmp);

							break;
							case "xr_json_null":
							case "xr_json_boolean":
							case "xr_json_string":
							case "xr_json_number":
							pg.setSource([node]);
							break;
							default: break;
						}
					}
				}
			})),pg]
		});

		var win = Ext.create('Ext.window.Window', {
			border: false,
			title: cfg.title || 'JSON-Viewer',
			height: window.innerHeight*0.6,
			width: window.innerWidth*0.6,
			layout: 'fit',
			items: panel,
			bbar:['Path: ',this.path]
		})
		win.show();
		return win;
	}

});


