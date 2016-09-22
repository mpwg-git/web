

var xframe = (function() {
	var instance = null;
	return new function() {


		this.getGridStoreByConfig = function(cfg){


			var model_id = Ext.id();
			var pageSize = 100;
			var extraParams = {};

			if (cfg.xstore.params)
			{
				if (!Ext.isObject(cfg.xstore.loadParams))	cfg.xstore.loadParams 	= {};
				if (!Ext.isObject(cfg.xstore.insertParams)) cfg.xstore.insertParams = {};
				if (!Ext.isObject(cfg.xstore.updateParams)) cfg.xstore.updateParams = {};
				if (!Ext.isObject(cfg.xstore.removeParams)) cfg.xstore.removeParams = {};

				Ext.iterate(cfg.xstore.params,function(k,v){
					cfg.xstore.loadParams[k] 	= v;
					cfg.xstore.insertParams[k] 	= v;
					cfg.xstore.updateParams[k] 	= v;
					cfg.xstore.removeParams[k] 	= v;
				},this);
			}

			Ext.define(model_id, {
				extend: 'Ext.data.Model',
				fields: cfg.xstore.fields,
				idProperty : cfg.xstore.pid
			});

			if (Ext.isObject(cfg.xstore.loadParams))
			{
				Ext.iterate(cfg.xstore.loadParams,function(k,v){
					extraParams[k] = v;
				},this);
			}

			
			var store = Ext.create('Ext.data.Store', {
				model: model_id,
				remoteSort: true,
				pageSize: pageSize,
				proxy: {
					extraParams: extraParams,
					type: 'ajax',
					url: cfg.xstore.load,
					reader: {
						root: 'root',
						totalProperty: 'totalCount'
					},
					listeners: {
						exception: function(proxy, response, operation){

							var json = Ext.decode(response.responseText);
							if (json)
							{
								if (json.DEBUG)
								{
									var win = xframe.win({
										modal:true,
										title: 'Server Debugnachricht',
										items: {xtype:'panel',html:json.DEBUG,autoScroll:true},
										buttons:[{
											text:'OK',
											handler:function(){
												win.destroy();
											}
										}]
									});
									win.show();
								}
							}

						}
					}
				}
			});

			store.proxy.extraParams.doPaging 	= (cfg.pager) ? '1' : '0';

			return store;
		},

		this.getStoreByConfig = function(cfg) {

			var model_id = Ext.id();
			var iconsPrefix = "xf_tree";

			if (cfg.iconsPrefix)
			{
				iconsPrefix = cfg.iconsPrefix;
			}

			var fields = [
			{name: 's_name',	xgroup:['Minimal','Standard','Sprachenspezifisch'],	text:'Verzeichnisse',	type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
			{name: 's_id',		xgroup: 'Standard',	text:'Interne Nummer',	type:'string', 	hidden: true},
			{name: 's_lastmod',	xgroup: 'Standard',	text:'Letzte änderung',	type:'string' , hidden: true},
			{name: 's_dir',		xgroup: '',	text:'Letzte änderung',	type:'string' , hidden: true, defaultValue:'Y'}
			];

			var fields = cfg.fields;

			fields.push({
				name:'iconCls',type:'string', defaultValue: iconsPrefix+'_node'
			});

			Ext.define(model_id, {
				extend: 'Ext.data.Model',
				fields: fields,
				idProperty : cfg.xstore.pid
			});

			var root_cfg = {
				expanded: true
			};

			root_cfg[cfg.xstore.pid] = 0;
			root_cfg[cfg.xstore.nameField] = cfg.rootTextName || 'Root';


			var extraParams = {};

			if (Ext.isObject(cfg.xstore.loadParams))
			{
				Ext.iterate(cfg.xstore.loadParams,function(k,v){
					extraParams[k] = v;
				},this);
			}

			if (Ext.isObject(cfg.xstore.params))
			{
				Ext.iterate(cfg.xstore.params,function(k,v){
					extraParams[k] = v;
				},this);
			}

			var store = Ext.create('Ext.data.TreeStore', {
				model: model_id,
				proxy: {
					type: 'ajax',
					url: cfg.xstore.load,
					extraParams : extraParams
				},
				root: root_cfg,
				folderSort: cfg.folderSort || false

			});

			store.idProperty = cfg.xstore.pid;

			return store;
		}


		this.guiSetParams = function(cfg,listOfGuis,reloadStore)
		{
			Ext.each(listOfGuis,function(gui){
				Ext.iterate(cfg,function(k,v){
					gui.getStore().proxy.extraParams[k] = v;
					if (gui.initSettings)
					{
						if (!gui.initSettings.xstore.insertParams) gui.initSettings.xstore.insertParams = {};
						gui.initSettings.xstore.insertParams[k] = v;
					}
					if (reloadStore)
					{
						gui.getStore().load();
					}
				},this);
			},this);
		}

		this.load = function(fileList, callback, scope, preserveOrder) {

			var scope = scope || this;

			/*
			return require(fileList, function(feedback) {
			callback.call(scope,true);
			},function(feedback) {
			callback.call(scope,false);
			});
			*/

			var head    = document.getElementsByTagName("head")[0],
			fragment    = document.createDocumentFragment(),
			numFiles    = fileList.length,
			loadedFiles = 0,
			me          = this;

			// Loads a particular file from the fileList by index. This is used when preserving order
			var loadFileIndex = function(index) {
				head.appendChild(
				me.buildHtmlTag(fileList[index], onFileLoaded)
				);
			};

			/**
			* Callback function which is called after each file has been loaded. This calls the callback
			* passed to load once the final file in the fileList has been loaded
			*/
			var onFileLoaded = function() {
				loadedFiles ++;

				//if this was the last file, call the callback, otherwise load the next file
				if (numFiles == loadedFiles && typeof callback == 'function') {
					callback.call(scope);
				} else {
					if (preserveOrder === true) {
						loadFileIndex(loadedFiles);
					}
				}
			};

			if (preserveOrder === true) {
				loadFileIndex.call(this, 0);
			} else {
				//load each file (most browsers will do this in parallel)
				Ext.each(fileList, function(file, index) {
					fragment.appendChild(
					this.buildHtmlTag(file, onFileLoaded)
					);
				}, this);

				head.appendChild(fragment);
			}
		},

		this.buildHtmlTag = function(filename, callback) {
			if (typeof this.loadedFiles == 'undefined') this.loadedFiles = {};
			if (typeof this.loadedFiles[filename] != "undefined") {
				callback();
				return this.loadedFiles[filename];
			}

			var exten = filename.substr(filename.lastIndexOf('.')+1);
			if(exten=='js') {
				var script  = document.createElement('script');
				script.type = "text/javascript";
				script.src  = filename;

				//IE has a different way of handling <script> loads, so we need to check for it here
				if(script.readyState) {
					script.onreadystatechange = function() {
						if (script.readyState == "loaded" || script.readyState == "complete") {
							script.onreadystatechange = null;
							callback();
						}
					};
				} else {
					script.onload = callback;
				}

				this.loadedFiles[filename] = script;
				return script;
			}
			if(exten=='css') {
				var style = document.createElement('link');
				style.rel  = 'stylesheet';
				style.type = 'text/css';
				style.href = filename;
				callback();
				this.loadedFiles[filename] = style;
				return style;
			}
		}

		this.holder = function(cfg)
		{
			var me 		= this;
			var gui 	= Ext.create('Ext.Panel',cfg.panelCfg);
			var newgui 	= false;

			gui.trigger = function()
			{
				newgui = cfg.trigger.call(cfg.trigger_scope);
				gui.maskIt.hide();
				gui.removeAll();
				gui.add(newgui);
				gui.doLayout();
			}

			gui.getGui = function()
			{
				return newgui;
			}

			gui.on('afterrender',function(){
				gui.maskIt = me.mask(gui,cfg.msg);
				if ((typeof cfg.fetch == 'function') && (cfg.fetch_scope)) {
					cfg.fetch.call(cfg.fetch_scope);
				}
			},cfg.scope)
			return gui;
		}

		this.mask = function(cmp,msg)
		{
			if (typeof msg == 'undefined') msg = "Bitte warten...";
			var myMask = new Ext.LoadMask({msg:msg,target:cmp});
			myMask.show();
			return myMask;
		}

		this.getPath = function(){
			return "/xgo/xframe";
		}

		this.setAppTitle = function(title)
		{
			document.title = title;
		}

		this.win = function(cfg) {
			var wCfg = Ext.apply({
				border:false,
				closable: true
			},cfg,{
				title: 'Fenstertitel',
				width: window.innerWidth*0.8,
				height: window.innerHeight*0.8,
				layout: 'fit',
				items: [{xtype:'panel',html:'Kein Inhalt definiert'}]
			});
			var win = Ext.create('widget.window',wCfg);
			return win;
		}

		this.alert = function(title,msg,callback,scope)
		{
			Ext.MessageBox.show({
				title: title,
				msg: msg,
				buttons: Ext.MessageBox.OK,
				fn: function(){
					try{
						callback.call(scope);
					} catch(e)
					{
						console.info(e);
					}
				},
				icon: Ext.MessageBox.ERROR,
				scope: this
			});
		}

		this.info = function(title,msg,callback,scope)
		{
			Ext.MessageBox.show({
				title: title,
				msg: msg,
				buttons: Ext.MessageBox.OK,
				fn: function(){
					try{
						callback.call(scope);
					} catch(e)
					{
						console.info(e);
					}
				},
				icon: Ext.MessageBox.INFO,
				scope: this
			});
		}

		this.ajax = function() {
			var obj = xframe.getInstance();
			obj.doAjax.apply(obj,arguments);
		},

		this.callAndWait = function(cfg) {

			var idx = Ext.id();
			console.info('idx',idx);
			var me 	= this;

			new Ext.Window({
				title : cfg.title,
				width : 300,
				height: 300,
				modal: true,
				layout : 'fit',
				tbar: [{
					scope: me,
					text: 'reload',
					iconCls: 'xf_reload',
					handler:function() {
						$$('#'+idx).attr('src',$$('#'+idx).attr('src'));
					}
				}],
				items : [{
					id: idx,
					xtype : "component",
					autoEl : {
						tag : "iframe",
						src : cfg.url
					}
				}]
			}).show();

		},

		this.yn = function(cfg) {
			Ext.MessageBox.show({
				title:cfg.title,
				msg: cfg.msg,
				buttons: Ext.MessageBox.YESNO,
				fn: cfg.handler,
				scope: cfg.scope,
				icon: Ext.MessageBox.QUESTION
			});
		},

		this.delay = function(id,time,fn,scope) {

			if (!this.delayedFns) this.delayedFns = {};
			if (this.delayedFns[id]) clearTimeout(this.delayedFns[id]);


			this.delayedFns[id] = setTimeout(function(){
				fn.call(scope);
			},time);

		},

		this.lang = function(txt,defaultx) {
			if (typeof defaultx == 'undefined') defaultx = false;
			var obj = xframe.getInstance();
			return obj.doTranslate.call(obj,txt,defaultx);
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xframe_(config);
			}
			return instance;
		}
	}
})();

