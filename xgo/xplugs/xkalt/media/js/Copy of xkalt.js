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

    renderer_bestellung: function(value, meta, r) {

        if (r.data.wz_status == 'NEU')
		{
			meta.style = 'background-color:blue;color:white;';
			
		} else if (r.data.wz_status == 'Zimmer weg' || r.data.wz_status == 'Will nicht' || r.data.wz_status == 'TelNr = 0')
		{
			meta.style = 'background-color:gray;color:white;';
				
		} else if (r.data.wz_status == 'Nicht erreicht' || r.data.wz_status == 'Ja' || r.data.wz_status == 'Anderes')
		{
			meta.style = 'background-color:yellow;color:black;';
				
		} else if (r.data.wz_status == 'Mail verschickt' || r.data.wz_status == 'Aktiviert') 
		{
			meta.style = 'background-color:#7FFF00;color:black;';
			
		} else
		{
			meta.style = 'background-color:blue;color:white;';
		}

		return value;

    },



    createPanel_bestellungen: function() {
        this.panel_bestellungen = Ext.create('Ext.Panel', {
            title: 'Bestellungen',
            region: 'west',
            layout: 'fit',
            width: 400,
            split: true,
            border: false,
            items: []
        });
		

        var fields = [

            {
                name: 'wz_id',
                text: 'Nummer',
                type: 'int',
                hidden: false,
                folder: true,
                header: true,
                width: 50,
                flex: 0,
                renderer: this.renderer_bestellung,
                renderer_scope: this
            }, {
                name: 'wz_status',
                text: 'Status',
                type: 'string',
                hidden: false,
                header: true
            }, {
                name: 'wz_BEARBEITET_TS',
                text: 'Erledigt-Zeitpunkt',
                type: 'string',
                hidden: false,
                header: true
            }, {
                name: 'wz_lastChanged',
                text: 'LastChanged',
                type: 'string',
                hidden: false,
                header: true
            }, {
                name: 'wz_created',
                text: 'Erstellt',
                type: 'string',
                hidden: false,
                header: false
            }, {
                name: 'images_cnt',
                text: 'Bilder',
                type: 'string',
                hidden: false,
                header: true
            }, {
                name: 'size',
                text: 'm²',
                type: 'string',
                hidden: false,
                header: true
            }, {
                name: 'total',
                text: '€',
                type: 'string',
                hidden: false,
                header: true
            }, {
                name: 'wz_phone',
                text: 'TelNR',
                type: 'string',
                hidden: false,
                header: true
            }, {
                name: 'wz_log',
                text: 'Kommentar',
                type: 'string',
                hidden: false,
                header: true
            }, {
                name: 'quelle',
                text: 'Quelle',
                type: 'string',
                hidden: false,
                header: false
            }, {
                name: 'url',
                text: 'Quell-URL',
                type: 'string',
                hidden: true,
                header: false
            }, {
                name: 'wz_HASH',
                text: 'Hash',
                type: 'string',
                hidden: false,
                header: false
            }, {
                name: 'wz_BEARBEITET',
                text: 'Erledigt',
                type: 'string',
                hidden: true,
                header: false,
                width: 40
            }, {
                name: 'user',
                text: 'E-Benutzer',
                type: 'string',
                hidden: false,
                header: false
            },



        ];

        this.panel_bestellungen = xframe_pattern.getInstance().genGrid({


            region: 'west',
            width: 200,
            forceFit: true,
            border: false,
            title: 'Bestellungen',
            split: true,
            collapseMode: 'mini',
            button_del: true,
            button_add: false,
            search: true,
            records_move: false,
            pager: true,
            toolbar_top: [],

            xstore: {
                load: '/xgo/xplugs/xkalt/call/xkalt/overview/load',
                remove: '/xgo/xplugs/xkalt/call/xkalt/overview/remove',
                params: {
                    initSort: Ext.encode([{

                        'property': 'images_cnt',
                        'direction': 'desc',

                    }])
                },
                pid: 'wz_id',
                fields: fields
            },
            listeners: {
                scope: this,
                buffer: 1,
                afterrender: function(t) {
                    t.getStore().load();
                }
            }
        });

        this.panel_bestellungen.on('selectionchange', function(view, selections, options) {

            var bestellId = 0;
            var hash = 0;
            var r = false;


            if (selections.length == 1) {
                bestellId = selections[0].data.wz_id;
                hash = selections[0].raw.wz_HASH;
                r = selections[0].raw;
            }

            this.loadBestellung(bestellId, hash, r);
        }, this);



        return this.panel_bestellungen;
    },

    loadBestellung: function(id, latestHash, r) {
        var me = this;
        this.latestBestellungShown = id;
        this.latestHash = latestHash;
        this.latestRecord = r;

        this.panel_details.setDisabled((id == 0));

        if (id == 0) {
            this.panel_order.loadSrc("about:blank");
            this.panel_details.setTitle('Keinen Room aktuell ausgewählt');
        } else {
            this.panel_order.mask('Lade Raum ...');
            var sel = '#' + this.panel_order.id + ' iframe';

            $$(sel).unbind('load');
            $$(sel).load(function() {
                me.panel_order.unmask();
            });

            //914b5fc9e60739d6930025d3a9404788

            this.panel_order.loadSrc("/de/room/" + this.latestBestellungShown + "?h=" + this.latestHash);
            this.panel_details.setTitle('Aktionen für: ' + id);

        }

        this.panel_details.store.proxy.extraParams['b_id'] = id;

        setTimeout(function() {
            me.panel_details.store.load();
        }, 10);
    },

    createPanel_order: function() {
        this.panel_order = Ext.widget({
            region: 'center',
            xtype: 'xr_iframe',
            title: 'Bestell Details',
            layout: 'fit',
            src: ''
        });

        return this.panel_order;
    },


    button_done: function() {

        xframe.yn({
            title: 'Bestellung abschließen',
            msg: 'Bestellung #' + this.latestBestellungShown + ' als nicht ERLEDIGT setzen ?',
            scope: this,
            handler: function(btn) {

                if (btn != 'yes') return;

                xframe.ajax({
                    scope: this,
                    url: '/xgo/xplugs/xkalt/call/xkalt/done/',
                    params: {
                        b_id: this.latestBestellungShown
                    },
                    stateless: function(succ, json) {
                        this.panel_details.store.load();
                        this.panel_bestellungen.store.load();
                    }
                });


            }
        });

    },


    button_openQuelle: function() {
        var quelle = this.latestRecord['quelle'];
        var baseUrl = "";

        switch (quelle) {
            case 'wg-gesucht':
                baseUrl = "http://wg-gesucht.de/";
                break;
            default:
                break;
        }

        var link = this.latestRecord['url'];
        var l = baseUrl + link;

        window.open(l, link);
    },

    button_openRoom: function() {
        var l = "/de/room/" + this.latestBestellungShown + "?h=" + this.latestHash;
        window.open(l, this.latestHash);
    },

    button_notDone: function() {

        xframe.yn({
            title: 'Room',
            msg: 'Room #' + this.latestBestellungShown + 'als nicht NICHT erledigt setzen ?',
            scope: this,
            handler: function(btn) {

                if (btn != 'yes') return;

                xframe.ajax({
                    scope: this,
                    url: '/xgo/xplugs/xkalt/call/xkalt/notDone/',
                    params: {
                        b_id: this.latestBestellungShown
                    },
                    stateless: function(succ, json) {
                        this.panel_details.store.load();
                        this.panel_bestellungen.store.load();
                    }
                });

            }
        });

    },

    button_sendMail: function() {

        var email = this.getEmail2Resend();
        xframe.yn({
            title: 'Room Einladung senden',
            msg: 'Raum #' + this.latestBestellungShown + ' an <b>' + email + '</b> senden ?',
            scope: this,
            handler: function(btn) {

                if (btn != 'yes') return;

                xframe.ajax({
                    scope: this,
                    url: '/xgo/xplugs/xkalt/call/xkalt/sendMail/',
                    params: {
                        b_id: this.latestBestellungShown,
                        email: email
                    },
                    stateless: function(succ, json) {
                        this.panel_details.store.load();
                        this.panel_bestellungen.store.load();
                    }
                });


            }
        });

    },

    getEmail2Resend: function() {
        return Ext.getCmp(this.email2sendId).getValue();
    },

    button_kommentar: function() {
        var comment = Ext.getCmp(this.kommentarId).getValue();
        var phone = Ext.getCmp(this.phoneId).getValue();
        var state = Ext.getCmp(this.stateId).getValue();

        xframe.ajax({
            scope: this,
            url: '/xgo/xplugs/xkalt/call/xkalt/addComment/',
            params: {
                b_id: this.latestBestellungShown,
                comment: comment,
                phone: phone,
                state: state

            },
            stateless: function(succ, json) {
                this.panel_details.store.load();
            }
        });
    },



    createPanel_details: function() {

        this.email2sendId = Ext.id();
        this.kommentarId = Ext.id();
        this.phoneId = Ext.id();
        this.stateId = Ext.id();

        var fields = [{
            name: 'wz_id',
            text: 'ID',
            type: 'int',
            hidden: false,
            folder: true,
            header: true,
            width: 50,
            flex: 0
        }, {
            name: 'wz_created',
            text: 'Zeitpunkt',
            type: 'string',
            hidden: false,
            header: true,
            width: 120
        }, {
            name: 'user',
            text: 'Benutzer',
            type: 'string',
            hidden: false,
            header: true,
            width: 80
        }, {
            name: 'wz_log',
            text: 'Info',
            type: 'string',
            hidden: false,
            header: true
        }, {
            name: 'wz_phone',
            text: 'TelNR',
            type: 'string',
            hidden: false,
            header: true
        }, {
            name: 'wz_status',
            text: 'Status',
            type: 'string',
            hidden: false,
            header: true
        }, ];


        var stateStore = Ext.create('Ext.data.Store', {

            fields: ['abbr', 'status'],
            data: [{
                "abbr": "ZW",
                "status": "Zimmer weg"
            }, {
                "abbr": "WN",
                "status": "Will nicht"
            }, {
                "abbr": "T0",
                "status": "TelNr = 0"
            }, {
                "abbr": "NE",
                "status": "Nicht erreicht"
            }, {
                "abbr": "JA",
                "status": "Ja"
            }, {
                "abbr": "AN",
                "status": "Anders"
            }, {
                "abbr": "NEU",
                "status": "NEU"
            }]
        });

        var selectedStateId = null;


        this.panel_details = xframe_pattern.getInstance().genGrid({


            disabled: true,
            region: 'east',
            width: 500,
            forceFit: true,
            border: false,
            title: 'Aktionen',
            split: true,
            collapseMode: 'mini',
            button_del: false,
            button_add: false,
            search: false,
            records_move: false,
            pager: false,


            toolbar_bottom: [


                {
                    xtype: 'combobox',
                    id: this.stateId,
                    fieldLabel: 'Status',
                    valuefield: 'abbr',
                    displayField: 'status',
                    store: stateStore,
                    queryMode: 'local',
                    minChars: 0,
                    typeAhead: true,
                    emptyText: 'select state',

                    listeners: {
                        select: function(combo, record) {
                            console.log(combo.getValue());
                            selectedStateId = combo.getValue();

                        }
                    }
                },


                {
                    id: this.phoneId,
                    emptyText: 'Telefonnummer',
                    xtype: 'textarea',
                    width: 150,
                    height: 20,

                },

                {
                    id: this.kommentarId,
                    emptyText: 'Kommentar',
                    xtype: 'textarea',
                    height: 100,
                    width: 170,
                },


                {
                    xtype: 'button',
                    handler: this.button_kommentar,
                    text: 'Speichern',
                    scope: this,
                }


            ],
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

                }, {
                    height: 50,
                    text: '>Quelle',
                    style: {
                        'text-color': 'white',
                        background: 'lightblue'
                    },
                    scope: this,
                    handler: this.button_openQuelle

                }, {
                    hidden: true,
                    height: 50,
                    text: 'Online',
                    style: {
                        'text-color': 'white',
                        background: 'lightgreen'
                    },
                    scope: this,
                    handler: this.button_done

                }, {
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
                load: '/xgo/xplugs/xkalt/call/xkalt/logs/load',
                params: {
                    b_id: -1,
                    initSort: Ext.encode([{

                        'property': 'wz_id',
                        'direction': 'desc',

                    }])
                },
                pid: 'wz_id',
                fields: fields
            },
            listeners: {
                scope: this,
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
        width: 400,d
        layout: 'fit',
        border: false,
        split: true,



        items:[this.grid]
        });

        */

        return this.panel_details;
    },


    createAllPanels: function() {
        this.createPanel_bestellungen();
        this.createPanel_order();
        this.createPanel_details();
    },

    getMainPanel: function() {
        this.createAllPanels();

        this.panel_main = Ext.create('Ext.Panel', {
            region: 'center',
            layout: 'border',
            border: false,
            items: [this.panel_bestellungen, this.panel_order, this.panel_details]
        });

        return this.panel_main;
    },



}
