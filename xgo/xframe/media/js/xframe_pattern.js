var xframe_pattern = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			//	if (instance == null) {
			instance = new xframe_pattern_(config);
			//			}
			return instance;
		}
	}
})();

var xframe_pattern_ = function(config) {
	this.config = config || {};
};

xframe_pattern_.prototype = {


	/*********************************************************************************************************
	*******
	*******		FORM-PANEL - WIN
	*******
	*******
	*/
	genFormPanelWindow : function(cfg)
	{
		var win = false;
		var fp = this.genFormPanel(cfg,win);

		win = xframe.win({
			frame:false,
			title: cfg.title,
			layout: cfg.layout || null,
			items: fp,
			width: cfg.width || null,
			height: cfg.height || null,
			autoHeight: cfg.autoHeight || null,
			autoWidth: cfg.autoWidth || null
		});
		win.formPanel = fp;
		return win;
	},

	/*********************************************************************************************************
	*******
	*******		FORM-PANEL
	*******
	*******
	*/
	genFormPanel  : function(cfg,win)
	{
		var finalForm = Ext.create('Ext.form.Panel', {
			frame: true,
			border:false,
			bodyStyle: cfg.bodyStyle || {},
			layout:'fit',
			fieldDefaults: {
				msgTarget: 'side',
				anchor: '100%'
			},
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [cfg.items],
			buttons: cfg.buttons
		});
		return finalForm;
	}
}


Ext.define('Ext.ux.CheckboxModelPatched', {
	extend: 'Ext.selection.CheckboxModel'
	,getEditor: function(record,column) {
		return false;
		try{
			return callParent([record,column]);
		} catch(e) {
			return false;
		}
	}

});

Ext.define('OLD_STUFF_Ext.ux.tree.TreeEditing', {
	alias: 'plugin.treeediting'
	,extend: 'Ext.grid.plugin.CellEditing'
	/**
	* @override
	* @private Collects all information necessary for any subclasses to perform their editing functions.
	* @param record
	* @param columnHeader
	* @returns {Object} The editing context based upon the passed record and column
	*/
	,clicksToEdit : 2
	,getEditingContext: function(record, columnHeader) {
		var me = this,
		grid = me.grid,
		store = grid.store,
		rowIdx,
		colIdx,
		view = grid.getView(),
		root = grid.getRootNode(),
		value;

		// If they'd passed numeric row, column indices, look them up.
		if (Ext.isNumber(record)) {
			rowIdx = record;
			record = root.getChildAt(rowIdx);
		} else {
			rowIdx = root.indexOf(record);
		}
		if (Ext.isNumber(columnHeader)) {
			colIdx = columnHeader;
			columnHeader = grid.headerCt.getHeaderAtIndex(colIdx);
		} else {
			colIdx = columnHeader.getIndex();
		}

		value = record.get(columnHeader.dataIndex);

		return {
			grid: grid,
			record: record,
			field: columnHeader.dataIndex,
			value: value,
			row: view.getNode(rowIdx),
			column: columnHeader,
			rowIdx: rowIdx,
			colIdx: colIdx
		};
	}

});//eo class


Ext.define('Ext.xf.form.SearchField', {
	extend: 'Ext.form.field.Trigger',
	alias: 'widget.xfsearchfieldOld',

	trigger1Cls: Ext.baseCSSPrefix + 'form-clear-trigger',
	trigger2Cls: Ext.baseCSSPrefix + 'form-search-trigger',

	hasSearch : false,
	paramName : '_query',

	enableKeyEvents: true,

	listeners : {
		keypress: function(me)
		{
			var delay = 300;
			if (me.waitFnc) clearTimeout(me.waitFnc);
			me.waitFnc = setTimeout(function(){
				me.onTrigger2Click.call(me);
			},delay);
		}
	},

	initComponent: function(){
		this.callParent(arguments);
		this.on('specialkey', function(f, e){
			if(e.getKey() == e.ENTER){
				this.onTrigger2Click();
			}
		}, this);
	},

	afterRender: function(){
		this.callParent();
		this.triggerEl.item(0).setDisplayed('none');
	},

	onTrigger1Click : function(){
		var me = this,
		store = me.store,
		proxy = store.getProxy(),
		val,
		store2 = false,
		proxy2 = false;

		if (me.store2)
		{
			store2 = me.store2;
			proxy2 = store2.getProxy();
		}

		if (me.hasSearch) {
			me.setValue('');

			proxy.extraParams[me.paramName] = '';
			proxy.extraParams.start = 0;
			if (!store.skipQuery) {
				store.load();
			}

			if (proxy2)
			{
				proxy2.extraParams[me.paramName] = '';
				proxy2.extraParams.start = 0;
				if (!store2.skipQuery) {
					store2.load();
				}
			}

			me.hasSearch = false;
			me.triggerEl.item(0).setDisplayed('none');
			me.doComponentLayout();
		}
	},

	onTrigger2Click : function(){
		var me = this,
		store = me.store,
		proxy = store.getProxy(),
		value = me.getValue(),
		store2 = false,
		proxy2 = false;

		if (me.store2)
		{
			store2 = me.store2;
			proxy2 = store2.getProxy();
		}

		if (value.length < 1) {
			me.onTrigger1Click();
			return;
		}

		proxy.extraParams[me.paramName] = value;
		proxy.extraParams.start = 0;

		if (!store.skipQuery) {
			store.load();
		}

		if (proxy2)
		{
			proxy2.extraParams[me.paramName] = value;
			proxy2.extraParams.start = 0;
			if (!store2.skipQuery) {
				store2.load();
			}
		}

		me.hasSearch = true;
		me.triggerEl.item(0).setDisplayed('block');
		me.doComponentLayout();
	}
});

