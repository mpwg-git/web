var win = false, label = false, nixSelect = 'Container selektieren ...', lastButton = false,getInputPanel = false,getAtomSettingsPanel=false,atomWin=false;
var lastContainerCfg = {};
var lastContainerHTMLDiv = false;

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

	var box 	= Ext.getBody().createChild({
		id: idx,
		tag:'div',
		cls:'xc_container_cfg_wrapper',
		html: '<div><div class="xc_container_cfg" id="'+idx2+'"></div></div>'
	});

	/*var box 	= Ext.getBody().createChild({
	id: idx,
	tag:'div',
	cls:'xc_container_cfg_wrapper',
	html: '<div><div class="xc_container_cfg" id="'+idx2+'"></div></div>'
	});*/

	var b = Ext.get(cfgDiv).getBox();
	//b.y -= 25;
	//b.height = 25;

	Ext.get(idx).setBox(b);

	Ext.create('Ext.Button', {
		enableToggle: true,
		text: 'Container Konfigurieren',
		renderTo:idx2,
		arrowAlign: 'bottom',
		listeners:
		{
			toggle : function(btn,state)
			{

				if (state)
				{
					if (lastButton)
					{
						lastButton.toggle();
					}

					getInputPanel.refactory(psa_id);

					label.setText(as_name);
					Ext.getCmp('xc_add_atom').setDisabled(false);
					Ext.getCmp('xc_bausteine').setDisabled(false);

					lastButton = btn;
					lastContainerCfg = cfg;
					lastContainerHTMLDiv = s;

				} else
				{
					label.setText(nixSelect);
					Ext.getCmp('xc_add_atom').setDisabled(false);
					Ext.getCmp('xc_bausteine').setDisabled(true);

					if (lastButton == Ext.getCmp(idx2))
					{
						lastButton = false;
					}
				}
			}
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

	Ext.getCmp('xc_left_tabpanel').setActiveTab(atoms);

	Ext.each(Ext.query('.xc_container_start'),function(startOfZone){

		var rel = startOfZone.getAttribute('rel');
		var parent = Ext.get(startOfZone).parent();

		var e_start = 	parent.select('.xc_container_start[rel|='+rel+']').elements[0];
		var e_end 	=	parent.select('.xc_container_end[rel|='+rel+']').elements[0];

		//placeContainerWrapper(e_start,e_end)
		placeContainerWrapper(parent,e_start);

	},this);
}


var latestAtomClicked = false;
var latestAtomClickedPSA = false;
var latestAtomClickedParentDiv = false;
var atoms = false;

function placeAtomWrapper(e_start,e_end,cfgDiv,parent)
{

	var a_name 			= cfgDiv.getAttribute('a_name');
	var psa_id 			= cfgDiv.getAttribute('psa_id');

	var idx 	= Ext.id();
	var idx2 	= Ext.id();

	var box 	= Ext.getBody().createChild({
		id: idx,
		tag:'div',
		cls:'xc_atom_cfg',
		html: '<div id="'+idx2+'"></div>'
	});


	//console.info('e_start',e_start);
	//console.info('e_end',e_end);
	var border = 5;

	var b_s = Ext.get(e_start).getBox();
	var finalBox = b_s;

	try{
		var b_e = Ext.get(e_end).getBox();
		var finalBox = {
			x: b_s.x,
			y: b_s.y,
			width: (b_e.x + b_e.width) - b_s.x+border*2,
			height: (b_e.y+b_e.height) - b_s.y+border*2
		};

	} catch(e) {};

	var box = Ext.get(idx);
	//console.info(box);
	box.setBox(finalBox);
	box.addClsOnOver('xc_atom_cfg_over');
	box.addClsOnClick('xc_atom_cfg_click');
	box.on('click',function(){
		if (latestAtomClicked)
		{
			latestAtomClicked.removeCls('xc_atom_cfg_selected');
		}

		box.addCls('xc_atom_cfg_selected');
		Ext.getCmp('xc_atom_config_panel').setDisabled(false);
		latestAtomClickedParentDiv = parent;

		latestAtomClickedPSA = psa_id;
		latestAtomClicked = box;
		Ext.getCmp('xc_add_atom_before').setDisabled(false);

		Ext.getCmp('xc_left_tabpanel').setActiveTab(atoms);
		Ext.getCmp('xc_right_tabpanel').setActiveTab(Ext.getCmp('xc_atom_config_panel'));


		//getAtomSettingsPanel.refactory(psa_id);

		var getExtraAtomSettingsPanel = xredaktor_atoms_settings.getInstance().getInputPanel({
			title: ''
		});

		var atomWin = xframe.win({
			title:'Bausteinkonfig',
			items: getExtraAtomSettingsPanel,
			justHideOnClose: true
		});
		getExtraAtomSettingsPanel.win = atomWin;
		getExtraAtomSettingsPanel.button_save = function(json)
		{

			var e_start = 	parent.select('.xc_atom_start[rel|='+psa_id+']').elements[0].nextSibling;
			var current = 	parent.select('.xc_atom_start[rel|='+psa_id+']').elements[0].nextSibling;

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

			Ext.get(deleteItems[0]).insertHtml('afterEnd',json.html)

			Ext.each(deleteItems,function(i){
				//Ext.get(i).insertHtml('afterEnd',json.html)
				Ext.get(i).remove();
			},this);


			//	parent.select('.xc_atom_start[rel|='+psa_id+']').elements[0].insertAfter(json.html);

			enableAtoms(false);
			enableAtoms(true);
		}
		getExtraAtomSettingsPanel.button_save_scope = this;
		getExtraAtomSettingsPanel.button_abort = function()
		{
			enableAtoms(false);
			enableAtoms(true);
		}
		getExtraAtomSettingsPanel.button_abort_scope = this;
		atomWin.on('afterrender',function(){
			getExtraAtomSettingsPanel.refactory(psa_id);
		},this);
		atomWin.show();


	},{delay:5});


}

function enableAtoms(state)
{
	if (!state)
	{
		Ext.getCmp('xc_add_atom_before').setDisabled(true);
		Ext.each(Ext.query('.xc_atom_cfg'),function(div){
			Ext.get(div).remove();
		});
		return;
	}

	Ext.each(Ext.query('.xc_atom_start'),function(startOfZone){

		var rel = startOfZone.getAttribute('rel');
		var parent = Ext.get(startOfZone).parent();

		//console.info(rel);

		var e_start = 	parent.select('.xc_atom_start[rel|='+rel+']').elements[0].nextSibling;
		var e_end 	=	parent.select('.xc_atom_end[rel|='+rel+']').elements[0].previousSibling;

		placeAtomWrapper(e_start,e_end,startOfZone,parent);

	},this);
}

Ext.onReady(function(){


	xredaktor.getInstance().loadAllConfigs();


	var latestAtom = false;
	var button = false;

	var idx = Ext.id();
	var box = Ext.getBody().createChild({
		id: idx,
		tag:'div',
		cls:'xc_layout_window'
	});


	var but_atom_id = Ext.id();
	var box2 = Ext.getBody().createChild({
		id: but_atom_id,
		tag:'div',
		cls:'xc_layout_window_button_atom'
	});
	
	var but_cont_id = Ext.id();
	var box3 = Ext.getBody().createChild({
		id: but_cont_id,
		tag:'div',
		cls:'xc_layout_window_button_container'
	});

	label = Ext.create('Ext.form.Label',{
		text:nixSelect
	});


	var but_container = Ext.create('Ext.Button', {
		renderTo: but_cont_id,
		text:'Konfiguriere Container',
		enableToggle: true
	});

	but_container.on('toggle',function(cfg,state)
	{
		enableContainers(state);
	},this,{delay:10});

	var but_atom = Ext.create('Ext.Button', {
		renderTo: but_atom_id,
		pressed:true,
		text:'Konfiguriere Bausteine',
		enableToggle: true
	});

	but_atom.on('toggle',function(cfg,state)
	{
		enableAtoms(state);
		win.hide();
	},this,{delay:10});

	atoms = xframe_pattern.getInstance().genTree({
		id: 'xc_bausteine',
		region:'west',
		split: true,
		title: 'Bausteine',
		bbar_add: [{
			id: 'xc_add_atom',
			disabled:true,
			text: 'Anfügen',
			handler: function()
			{
				if (!latestAtom)
				{
					xframe.alert('INfo','Bitte zuerst Baustein auswählen!');
					return;
				}

				var params = Ext.clone(lastContainerCfg);
				params.psa_inline_a_id = latestAtom;

				xframe.ajax({
					scope: this,
					url: '/xcdrive/xplugs/xredaktor/ajax/render/atomAppend',
					params : params,
					success: function(json) {
						Ext.get(lastContainerHTMLDiv).update(json.container_html);
					}
				});
			}
		},{
			id: 'xc_add_atom_before',
			disabled:true,
			text: 'Davor einfügen',
			handler: function()
			{
				if (!latestAtom)
				{
					xframe.alert('INfo','Bitte zuerst Baustein auswählen!');
					return;
				}

				xframe.ajax({
					scope: this,
					url: '/xcdrive/xplugs/xredaktor/ajax/render/atomInsertBefore',
					params : {
						psa_id: latestAtomClickedPSA,
						psa_inline_a_id : latestAtom
					},
					success: function(json) {
						Ext.get(latestAtomClickedParentDiv).update(json.container_html);
						enableAtoms(false);
						enableAtoms(true);
					}
				});
			}
		}] ,
		xstore: {
			load: 	'/xcdrive/xplugs/xredaktor/ajax/atoms/load',
			loadParams : {
				a_isFrame : 'N'
			},
			update: '/xcdrive/xplugs/xredaktor/ajax/atoms/update',
			insert: '/xcdrive/xplugs/xredaktor/ajax/atoms/insert',
			insertParams : {
				a_isFrame : 'N'
			},
			move: 	'/xcdrive/xplugs/xredaktor/ajax/atoms/move',
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



	var pages = xframe_pattern.getInstance().genTree({
		region:'west',
		split: true,
		title: 'Seitenbaum',
		cMenu : [{
			text:'Öffnen',
			handler:function(r)
			{
				window.location.href = "http://xcore.donefor.me/xcdrive/xplugs/xredaktor/ajax/render/page?p_id="+r.p_id;
			}
		}],
		xstore: {
			load: 	'/xcdrive/xplugs/xredaktor/ajax/pages/load',
			update: '/xcdrive/xplugs/xredaktor/ajax/pages/update',
			insert: '/xcdrive/xplugs/xredaktor/ajax/pages/insert',
			move: '/xcdrive/xplugs/xredaktor/ajax/pages/move',
			pid: 	'p_id',
			fields: [
			{name: 'p_name',		text:'Name der Seite',	type:'string', folder: true, editor: {
				allowBlank: false,
				xtype: 'textfield'
			}},
			{name: 'p_id',			text:'Interne Nummer',	type:'int', hidden: true},
			{name: 'p_lastmod',		text:'Letzte änderung',	type:'string' , hidden: true},
			{name: 'p_isOnline',	text:'Online',			type:'string', xtype: 'combo', store : [['Y','JA'],['N','NEIN']]}
			]
		}
	});

	getInputPanel = xredaktor_atoms_settings.getInstance().getInputPanel({
		title: 'Seitenbaumkonfiguration'
	});

	getInputPanel.setTitle('Seitenbaumkonfiguration');

	getAtomSettingsPanel = xredaktor_atoms_settings.getInstance().getInputPanel({
		title: 'Seitenbaumkonfiguration'
	});


	win = Ext.create('widget.window', {
		title: 'Layout Fenster',
		closable: true,
		closeAction: 'hide',
		width: 1200,
		height: 600,
		layout: 'border',
		bodyStyle: 'padding: 5px;',
		tbar : [label,{text:'Neuladen',handler:function(){window.location=window.location}}],
		items: [{
			id:'xc_left_tabpanel',
			region: 'west',
			width: 200,
			split: true,
			splitmode : 'mini',
			floatable: false,
			xtype: 'tabpanel',
			items: [pages,atoms]
		}, {
			id:'xc_right_tabpanel',
			region: 'center',
			xtype: 'tabpanel',
			items: [{
				title: 'Seiteneinstellungen',
				html: ''
			},getInputPanel,{
				id: 'xc_atom_config_panel',
				disabled: true,
				autoscroll:true,
				title: 'Baustein-Konfiguration',
				layout:'border',
				bbar : [{
					text: 'Löschen',
					handler: function()
					{
						var params = {
							psa_id: latestAtomClickedPSA
						};

						xframe.ajax({
							scope: this,
							url: '/xcdrive/xplugs/xredaktor/ajax/render/atomRemove',
							params : params,
							success: function(json) {
								Ext.get(latestAtomClickedParentDiv).update(json.container_html);
								enableAtoms(false);
								enableAtoms(true);
							}
						});

					}
				}],
				items:[getAtomSettingsPanel]
			}]
		}]
	});

	button = Ext.create('Ext.Button', {
		renderTo: idx,
		text: 'Layout Fenster zeigen/schließen',
		listeners : {
			click : function()
			{
				if (win.isVisible()) {
					win.hide(this, function() {

					});
				} else {
					win.show(this, function() {
						win.setPagePosition(100,100);
					});
				}
			}
		}
	});



	//win.show();

	enableAtoms(true);

});