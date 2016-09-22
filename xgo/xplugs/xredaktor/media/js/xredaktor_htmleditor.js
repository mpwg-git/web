Ext.define('Ext.layout.component.field.HtmlEditor2', {
	extend: 'Ext.layout.component.field.Field',
	alias: ['layout.htmleditor2'],

	type: 'htmleditor2',

	sizeBodyContents: function(width, height) {
		var me = this,
		owner = me.owner,
		bodyEl = owner.bodyEl,
		toolbar = owner.getToolbar(),
		textarea = owner.textareaEl,
		iframe = owner.iframeEl,
		editorHeight;

		if (Ext.isNumber(width)) {
			width -= bodyEl.getFrameWidth('lr');
		}
		toolbar.setWidth(width);
		textarea.setWidth(width);
		iframe.setWidth(width);


		if (Ext.isNumber(height)) {
			editorHeight = height - toolbar.getHeight() - bodyEl.getFrameWidth('tb');
			textarea.setHeight(editorHeight);
			iframe.setHeight(editorHeight);
		}
	}
});

Ext.define('Ext.form.field.HtmlEditor2', {
	extend:'Ext.Component',
	mixins: {
		labelable: 'Ext.form.Labelable',
		field: 'Ext.form.field.Field'
	},
	alias: 'widget.htmleditor2',
	alternateClassName: 'Ext.form.HtmlEditor2',
	requires: [
	'Ext.tip.QuickTipManager',
	'Ext.picker.Color',
	'Ext.toolbar.Item',
	'Ext.toolbar.Toolbar',
	'Ext.util.Format',
	'Ext.layout.component.field.HtmlEditor2'
	],

	fieldSubTpl: [
	'<div id="{cmpId}-toolbarWrap" class="{toolbarWrapCls}"></div>',
	'<textarea id="{cmpId}-textareaEl" name="{name}" tabIndex="-1" class="{textareaCls}" ',
	'style="{size}" autocomplete="off"></textarea>',
	'<iframe id="{cmpId}-iframeEl" name="{iframeName}" frameBorder="0" style="overflow:auto;{size}" src="{iframeSrc}"></iframe>',
	{
		compiled: true,
		disableFormats: true
	}
	],


	enableFormat : true,

	enableFontSize : true,

	enableColors : false,

	enableAlignments : true,

	enableLists : true,

	enableSourceEdit : true,

	enableLinks : false,

	enableFont : false,

	createLinkText : 'Please enter the URL for the link:',

	defaultLinkValue : 'http:/'+'/',

	fontFamilies : [
	'Arial',
	'Courier New',
	'Tahoma',
	'Times New Roman',
	'Verdana'
	],
	defaultFont: 'tahoma',

	defaultValue: (Ext.isOpera || Ext.isIE6) ? '' : '',

	fieldBodyCls: Ext.baseCSSPrefix + 'html-editor-wrap',

	componentLayout: 'htmleditor2',


	initialized : false,
	activated : false,
	sourceEditMode : false,
	iframePad:3,
	hideMode:'offsets',

	maskOnDisable: true,


	initComponent : function(){
		var me = this;

		me.addEvents(
		'initialize',
		'activate',
		'beforesync',
		'beforepush',
		'sync',
		'push',
		'editmodechange'
		);

		me.callParent(arguments);
		me.initLabelable();
		me.initField();
	},

	xr_link_set : function(url){
		this.relayCmd('createlink', url);
	},

	outdent : function()
	{
		this.relayCmd('outdent');
	},

	indent : function()
	{
		this.relayCmd('indent');
	},

	xr_cleanSelection : function()
	{
		var btns = this.getToolbar().items.map;
		console.info('xr_cleanSelection');
		btns['xr_link'].xr_node = false;
		btns['xr_link'].xr_href = "";
		btns['xr_link'].xr_id 	= -1;
	},

	xr_link : function()
	{
		var me = this;
		var btns = this.getToolbar().items.map;
		var initValue = btns['xr_link'].xr_href;

		console.info('initValue',initValue);

		var me = this;
		setTimeout(function(){

			xredaktor_gui.getInstance().linkBuilder({
				value: initValue,
				scope: me,
				enabled: btns['xr_link'].pressed,
				listeners: {

					unlink : function() {
						me.win.focus();
						var range = rangy.createRange(me.getDoc());
						range.selectNode(btns['xr_link'].xr_node);
						var sel = rangy.getSelection();
						sel.setSingleRange(range);
						me.execCmd('unlink');
					},

					select : function(xr_link) {
						var xr_href = '#XR_LINK'+Ext.encode(xr_link);
						btns['xr_link'].xr_href = '#XR_LINK'+escape(Ext.encode(xr_link));

						if (btns['xr_link'].xr_id == -1)
						{
							me.xr_link_set(xr_href);
						} else
						{
							btns['xr_link'].xr_node.setAttribute('href',xr_href);
						}
					}

				}
			});

		},10);
	},

	createToolbar : function(editor){
		var me = this,
		items = [],
		tipsEnabled = Ext.tip.QuickTipManager && Ext.tip.QuickTipManager.isEnabled(),
		baseCSSPrefix = Ext.baseCSSPrefix,
		fontSelectItem, toolbar, undef;

		function btn(id, toggle, handler){
			return {
				itemId : id,
				cls : baseCSSPrefix + 'btn-icon',
				iconCls: baseCSSPrefix + 'edit-'+id,
				enableToggle:toggle !== false,
				scope: editor,
				handler:handler||editor.relayBtnCmd,
				clickEvent:'mousedown',
				tooltip: tipsEnabled ? editor.buttonTips[id] || undef : undef,
				overflowText: editor.buttonTips[id].title || undef,
				tabIndex:-1
			};
		}

		items.push(
		btn('xr_link',false, me.xr_link),
		'-'
		);

		if (me.enableFont && !Ext.isSafari2) {
			fontSelectItem = Ext.widget('component', {
				renderTpl: [
				'<select id="{id}-selectEl" class="{cls}">',
				'<tpl for="fonts">',
				'<option value="{[values.toLowerCase()]}" style="font-family:{.}"<tpl if="values.toLowerCase()==parent.defaultFont"> selected</tpl>>{.}</option>',
				'</tpl>',
				'</select>'
				],
				renderData: {
					cls: baseCSSPrefix + 'font-select',
					fonts: me.fontFamilies,
					defaultFont: me.defaultFont
				},
				childEls: ['selectEl'],
				onDisable: function() {
					var selectEl = this.selectEl;
					if (selectEl) {
						selectEl.dom.disabled = true;
					}
					Ext.Component.superclass.onDisable.apply(this, arguments);
				},
				onEnable: function() {
					var selectEl = this.selectEl;
					if (selectEl) {
						selectEl.dom.disabled = false;
					}
					Ext.Component.superclass.onEnable.apply(this, arguments);
				}
			});

			items.push(
			fontSelectItem,
			'-'
			);
		}

		if (me.enableFormat) {
			items.push(
			btn('bold'),
			btn('italic'),
			btn('underline')
			);
		}

		if (me.enableFontSize) {

			var data = [];

			for (var i = 1; i <= 30; i++) {
				data.push({"v": i, "k": i});
			}

			var store = Ext.create('Ext.data.Store', {
				fields: ['v', 'k'],
				data : data
			});

			var fontSizeCombo = Ext.create('Ext.form.ComboBox', {
				fieldLabel: '',
				store: store,
				queryMode: 'local',
				displayField: 'k',
				valueField: 'v'
			});
			
			fontSizeCombo.on('change',function(m,value){
				this.execCmd('FontSize',value+'px');
			},this);

			items.push(
			'-',
			fontSizeCombo,
			btn('increasefontsize', false, me.adjustFont),
			btn('decreasefontsize', false, me.adjustFont)
			);
		}

		if (me.enableColors) {
			items.push(
			'-', {
				itemId: 'forecolor',
				cls: baseCSSPrefix + 'btn-icon',
				iconCls: baseCSSPrefix + 'edit-forecolor',
				overflowText: editor.buttonTips.forecolor.title,
				tooltip: tipsEnabled ? editor.buttonTips.forecolor || undef : undef,
				tabIndex:-1,
				menu : Ext.widget('menu', {
					plain: true,
					items: [{
						xtype: 'colorpicker',
						allowReselect: true,
						focus: Ext.emptyFn,
						value: '000000',
						plain: true,
						clickEvent: 'mousedown',
						handler: function(cp, color) {
							me.execCmd('forecolor', Ext.isWebKit || Ext.isIE ? '#'+color : color);
							me.deferFocus();
							this.up('menu').hide();
						}
					}]
				})
			}, {
				itemId: 'backcolor',
				cls: baseCSSPrefix + 'btn-icon',
				iconCls: baseCSSPrefix + 'edit-backcolor',
				overflowText: editor.buttonTips.backcolor.title,
				tooltip: tipsEnabled ? editor.buttonTips.backcolor || undef : undef,
				tabIndex:-1,
				menu : Ext.widget('menu', {
					plain: true,
					items: [{
						xtype: 'colorpicker',
						focus: Ext.emptyFn,
						value: 'FFFFFF',
						plain: true,
						allowReselect: true,
						clickEvent: 'mousedown',
						handler: function(cp, color) {
							if (Ext.isGecko) {
								me.execCmd('useCSS', false);
								me.execCmd('hilitecolor', color);
								me.execCmd('useCSS', true);
								me.deferFocus();
							} else {
								me.execCmd(Ext.isOpera ? 'hilitecolor' : 'backcolor', Ext.isWebKit || Ext.isIE ? '#'+color : color);
								me.deferFocus();
							}
							this.up('menu').hide();
						}
					}]
				})
			}
			);
		}

		if (me.enableAlignments) {
			items.push(
			'-',
			btn('justifyleft'),
			btn('justifycenter'),
			btn('justifyright')
			);
		}

		if (!Ext.isSafari2) {
			if (me.enableLinks) {
				items.push(
				'-',
				btn('createlink', false, me.createLink)
				);
			}

			if (me.enableLists) {
				items.push(
				'-',
				btn('insertorderedlist'),
				btn('insertunorderedlist'),
				'-',
				btn('outdent',false, me.outdent),
				btn('indent',false, me.indent)
				);
			}
			if (me.enableSourceEdit) {
				items.push(
				'-',
				btn('sourceedit', true, function(btn){
					me.toggleSourceEdit(!me.sourceEditMode);
				}),
				'-',
				btn('undo', false, function(btn){
					me.execCmd('undo');
				}),
				btn('redo', false, function(btn){
					me.execCmd('redo');
				}),'-',
				btn('striptags', false, function(btn){


					var htmlFieldId = Ext.id();
					var winStripTags = Ext.create('Ext.window.Window', {
						title: 'Text einfügen und Formatierung löschen',
						height: 200,
						width: 400,
						layout: 'fit',
						bbar: [{
							text: 'Einfügen',
							handler: function(){

								var html = Ext.getCmp(htmlFieldId).getValue();
								xframe.ajax({
									scope:me,
									url: xredaktor.getPath() + '/ajax/editor/striptags',
									params: {
										html: html
									},
									success: function(json) {
										me.insertAtCursor(json.cleanAndSexy);
										winStripTags.close();
									},
									failure: function() {
									}
								});

							}
						}],
						items: {
							id : htmlFieldId,
							xtype: 'htmleditor',
							enableColors: false,
							enableAlignments: false,
							enableFont: false,
							enableFontSize: true,
							enableLinks: false,
							enableLists: false,
							enableFormat: false
						}
					}).show();





				}),
				btn('specialchars', false, function(btn){


					var idOfSc = Ext.id();
					var winStripTags = Ext.create('Ext.window.Window', {
						title: 'Spezielle Zeichen',
						height: 260,
						width: 500,
						layout: 'fit',
						items: {
							xtype: 'panel',
							html: '<div id="'+idOfSc+'"></div>',
							listeners: {

								afterRender: function (){

									var charsPerRow = 20, tdWidth=20, tdHeight=20, i;
									var html = '<div id="charmapgroup" aria-labelledby="charmap_label" tabindex="0" role="listbox">'+
									'<table align="center" role="presentation" border="0" cellspacing="1" cellpadding="0" width="' + (tdWidth*charsPerRow) +
									'"><tr height="' + tdHeight + '">';
									var cols=-1;

									for (i=0; i<charmap.length; i++) {
										var previewCharFn;

										if (charmap[i][2]==true) {
											cols++;
											previewCharFn = 'previewChar(\'' + charmap[i][1].substring(1,charmap[i][1].length) + '\',\'' + charmap[i][0].substring(1,charmap[i][0].length) + '\',\'' + charmap[i][3] + '\');';
											html += ''
											+ '<td class="charmap">'
											+ '<a class="charmaplink" role="button" onmouseover2="'+previewCharFn+'" onfocus2="'+previewCharFn+'" href="javascript:void(0)" htmlcode="' + charmap[i][0].substring(1,charmap[i][0].length) + '" onclick="return false;" onmousedown="return false;" title="' + charmap[i][3] + '">'
											+ charmap[i][1]
											+ '</a></td>';
											if ((cols+1) % charsPerRow == 0)
											html += '</tr><tr height="' + tdHeight + '">';
										}
									}

									if (cols % charsPerRow > 0) {
										var padd = charsPerRow - (cols % charsPerRow);
										for (var i=0; i<padd-1; i++)
										html += '<td width="' + tdWidth + '" height="' + tdHeight + '" class="charmap">&nbsp;</td>';
									}

									html += '</tr></table></div>';
									html = html.replace(/<tr height="20"><\/tr>/g, '');

									Ext.fly(idOfSc).update(html);
									Ext.each(Ext.query('.charmaplink'),function(obj){

										Ext.fly(obj).on('click',function(){
											var t = '&'+this.getAttribute('htmlcode');
											me.insertAtCursor(t);
											winStripTags.close();
										});;

									});




								}
							}
						}
					}).show();



				})
				);
			}
		}


		toolbar = Ext.widget('toolbar', {
			renderTo: me.toolbarWrap,
			enableOverflow: true,
			items: items
		});

		if (fontSelectItem) {
			me.fontSelect = fontSelectItem.selectEl;

			me.mon(me.fontSelect, 'change', function(){
				me.relayCmd('fontname', me.fontSelect.dom.value);
				me.deferFocus();
			});
		}


		me.mon(toolbar.el, 'click', function(e){
			e.preventDefault();
		});

		me.toolbar = toolbar;
	},

	onDisable: function() {
		this.bodyEl.mask();
		this.callParent(arguments);
	},

	onEnable: function() {
		this.bodyEl.unmask();
		this.callParent(arguments);
	},


	setReadOnly: function(readOnly) {
		var me = this,
		textareaEl = me.textareaEl,
		iframeEl = me.iframeEl,
		body;

		me.readOnly = readOnly;

		if (textareaEl) {
			textareaEl.dom.readOnly = readOnly;
		}

		if (me.initialized) {
			body = me.getEditorBody();
			if (Ext.isIE) {

				iframeEl.setDisplayed(false);
				body.contentEditable = !readOnly;
				iframeEl.setDisplayed(true);
			} else {
				me.setDesignMode(!readOnly);
			}
			if (body) {
				body.style.cursor = readOnly ? 'default' : 'text';
			}
			me.disableItems(readOnly);
		}
	},


	getDocMarkup: function() {
		var me = this,
		h = me.iframeEl.getHeight() - me.iframePad * 2;
		return Ext.String.format('<html><head><style type="text/css">body{border:0;margin:0;padding:{0}px;height:{1}px;box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;cursor:text}</style></head><body></body></html>', me.iframePad, h);
	},


	getEditorBody: function() {
		var doc = this.getDoc();
		return doc.body || doc.documentElement;
	},


	getDoc: function() {
		return (!Ext.isIE && this.iframeEl.dom.contentDocument) || this.getWin().document;
	},


	getWin: function() {
		return Ext.isIE ? this.iframeEl.dom.contentWindow : window.frames[this.iframeEl.dom.name];
	},


	onRender: function() {
		var me = this;

		me.onLabelableRender();

		me.addChildEls('toolbarWrap', 'iframeEl', 'textareaEl');

		me.callParent(arguments);

		me.textareaEl.dom.value = me.value || '';


		me.monitorTask = Ext.TaskManager.start({
			run: me.checkDesignMode,
			scope: me,
			interval:100
		});

		me.createToolbar(me);
		me.disableItems(true);
	},

	initRenderTpl: function() {
		var me = this;
		if (!me.hasOwnProperty('renderTpl')) {
			me.renderTpl = me.getTpl('labelableRenderTpl');
		}
		return me.callParent();
	},

	initRenderData: function() {
		return Ext.applyIf(this.callParent(), this.getLabelableRenderData());
	},

	getSubTplData: function() {
		var cssPrefix = Ext.baseCSSPrefix;
		return {
			cmpId: this.id,
			id: this.getInputId(),
			toolbarWrapCls: cssPrefix + 'html-editor-tb',
			textareaCls: cssPrefix + 'hidden',
			iframeName: Ext.id(),
			iframeSrc: Ext.SSL_SECURE_URL,
			size: 'height:100px;'
		};
	},

	getSubTplMarkup: function() {
		var data = this.getSubTplData();
		return this.getTpl('fieldSubTpl').apply(data);
	},

	getBodyNaturalWidth: function() {
		return 565;
	},

	initFrameDoc: function() {
		var me = this,
		doc, task;

		Ext.TaskManager.stop(me.monitorTask);

		doc = me.getDoc();
		me.win = me.getWin();

		doc.open();
		doc.write(me.getDocMarkup());
		doc.close();

		task = {
			run: function() {
				var doc = me.getDoc();
				if (doc.body || doc.readyState === 'complete') {
					Ext.TaskManager.stop(task);
					me.setDesignMode(true);
					Ext.defer(me.initEditor, 10, me);
				}
			},
			interval : 10,
			duration:10000,
			scope: me
		};
		Ext.TaskManager.start(task);
	},

	checkDesignMode: function() {
		var me = this,
		doc = me.getDoc();
		if (doc && (!doc.editorInitialized || me.getDesignMode() !== 'on')) {
			me.initFrameDoc();
		}
	},


	setDesignMode: function(mode) {
		var me = this,
		doc = me.getDoc();
		if (doc) {
			if (me.readOnly) {
				mode = false;
			}
			doc.designMode = (/on|true/i).test(String(mode).toLowerCase()) ?'on':'off';
		}
	},


	getDesignMode: function() {
		var doc = this.getDoc();
		return !doc ? '' : String(doc.designMode).toLowerCase();
	},

	disableItems: function(disabled) {
		this.getToolbar().items.each(function(item){
			if(item.getItemId() !== 'sourceedit'){
				item.setDisabled(disabled);
			}
		});
	},


	toggleSourceEdit: function(sourceEditMode) {
		var me = this,
		iframe = me.iframeEl,
		textarea = me.textareaEl,
		hiddenCls = Ext.baseCSSPrefix + 'hidden',
		btn = me.getToolbar().getComponent('sourceedit');

		if (!Ext.isBoolean(sourceEditMode)) {
			sourceEditMode = !me.sourceEditMode;
		}
		me.sourceEditMode = sourceEditMode;

		if (btn.pressed !== sourceEditMode) {
			btn.toggle(sourceEditMode);
		}
		if (sourceEditMode) {
			me.disableItems(true);
			me.syncValue();
			iframe.addCls(hiddenCls);
			textarea.removeCls(hiddenCls);
			textarea.dom.removeAttribute('tabIndex');
			textarea.focus();
		}
		else {
			if (me.initialized) {
				me.disableItems(me.readOnly);
			}
			me.pushValue();
			iframe.removeCls(hiddenCls);
			textarea.addCls(hiddenCls);
			textarea.dom.setAttribute('tabIndex', -1);
			me.deferFocus();
		}
		me.fireEvent('editmodechange', me, sourceEditMode);
		me.doComponentLayout();
	},


	createLink : function() {
		var url = prompt(this.createLinkText, this.defaultLinkValue);
		if (url && url !== 'http:/'+'/') {
			this.relayCmd('createlink', url);
		}
	},

	clearInvalid: Ext.emptyFn,


	setValue: function(value) {
		var me = this,
		textarea = me.textareaEl;
		me.mixins.field.setValue.call(me, value);
		if (value === null || value === undefined) {
			value = '';
		}
		if (textarea) {
			textarea.dom.value = value;
		}
		//console.info('setValue',value);
		me.pushValue();
		return this;
	},


	cleanHtml: function(html) {
		html = String(html);
		if (Ext.isWebKit) {
			html = html.replace(/\sclass="(?:Apple-style-span|khtml-block-placeholder)"/gi, '');
		}


		if (html.charCodeAt(0) === this.defaultValue.replace(/\D/g, '')) {
			html = html.substring(1);
		}
		return html;
	},


	syncValue : function(){
		var me = this,
		body, html, bodyStyle, match;
		if (me.initialized) {
			body = me.getEditorBody();
			html = body.innerHTML;
			if (Ext.isWebKit) {
				bodyStyle = body.getAttribute('style');
				match = bodyStyle.match(/text-align:(.*?);/i);
				if (match && match[1]) {
					html = '<div style="' + match[0] + '">' + html + '</div>';
				}
			}
			html = me.cleanHtml(html);
			if (me.fireEvent('beforesync', me, html) !== false) {
				me.textareaEl.dom.value = html;
				me.fireEvent('sync', me, html);
			}
		}
	},


	getValue : function() {
		var me = this,
		value;

		//console.info('getValue 0',value,me.rendered,me.value);

		if (!me.sourceEditMode) {
			me.syncValue();
		}

		//console.info('getValue',value,me.rendered,me.value);

		value = me.rendered ? me.textareaEl.dom.value : me.value;

		if(window.console && window.console.firebug)
		{
			var del = false;

			if (value == '<br>') 	{del=true;value = "";}
			if (value == '<br />') 	{del=true;value = "";}

			var iLen = String(value).length;
			var html = String(value).substring(iLen, iLen - 4);
			var html2 = String(value).substring(iLen, iLen - 6);

			if (html == '<br>')
			{
				del = true;
				value = value.substring(0,iLen-4);
			}

			if (html2 == '<br />')
			{
				del = true;
				value = value.substring(0,iLen-6);
			}

			if (del)
			{
				console.info('FFireBug is present - del last br');
			}
		}

		me.value = value;

		return value;
	},


	pushValue: function() {
		var me = this,
		v;
		if(me.initialized){
			v = me.textareaEl.dom.value || '';
			if (!me.activated && v.length < 1) {
				v = me.defaultValue;
			}
			if (me.fireEvent('beforepush', me, v) !== false) {
				me.getEditorBody().innerHTML = v;
				if (Ext.isGecko) {

					me.setDesignMode(false);
					me.setDesignMode(true);
				}
				me.fireEvent('push', me, v);
			}
		}
	},


	deferFocus : function(){
		this.focus(false, true);
	},

	getFocusEl: function() {
		var me = this,
		win = me.win;
		return win && !me.sourceEditMode ? win : me.textareaEl;
	},


	initEditor : function(){

		try {
			var me = this,
			dbody = me.getEditorBody(),
			ss = me.textareaEl.getStyles('font-size', 'font-family', 'background-image', 'background-repeat', 'background-color', 'color'),
			doc,
			fn;

			ss['background-attachment'] = 'fixed';
			dbody.bgProperties = 'fixed';

			Ext.DomHelper.applyStyles(dbody, ss);

			doc = me.getDoc();

			if (doc) {
				try {
					Ext.EventManager.removeAll(doc);
				} catch(e) {}
			}


			fn = Ext.Function.bind(me.onEditorEvent, me);
			Ext.EventManager.on(doc, {
				mousedown: fn,
				dblclick: fn,
				click: fn,
				keyup: fn,
				buffer:100
			});






			fn = me.onRelayedEvent;
			Ext.EventManager.on(doc, {
				mousedown: fn,
				mousemove: fn,
				mouseup: fn,
				click: fn,
				dblclick: fn,
				scope: me
			});

			if (Ext.isGecko) {
				Ext.EventManager.on(doc, 'keypress', me.applyCommand, me);
			}
			if (me.fixKeys) {
				Ext.EventManager.on(doc, 'keydown', me.fixKeys, me);
			}


			Ext.EventManager.on(window, 'unload', me.beforeDestroy, me);
			doc.editorInitialized = true;

			me.initialized = true;
			me.pushValue();
			me.setReadOnly(me.readOnly);
			me.fireEvent('initialize', me);
		} catch(ex) {

		}
	},


	beforeDestroy : function(){
		var me = this,
		monitorTask = me.monitorTask,
		doc, prop;

		if (monitorTask) {
			Ext.TaskManager.stop(monitorTask);
		}
		if (me.rendered) {
			try {
				doc = me.getDoc();
				if (doc) {
					Ext.EventManager.removeAll(doc);
					for (prop in doc) {
						if (doc.hasOwnProperty(prop)) {
							delete doc[prop];
						}
					}
				}
			} catch(e) {

			}
			Ext.destroyMembers(me, 'tb', 'toolbarWrap', 'iframeEl', 'textareaEl');
		}
		me.callParent();
	},


	onRelayedEvent: function (event) {


		var iframeEl = this.iframeEl,
		iframeXY = iframeEl.getXY(),
		eventXY = event.getXY();



		event.xy = [iframeXY[0] + eventXY[0], iframeXY[1] + eventXY[1]];

		event.injectEvent(iframeEl);

		event.xy = eventXY;
	},


	onFirstFocus : function(){
		var me = this,
		selection, range;
		me.activated = true;
		me.disableItems(me.readOnly);
		if (Ext.isGecko) {
			me.win.focus();
			selection = me.win.getSelection();
			if (!selection.focusNode || selection.focusNode.nodeType !== 3) {
				range = selection.getRangeAt(0);
				range.selectNodeContents(me.getEditorBody());
				range.collapse(true);
				me.deferFocus();
			}
			try {
				me.execCmd('useCSS', true);
				me.execCmd('styleWithCSS', false);
			} catch(e) {

			}
		}
		me.fireEvent('activate', me);
	},


	adjustFont: function(btn) {
		var adjust = btn.getItemId() === 'increasefontsize' ? 1 : -1,
		size = this.getDoc().queryCommandValue('FontSize') || '2',
		isPxSize = Ext.isString(size) && size.indexOf('px') !== -1,
		isSafari;
		size = parseInt(size, 10);
		if (isPxSize) {


			if (size <= 10) {
				size = 1 + adjust;
			}
			else if (size <= 13) {
				size = 2 + adjust;
			}
			else if (size <= 16) {
				size = 3 + adjust;
			}
			else if (size <= 18) {
				size = 4 + adjust;
			}
			else if (size <= 24) {
				size = 5 + adjust;
			}
			else {
				size = 6 + adjust;
			}
			size = Ext.Number.constrain(size, 1, 6);
		} else {
			isSafari = Ext.isSafari;
			if (isSafari) {
				adjust *= 2;
			}
			size = Math.max(1, size + adjust) + (isSafari ? 'px' : 0);
		}
		this.execCmd('FontSize', size);
	},


	onEditorEvent: function(e) {

		var node = e.getTarget();
		var btns = this.getToolbar().items.map;

		if (node.nodeName == 'A')
		{
			var href = node.getAttribute('href'), target = node.getAttribute('target');
			var modId = Ext.id();

			btns['xr_link'].xr_href = href;
			btns['xr_link'].xr_id 	= modId;
			btns['xr_link'].xr_node	= node;

			node.setAttribute('xr_linkId',modId);

			if (href != "")
			{
				btns['xr_link'].toggle(true);
			} else
			{
				btns['xr_link'].toggle(false);
			}
			return;
		} else
		{
			this.xr_cleanSelection();
			btns['xr_link'].toggle(false);
		}

		this.updateToolbar();
	},


	updateToolbar: function() {
		var me = this,
		btns, doc, name, fontSelect;

		if (me.readOnly) {
			return;
		}

		if (!me.activated) {
			me.onFirstFocus();
			return;
		}

		btns = me.getToolbar().items.map;
		doc = me.getDoc();

		if (me.enableFont && !Ext.isSafari2) {
			name = (doc.queryCommandValue('FontName') || me.defaultFont).toLowerCase();
			fontSelect = me.fontSelect.dom;
			if (name !== fontSelect.value) {
				fontSelect.value = name;
			}
		}

		function updateButtons() {
			Ext.Array.forEach(Ext.Array.toArray(arguments), function(name) {
				btns[name].toggle(doc.queryCommandState(name));
			});
		}
		if(me.enableFormat){
			updateButtons('bold', 'italic', 'underline');
		}
		if(me.enableAlignments){
			updateButtons('justifyleft', 'justifycenter', 'justifyright');
		}
		if(!Ext.isSafari2 && me.enableLists){
			updateButtons('insertorderedlist', 'insertunorderedlist');
		}

		Ext.menu.Manager.hideAll();

		me.syncValue();
	},


	relayBtnCmd: function(btn) {
		this.relayCmd(btn.getItemId());
	},


	relayCmd: function(cmd, value) {
		Ext.defer(function() {
			var me = this;
			me.focus();
			me.execCmd(cmd, value);
			me.updateToolbar();
		}, 10, this);
	},


	execCmd : function(cmd, value){
		console.info('execCmd',cmd, value);
		var me = this,
		doc = me.getDoc(),
		undef;
		var ret = doc.execCommand(cmd, false, value === undef ? null : value);
		me.syncValue();
		return ret;
	},


	applyCommand : function(e){

		if ((e.getKey() == e.TAB))
		{
			if (e.shiftKey)
			{
				this.outdent();
			} else
			{

				this.indent();
			}
			e.preventDefault();
		}

		if (e.ctrlKey) {
			var me = this,
			c = e.getCharCode(), cmd;
			if (c > 0) {
				c = String.fromCharCode(c);
				switch (c) {
					case 'b':
					cmd = 'bold';
					break;
					case 'i':
					cmd = 'italic';
					break;
					case 'u':
					cmd = 'underline';
					break;
				}
				if (cmd) {
					me.win.focus();
					me.execCmd(cmd);
					me.deferFocus();
					e.preventDefault();
				}
			}
		}
	},


	insertAtCursor : function(text){
		var me = this,
		range;

		if (me.activated) {
			me.win.focus();
			if (Ext.isIE) {
				range = me.getDoc().selection.createRange();
				if (range) {
					range.pasteHTML(text);
					me.syncValue();
					me.deferFocus();
				}
			}else{
				me.execCmd('InsertHTML', text);
				me.deferFocus();
			}
		}
	},


	doTab : function() {

	},

	fixKeys: function() {

		var meeee = this;

		if (Ext.isIE) {
			return function(e){
				var me = this,
				k = e.getKey(),
				doc = me.getDoc(),
				range, target;
				if (k === e.TAB) {
					e.stopEvent();
					range = doc.selection.createRange();
					if(range){
						range.collapse(true);
						//range.pasteHTML('&nbsp;&nbsp;&nbsp;&nbsp;');
						//console.info('TAB-FIXED');
						if (e.shiftKey)
						{
							me.outdent();
						} else
						{
							me.indent();
						}
						me.deferFocus();
					}
				}
				else if (k === e.ENTER) {
					range = doc.selection.createRange();
					if (range) {
						target = range.parentElement();
						if(!target || target.tagName.toLowerCase() !== 'li'){
							e.stopEvent();
							range.pasteHTML('<br />');
							range.collapse(false);
							range.select();
						}
					}
				}
			};
		}

		if (Ext.isOpera) {
			return function(e){
				var me = this;
				if (e.getKey() === e.TAB) {
					e.stopEvent();
					me.win.focus();
					//me.execCmd('InsertHTML','&nbsp;&nbsp;&nbsp;&nbsp;');
					if (e.shiftKey)
					{
						me.outdent();
					} else
					{
						me.indent();
					}
					me.deferFocus();
				}
			};
		}

		if (Ext.isWebKit) {
			return function(e){
				var me = this,
				k = e.getKey();
				if (k === e.TAB) {
					e.stopEvent();
					//me.execCmd('InsertText','\t');

					if (e.shiftKey)
					{
						me.outdent();
					} else
					{
						me.indent();
					}

					me.deferFocus();
				}
				else if (k === e.ENTER) {
					e.stopEvent();
					me.execCmd('InsertHtml','<br /><br />');
					me.deferFocus();
				}
			};
		}

		return null;
	}(),


	getToolbar : function(){
		return this.toolbar;
	},


	buttonTips : {
		bold : {
			title: 'Bold (Ctrl+B)',
			text: 'Make the selected text bold.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		italic : {
			title: 'Italic (Ctrl+I)',
			text: 'Make the selected text italic.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		underline : {
			title: 'Underline (Ctrl+U)',
			text: 'Underline the selected text.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		increasefontsize : {
			title: 'Grow Text',
			text: 'Increase the font size.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		decreasefontsize : {
			title: 'Shrink Text',
			text: 'Decrease the font size.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		backcolor : {
			title: 'Text Highlight Color',
			text: 'Change the background color of the selected text.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		forecolor : {
			title: 'Font Color',
			text: 'Change the color of the selected text.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		justifyleft : {
			title: 'Align Text Left',
			text: 'Align text to the left.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		justifycenter : {
			title: 'Center Text',
			text: 'Center text in the editor.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		justifyright : {
			title: 'Align Text Right',
			text: 'Align text to the right.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		insertunorderedlist : {
			title: 'Bullet List',
			text: 'Start a bulleted list.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		insertorderedlist : {
			title: 'Numbered List',
			text: 'Start a numbered list.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		createlink : {
			title: 'Hyperlink',
			text: 'Make the selected text a hyperlink.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		sourceedit : {
			title: 'Source Edit',
			text: 'Switch to source editing mode.',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		xr_link : {
			title: 'Verlinkung',
			text: 'Seiten verbinden',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		indent : {
			title: 'Einrücken',
			text: 'Einrücken',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		outdent : {
			title: 'Ausrücken',
			text: 'Ausrücken',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		undo : {
			title: 'Rückgängig',
			text: 'Rückgängig',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		redo : {
			title: 'Wiederherstellen',
			text: 'Wiederherstellen',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		striptags : {
			title: 'Einfügen und Formatierung löschen',
			text: 'Einfügen und Formatierung löschen',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		},
		specialchars : {
			title: 'Spezielle Zeichen',
			text: 'Spezielle Zeichen',
			cls: Ext.baseCSSPrefix + 'html-editor-tip'
		}
	}

});



var charmap = [
['&nbsp;',    '&#160;',  true, 'no-break space'],
['&amp;',     '&#38;',   true, 'ampersand'],
['&quot;',    '&#34;',   true, 'quotation mark'],
// finance
['&cent;',    '&#162;',  true, 'cent sign'],
['&euro;',    '&#8364;', true, 'euro sign'],
['&pound;',   '&#163;',  true, 'pound sign'],
['&yen;',     '&#165;',  true, 'yen sign'],
// signs
['&copy;',    '&#169;',  true, 'copyright sign'],
['&reg;',     '&#174;',  true, 'registered sign'],
['&trade;',   '&#8482;', true, 'trade mark sign'],
['&permil;',  '&#8240;', true, 'per mille sign'],
['&micro;',   '&#181;',  true, 'micro sign'],
['&middot;',  '&#183;',  true, 'middle dot'],
['&bull;',    '&#8226;', true, 'bullet'],
['&hellip;',  '&#8230;', true, 'three dot leader'],
['&prime;',   '&#8242;', true, 'minutes / feet'],
['&Prime;',   '&#8243;', true, 'seconds / inches'],
['&sect;',    '&#167;',  true, 'section sign'],
['&para;',    '&#182;',  true, 'paragraph sign'],
['&szlig;',   '&#223;',  true, 'sharp s / ess-zed'],
// quotations
['&lsaquo;',  '&#8249;', true, 'single left-pointing angle quotation mark'],
['&rsaquo;',  '&#8250;', true, 'single right-pointing angle quotation mark'],
['&laquo;',   '&#171;',  true, 'left pointing guillemet'],
['&raquo;',   '&#187;',  true, 'right pointing guillemet'],
['&lsquo;',   '&#8216;', true, 'left single quotation mark'],
['&rsquo;',   '&#8217;', true, 'right single quotation mark'],
['&ldquo;',   '&#8220;', true, 'left double quotation mark'],
['&rdquo;',   '&#8221;', true, 'right double quotation mark'],
['&sbquo;',   '&#8218;', true, 'single low-9 quotation mark'],
['&bdquo;',   '&#8222;', true, 'double low-9 quotation mark'],
['&lt;',      '&#60;',   true, 'less-than sign'],
['&gt;',      '&#62;',   true, 'greater-than sign'],
['&le;',      '&#8804;', true, 'less-than or equal to'],
['&ge;',      '&#8805;', true, 'greater-than or equal to'],
['&ndash;',   '&#8211;', true, 'en dash'],
['&mdash;',   '&#8212;', true, 'em dash'],
['&macr;',    '&#175;',  true, 'macron'],
['&oline;',   '&#8254;', true, 'overline'],
['&curren;',  '&#164;',  true, 'currency sign'],
['&brvbar;',  '&#166;',  true, 'broken bar'],
['&uml;',     '&#168;',  true, 'diaeresis'],
['&iexcl;',   '&#161;',  true, 'inverted exclamation mark'],
['&iquest;',  '&#191;',  true, 'turned question mark'],
['&circ;',    '&#710;',  true, 'circumflex accent'],
['&tilde;',   '&#732;',  true, 'small tilde'],
['&deg;',     '&#176;',  true, 'degree sign'],
['&minus;',   '&#8722;', true, 'minus sign'],
['&plusmn;',  '&#177;',  true, 'plus-minus sign'],
['&divide;',  '&#247;',  true, 'division sign'],
['&frasl;',   '&#8260;', true, 'fraction slash'],
['&times;',   '&#215;',  true, 'multiplication sign'],
['&sup1;',    '&#185;',  true, 'superscript one'],
['&sup2;',    '&#178;',  true, 'superscript two'],
['&sup3;',    '&#179;',  true, 'superscript three'],
['&frac14;',  '&#188;',  true, 'fraction one quarter'],
['&frac12;',  '&#189;',  true, 'fraction one half'],
['&frac34;',  '&#190;',  true, 'fraction three quarters'],
// math / logical
['&fnof;',    '&#402;',  true, 'function / florin'],
['&int;',     '&#8747;', true, 'integral'],
['&sum;',     '&#8721;', true, 'n-ary sumation'],
['&infin;',   '&#8734;', true, 'infinity'],
['&radic;',   '&#8730;', true, 'square root'],
['&sim;',     '&#8764;', false,'similar to'],
['&cong;',    '&#8773;', false,'approximately equal to'],
['&asymp;',   '&#8776;', true, 'almost equal to'],
['&ne;',      '&#8800;', true, 'not equal to'],
['&equiv;',   '&#8801;', true, 'identical to'],
['&isin;',    '&#8712;', false,'element of'],
['&notin;',   '&#8713;', false,'not an element of'],
['&ni;',      '&#8715;', false,'contains as member'],
['&prod;',    '&#8719;', true, 'n-ary product'],
['&and;',     '&#8743;', false,'logical and'],
['&or;',      '&#8744;', false,'logical or'],
['&not;',     '&#172;',  true, 'not sign'],
['&cap;',     '&#8745;', true, 'intersection'],
['&cup;',     '&#8746;', false,'union'],
['&part;',    '&#8706;', true, 'partial differential'],
['&forall;',  '&#8704;', false,'for all'],
['&exist;',   '&#8707;', false,'there exists'],
['&empty;',   '&#8709;', false,'diameter'],
['&nabla;',   '&#8711;', false,'backward difference'],
['&lowast;',  '&#8727;', false,'asterisk operator'],
['&prop;',    '&#8733;', false,'proportional to'],
['&ang;',     '&#8736;', false,'angle'],
// undefined
['&acute;',   '&#180;',  true, 'acute accent'],
['&cedil;',   '&#184;',  true, 'cedilla'],
['&ordf;',    '&#170;',  true, 'feminine ordinal indicator'],
['&ordm;',    '&#186;',  true, 'masculine ordinal indicator'],
['&dagger;',  '&#8224;', true, 'dagger'],
['&Dagger;',  '&#8225;', true, 'double dagger'],
// alphabetical special chars
['&Agrave;',  '&#192;',  true, 'A - grave'],
['&Aacute;',  '&#193;',  true, 'A - acute'],
['&Acirc;',   '&#194;',  true, 'A - circumflex'],
['&Atilde;',  '&#195;',  true, 'A - tilde'],
['&Auml;',    '&#196;',  true, 'A - diaeresis'],
['&Aring;',   '&#197;',  true, 'A - ring above'],
['&AElig;',   '&#198;',  true, 'ligature AE'],
['&Ccedil;',  '&#199;',  true, 'C - cedilla'],
['&Egrave;',  '&#200;',  true, 'E - grave'],
['&Eacute;',  '&#201;',  true, 'E - acute'],
['&Ecirc;',   '&#202;',  true, 'E - circumflex'],
['&Euml;',    '&#203;',  true, 'E - diaeresis'],
['&Igrave;',  '&#204;',  true, 'I - grave'],
['&Iacute;',  '&#205;',  true, 'I - acute'],
['&Icirc;',   '&#206;',  true, 'I - circumflex'],
['&Iuml;',    '&#207;',  true, 'I - diaeresis'],
['&ETH;',     '&#208;',  true, 'ETH'],
['&Ntilde;',  '&#209;',  true, 'N - tilde'],
['&Ograve;',  '&#210;',  true, 'O - grave'],
['&Oacute;',  '&#211;',  true, 'O - acute'],
['&Ocirc;',   '&#212;',  true, 'O - circumflex'],
['&Otilde;',  '&#213;',  true, 'O - tilde'],
['&Ouml;',    '&#214;',  true, 'O - diaeresis'],
['&Oslash;',  '&#216;',  true, 'O - slash'],
['&OElig;',   '&#338;',  true, 'ligature OE'],
['&Scaron;',  '&#352;',  true, 'S - caron'],
['&Ugrave;',  '&#217;',  true, 'U - grave'],
['&Uacute;',  '&#218;',  true, 'U - acute'],
['&Ucirc;',   '&#219;',  true, 'U - circumflex'],
['&Uuml;',    '&#220;',  true, 'U - diaeresis'],
['&Yacute;',  '&#221;',  true, 'Y - acute'],
['&Yuml;',    '&#376;',  true, 'Y - diaeresis'],
['&THORN;',   '&#222;',  true, 'THORN'],
['&agrave;',  '&#224;',  true, 'a - grave'],
['&aacute;',  '&#225;',  true, 'a - acute'],
['&acirc;',   '&#226;',  true, 'a - circumflex'],
['&atilde;',  '&#227;',  true, 'a - tilde'],
['&auml;',    '&#228;',  true, 'a - diaeresis'],
['&aring;',   '&#229;',  true, 'a - ring above'],
['&aelig;',   '&#230;',  true, 'ligature ae'],
['&ccedil;',  '&#231;',  true, 'c - cedilla'],
['&egrave;',  '&#232;',  true, 'e - grave'],
['&eacute;',  '&#233;',  true, 'e - acute'],
['&ecirc;',   '&#234;',  true, 'e - circumflex'],
['&euml;',    '&#235;',  true, 'e - diaeresis'],
['&igrave;',  '&#236;',  true, 'i - grave'],
['&iacute;',  '&#237;',  true, 'i - acute'],
['&icirc;',   '&#238;',  true, 'i - circumflex'],
['&iuml;',    '&#239;',  true, 'i - diaeresis'],
['&eth;',     '&#240;',  true, 'eth'],
['&ntilde;',  '&#241;',  true, 'n - tilde'],
['&ograve;',  '&#242;',  true, 'o - grave'],
['&oacute;',  '&#243;',  true, 'o - acute'],
['&ocirc;',   '&#244;',  true, 'o - circumflex'],
['&otilde;',  '&#245;',  true, 'o - tilde'],
['&ouml;',    '&#246;',  true, 'o - diaeresis'],
['&oslash;',  '&#248;',  true, 'o slash'],
['&oelig;',   '&#339;',  true, 'ligature oe'],
['&scaron;',  '&#353;',  true, 's - caron'],
['&ugrave;',  '&#249;',  true, 'u - grave'],
['&uacute;',  '&#250;',  true, 'u - acute'],
['&ucirc;',   '&#251;',  true, 'u - circumflex'],
['&uuml;',    '&#252;',  true, 'u - diaeresis'],
['&yacute;',  '&#253;',  true, 'y - acute'],
['&thorn;',   '&#254;',  true, 'thorn'],
['&yuml;',    '&#255;',  true, 'y - diaeresis'],
['&Alpha;',   '&#913;',  true, 'Alpha'],
['&Beta;',    '&#914;',  true, 'Beta'],
['&Gamma;',   '&#915;',  true, 'Gamma'],
['&Delta;',   '&#916;',  true, 'Delta'],
['&Epsilon;', '&#917;',  true, 'Epsilon'],
['&Zeta;',    '&#918;',  true, 'Zeta'],
['&Eta;',     '&#919;',  true, 'Eta'],
['&Theta;',   '&#920;',  true, 'Theta'],
['&Iota;',    '&#921;',  true, 'Iota'],
['&Kappa;',   '&#922;',  true, 'Kappa'],
['&Lambda;',  '&#923;',  true, 'Lambda'],
['&Mu;',      '&#924;',  true, 'Mu'],
['&Nu;',      '&#925;',  true, 'Nu'],
['&Xi;',      '&#926;',  true, 'Xi'],
['&Omicron;', '&#927;',  true, 'Omicron'],
['&Pi;',      '&#928;',  true, 'Pi'],
['&Rho;',     '&#929;',  true, 'Rho'],
['&Sigma;',   '&#931;',  true, 'Sigma'],
['&Tau;',     '&#932;',  true, 'Tau'],
['&Upsilon;', '&#933;',  true, 'Upsilon'],
['&Phi;',     '&#934;',  true, 'Phi'],
['&Chi;',     '&#935;',  true, 'Chi'],
['&Psi;',     '&#936;',  true, 'Psi'],
['&Omega;',   '&#937;',  true, 'Omega'],
['&alpha;',   '&#945;',  true, 'alpha'],
['&beta;',    '&#946;',  true, 'beta'],
['&gamma;',   '&#947;',  true, 'gamma'],
['&delta;',   '&#948;',  true, 'delta'],
['&epsilon;', '&#949;',  true, 'epsilon'],
['&zeta;',    '&#950;',  true, 'zeta'],
['&eta;',     '&#951;',  true, 'eta'],
['&theta;',   '&#952;',  true, 'theta'],
['&iota;',    '&#953;',  true, 'iota'],
['&kappa;',   '&#954;',  true, 'kappa'],
['&lambda;',  '&#955;',  true, 'lambda'],
['&mu;',      '&#956;',  true, 'mu'],
['&nu;',      '&#957;',  true, 'nu'],
['&xi;',      '&#958;',  true, 'xi'],
['&omicron;', '&#959;',  true, 'omicron'],
['&pi;',      '&#960;',  true, 'pi'],
['&rho;',     '&#961;',  true, 'rho'],
['&sigmaf;',  '&#962;',  true, 'final sigma'],
['&sigma;',   '&#963;',  true, 'sigma'],
['&tau;',     '&#964;',  true, 'tau'],
['&upsilon;', '&#965;',  true, 'upsilon'],
['&phi;',     '&#966;',  true, 'phi'],
['&chi;',     '&#967;',  true, 'chi'],
['&psi;',     '&#968;',  true, 'psi'],
['&omega;',   '&#969;',  true, 'omega'],
// symbols
['&alefsym;', '&#8501;', false,'alef symbol'],
['&piv;',     '&#982;',  false,'pi symbol'],
['&real;',    '&#8476;', false,'real part symbol'],
['&thetasym;','&#977;',  false,'theta symbol'],
['&upsih;',   '&#978;',  false,'upsilon - hook symbol'],
['&weierp;',  '&#8472;', false,'Weierstrass p'],
['&image;',   '&#8465;', false,'imaginary part'],
// arrows
['&larr;',    '&#8592;', true, 'leftwards arrow'],
['&uarr;',    '&#8593;', true, 'upwards arrow'],
['&rarr;',    '&#8594;', true, 'rightwards arrow'],
['&darr;',    '&#8595;', true, 'downwards arrow'],
['&harr;',    '&#8596;', true, 'left right arrow'],
['&crarr;',   '&#8629;', false,'carriage return'],
['&lArr;',    '&#8656;', false,'leftwards double arrow'],
['&uArr;',    '&#8657;', false,'upwards double arrow'],
['&rArr;',    '&#8658;', false,'rightwards double arrow'],
['&dArr;',    '&#8659;', false,'downwards double arrow'],
['&hArr;',    '&#8660;', false,'left right double arrow'],
['&there4;',  '&#8756;', false,'therefore'],
['&sub;',     '&#8834;', false,'subset of'],
['&sup;',     '&#8835;', false,'superset of'],

['&nsub;',    '&#8836;', false,'not a subset of'],
['&sube;',    '&#8838;', false,'subset of or equal to'],
['&supe;',    '&#8839;', false,'superset of or equal to'],
['&oplus;',   '&#8853;', false,'circled plus'],
['&otimes;',  '&#8855;', false,'circled times'],
['&perp;',    '&#8869;', false,'perpendicular'],
['&sdot;',    '&#8901;', false,'dot operator'],
['&lceil;',   '&#8968;', false,'left ceiling'],
['&rceil;',   '&#8969;', false,'right ceiling'],
['&lfloor;',  '&#8970;', false,'left floor'],
['&rfloor;',  '&#8971;', false,'right floor'],
['&lang;',    '&#9001;', false,'left-pointing angle bracket'],
['&rang;',    '&#9002;', false,'right-pointing angle bracket'],
['&loz;',     '&#9674;', true, 'lozenge'],
['&spades;',  '&#9824;', true, 'black spade suit'],
['&clubs;',   '&#9827;', true, 'black club suit'],
['&hearts;',  '&#9829;', true, 'black heart suit'],
['&diams;',   '&#9830;', true, 'black diamond suit'],
['&ensp;',    '&#8194;', false,'en space'],
['&emsp;',    '&#8195;', false,'em space'],
['&thinsp;',  '&#8201;', false,'thin space'],
['&zwnj;',    '&#8204;', false,'zero width non-joiner'],
['&zwj;',     '&#8205;', false,'zero width joiner'],
['&lrm;',     '&#8206;', false,'left-to-right mark'],
['&rlm;',     '&#8207;', false,'right-to-left mark'],
['&shy;',     '&#173;',  false,'soft hyphen']
];