Ext.define('Ext.xf.SearchField', {
	extend: 'Ext.form.field.Trigger',

	alias: 'widget.xfsearchfield',

	trigger1Cls: Ext.baseCSSPrefix + 'form-clear-trigger',

	trigger2Cls: Ext.baseCSSPrefix + 'form-search-trigger',

	hasSearch : false,
	paramName : '_query',

	initComponent: function() {
		var me = this;

		me.callParent(arguments);
		me.on('specialkey', function(f, e){
			if (e.getKey() == e.ENTER) {
				me.onTrigger2Click();
			}
		});

		// We're going to use filtering
		me.store.remoteFilter = true;

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

		if (me.hasSearch) {
			me.setValue('');

			var proxy = me.store.getProxy();
			proxy.extraParams[me.paramName] = '';
			proxy.extraParams.start = 0;
			me.store.load();

			me.hasSearch = false;
			me.triggerCell.item(0).setDisplayed(false);
			me.updateLayout();
		}
	},

	onTrigger2Click : function(){
		var me = this,
		value = me.getValue();

		var proxy = me.store.getProxy();
		proxy.extraParams[me.paramName] = value;
		proxy.extraParams.start = 0;

		me.store.load();
		me.hasSearch = true;
		me.triggerCell.item(0).setDisplayed(true);
		me.updateLayout();
	}


});

Ext.define('Ext.ux.form.xfsearchfield_struct', {
	extend: 'Ext.form.field.Trigger',
	alias: 'widget.xfsearchfield_struct',

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
		me.store.remoteFilter = true;

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
		var me = this,
		proxy = this.store.getProxy();

		if (me.hasSearch) {
			me.setValue('');

			delete(proxy.extraParams[me.paramName]);
			proxy.extraParams.start = 0;
			this.store.load();

			me.hasSearch = false;
			me.triggerCell.item(0).setDisplayed(false);
			me.updateLayout();
		}
	},

	onTrigger2Click : function(xyz,selectItForMe,callBackXXXX){

		if (typeof selectItForMe == "undefined") selectItForMe = false;

		var me = this,
		proxy = this.store.getProxy(),
		value = me.getValue();

		if (value.length > 0) {

			var params = {
			'_query' : value,
			'loadPaths' : 1
			};

			if (Ext.isObject(this.extraParams))
			{
				Ext.iterate(this.extraParams,function(k,v){
					params[k] = v;
				},this);
			}

			if (this.extraProxyValuesFn)
			{
				var extras = this.extraProxyValuesFn();
				Ext.iterate(extras,function(k,v){
					params[k] = v;
				},this);
			}

			var maskMe = false;

			if (this.maskIt)
			{
				if (typeof this.maskIt == "function")
				{
					maskMe = this.maskIt();
				} else if (typeof this.maskIt != 'undefined')
				{
					maskMe = this.maskIt;
				}
			}

			if (maskMe)
			{
				maskMe.mask("Searching ...");
			}

			console.info('maskMe',maskMe);


			xframe.ajax({
				scope: this,
				url: this.url,
				params : params,
				stateless: function(success,json) {

					if (maskMe)
					{
						maskMe.unmask();
					}

					if (!success)
					{
						xframe.alert('Fehler','Suchen fehlgeschlagen!');
						return;
					}

					if (json.loadPaths.length == 0)
					{
						if (typeof callBackXXXX == "function") {
							callBackXXXX();
						}
					}

					Ext.each(json.loadPaths,function(path,i){

						var finalId = path.pop();
						var expandPath = '0/'+(path.join('/'));


						//expandPath = expandPath.split('0/0').join('0');


						console.info('this.idOfNodes',this.idOfNodes);

						if (selectItForMe) {
							expandPath += '/'+value;
							this.store.treex.selectPath(expandPath,this.idOfNodes,'/',function(){
								Ext.defer(function(){
									var r	 = this.store.getNodeById(finalId);

									var html_node = this.store.treex.getView().getNode(r);
									//Ext.get(html_node).addCls('found_search_node');

									if (typeof callBackXXXX == "function") {
										callBackXXXX();
									}

								},100,this);
							},this);
						} else {

							console.info('expand',expandPath,this.idOfNodes);

							this.store.treex.expandPath(expandPath,this.idOfNodes,'/',function(){
								Ext.defer(function(){

									var r	 = this.store.getNodeById(finalId);
									console.info(r,finalId,path);

									var html_node = this.store.treex.getView().getNode(r);
									Ext.get(html_node).addCls('found_search_node');

									if (typeof callBackXXXX == "function") {
										callBackXXXX();
									}

								},100,this);
							},this);
						}

					},this);


				}
			});


			me.hasSearch = true;
			me.triggerCell.item(0).setDisplayed(true);
			me.updateLayout();
		}
	}
});