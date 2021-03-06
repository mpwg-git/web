var win = false, label = false, nixSelect = 'Container selektieren ...', lastButton = false,getInputPanel = false,getAtomSettingsPanel=false,atomWin=false,but_container=false,but_atom=false;
var lastContainerCfg = {};
var lastContainerHTMLDiv = false;
var fly_debug = false;

function placeContainerWrapper(s,cfgDiv)
{
	var as_name 		= cfgDiv.getAttribute('as_name');
	var psa_id 			= cfgDiv.getAttribute('psa_id');
	var psa_as_id 		= cfgDiv.getAttribute('as_id');

	var cfg = {
		psa_id: psa_id,
		psa_as_id : psa_as_id
	};

	var idx 	= Ext.id();
	var idx2 	= Ext.id();
	var idxButton 	= 'config-container-'+psa_id;

	var box 	= Ext.getBody().createChild({
		id: idx,
		tag:'div',
		psa_id: psa_id,
		cls:'xc_container_cfg_wrapper',
		html: '<div><div class="xc_container_cfg" id="'+idx2+'"></div></div>'
	});

	var b = Ext.get(cfgDiv).getBox();
	//b.y -= 25;
	//b.height = 25;

	Ext.get(idx).setBox(b);

	Ext.create('Ext.Button', {
		id:idxButton,
		text: 'Baustein in Container einfügen',
		renderTo:idx2,
		arrowAlign: 'bottom',
		scope:this,
		handler : function(btn)
		{
			var atoms = xframe_pattern.getInstance().genTree({
				region:'center',
				split: true,
				tools:[],
				button_save: false,
				forceFit:true,
				bbar_add: [{
					id: 'xc_add_atom',
					disabled:true,
					text: 'Am Ende Einfügen',
					handler: function(btn)
					{

						if (!latestAtom)
						{
							xframe.alert('INfo','Bitte zuerst Baustein auswählen!');
							return;
						}

						btn.setDisabled(true);

						var params = Ext.clone(lastContainerCfg);
						params.psa_inline_a_id = latestAtom;

						xframe.ajax({
							scope: this,
							url: '/xgo/xplugs/xredaktor/ajax/render/atomAppend',
							params : params,
							success: function(json) {

								Ext.get(lastContainerHTMLDiv).update(json.container_html);
								enableAtoms(false);
								enableAtoms(true);

								but_container.toggle();
								btn.setDisabled(false);
								win.destroy();

								var psa_id = json.record.psa_id;
								setTimeout(function(){
									enableContainers(false);
									Ext.get(psa_id).addCls('xc_atom_cfg_selected');
									latestAtomClicked = Ext.get(psa_id);
									latestAtomClicked.dom.click();
								},10);

							}
						});

					}
				}] ,
				xstore: {
					load: 	'/xgo/xplugs/xredaktor/ajax/atoms/load',
					loadParams : {
						a_type : 'ATOM',
						a_s_id : xredaktor.getInstance().getCurrentSiteId()
					},
					update: '/xgo/xplugs/xredaktor/ajax/atoms/update',
					insert: '/xgo/xplugs/xredaktor/ajax/atoms/insert',
					insertParams : {
						a_type : 'ATOM',
						a_s_id : xredaktor.getInstance().getCurrentSiteId()
					},
					move: 	'/xgo/xplugs/xredaktor/ajax/atoms/move',
					pid: 	'a_id',
					fields: [
					{name: 'a_name', text:'Name des Bausteins',	type:'string', folder: true, editor: {
						allowBlank: false,
						xtype: 'textfield'
					}},
					{name: 'a_id',			text:'Interne Nummer',	type:'int', 	hidden: true},
					{name: 'a_lastmod',		text:'Letzte Änderung',	type:'string' , hidden: true}
					]
				}
			});

			atoms.on('selectionchange',function(view,selections,options){
				latestAtom = selections[0].data.a_id;
			});
			atoms.on('itemdblclick',function(view,r){
				latestAtom = r.data.a_id;
				Ext.getCmp('xc_add_atom').handler(Ext.getCmp('xc_add_atom'));
			},this);


			win = Ext.create('widget.window', {
				iconCls: 'xf_edit',
				title: 'Baustein Einfügen',
				closable: true,
				closeAction: 'hide',
				width: 1200,
				height: 600,
				layout: 'border',
				bodyStyle: 'padding: 5px;',
				tbar2 : [label,{text:'Neuladen',handler:function(){window.location=window.location}}],
				items: [atoms]
			});

			win.show();



			Ext.getCmp('xc_add_atom').setDisabled(false);
			lastButton = btn;
			lastContainerCfg = cfg;
			lastContainerHTMLDiv = s;
		}
	});
}