var xframe_ = function(config) {
	this.config = config || {};
};

xframe_.prototype = {

	doTranslate : function(txt,defaultx){
		if (defaultx) return defaultx;
		return txt;
	},

	doAjax : function(cfg)
	{

		var final_call = Ext.apply({},cfg,{
			scope: this,
			jsonFeedback:true,
			success : function(){/*console.info('NON_OK_HANDLER');*/},
			failure : function(){/*console.info('NON_NOK_HANDLER');*/}
		});

		var backup_stateless 	= final_call.stateless;
		var backup_success 		= final_call.success;
		var backup_failure 		= final_call.failure;


		final_call.success = function(response,opts) {
			var json = Ext.decode(response.responseText,true);

			if (json == null)
			{
				var json = {success:false,failure_msg:'No or damaged JSON-Response'};
			}

			if (typeof backup_stateless == "function")
			{
				backup_stateless.call(cfg.scope||this,true,json);
			}

			if (!json.success) {

				var msg = json.msg || 'Unkown Error';
				if (cfg.failure_msg)
				{
					msg = cfg.failure_msg + "<br><br>" + msg;
				}

				Ext.MessageBox.show({
					title: 'InternalError',
					msg: msg,
					buttons: Ext.MessageBox.OK,
					fn: function(){
						backup_failure.call(cfg.scope,json,response,opts);
					},
					icon: Ext.MessageBox.ERROR,
					scope: this
				});

			} else
			{
				backup_success.call(cfg.scope,json);
			}
		}

		final_call.failure = function(response, opts) {
			var json = Ext.decode(response.responseText,true);

			if (typeof backup_stateless == "function")
			{
				backup_stateless.call(cfg.scope||this,false,json);
			}

			if (typeof json == 'undefined') return false;

			if (json.msg == "DEBUG") {

				var win = xframe.win({
					modal:true,
					title: 'Server Debugnachricht',
					items: {xtype:'panel',html:json.DEBUG,autoScroll:true},
					buttons:[{
						text:'OK',
						handler:function(){
							win.destroy();
						}
					}]
				});

				/*
				Ext.MessageBox.show({

				width: window.innerWidth*0.8,
				msg: "<div>"+json.DEBUG+"</div>",
				buttons: Ext.MessageBox.OK,
				fn: function(){
				backup_failure.call(cfg.scope,json,response,opts);
				},
				icon: Ext.MessageBox.INFO,
				scope: this
				});
				*/

				win.show();


				return;
			}

			var msg = json.msg || 'Unkown Error';
			if (cfg.failure_msg)
			{
				msg = cfg.failure_msg + "<br><br>" + msg + "<br><br>";
			}

			Ext.MessageBox.show({
				title: 'Error',
				msg: msg,
				buttons: Ext.MessageBox.OK,
				fn: function(){
					backup_failure.call(cfg.scope,json,response,opts);
				},
				icon: Ext.MessageBox.ERROR,
				scope: this
			});

			//console.log('server-side failure with status code ' + response.status);
		}

		Ext.Ajax.request(final_call);
	},
	init: function()
	{
	}
}

