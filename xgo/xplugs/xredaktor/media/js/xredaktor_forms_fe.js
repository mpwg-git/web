var xredaktor_forms_fe = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			return new xredaktor_forms_fe_(config);
		}
	}
})();

var xredaktor_forms_fe_ = function(config) {
	this.config = config || {};
};

xredaktor_forms_fe_.prototype = {

	loadAtom: function(a_id,a_type)
	{
		this.a_id 	= a_id;
		this.a_type = a_type;

		console.info("FE",a_id,a_type);

		this.tree_forms.getStore().proxy.extraParams['a_id'] = this.a_id;
		this.tree_forms.getStore().load();

		this.tree_source.getStore().proxy.extraParams['f_id'] = 0;
		this.tree_source.getStore().proxy.extraParams['a_id'] = this.a_id;
		this.tree_source.getStore().load();


		this.tree_final.setDisabled(true);
		//this.tree_final.getStore().removeAll();



	},

	getTree: function()
	{

		var me = this;
		var fields = [
		{name: 'f_name', 		text:'Name',			type:'string', 	folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'f_id',			text:'ID',	type:'int', 	hidden: false, width: 60}
		];

		this.tree_forms = this.tree = xframe_pattern.getInstance().genTree({
			flex: 1,
			minWidth: 200,
			region:'west',
			search:true,
			forceFit:true,
			border:false,
			split: true,
			stateful: false,
			stateId: 'fe_form_tree',
			title: 'Forms',
			plugin_numLines: false,
			button_add: true,
			button_del: true,
			doNotAskForName: false,
			xstore: {

				load: 	'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree/load',
				remove: '/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree/remove',
				update: '/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree/update',
				insert: '/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree/move',

				extraProxyValuesFn: function()
				{
					return {
						a_id: me.a_id
					};
				},

				loadParams : {
					titleIt: 1,
					a_id: this.a_id
				},
				insertParams : {
					a_id: this.a_id
				},
				updateParams : {
					a_id: this.a_id
				},
				removeParams : {
					a_id: this.a_id
				},

				pid: 	'f_id',
				fields: fields
			}
		});


		this.tree_forms.on('selectionchange',function(view,selections,options){

			if (selections.length != 1) {
				if (this.tree_final.getStore())
				{
					//this.tree_final.getStore().removeAll();
				}
				this.tree_final.setDisabled(true);
				return;
			}

			var r 		= selections[0].data;
			this.showFinalFields(r.f_id);

		},this,{buffer:10});



		this.tree_forms.on('itemdblclic2k',function(view,record){
			var r 		= record.data;
			this.showFinalFields(r.f_id);
		},this,{buffer:10});









	},

	getGridSource: function()
	{
		var me = this;

		var xas = xredaktor_atoms_settings.getInstance();

		var fields = [
		{name: 'as_id', 				text:'ID', 				type:'string', width:50, hidden:true},
		{name: 'as_name', 				text:'Name', 			type:'string', flex:1, folder:true},
		{name: 'as_label', 				text:'Label', 			type:'string', flex:1},
		{name: 'as_type', 				text:'Type', scope: xas, renderer: xas.handleAsType, flex:1 },
		];

		this.tree_source = xframe_pattern.getInstance().genTree({

			viewConfig: {
				plugins: {

					ptype: 'treeviewdragdrop',
					//ddGroup: group,

					sortOnDrop: true,
					containerScroll: true,

					dragGroup: 'DND_FORMS_DRAG',
					dropGroup: this.dnd_group_final,


				},
				copy: true
				,
				listeners: {


					drop: function(node, data, dropRec, dropPosition) {
						var dropOn = dropRec ? ' ' + dropPosition + ' ' + dropRec.get('name') : ' on empty view';
						console.info('Drag from right to left', 'Dropped ' + data.records[0].get('name') + dropOn);
					}
				}
			},

			width: 600,


			stateful: false,
			stateId: 'fe_form_tree_sources_2',

			btnExpandAll: true,
			btnCollapseAll: true,

			title: 'Source Fields',
			region: 'center',
			filters: true,
			search:true,
			forceFit:true,
			border:false,
			split: true,
			records_move:true,
			pager:true,
			plugin_numLines: false,
			button_add: false,
			button_del: false,

			xstore: {

				load: 			'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_source/load',
				remove: 		'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_source/remove',
				updateCheck: 	'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_source/updateCheck',
				update: 		'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_source/update',
				insert: 		'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_source/insert',
				move: 			'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_source/move',

				extraProxyValuesFn: function()
				{
					return {
						a_id: me.a_id
					};
				},

				loadParams : {
					a_id: this.a_id
				},
				insertParams : {
					a_id: this.a_id
				},
				updateParams : {
					a_id: this.a_id
				},
				updateParamsByRecordValue : {
					checkId : 'checkId'
				},
				removeParams : {
					a_id: this.a_id
				},

				pid: 	'as_id',
				fields: fields
			}
		});


		this.tree_source.getStore().on('beforeappend',function(tree,node) {

			node.data.fas_type = 'AS';

			if (node.raw.children_cnt != "0")
			{
				node.data.fas_type = 'FOLDER';
				node.data.iconCls = "xr_as_folder";

			} else {

				if (!this.atom_types_store.getNodeById(node.data.as_type))
				{
					node.data.iconCls = "xr_field_not_installed";
				} else
				{
					node.data.iconCls = this.atom_types_store.getNodeById(node.data.as_type).data.iconCls;
				}

			}

			if (typeof this.f_id != 'undefined')
			{
				//node.data.expanded = true;
			}

		},this);

		this.tree_source.on('itemdblclick',function(view,record){


			var fas_type = record.data.fas_type;
			if (fas_type != 'AS')
			{
				return false;
			}

			var sel = this.tree_final.getSelectionModel().getSelection();
			console.info("sel",sel);

			var node 			=  this.tree_final.getRootNode();
			var fas_fid 		= 0;
			var gui_type_papsch = 'ROOT';


			if (sel.length > 1) return false; // Multiple x nix=>root
			if (sel.length == 1)
			{

				node 			= sel[0];
				fas_fid 		= node.data.fas_id;
				gui_type_papsch = node.data.fas_gui_type;
				fas_type 		= node.data.fas_type;

				if (fas_type == 'ROOT')
				{
					gui_type_papsch = 'ROOT';
				}

			}

			console.info('gui_type_papsch',gui_type_papsch,node);

			switch(gui_type_papsch)
			{
				case '':
				case 'grid':
				return false;
				break;

				case 'ROOT':
				case 'row':
				case 'tabpanel':
				case 'step':
				case 'fieldcontainer':
				case 'grid_column':
				default: break;
			}

			var post = {
				fas_type: 'AS',
				fas_fid: fas_fid,
				fas_f_id: this.f_id,
				fas_as_id: record.data.as_id,
				fas_id: 0
			};

			this.tree_final.mask('Update');

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/drop',
				params: post,
				success: function(json){
					json.db.leaf = true;
					var newNode = node.appendChild(json.db);
					this.tree_final.unmask();
				},
				failure: function(json){
					this.tree_final.unmask();
				},
				failure_msg: xframe.lang('MOVE_NODE_FAILED')
			});



		},this,{buffer:1})


	},


	showFinalFields: function(f_id)
	{

		console.info('FormId',f_id);
		this.f_id = f_id;
		this.panel_preview.loadSrc('/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/render/?f_id='+f_id);

		var me = this;

		setTimeout(function(){

			me.tree_final.getStore().proxy.extraParams['f_id'] = f_id;
			me.tree_final.getStore().load();
			me.tree_final.setDisabled(false);

		},5);

		setTimeout(function(){

			me.tree_source.getStore().proxy.extraParams['f_id'] = f_id;
			me.tree_source.getStore().load();

		},10);

		//	this.guiFormSettings.expand();

		setTimeout(function(){
			xredaktor_forms.getInstance().renderInfoPoolRecord(me.panelFormSettings,536,f_id);
		},100);


	},

	rendererName: function(value, metaData, record)
	{
		if (value != "") return value;
		return record.data.fas_gui_type;
	},

	rendererSkipGuis: function(value, metaData, record)
	{

		switch(record.data.fas_gui_type)
		{

			case 'grid':
			return value;
			break;
			case 'grid_column':
			return value;
			break;

			default: break;
		}


		if (record.data.fas_type != 'AS') return "-";
		return value;
	},

	getGridFinal: function()
	{
		var me = this;
		var xas = xredaktor_atoms_settings.getInstance();

		var fields = [

		{name: 'as_name', 				text:'Name', 			type:'string', width: 300, flex:1, folder: true, hidden: false, renderer:this.rendererName},
		{name: 'fas_id', 				text:'ID', 				type:'int', width:30, flex: 0, hidden:true},




		{name: 'fas_type', 				text:'TYPE', 			type:'string', width:50, hidden: true},
		{name: 'fas_gui_type', 			text:'GUI-TYPE', 		type:'string', width:50, hidden: true},
		{name: 'fas_sort', 				text:'SORT', 			type:'int', width:50, hidden: true},

		{name: 'fas_as_id', 			text:'AS-ID', 			type:'string', width:50, hidden: true},






		{name: 'as_type', 				text:'Type', 			scope: xas, renderer: xas.handleAsType, flex:1, hidden: true},

		{name: 'fas_placeholder', 		text:'placehodler',		hidden: true, type:'string', flex:1, editor: {allowBlank: false, xtype: 'textfield',selectOnFocus:true}},
		{name: 'fas_required', 			text:'required', 		hidden: true, type:'string', flex:1, xtype: 'combo', store : [['Y','Ja'],['N','Nein']]},
		{name: 'fas_validator', 		text:'validator', 		hidden: true, type:'string', flex:1, xtype: 'combo', store : [['','KEINER'],['EMAIL','E-Mail'],['NOT_EMPTY','Befüllt'],['NUMERIC','Nummerisch']]},

		{name: 'fas_col_xs', 			text:'xs', 				type:'int', width: 50,flex:0, editor: {allowBlank: false, xtype: 'numberfield',selectOnFocus:true, minValue:0, maxValue:12}, renderer: this.rendererSkipGuis},
		{name: 'fas_col_sm', 			text:'sm', 				type:'int', width: 50,flex:0, editor: {allowBlank: false, xtype: 'numberfield',selectOnFocus:true, minValue:0, maxValue:12}, renderer: this.rendererSkipGuis},
		{name: 'fas_col_md', 			text:'md', 				type:'int', width: 50,flex:0, editor: {allowBlank: false, xtype: 'numberfield',selectOnFocus:true, minValue:0, maxValue:12}, renderer: this.rendererSkipGuis},
		{name: 'fas_col_lg', 			text:'lg', 				type:'int', width: 50,flex:0, editor: {allowBlank: false, xtype: 'numberfield',selectOnFocus:true, minValue:0, maxValue:12}, renderer: this.rendererSkipGuis},

		{name: 'fas_row', 				text:'row', 			hidden: true, type:'int', flex:1, editor: {allowBlank: false, xtype: 'numberfield',selectOnFocus:true}},
		{name: 'fas_css_class', 		text:'css', 			hidden: true, type:'string', flex:1, editor: {allowBlank: false, xtype: 'textfield',selectOnFocus:true}},

		{name: 'fas_name', 				text:'Label', 			type:'string', flex:1, editor: {allowBlank: true, xtype: 'textfield',selectOnFocus:true}, hidden: false},

		];

		this.tree_final = xframe_pattern.getInstance().genTree({


			root_cfg: {

				expanded: true,
				fas_type: 'ROOT',
				fas_id: 0,

			},

			viewConfig: {
				plugins: {

					ptype: 'treeviewdragdrop',
					//ddGroup: group,

					sortOnDrop: true,
					containerScroll: true,

					dragGroup: 'DND_FORMS_DRAG',
					dropGroup: 'DND_FORMS_DRAG'
				}
				,
				listeners: {

					scope: this,

					beforedrop: function(node, data, overModel, dropPosition, dropHandlers, eOpts) {

						if (data.records.length > 1) return false;
						if (!data.records[0]['data']['fas_type']) return false;

						var record = data.records[0];

						if (record.data.fas_id > 0)
						{
							if (dropPosition == 'before') return true; // NIXDA IMMA STIMMTA
							if (dropPosition == 'after') return true; // NIXDA IMMA STIMMTA
						}


						var fas_type_papsch	= overModel.data.fas_type;
						var fas_type 		= record.data.fas_type;

						console.info(fas_type_papsch,fas_type);

						switch(fas_type)
						{
							case 'GUI':

							if (fas_type_papsch == 'AS') return false;
							if (fas_type_papsch == 'ROOT')
							{

								var gui_type = record.data.fas_gui_type;
								switch (gui_type)
								{
									case 'tab':
									return false;
									break;
									case 'row':
									return true;
									case 'tabpanel':
									return true;
									break;
									case 'step':
									return false;
									break;
									case 'fieldcontainer':
									return true;
									break;
									case 'grid':
									return true;
									break;
									case 'grid_column':
									return false;
									break;
									default: return false;
								}
							}

							if (fas_type_papsch == 'GUI')
							{

								var gui_type_papsch = overModel.data.fas_gui_type;
								var gui_type 		= record.data.fas_gui_type;

								/*

								tab
								tabpanel
								step
								fieldcontainer
								grid
								grid_column

								*/

								switch (gui_type_papsch)
								{
									case 'tab':
									switch(gui_type)
									{
										case 'tab':
										return false;
										break;
										case 'row':
										return true;
										case 'tabpanel':
										return true;
										break;
										case 'step':
										return false;
										break;
										case 'fieldcontainer':
										return true;
										break;
										case 'grid':
										return true;
										break;
										case 'grid_column':
										return false;
										break;
										default: return false;
									}
									break;

									case 'row':
									switch(gui_type)
									{
										case 'tab':
										return false;
										break;
										case 'row':
										return false;
										case 'tabpanel':
										return true;
										break;
										case 'step':
										return false;
										break;
										case 'fieldcontainer':
										return true;
										break;
										case 'grid':
										return true;
										break;
										case 'grid_column':
										return false;
										break;
										default: return false;
									}
									break;

									case 'tabpanel':

									switch(gui_type)
									{
										case 'tab':
										return true;
										break;
										case 'row':
										return false;
										case 'tabpanel':
										return false;
										break;
										case 'step':
										return false;
										break;
										case 'fieldcontainer':
										return false;
										break;
										case 'grid':
										return false;
										break;
										case 'grid_column':
										return false;
										break;
										default: return false;
									}


									break;

									case 'step_____________':

									switch(gui_type)
									{
										case 'row':
										return true;
										case 'tabpanel':
										return true;
										break;
										case 'step':
										return false;
										break;
										case 'fieldcontainer':
										return true;
										break;
										case 'grid':
										return true;
										break;
										case 'grid_column':
										return false;
										break;
										default: return false;
									}


									break;
									case 'fieldcontainer':


									switch(gui_type)
									{
										case 'tab':
										return false;
										break;
										case 'row':
										return true;
										case 'tabpanel':
										return false;
										break;
										case 'step':
										return false;
										break;
										case 'fieldcontainer':
										return true;
										break;
										case 'grid':
										return true;
										break;
										case 'grid_column':
										return false;
										break;
										default: return false;
									}

									break;
									case 'grid':

									switch(gui_type)
									{
										case 'tab':
										return false;
										break;
										case 'row':
										return false;
										case 'tabpanel':
										return false;
										break;
										case 'step':
										return false;
										break;
										case 'fieldcontainer':
										return false;
										break;
										case 'grid':
										return false;
										break;
										case 'grid_column':
										return true;
										break;
										default: return false;
									}

									break;
									case 'grid_column':

									switch(gui_type)
									{
										case 'tab':
										return false;
										break;
										case 'row':
										return true;
										case 'tabpanel':
										return true;
										break;
										case 'step':
										return false;
										break;
										case 'fieldcontainer':
										return true;
										break;
										case 'grid':
										return true;
										break;
										case 'grid_column':
										return false;
										break;
										default: return false;
									}

									break;
									default: break;
								}

							}



							break;
							case 'AS':

							if (fas_type_papsch == 'ROOT') return true;
							var gui_type_papsch = overModel.data.fas_gui_type;

							switch(gui_type_papsch)
							{
								case 'tab':
								case 'row':
								return true;
								case 'tabpanel':
								return false;
								break;
								case 'step':
								return true;
								break;
								case 'fieldcontainer':
								return true;
								break;
								case 'grid':
								return false;
								break;
								case 'grid_column':
								return true;
								break;
								default: return false;
							}

							break;

							case 'ROOT':
							case 'FOLDER':
							return false;
							break;

							default: break;
						}

						return false;
					},

					drop: function(node, data, overModel, dropPosition, dropHandlers, eOpts) {

						var papaId 		= overModel.raw.fas_id;
						var record 		= data.records[0];

						var fas_type 	= record.data.fas_type;

						var fas_id 		= parseInt(record.data.fas_id,10);
						if (isNaN(fas_id)) fas_id = 0;

						if (fas_id > 0) return false;

						var post = false;

						switch(fas_type)
						{
							case 'AS':
							var as_id 	= record.data.as_id;
							var as_type = record.data.as_type;
							console.info("as",as_id,as_type);


							post = {

								fas_type: 'AS',
								fas_fid: papaId,
								fas_f_id: me.f_id,
								fas_as_id: as_id,
								fas_id: fas_id

							};



							break;
							case 'GUI':
							var gui_type = record.data.fas_gui_type;
							console.info("gui",gui_type);

							post = {
								fas_type: 'GUI',
								fas_fid: papaId,
								fas_f_id: me.f_id,
								fas_gui_type: gui_type,
								fas_id: fas_id
							};

							break;
							default: break;
						}

						console.info('post',post);
						if (!post) return;

						xframe.ajax({
							scope: this,
							url: '/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/drop',
							params: post,
							success: function(json){

								record.set(json.db);

							},
							failure: function(json){
								me.tree_final.getStore().load();
							},
							failure_msg: xframe.lang('MOVE_NODE_FAILED')
						});
					}
				}
			},


			/*
			stateful: true,
			stateId: 'fe_form_tree_final_2',

			*/

			title: 'Final Fields',
			region: 'center',
			filters: true,
			search:true,
			forceFit:true,
			border:false,
			split: true,
			records_move:true,
			pager:true,
			plugin_numLines: true,
			button_add: false,
			button_del: true,

			width: 300,

			btnExpandAll: true,
			btnCollapseAll: true,

			rootVisible: true,

			xstore: {

				load: 			'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/load',
				remove: 		'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/remove',
				updateCheck: 	'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/updateCheck',
				update: 		'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/update',
				insert: 		'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/insert',
				move: 			'/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/move',

				loadParams : {
					a_id: this.a_id,
					f_id: this.f_id
				},
				insertParams : {
					a_id: this.a_id,
					f_id: this.f_id
				},
				updateParams : {
					a_id: this.a_id,
					f_id: this.f_id
				},
				updateParamsByRecordValue : {
					checkId : 'checkId'
				},
				removeParams : {
					a_id: this.a_id,
					f_id: this.f_id
				},

				pid: 	'fas_id',
				fields: fields
			}
		});



		this.tree_final.getStore().on('beforeappend',function(tree,node) {

			//node.data.expanded = true;

			var fas_type = node.data.fas_type;

			console.info('fas_type',fas_type);

			switch(fas_type)
			{
				case 'AS':

				if (this.atom_types_store.getNodeById(node.data.as_type))
				{
					node.data.iconCls = this.atom_types_store.getNodeById(node.data.as_type).data.iconCls;
				}

				break;
				case 'GUI':

				var fas_gui_type = node.data.fas_gui_type;
				console.info('fas_gui_type',fas_gui_type);

				if (this.gui_types_store.getNodeById(fas_gui_type))
				{
					node.data.iconCls = this.gui_types_store.getNodeById(fas_gui_type).data.iconCls;
				}
				break;
				default: break;
			}

		},this);


		this.tree_final.on('afterrender',function(){

			console.info("-------------------------------------------------------");
			this.tree_final.getStore().load();

		},this);


		this.tree_final.on('beforeitemmove',function(node,oldParent,newParent,index,options) {

			var params = {
				id : node.data['fas_id'],
				ofid: oldParent.data['fas_id'],
				nfid: newParent.data['fas_id'],
				sort: index
			};

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/move',
				params: params,
				success: function(json){
				},
				failure: function(json){
					store.load();
				},
				failure_msg: xframe.lang('MOVE_NODE_FAILED')
			});
			return true;
		},this);

		this.tree_final.on('selectionchange',function(view,selections,options){

			if (selections.length != 1) {
				this.panelItemSettings.setDisabled(true);
				return;
			}

			this.panelItemSettings.setDisabled(false);

			var fas_id = selections[0].data.fas_id;
			this.showConfigOfFas(fas_id);

		},this,{buffer:10});



	},

	getFormSettings: function()
	{
		this.panelFormSettings = Ext.widget({
			xtype: 'panel',
			title: 'Settings',
			border: false
		});

		this.panelItemSettings = Ext.widget({
			xtype: 'panel',
			title: 'Item-Settings',
			border: false
		});



	},


	showConfigOfFas: function(fas_id)
	{
		this.panelItemSettings.setTitle("Item-Settings");
		this.panelItemSettings.removeAll();

		if (fas_id == 0)
		{
			this.panelItemSettings.setDisabled(true);
			return false;
		}

		this.panelItemSettings.setDisabled(false);



		console.info('showConfigOfFas',fas_id);
		this.panelItemSettings.expand();



		this.panelItemSettings.mask('Loading');

		xframe.ajax({

			scope: this,
			url: '/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/getInfosOfFasItem',
			params: {
				fas_id: fas_id
			},
			stateless: function(success, json){

				var txt_err = "NO CONFIGURATION";
				this.panelItemSettings.unmask();

				if (!success)
				{
					this.panelItemSettings.update(txt_err);
					return;
				}

				if (json.wz_vid && json.wz_r_id)
				{
					this.panelItemSettings.setTitle(json.wz_title+" - Settings");
					xredaktor_forms.getInstance().renderInfoPoolRecord(this.panelItemSettings, json.wz_vid, json.wz_r_id, true)
				} else
				{
					this.panelItemSettings.update(txt_err);
				}

			},
			failure_msg: xframe.lang('FAS_FETCH_FAILD')
		});





	},


	getGuiStuff: function()
	{
		this.guiFormSettings = Ext.widget({
			xtype: 'xr_field_gui_type',
			title: 'Layout',
			region: 'north',
			height: 300
		});

		this.guiFormSettings.on('itemdblclick',function(view,record){

			var gui_type = record.data.fas_gui_type;
			console.info("gui",gui_type);
			var sel = this.tree_final.getSelectionModel().getSelection();
			console.info("sel",sel);


			var node 	=  this.tree_final.getRootNode();
			var fas_fid = 0;

			if (sel.length > 0)
			{
				var node = sel[0];
				fas_fid = node.data.fas_id;
			}

			var post = {
				fas_type: 'GUI',
				fas_fid: fas_fid,
				fas_f_id: this.f_id,
				fas_gui_type: gui_type,
				fas_id: 0
			};


			this.tree_final.mask('Update');

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xredaktor/ajax/gui/forms_fe_tree_final/drop',
				params: post,
				success: function(json){
					var newNode = node.appendChild(json.db);
					this.tree_final.unmask();
				},
				failure: function(json){
					this.tree_final.unmask();
				},
				failure_msg: xframe.lang('MOVE_NODE_FAILED')
			});



		},this,{buffer:1})

	},


	getMainPanel : function(a_id, a_type)
	{

		var u = Ext.create('Ext.xr.field_atom_type',{});
		this.atom_types_store = u.getStoreX();

		var u2 = Ext.create('Ext.xr.field_gui_type',{});
		this.gui_types_store = u2.getStoreX();



		var me = this;

		this.a_id 	= a_id;
		this.a_type = a_type;

		this.dnd_group_source 	= 'dnd_'+Ext.id();
		this.dnd_group_final	= 'dnd_'+Ext.id();

		this.getTree();
		this.getGridSource();
		this.getGridFinal();
		this.getGuiStuff();
		this.getFormSettings();

		this.tree_menu_left = Ext.widget({

			width: 200,
			border: false,
			region: 'west',
			title: 'FE Form Builder',
			xtype: 'panel',
			layout: 'accordion',
			animate: false,
			split: true,

			items: [

			this.tree_forms,
			this.panelFormSettings,
			this.panelItemSettings

			]
		});

		this.panel_preview = Ext.widget({
			xtype: 'xr_iframe',
			title: 'Preview FE',
			layout: 'fit',
			src: ''
		});



		this.panels_east = Ext.widget({
			xtype: 'panel',
			layout: 'border',
			region: 'east',
			width: 200,
			split: true,
			border: false,

			items: [this.tree_source,this.guiFormSettings]
		});



		this.panel_configs = Ext.widget({
			title: 'Configuration',
			xtype: 'panel',//xr_iframe
			layout: 'border',
			border: false,
			items: [this.tree_final,this.panels_east]
		});


		this.panel_work = Ext.widget({
			xtype: 'tabpanel',
			region: 'center',
			items: [this.panel_configs,this.panel_preview]
		});

		var gui = Ext.widget({
			xtype: 'panel',
			title: 'FE-FORMS',
			layout: 'border',

			stateful: false,
			stateId: 'fe_form_mainpanel_holder',

			items: [this.tree_menu_left,this.panel_work]

		});

		this.tree_source.on('afterrender',function(g){
			console.info('--------------------------------------------------');
			//this.tree_source.setWidth(200);
		},this,{buffer:100});

		gui.loadAtom = function(a_id,a_type)
		{
			me.loadAtom.call(me,a_id,a_type);
		}

		return gui;
	}

}