function enableContainers(state)
{
	if (!state)
	{
		Ext.each(Ext.query('.xc_container_cfg'),function(div){
			Ext.get(div).remove();
		});
		return;
	}

	Ext.each(Ext.query('.xc_container_start'),function(startOfZone){
		var rel = startOfZone.getAttribute('rel');
		var parent = Ext.get(startOfZone).parent();
		var e_start = 	parent.select('.xc_container_start[rel|='+rel+']').elements[0];
		var e_end 	=	parent.select('.xc_container_end[rel|='+rel+']').elements[0];
		placeContainerWrapper(parent,e_start);
	},this);
}


var latestAtomClicked = false;
var latestAtomClickedPSA = false;
var latestAtomClickedParentDiv = false;
var atoms = false;
var latestAtom = false;

function placeAtomWrapper(e_start,e_end,cfgDiv,parent)
{

	var a_name 			= cfgDiv.getAttribute('a_name');
	var psa_id 			= cfgDiv.getAttribute('psa_id');
	var fp 				= false;

	var idx 	= Ext.id();
	idx = psa_id;
	var idx2 	= Ext.id();

	var box 	= Ext.getBody().createChild({
		id: idx,
		tag:'div',
		cls:'xc_atom_cfg',
		psa_id: psa_id,
		html: '<div id="'+idx2+'"></div>'
	});

	var border = 5;

	var b_s = Ext.get(e_start).getBox();
	var finalBox = b_s;
	var b_e = Ext.get(e_end).getBox();
	var finalBox = {
		x: b_s.x,
		y: b_s.y,
		width: (b_e.x + b_e.width) - b_s.x+border*2,
		height: (b_e.y+b_e.height) - b_s.y+border*2
	};

	var box = Ext.get(idx);

	box.setBox(finalBox);
	box.addClsOnOver('xc_atom_cfg_over');
	box.addClsOnClick('xc_atom_cfg_click');
	box.on('click',function(){


		if (latestAtomClicked)
		{
			latestAtomClicked.removeCls('xc_atom_cfg_selected');
		}

		box.addCls('xc_atom_cfg_selected');

		latestAtomClickedParentDiv 	= parent;
		latestAtomClickedPSA 		= psa_id;
		latestAtomClicked 			= box;

		var atomWin = xframe.win({
			mask: 'Lade Konfiguration ...',
			modal: true,
			title:' '+a_name+' - Einstellungen ['+psa_id+']',
			items: [],
			listeners: {
				scope: this,
				afterrender: function(wini) {
					console.info(arguments);
					wini.el.mask('Lade Daten ...');
				}
			}
		}).show();


		var bbar = [{
			iconCls: 'xr_fly_up',
			text:'Baustein vorreihen',
			handler:function(btn)
			{
				btn.setDisabled(true);

				xframe.ajax({
					scope: this,
					url: '/xgo/xplugs/xredaktor/ajax/render/atomMoveUp',
					params : {
						psa_id: latestAtomClickedPSA
					},
					success: function(json) {
						Ext.get(latestAtomClickedParentDiv).update(json.container_html);
						enableAtoms(false);
						enableAtoms(true);

						setTimeout(function(){
							Ext.get(psa_id).addCls('xc_atom_cfg_selected');
							latestAtomClicked = Ext.get(psa_id);

							btn.setDisabled(false);
						},10);

					}
				});
			}
		},{
			iconCls: 'xr_fly_down',
			text:'Baustein nachreihen',
			handler:function(btn)
			{
				btn.setDisabled(true);
				xframe.ajax({
					scope: this,
					url: '/xgo/xplugs/xredaktor/ajax/render/atomMoveDown',
					params : {
						psa_id: latestAtomClickedPSA
					},
					success: function(json) {
						Ext.get(latestAtomClickedParentDiv).update(json.container_html);
						enableAtoms(false);
						enableAtoms(true);

						setTimeout(function(){
							Ext.get(psa_id).addCls('xc_atom_cfg_selected');
							latestAtomClicked = Ext.get(psa_id);
							btn.setDisabled(false);
						},10);

					}
				});
			}
		},'-',{
			iconCls: 'xr_fly_insert_before',
			text: 'Baustein davor einfügen',
			handler: function()
			{

				var latestAtom2 = false;
				var winA = false;

				var id5 = Ext.id();
				var atomsX = xframe_pattern.getInstance().genTree({
					iconsPrefix: 'xr_atoms',
					region:'center',
					split: true,
					border:false,
					tools:[],
					forceFit:true,
					button_save: false,
					bbar_add: ['->',{
						id:id5,
						text: 'Davor einfügen',
						handler: function(btn)
						{
							btn.setDisabled(true);
							if (!latestAtom2)
							{
								xframe.alert('INfo','Bitte zuerst Baustein auswählen!');
								return;
							}

							xframe.ajax({
								scope: this,
								url: '/xgo/xplugs/xredaktor/ajax/render/atomInsertBefore',
								params : {
									psa_id: latestAtomClickedPSA,
									psa_inline_a_id : latestAtom2
								},
								success: function(json) {
									Ext.get(latestAtomClickedParentDiv).update(json.container_html);
									enableAtoms(false);
									enableAtoms(true);

									winA.destroy();
									atomWin.destroy();


									var psa_id = json.record.psa_id;
									setTimeout(function(){
										Ext.get(psa_id).addCls('xc_atom_cfg_selected');
										latestAtomClicked = Ext.get(psa_id);
										latestAtomClicked.dom.click();
										btn.setDisabled(false);
									},10);

								}
							});
						}
					}] ,
					xstore: {
						load: 	'/xgo/xplugs/xredaktor/ajax/atoms/load',
						loadParams : {
							a_type : 'ATOM',
							a_s_id : xredaktor.getInstance().getCurrentSiteId()
						},
						update: '/xgo/xplugs/xredaktor/ajax/atoms/update',
						insert: '/xgo/xplugs/xredaktor/ajax/atoms/insert',
						insertParams : {
							a_type : 'ATOM',
							a_s_id : xredaktor.getInstance().getCurrentSiteId()
						},
						move: 	'/xgo/xplugs/xredaktor/ajax/atoms/move',
						pid: 	'a_id',
						fields: [
						{name: 'a_name', text:'Name des Bausteins',	type:'string', folder: true, editor: {
							allowBlank: false,
							xtype: 'textfield'
						}},
						{name: 'a_id',			text:'Interne Nummer',	type:'int', 	hidden: true},
						{name: 'a_lastmod',		text:'Letzte Änderung',	type:'string' , hidden: true}
						]
					}
				});

				atomsX.on('selectionchange',function(view,selections,options){
					latestAtom2 = selections[0].data.a_id;
				});

				atomsX.on('itemdblclick',function(view,r){
					latestAtom2 = r.data.a_id;
					Ext.getCmp(id5).handler(Ext.getCmp(id5));
				},this);

				winA = Ext.create('widget.window', {
					title: 'Baustein Einfügen',
					closable: true,
					closeAction: 'hide',
					width: 1200,
					height: 600,
					layout: 'border',
					autoScroll:true,
					bodyStyle: 'padding: 5px;',
					items: [atomsX]
				});

				winA.show();

			}
		},'-',{
			iconCls: 'xf_del',
			text:'Löschen',
			scope:this,
			handler:function()
			{

				xframe.yn({
					title:'Löschen',
					msg: 'Wollen sie wirklich die selektierten Baustein löschen?',
					scope:this,
					handler: function(btn)
					{
						if (btn != 'yes') return;
						//atomWin.mask('Lösche Atom...');
						var params = {
							psa_id: psa_id
						};

						xframe.ajax({
							scope: this,
							url: '/xgo/xplugs/xredaktor/ajax/render/atomRemove',
							params : params,
							success: function(json) {
								Ext.get(parent).update(json.container_html);
								enableAtoms(false);
								enableAtoms(true);
								atomWin.unmask();
								atomWin.close();
							}
						});
					}
				});

			}
		},'-',{
			text:'Abbruch',
			iconCls: 'xf_abort',
			scope: this,
			handler: function() {
				atomWin.close();
			}
		},{
			text: 'Speichern',
			iconCls: 'xf_save',
			scope: this,
			handler: function() {

				var values = fp.getForm().getValues();

				xframe.ajax({
					scope:this,
					url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/saveFormDataByPAS',
					params: {
						psa_id: psa_id,
						psa_json_cfg: Ext.encode(values)
					},
					success: function(json) {

						var current = 	Ext.select('.xc_atom_start[rel|='+psa_id+']').elements[0].nextElementSibling;
						var deleteItems = [];
						var run = true;
						while (run)
						{
							if ((current.getAttribute('rel') == psa_id)) {
								run = false;
							} else
							{
								deleteItems.push(current);
								current = current.nextElementSibling;
							}
						}

						try {
							Ext.get(deleteItems[0]).insertHtml('afterEnd',json.html)

							Ext.each(deleteItems,function(i){
								Ext.get(i).remove();
							},this);
						} catch (e) {

						}


						setTimeout(function(){
							enableAtoms(false);
							enableAtoms(true);
						},10);







						atomWin.close();
					}
				});


			}
		}];



		/***/


		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/gui/loadByPSA_ID',
			params: {
				psa_id: psa_id
			},
			stateless: function(succ,json) {

				if ((!succ) || (!json.gui)) {
					xframe.alert("Fehler!","Konfiguration konnte nicht geladen werden");
					return;
				}

				fp = xredaktor_forms.getInstance().finalize(bbar || [], json.gui);

				fp.on('afterrender',function(){
					fp.getForm().setValues(json.data)
				},this,{buffer:1});

				atomWin.removeAll();
				atomWin.add(fp);
				atomWin.doLayout();

				atomWin.el.unmask();

			}
		});





	},{delay:5});


}

