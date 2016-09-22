var win = false, label = false, nixSelect = 'Container selektieren ...', lastButton = false;
var lastContainerCfg = {};
var lastContainerHTMLDiv = false;

function placeContainerWrapper(s,cfgDiv)
{
	var containerName 	= cfgDiv.getAttribute('as_name');
	var a_id 			= cfgDiv.getAttribute('a_id');
	var as_id 			= cfgDiv.getAttribute('as_id');
	var p_id 			= cfgDiv.getAttribute('p_id');
	var psa_id 			= cfgDiv.getAttribute('psa_id');

	var cfg = {
		psa_a_id: a_id,
		psa_as_id: as_id,
		psa_p_id: p_id,
		psa_id: psa_id
	};

	var idx 	= Ext.id();
	var idx2 	= Ext.id();

	var box 	= Ext.getBody().createChild({
		id: idx,
		tag:'div',
		cls:'xc_container_cfg',
		html: '<div id="'+idx2+'"></div>'
	});

	var b = Ext.get(s).getBox();
	b.y -= 25;
	b.height = 25;

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

					label.setText(containerName);
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

	var b_s = Ext.get(e_start).getBox();
	var b_e = Ext.get(e_end).getBox();

	var border = 5;

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
		Ext.getCmp('xc_atom_config_panel').setDisabled(false);
		latestAtomClickedParentDiv = parent;

		latestAtomClickedPSA = psa_id;
		latestAtomClicked = box;
		Ext.getCmp('xc_add_atom_before').setDisabled(false);

		Ext.getCmp('xc_left_tabpanel').setActiveTab(atoms);
		Ext.getCmp('xc_right_tabpanel').setActiveTab(Ext.getCmp('xc_atom_config_panel'));

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

		var e_start = 	parent.select('.xc_atom_start[rel|='+rel+']').elements[0].nextSibling;
		var e_end 	=	parent.select('.xc_atom_end[rel|='+rel+']').elements[0].previousSibling;

		placeAtomWrapper(e_start,e_end,startOfZone,parent);

	},this);
}

Ext.onReady(function(){

	var latestAtom = false;
	var button = false;
	var idx = Ext.id();
	var box = Ext.getBody().createChild({
		id: idx,
		tag:'div',
		cls:'xc_layout_window'
	});

	label = Ext.create('Ext.form.Label',{
		text:nixSelect
	});


	var but_container = Ext.create('Ext.Button', {
		text:'Konfiguriere Container',
		enableToggle: true
	});

	but_container.on('toggle',function(cfg,state)
	{
		enableContainers(state);
	},this,{delay:10});

	var but_atom = Ext.create('Ext.Button', {
		text:'Konfiguriere Bausteine',
		enableToggle: true
	});

	but_atom.on('toggle',function(cfg,state)
	{
		enableAtoms(state);
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
					url: '../../ajax/render/atomAppend',
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
					url: '../../ajax/render/atomInsertBefore',
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
			load: 	'../../ajax/atoms/load',
			loadParams : {
				a_isFrame : 'N'
			},
			update: '../../ajax/atoms/update',
			insert: '../../ajax/atoms/insert',
			insertParams : {
				a_isFrame : 'N'
			},
			move: 	'../../ajax/atoms/move',
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
			load: 	'../../ajax/pages/load',
			update: '../../ajax/pages/update',
			insert: '../../ajax/pages/insert',
			move: '../../ajax/pages/move',
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

	win = Ext.create('widget.window', {
		title: 'Layout Fenster',
		closable: true,
		closeAction: 'hide',
		width: 600,
		height: 350,
		layout: 'border',
		bodyStyle: 'padding: 5px;',
		tbar : [but_container,but_atom,'->',label,{text:'Neuladen',handler:function(){window.location=window.location}}],
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
			},{
				title: 'Seitenbaustein',
				html: ''
			},{
				id: 'xc_atom_config_panel',
				disabled: true,
				title: 'Baustein-Konfiguration',
				bbar : [{
					text: 'Löschen',
					handler: function()
					{
						var params = {
							psa_id: latestAtomClickedPSA
						};

						xframe.ajax({
							scope: this,
							url: '../../ajax/render/atomRemove',
							params : params,
							success: function(json) {
								Ext.get(latestAtomClickedParentDiv).update(json.container_html);
								enableAtoms(false);
								enableAtoms(true);
							}
						});

					}
				}],
				html: ''
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

					});
				}
			}
		}
	});

	win.show();

});