if (!window.console) {
	var names = ["log", "debug", "info", "warn", "error", "assert", "dir", "dirxml", "group", "groupEnd", "time", "timeEnd", "count", "trace", "profile", "profileEnd"];

	window.console = {};
	for (var i = 0; i < names.length; ++i)
	window.console[names[i]] = function(){
	}
}

console.json = function(json) {

	Ext.create('Ext.xr.field_json').showWin(json);

}

/**** EXTEND EXTJS *****/

Ext.onReady(function() {

	var version = new Ext.getVersion();
	console.info("xframe [extjs] - version is " + version);


	Ext.apply(String.prototype, (function() {
		function uc(str, p1){
			return p1.toUpperCase();
		}
		function lc(str, p1){
			return p1.toLowerCase();
		}
		var camelRe = /-([a-züöä])/g,
		titleRe = /((?:\s|^)[a-z])üöä/g,
		capsRe = /^([a-züöä])/,
		decapRe = /^([A-ZÜÖÄ])/,
		leadAndTrailWS = /^\s*([^\s]*)?\s*/,
		result;

		return {

			leftPad : function (val, size, ch) {
				result = String(val);
				if(!ch) {
					ch = " ";
				}
				while (result.length < size) {
					result = ch + result;
				}
				return result;
			},

			camel: function(s) {
				return this.replace(camelRe, uc);
			},

			title: function(s) {
				return this.replace(titleRe, uc);
			},

			capitalize: function() {
				return this.replace(capsRe, uc);
			},

			decapitalize: function() {
				return this.replace(decapRe, lc);
			},

			startsWith: function(prefix) {
				return this.substr(0, prefix.length) == prefix;
			},

			endsWith: function(suffix) {
				var start = this.length - suffix.length;
				return (start > -1) && (this.substr(start) == suffix);
			},

			equalsIgnoreCase: function(other) {
				return (this.toLowerCase() == other.toLowerCase());
			},

			/**
			* Remove leading and trailing whitespace.
			*/
			normalize: function() {
				return leadAndTrailWS.exec(this)[1] || '';
			},

			/**
			* Case insensitive String equality test
			*/
			equalsIgnoreCase: function(other) {
				return (this.toLowerCase() == (String(other).toLowerCase()));
			}
		};
	})());


	Ext.util.MD5 = function(s,raw,hexcase,chrsz) {
		raw = raw || false;
		hexcase = hexcase || false;
		chrsz = chrsz || 8;

		function safe_add(x, y){
			var lsw = (x & 0xFFFF) + (y & 0xFFFF);
			var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
			return (msw << 16) | (lsw & 0xFFFF);
		}
		function bit_rol(num, cnt){
			return (num << cnt) | (num >>> (32 - cnt));
		}
		function md5_cmn(q, a, b, x, s, t){
			return safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s),b);
		}
		function md5_ff(a, b, c, d, x, s, t){
			return md5_cmn((b & c) | ((~b) & d), a, b, x, s, t);
		}
		function md5_gg(a, b, c, d, x, s, t){
			return md5_cmn((b & d) | (c & (~d)), a, b, x, s, t);
		}
		function md5_hh(a, b, c, d, x, s, t){
			return md5_cmn(b ^ c ^ d, a, b, x, s, t);
		}
		function md5_ii(a, b, c, d, x, s, t){
			return md5_cmn(c ^ (b | (~d)), a, b, x, s, t);
		}

		function core_md5(x, len){
			x[len >> 5] |= 0x80 << ((len) % 32);
			x[(((len + 64) >>> 9) << 4) + 14] = len;
			var a =  1732584193;
			var b = -271733879;
			var c = -1732584194;
			var d =  271733878;
			for(var i = 0; i < x.length; i += 16){
				var olda = a;
				var oldb = b;
				var oldc = c;
				var oldd = d;
				a = md5_ff(a, b, c, d, x[i+ 0], 7 , -680876936);
				d = md5_ff(d, a, b, c, x[i+ 1], 12, -389564586);
				c = md5_ff(c, d, a, b, x[i+ 2], 17,  606105819);
				b = md5_ff(b, c, d, a, x[i+ 3], 22, -1044525330);
				a = md5_ff(a, b, c, d, x[i+ 4], 7 , -176418897);
				d = md5_ff(d, a, b, c, x[i+ 5], 12,  1200080426);
				c = md5_ff(c, d, a, b, x[i+ 6], 17, -1473231341);
				b = md5_ff(b, c, d, a, x[i+ 7], 22, -45705983);
				a = md5_ff(a, b, c, d, x[i+ 8], 7 ,  1770035416);
				d = md5_ff(d, a, b, c, x[i+ 9], 12, -1958414417);
				c = md5_ff(c, d, a, b, x[i+10], 17, -42063);
				b = md5_ff(b, c, d, a, x[i+11], 22, -1990404162);
				a = md5_ff(a, b, c, d, x[i+12], 7 ,  1804603682);
				d = md5_ff(d, a, b, c, x[i+13], 12, -40341101);
				c = md5_ff(c, d, a, b, x[i+14], 17, -1502002290);
				b = md5_ff(b, c, d, a, x[i+15], 22,  1236535329);
				a = md5_gg(a, b, c, d, x[i+ 1], 5 , -165796510);
				d = md5_gg(d, a, b, c, x[i+ 6], 9 , -1069501632);
				c = md5_gg(c, d, a, b, x[i+11], 14,  643717713);
				b = md5_gg(b, c, d, a, x[i+ 0], 20, -373897302);
				a = md5_gg(a, b, c, d, x[i+ 5], 5 , -701558691);
				d = md5_gg(d, a, b, c, x[i+10], 9 ,  38016083);
				c = md5_gg(c, d, a, b, x[i+15], 14, -660478335);
				b = md5_gg(b, c, d, a, x[i+ 4], 20, -405537848);
				a = md5_gg(a, b, c, d, x[i+ 9], 5 ,  568446438);
				d = md5_gg(d, a, b, c, x[i+14], 9 , -1019803690);
				c = md5_gg(c, d, a, b, x[i+ 3], 14, -187363961);
				b = md5_gg(b, c, d, a, x[i+ 8], 20,  1163531501);
				a = md5_gg(a, b, c, d, x[i+13], 5 , -1444681467);
				d = md5_gg(d, a, b, c, x[i+ 2], 9 , -51403784);
				c = md5_gg(c, d, a, b, x[i+ 7], 14,  1735328473);
				b = md5_gg(b, c, d, a, x[i+12], 20, -1926607734);
				a = md5_hh(a, b, c, d, x[i+ 5], 4 , -378558);
				d = md5_hh(d, a, b, c, x[i+ 8], 11, -2022574463);
				c = md5_hh(c, d, a, b, x[i+11], 16,  1839030562);
				b = md5_hh(b, c, d, a, x[i+14], 23, -35309556);
				a = md5_hh(a, b, c, d, x[i+ 1], 4 , -1530992060);
				d = md5_hh(d, a, b, c, x[i+ 4], 11,  1272893353);
				c = md5_hh(c, d, a, b, x[i+ 7], 16, -155497632);
				b = md5_hh(b, c, d, a, x[i+10], 23, -1094730640);
				a = md5_hh(a, b, c, d, x[i+13], 4 ,  681279174);
				d = md5_hh(d, a, b, c, x[i+ 0], 11, -358537222);
				c = md5_hh(c, d, a, b, x[i+ 3], 16, -722521979);
				b = md5_hh(b, c, d, a, x[i+ 6], 23,  76029189);
				a = md5_hh(a, b, c, d, x[i+ 9], 4 , -640364487);
				d = md5_hh(d, a, b, c, x[i+12], 11, -421815835);
				c = md5_hh(c, d, a, b, x[i+15], 16,  530742520);
				b = md5_hh(b, c, d, a, x[i+ 2], 23, -995338651);
				a = md5_ii(a, b, c, d, x[i+ 0], 6 , -198630844);
				d = md5_ii(d, a, b, c, x[i+ 7], 10,  1126891415);
				c = md5_ii(c, d, a, b, x[i+14], 15, -1416354905);
				b = md5_ii(b, c, d, a, x[i+ 5], 21, -57434055);
				a = md5_ii(a, b, c, d, x[i+12], 6 ,  1700485571);
				d = md5_ii(d, a, b, c, x[i+ 3], 10, -1894986606);
				c = md5_ii(c, d, a, b, x[i+10], 15, -1051523);
				b = md5_ii(b, c, d, a, x[i+ 1], 21, -2054922799);
				a = md5_ii(a, b, c, d, x[i+ 8], 6 ,  1873313359);
				d = md5_ii(d, a, b, c, x[i+15], 10, -30611744);
				c = md5_ii(c, d, a, b, x[i+ 6], 15, -1560198380);
				b = md5_ii(b, c, d, a, x[i+13], 21,  1309151649);
				a = md5_ii(a, b, c, d, x[i+ 4], 6 , -145523070);
				d = md5_ii(d, a, b, c, x[i+11], 10, -1120210379);
				c = md5_ii(c, d, a, b, x[i+ 2], 15,  718787259);
				b = md5_ii(b, c, d, a, x[i+ 9], 21, -343485551);
				a = safe_add(a, olda);
				b = safe_add(b, oldb);
				c = safe_add(c, oldc);
				d = safe_add(d, oldd);
			}
			return [a, b, c, d];
		}
		function str2binl(str){
			var bin = [];
			var mask = (1 << chrsz) - 1;
			for(var i = 0; i < str.length * chrsz; i += chrsz) {
				bin[i>>5] |= (str.charCodeAt(i / chrsz) & mask) << (i%32);
			}
			return bin;
		}
		function binl2str(bin){
			var str = "";
			var mask = (1 << chrsz) - 1;
			for(var i = 0; i < bin.length * 32; i += chrsz) {
				str += String.fromCharCode((bin[i>>5] >>> (i % 32)) & mask);
			}
			return str;
		}

		function binl2hex(binarray){
			var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
			var str = "";
			for(var i = 0; i < binarray.length * 4; i++) {
				str += hex_tab.charAt((binarray[i>>2] >> ((i%4)*8+4)) & 0xF) + hex_tab.charAt((binarray[i>>2] >> ((i%4)*8  )) & 0xF);
			}
			return str;
		}
		return (raw ? binl2str(core_md5(str2binl(s), s.length * chrsz)) : binl2hex(core_md5(str2binl(s), s.length * chrsz))	);
	};

	xframe.getInstance().init();
});