function enableAtoms(state)
{
	if (!state)
	{
		//Ext.getCmp('xc_add_atom_before').setDisabled(true);
		Ext.each(Ext.query('.xc_atom_cfg'),function(div){
			Ext.get(div).remove();
		});
		return;
	}

	Ext.each(Ext.query('.xc_atom_start'),function(startOfZone){

		var rel = startOfZone.getAttribute('rel');
		var parent = Ext.get(startOfZone).parent();

		var e_start = 	Ext.get(startOfZone.id).dom.nextElementSibling;
		var e_end 	=	parent.select('.xc_atom_end[rel|='+rel+']').elements[0].previousElementSibling;

		if (fly_debug)
		{
			console.info('----------------------------------------------------');
			console.info('startOfZone/cfgDiv',	startOfZone);
			console.info('parent',	parent);
			console.info('e_start',	e_start);
			console.info('e_end',	e_end);
		}

		/*if (e_start.id == e_end.id)
		{
		alert('ACHTUNG: Leeren Baustein gefunden');
		console.info('e_start',	e_start);
		console.info('e_end',	e_end);
		}*/

		placeAtomWrapper(e_start,e_end,startOfZone,parent);

	},this);
}















// /xgo/xsplash/login/loaded.php

var suppen = this;

renderMyTime =  function(tm_id,x,j) {

	//console.info('renderMyTime',tm_id);

	if (!this.backupTimeMachine)
	{
		this.backupTimeMachine = xredaktor_timemachine.getInstance().getStoreOfTimemachine();
	}

	if (tm_id == 0) {
		return "";
	}

	if (j.dirty)
	{

		var id_runner = Ext.id();

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/timemachine/loadData',
			params : {
				tm_id: 	tm_id
			},
			stateless: function(succ,json)
			{
				if (!succ) return false;
				$$('#'+id_runner).html(json.tm_name);
			}
		});


		return "<div id ='"+id_runner+"'><span style='background-color:#00b1e7;color:white;'>Update...</span></div>";

	} else {
		//console.info(j);
		return j.raw.psa_tm_name;
	}

};


