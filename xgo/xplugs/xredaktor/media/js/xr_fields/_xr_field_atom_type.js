
Ext.define('Ext.xr.field_atom_type', {
	extend: 'Ext.ux.TreePicker',
	alias: 'widget.xr_field_atom_type',

	config: {
		displayField : 'label',
		doWidth: 500,
		width: 300,
		minWidth: 300,
	},

	constructor: function(cnfg){
		cnfg.store = this.getStoreX();
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},




	getStoreX: function(){

		var data = {
			label:		"Feld-Typen",
			iconCls:	'xr_field_gui_root',
			as_type: 	Ext.id(),
			expanded: true,
			children: [

			{
				label: 		'Noch nicht gesetzt',
				as_type: 	"UNDEFINED",
				iconCls:	'xr_field_not_set',
				expanded: 	true,
			},


			
			
			
			
			
			{
				label: 		'Basic-Felder',
				as_type: 	Ext.id(),
				iconCls:	'xr_field_gui_folder',
				expanded: true,
				children:[
				{
					label:		'Farbe',
					as_type:	'COLOR',
					leaf:true,
					iconCls:	'xr_field_color'
				},{
					label:		'Verlinkung',
					as_type:	'LINK',
					leaf:true,
					iconCls:	'xr_field_link'
				},{
					label:		'Textzeile',
					as_type:	'TEXT',
					leaf:true,
					iconCls:	'xr_field_text'
				},
				{
					label:		'Textfeld (Mehrzeilig)',
					as_type:	'TEXTAREA',
					leaf:true,
					iconCls:	'xr_field_textarea'
				},
				{
					label:		'Passwort (MD5)',
					as_type:	'MD5PASSWORD',
					leaf:true,
					iconCls:	'xr_field_md5password'
				},
				{
					label:		'Html',
					as_type:	'HTML',
					leaf:true,
					iconCls:	'xr_field_html'
				},
				{
					label:		'Dropdown / Combobox',
					as_type:	'COMBO',
					leaf:true,
					iconCls:	'xr_field_combo',
					btn_cfg: true
				},
				{
					label:		'Radiobuttons',
					as_type:	'RADIO',
					leaf:true,
					iconCls:	'xr_field_radio',
					btn_cfg: true
				},
				{
					label:		'Checkboxen',
					as_type:	'CHECKBOX',
					leaf:true,
					iconCls:	'xr_field_checkbox',
					btn_cfg: true
				},
				{
					label:		'Ja/Nein',
					as_type:	'YN',
					leaf:true,
					iconCls:	'xr_field_yn'
				},
				{
					label:		'Datum',
					as_type:	'DATE',
					leaf:true,
					iconCls:	'xr_field_date'
				},
				{
					label:		'Uhrzeit',
					as_type:	'TIME',
					leaf:true,
					iconCls:	'xr_field_time'
				},
				{
					label:		'Datum+Uhrzeit (Timestamp)',
					as_type:	'TIMESTAMP',
					leaf:true,
					iconCls:	'xr_field_timestamp'
				},
				{
					label:		'Ganzezahle',
					as_type:	'INT',
					leaf:true,
					iconCls:	'xr_field_int'
				},
				{
					label:		'Gleitkommazahl',
					as_type:	'FLOAT',
					leaf:true,
					iconCls:	'xr_field_float'
				},
				{
					label:		'JSON Daten',
					as_type:	'JSON',
					leaf:true,
					iconCls:	'xr_field_json'
				}
				]
			}
			
			
			,{
				label: 		'Filearchiv',
				as_type: 	Ext.id(),
				iconCls:	'xr_field_gui_folder',
				expanded: true,
				children:[
				{
					label:		'Bild',
					as_type:	'IMAGE',
					leaf:true,
					iconCls:	'xr_field_img'
				},
				{
					label:		'Video',
					as_type:	'VIDEO',
					leaf:true,
					iconCls:	'xr_field_video'
				},
				{
					label:		'Bilder',
					as_type:	'CONTAINER-IMAGES',
					leaf:true,
					iconCls:	'xr_field_container-images',
					btn_cfg: true
				},
				{
					label:		'Datein',
					as_type:	'CONTAINER-FILES',
					leaf:true,
					iconCls:	'xr_field_container-files',
					btn_cfg: true
				},
				{
					label:		'Verzeichnis',
					as_type:	'DIR',
					leaf:true,
					iconCls:	'xr_field_dir'
				},
				{
					label:		'File',
					as_type:	'FILE',
					leaf:true,
					iconCls:	'xr_field_file'
				}
				]
			}
			
			,
			

			

			{
				label: 		'Widgets',
				as_type: 	Ext.id(),
				iconCls:	'xr_field_img_gallery',
				expanded: true,
				children:[
				{
					label:		'Bildergalerie',
					as_type:	'IMG_GALLERY',
					leaf:true,
					iconCls:	'xr_field_img_gallery',
					btn_cfg: true,
					btn_init_disabled: true
				}
				]

			},{
				label: 		'Container',
				as_type: 	Ext.id(),
				iconCls:	'xr_field_gui_folder',
				expanded: true,
				children:[
				{
					label:		'Collector',
					as_type:	'COLLECTOR',
					leaf:true,
					iconCls:	'xr_field_gui_collector',
					btn_init_disabled: true
				},{
					label:		'Stamper',
					as_type:	'STAMPER',
					leaf:true,
					iconCls:	'xr_field_stamper',
					btn_init_disabled: true,
					btn_cfg: true
				},{
					label:		'Bausteine',
					as_type:	'CONTAINER',
					leaf:true,
					iconCls:	'xr_field_container',
					btn_multilang_disabled: true,
					btn_init_disabled: true
				},
				{
					label:		'Bausteine-Liste',
					as_type:	'ATOMLIST',
					leaf:true,
					iconCls:	'xr_field_atomlist',
					btn_cfg: true,
					btn_init_disabled: true
				}
				]

			},{
				label: 		'Relationen',
				as_type: 	Ext.id(),
				iconCls:	'xr_field_gui_folder',
				expanded: true,
				children:[
				{
					label:		'Infopool-Datensatz',
					as_type:	'INFOPOOL_RECORD',
					leaf:true,
					iconCls:	'xr_field_infopool_record'
				},{
					label:		'Wizard-Datensatz',
					as_type:	'WIZARD',
					leaf:true,
					iconCls:	'xr_field_wizard',
					btn_cfg: true
				},
				{
					label:		'Generische Verknüpfung (n:n)',
					as_type:	'SIMPLE_W2W',
					leaf:true,
					iconCls:	'xr_field_simple_w2w',
					guiMode: {'0':'Checkboxen','1':'Combobox (1:n)','2':'Grid (n:n)','3':'Tree (n:n)'},
					btn_cfg: true
				},
				{
					label:		'Eindeutige Verknüpfung (n:n) - Feldbezogen',
					as_type:	'UNIQUE_W2W',
					leaf:true,
					iconCls:	'xr_field_unique_w2w',
					guiMode: {'0':'Checkboxen','1':'Combobox (1:n)','2':'Grid (n:n)','3':'Tree (n:n)'},
					btn_cfg: true
				},

				{
					label:		'Wizard-Datensatz-Liste (1:n)',
					as_type:	'WIZARDLIST',
					leaf:true,
					iconCls:	'xr_field_wizardlist',
					btn_cfg: true
				},
				{
					label:		'Wizard - Wizard (n:n) [deprecated]',
					as_type:	'WIZARD2WIZARD',
					leaf:true,
					iconCls:	'xr_field_wizard2wizard',
					btn_cfg: true
				},
				{
					label:		'Remote Feld',
					as_type:	'REMOTE_FIELD',
					leaf:true,
					iconCls:	'xr_field_remote_field',
					btn_cfg: true
				},
				{
					label:		'Remote Wizard Record',
					as_type:	'REMOTE_RECORD',
					leaf:true,
					iconCls:	'xr_field_remote_record',
					btn_cfg: true
				}
				]
			}
			,{
				label: 		'System',
				as_type: 	Ext.id(),
				iconCls:	'xr_field_gui_folder',
				expanded: true,
				children:[
				{
					label:		'Wizard',
					as_type:	'WID',
					leaf:true,
					iconCls:	'xr_field_wid'
				},
				{
					label:		'Wizard-Attribute',
					as_type:	'WATTRIBUTE',
					leaf:true,
					iconCls:	'xr_field_wattribute',
					btn_cfg: false// Scopen auf ein Attrib
				},
				{
					label:		'Seite',
					as_type:	'PAGE',
					leaf:true,
					iconCls:	'xr_field_page'
				},
				{
					label:		'Seitenelement',
					as_type:	'FRAME',
					leaf:true,
					iconCls:	'xr_field_frame'
				},
				{
					label:		'Baustein',
					as_type:	'ATOM',
					leaf:true,
					iconCls:	'xr_field_atom'
				},{
					label:		'Timemachine',
					as_type:	'TIMEMACHINE',
					leaf:true,
					iconCls:	'xr_field_timemachine',
					btn_init_disabled: true
				},
				{
					label:		'Action',
					as_type:	'ACTION',
					leaf:true,
					iconCls:	'xr_field_action',
					btn_cfg: true
				}
				]
			}

			,


			{
				label: 		'GEO-Daten',
				as_type: 	Ext.id(),
				iconCls:	'xr_field_gui_folder',
				expanded: true,
				children:[
				{
					label:		'Punkt',
					as_type:	'GEO-POINT',
					leaf:true,
					iconCls:	'xr_field_geo-point'
				},
				{
					label:		'Geo-Polygon',
					as_type:	'GEO-POLY',
					leaf:true,
					iconCls:	'xr_field_geo-poly'
				}
				]
			}


			]};

			Ext.define('xr_field_atom_type', {
				extend: 'Ext.data.Model',
				fields: [
				{name: 'as_type', 	type: 'string'},
				{name: 'label', 	type: 'string'},
				{name: 'guiMode'},
				{name: 'btn_init_disabled'},
				{name: 'btn_cfg'},
				{name: 'iconCls'},
				],
				idProperty : 'as_type'
			});

			var store = Ext.create('Ext.data.TreeStore', {
				model: 'xr_field_atom_type',
				proxy: {
					type: 'memory'
				},
				folderSort: true
			});

			var rootNode = store.setRootNode(data);

			return store;
	}

});