xredaktor_fly_start = function() {

	Ext.QuickTips.init();

	xredaktor.getInstance().loadAllConfigs(function(){
		xredaktor.getInstance().setCurrentSiteId.call(xredaktor.getInstance(),top.project_id);
	},this);

	/* SHARED */

	label = Ext.create('Ext.form.Label',{
		text:nixSelect
	});

	but_container = Ext.create('Ext.Button', {
		pressed:true,
		iconCls: 'xr_frames_node',
		text:'Container',
		enableToggle: true
	});

	but_atom = Ext.create('Ext.Button', {
		pressed:true,
		iconCls: 'xr_atoms_node',
		text:'Bausteine',
		enableToggle: true
	});

	but_container.on('toggle',function(cfg,state)
	{
		enableContainers(state);
	},this,{delay:10});

	but_atom.on('toggle',function(cfg,state)
	{
		enableAtoms(state);
	},this,{delay:10});

	/* MAIN GUI */



	var box = Ext.getBody().createChild({
		id:'xc_dock',
		tag:'div',
		cls:'xc_dock',
		html: ''
	});

	var dockPanelOffset 	= 6;
	var dockPanelWidth 		= 200;
	var dockedOnPageHeight 	= 0;
	var dockedOnPageMode 	= 'R';
	var dockPanelUseResize	= true;

	Ext.define('PSA_TREE_NODE', {
		extend: 'Ext.data.Model',
		fields: [{name: 'id', type:'int'},{name:'iconCls',type:'string', defaultValue: 'xr_atoms_node'},{name:'text',type:'string'},{name:'psa_tm_id',type:'int'}],
		idProperty : 'id'
	});

	/*
	var storePAS = Ext.create('Ext.data.TreeStore', {
		model: 'PSA_TREE_NODE',
		proxy: {
			type: 'ajax',
			url: '/xgo/xplugs/xredaktor/ajax/psa_tree/load',
			extraParams: {
				p_id: top.p_id
			}
		},
		root: {
			text: 'Dokument',
			id: 0,
			expanded: true
		}
	});

*/
	//storeFields.push();


	var menu = Ext.create('Ext.menu.Menu', {
		style: {
			overflow: 'visible'
		},
		items: [{
			iconCls: 'xf_edit',
			text:'Editieren',
			handler:function() {

				var psa_id = menu.latestRecord.data.id;
				enableContainers(false);

				console.info(Ext.query('.xc_atom_cfg_selected'));
				console.info(Ext.query('.xc_atom_cfg[psa_id="'+psa_id+'"]'));

				Ext.each(Ext.query('.xc_atom_cfg_selected'),function(div){
					Ext.get(div).removeCls('xc_atom_cfg_selected');
				});

				var sel = false;
				Ext.each(Ext.query('.xc_atom_cfg[psa_id="'+psa_id+'"]'),function(div){
					sel = true;
					Ext.get(div).addCls('xc_atom_cfg_selected');
					Ext.get(div).dom.click();
				});

				Ext.each(Ext.query('.xc_container_start[psa_id="'+psa_id+'"]'),function(startOfZone){
					var rel = startOfZone.getAttribute('rel');
					var parent = Ext.get(startOfZone).parent();
					var e_start = 	parent.select('.xc_container_start[rel|='+rel+']').elements[0];
					var e_end 	=	parent.select('.xc_container_end[rel|='+rel+']').elements[0];
					placeContainerWrapper(parent,e_start);
					Ext.getCmp('config-container-'+psa_id).el.dom.click();
				});


			}
		}]
	});

	/*
	var treePAS = Ext.create('Ext.tree.Panel', {
	iconsPrefix: 'xr_atoms',
	store: storePAS,
	viewConfig: {
	plugins: {
	ptype: 'treeviewdragdrop'
	}
	},
	rootVisible: false,
	layout:'fit',
	region: 'center',
	//border:false,
	useArrows: true,
	dockedItems: [{
	xtype: 'toolbar',
	items: [{
	iconCls: 'xf_reload',
	text: 'Neuladen',
	handler: function(){
	storePAS.load();
	}
	},'-',{
	iconCls: 'xf_expand',
	text: 'Aufklappen',
	handler: function(){
	treePAS.expandAll();
	}
	}, {
	iconCls: 'xf_collapse',
	text: 'Einklappen',
	handler: function(){
	treePAS.collapseAll();
	}
	}]
	}],
	listeners: {
	itemcontextmenu : function(Ext_view_View, record,item,index,e,options)
	{
	menu.latestRecord = record;
	menu.showAt(e.xy[0],e.xy[1]);
	e.stopEvent();
	}
	}
	});
	*/


	var fields = [
	{name: 'text',	 			text:'Name', 	folder: true,	type:'string', 	hidden: false, editor: {allowBlank: false,xtype: 'textfield'}},
	{name: 'id',				text:'ID',	 	type:'int', hidden:true},
	{name: 'psa_tm_id', 			text:'TM', type:'string', 	hidden: false, 	width: 50, flex: 0, scope: this, renderer:this.renderMyTime, editor: {xtype:'xr_field_timemachine'}},
	];

	var tree2 = xframe_pattern.getInstance().genTree({
		nodeMenu: menu,
		toolbar_top: [{
			iconCls: 'xf_expand',
			text: 'Aufklappen',
			handler: function(){
				treePAS.expandAll();
			}
		}, {
			iconCls: 'xf_collapse',
			text: 'Einklappen',
			handler: function(){
				treePAS.collapseAll();
			}
		}],
		iconsPrefix: 'xr_atoms',
		button_del:false,
		button_add:false,
		layout:'fit',
		autoLoadDisabled: true,
		loadAuto: false,
		region: 'center',
		iCannotSearch: true,
		split: true,
		width: 300,
		border:false,
		forceFit:true,
		xstore: {
			load: 	'/xgo/xplugs/xredaktor/ajax/psa_tree/load',
			update: '/xgo/xplugs/xredaktor/ajax/psa_tree/update',
			insert: '/xgo/xplugs/xredaktor/ajax/psa_tree/insert',
			remove: '/xgo/xplugs/xredaktor/ajax/psa_tree/remove',
			params: {p_id: top.p_id},
			move: 	'/xgo/xplugs/xredaktor/ajax/timemachine/move',
			pid: 		'id',
			fields: 	fields,
			nameField:	'text'
		}
	});

	tree2.on('afterrender',function(t){
		t.getStore().load();
	},this,{buffer:10})



	treePAS = tree2;






	treePAS.on('itemdblclick',function(tr,r){
		var psa_id = r.data.id;
		$$('.xc_atom_cfg[psa_id="'+psa_id+'"]').click();
	});


	treePAS.on('select',function(rm,r,i,eopts){
		enableContainers(false);
		var psa_id = r.data.id;

		console.info(Ext.query('.xc_atom_cfg_selected'));
		console.info(Ext.query('.xc_atom_cfg[psa_id="'+psa_id+'"]'));

		Ext.each(Ext.query('.xc_atom_cfg_selected'),function(div){
			Ext.get(div).removeCls('xc_atom_cfg_selected');
		});

		var sel = false;
		Ext.each(Ext.query('.xc_atom_cfg[psa_id="'+psa_id+'"]'),function(div){
			sel = true;
			Ext.get(div).addCls('xc_atom_cfg_selected');
		});

		Ext.each(Ext.query('.xc_container_start[psa_id="'+psa_id+'"]'),function(startOfZone){
			var rel = startOfZone.getAttribute('rel');
			var parent = Ext.get(startOfZone).parent();
			var e_start = 	parent.select('.xc_container_start[rel|='+rel+']').elements[0];
			var e_end 	=	parent.select('.xc_container_end[rel|='+rel+']').elements[0];
			placeContainerWrapper(parent,e_start);
		});

	},this);

	var editAtoms = Ext.create('Ext.panel.Panel',{
		border:false,
		iconCls: 'xr_pages_node',
		title: 'Seiten-Struktur',
		layout:'border',
		items:[treePAS]
	});

	var dockPanelTabs = Ext.create('Ext.tab.Panel',{
		border:false,
		items:[editAtoms]
	});

	var dockPanel = Ext.create('Ext.panel.Panel', {
		width: dockPanelWidth,
		layout:'fit',
		border:false,
		minWidth: 0,
		tbar: ['->',but_container,but_atom],
		tools2: [{
			type: 'left',
			handler: function(){
				dockPanelResizer.resizeTo(dockPanelOffset);
			}
		}],
		items:[dockPanelTabs],
		listeners: {
			afterrender : function(p)
			{
				setTimeout(function(){
					p.setWidth(p.getWidth()-dockPanelOffset);
				},1);
			}
		}
	});
	var initDisplay = false;
	var startX = document.body.clientWidth-dockPanelWidth;

	doLayoutOfDock = function()
	{
		dockPanelUseResize = false;
		var animate = true;

		if (!initDisplay) animate=false;

		var w = document.body.clientWidth;
		var h = Ext.getBody().getViewSize().height;
		var hasVScroll = document.body.scrollHeight > document.body.clientHeight;

		if (hasVScroll)
		{
			// Get the computed style of the body element
			var cStyle = document.body.currentStyle||window.getComputedStyle(document.body, "");

			// Check the overflow and overflowY properties for "auto" and "visible" values
			hasVScroll = cStyle.overflow == "visible"
			|| cStyle.overflowY == "visible"
			|| (hasVScroll && cStyle.overflow == "auto")
			|| (hasVScroll && cStyle.overflowY == "auto");
		}


		switch(dockedOnPageMode)
		{
			case 'R':
			if (floatingDockPanel.collapsed) floatingDockPanel.expand(animate);
			floatingDockPanel.setPosition(w-dockPanelWidth,0,animate);
			floatingDockPanel.setHeight(h);
			floatingDockPanel.setWidth(dockPanelWidth);
			break;
			case 'L':
			if (floatingDockPanel.collapsed) floatingDockPanel.expand(animate);
			floatingDockPanel.setPosition(0,0,animate);
			floatingDockPanel.setHeight(h);
			floatingDockPanel.setWidth(dockPanelWidth);
			break;
			case 'F':
			floatingDockPanel.setHeight(dockedOnPageHeight);
			break;
			default: break;
		}

		dockPanelUseResize = true;
		if (!initDisplay)
		{
			floatingDockPanel.show();
		}
		initDisplay = true;
	}

	var floatingDockPanel = Ext.create('Ext.tab.fTPanel', {
		width: dockPanelWidth,
		height: document.body.clientHeight,
		collapsible: true,
		layout: 'fit',
		title: 'xGo-fly',
		closable: false,
		iconCls: 'xr_icon',
		headerPosition: 'top',
		tools: [{
			type:'left',
			handler:function()
			{
				dockedOnPageMode = 'L';
				doLayoutOfDock();
			}
		},{
			type:'right',
			handler:function()
			{
				dockedOnPageMode = 'R';
				doLayoutOfDock();
			}
		},{
			type:'unpin',
			tooltip:'Fixe Position',
			handler: function()
			{
				floatingDockPanel.el.enableShadow(true);
				floatingDockPanel.removeCls('xc_dock_fixed');
			}
		},{
			type:'pin',
			tooltip:'Mitfahrende Position',
			handler: function()
			{
				floatingDockPanel.addCls('xc_dock_fixed');
				floatingDockPanel.el.disableShadow();
			}
		},{
			itemId: 'refresh',
			type: 'refresh',
			handler: function(){
				window.location = window.location;
			}
		}, {
			tooltip:'Konfiguration',
			type: 'gear',
			handler: function(event, target, owner, tool){

				xredaktor_gui.getInstance().showPageSettings({
					p_id: top.p_id
				});

			}
		}],
		items: [dockPanel],
		listeners: {
			scope: this,
			buffer: 10,
			afterrender:function() {
				dockedOnPageHeight = floatingDockPanel.getHeight();
				doLayoutOfDock();
			},
			resize: function(p,w,h)
			{
				if (dockedOnPageMode == 'F') {
					dockPanelWidth = w;
					dockedOnPageHeight = h;
				} else
				{
					if (dockPanelUseResize)
					{
						dockPanelWidth = w;
					}
				}
			}
		}
	});
	//}).showAt(startX,0);

	floatingDockPanel.on('dragstart',function(){
		dockedOnPageMode = 'F';
	},this);

	floatingDockPanel.on('dragend',function(){
		doLayoutOfDock();
	},this);


	Ext.EventManager.onWindowResize(function(){
		doLayoutOfDock();
	},this);


	floatingDockPanel.on('afterrender',function(){
		floatingDockPanel.addCls('xc_dock_fixed');
		floatingDockPanel.el.disableShadow();
	},this);


	floatingDockPanel.show();


	setTimeout(function(){
		enableAtoms(true);
		enableContainers(true);
	},500);

};