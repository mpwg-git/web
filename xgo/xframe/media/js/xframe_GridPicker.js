/**
* An abstract class for fields that have a single trigger which opens a "picker" popup below the field, e.g. a combobox
* menu list or a date picker. It provides a base implementation for toggling the picker's visibility when the trigger
* is clicked, as well as keyboard navigation and some basic events. Sizing and alignment of the picker can be
* controlled via the {@link #matchFieldWidth} and {@link #pickerAlign}/{@link #pickerOffset} config properties
* respectively.
*
* You would not normally use this class directly, but instead use it as the parent class for a specific picker field
* implementation. Subclasses must implement the {@link #createPicker} method to create a picker component appropriate
* for the field.
*/
Ext.define('Ext.xf.field.Picker', {
	extend: 'Ext.form.field.Trigger',
	alias: 'widget.pickerfield_xf',
	alternateClassName: 'Ext.form.Picker_xf',
	requires: ['Ext.util.KeyNav'],

	/**
	* @cfg {Boolean} matchFieldWidth
	* Whether the picker dropdown's width should be explicitly set to match the width of the field. Defaults to true.
	*/
	matchFieldWidth: true,

	/**
	* @cfg {String} pickerAlign
	* The {@link Ext.Element#alignTo alignment position} with which to align the picker. Defaults to "tl-bl?"
	*/
	pickerAlign: 'tl-bl?',

	/**
	* @cfg {Number[]} pickerOffset
	* An offset [x,y] to use in addition to the {@link #pickerAlign} when positioning the picker.
	* Defaults to undefined.
	*/

	/**
	* @cfg {String} [openCls='x-pickerfield-open']
	* A class to be added to the field's {@link #bodyEl} element when the picker is opened.
	*/
	openCls: Ext.baseCSSPrefix + 'pickerfield-open',

	/**
	* @property {Boolean} isExpanded
	* True if the picker is currently expanded, false if not.
	*/

	/**
	* @cfg {Boolean} editable
	* False to prevent the user from typing text directly into the field; the field can only have its value set via
	* selecting a value from the picker. In this state, the picker can also be opened by clicking directly on the input
	* field itself.
	*/
	editable: true,


	initComponent: function() {
		this.callParent();

		// Custom events
		this.addEvents(
		/**
		* @event expand
		* Fires when the field's picker is expanded.
		* @param {Ext.form.field.Picker} field This field instance
		*/
		'expand',
		/**
		* @event collapse
		* Fires when the field's picker is collapsed.
		* @param {Ext.form.field.Picker} field This field instance
		*/
		'collapse',
		/**
		* @event select
		* Fires when a value is selected via the picker.
		* @param {Ext.form.field.Picker} field This field instance
		* @param {Object} value The value that was selected. The exact type of this value is dependent on
		* the individual field and picker implementations.
		*/
		'select'
		);
	},


	initEvents: function() {
		var me = this;
		me.callParent();

		// Add handlers for keys to expand/collapse the picker
		me.keyNav = new Ext.util.KeyNav(me.inputEl, {
			down: me.onDownArrow,
			esc: {
				handler: me.onEsc,
				scope: me,
				defaultEventAction: false
			},
			scope: me,
			forceKeyDown: true
		});

		// Non-editable allows opening the picker by clicking the field
		if (!me.editable) {
			me.mon(me.inputEl, 'click', me.onTriggerClick, me);
		}

		// Disable native browser autocomplete
		if (Ext.isGecko) {
			me.inputEl.dom.setAttribute('autocomplete', 'off');
		}
	},

	// private
	onEsc: function(e) {
		var me = this;
		if (me.isExpanded) {
			me.collapse();
			e.stopEvent();
		}
	},

	onDownArrow: function(e) {
		if (!this.isExpanded) {
			// Don't call expand() directly as there may be additional processing involved before
			// expanding, e.g. in the case of a ComboBox query.
			this.onTriggerClick();
		}
	},

	/**
	* Expands this field's picker dropdown.
	*/
	expand: function() {
		
		var me = this,
		bodyEl, picker, collapseIf;

		if (me.rendered && !me.isExpanded && !me.isDestroyed) {
			bodyEl = me.bodyEl;
			picker = me.getPicker();
			collapseIf = me.collapseIf;

			// show the picker and set isExpanded flag
			picker.show();
			me.isExpanded = true;
			me.alignPicker();
			bodyEl.addCls(me.openCls);

			// monitor clicking and mousewheel
			
			me.mon(Ext.getDoc(), {
				mousewheel: collapseIf,
				//mousedown: collapseIf,
				scope: me
			});
			
			
			Ext.EventManager.onWindowResize(me.alignPicker, me);
			me.fireEvent('expand', me);
			me.onExpand();
		}
	},

	onExpand: Ext.emptyFn,

	/**
	* Aligns the picker to the input element
	* @protected
	*/
	alignPicker: function() {
		var me = this,
		picker = me.getPicker();

		if (me.isExpanded) {
			if (me.matchFieldWidth) {
				// Auto the height (it will be constrained by min and max width) unless there are no records to display.
				picker.setWidth(me.bodyEl.getWidth());
			}
			if (picker.isFloating()) {
				me.doAlign();
			}
		}
	},

	/**
	* Performs the alignment on the picker using the class defaults
	* @private
	*/
	doAlign: function(){
		var me = this,
		picker = me.picker,
		aboveSfx = '-above',
		isAbove;

		me.picker.alignTo(me.inputEl, me.pickerAlign, me.pickerOffset);
		// add the {openCls}-above class if the picker was aligned above
		// the field due to hitting the bottom of the viewport
		isAbove = picker.el.getY() < me.inputEl.getY();
		me.bodyEl[isAbove ? 'addCls' : 'removeCls'](me.openCls + aboveSfx);
		picker[isAbove ? 'addCls' : 'removeCls'](picker.baseCls + aboveSfx);
	},

	/**
	* Collapses this field's picker dropdown.
	*/
	collapse: function() {
		
		if (this.isExpanded && !this.isDestroyed) {
			var me = this,
			openCls = me.openCls,
			picker = me.picker,
			doc = Ext.getDoc(),
			collapseIf = me.collapseIf,
			aboveSfx = '-above';

			// hide the picker and set isExpanded flag
			picker.hide();
			me.isExpanded = false;

			// remove the openCls
			me.bodyEl.removeCls([openCls, openCls + aboveSfx]);
			picker.el.removeCls(picker.baseCls + aboveSfx);

			// remove event listeners
			doc.un('mousewheel', collapseIf, me);
			//doc.un('mousedown', collapseIf, me);
			
			Ext.EventManager.removeResizeListener(me.alignPicker, me);
			me.fireEvent('collapse', me);
			me.onCollapse();
		}
	},

	onCollapse: Ext.emptyFn,


	/**
	* @private
	* Runs on mousewheel and mousedown of doc to check to see if we should collapse the picker
	*/
	collapseIf: function(e) {
		var me = this;

		if (!me.isDestroyed && !e.within(me.bodyEl, false, true) && !e.within(me.picker.el, false, true) && !me.isEventWithinPickerLoadMask(e)) {
			me.collapse();
		}
	},

	/**
	* Returns a reference to the picker component for this field, creating it if necessary by
	* calling {@link #createPicker}.
	* @return {Ext.Component} The picker component
	*/
	getPicker: function() {
		var me = this;
		return me.picker || (me.picker = me.createPicker());
	},

	/**
	* @method
	* Creates and returns the component to be used as this field's picker. Must be implemented by subclasses of Picker.
	* The current field should also be passed as a configuration option to the picker component as the pickerField
	* property.
	*/
	createPicker: Ext.emptyFn,

	/**
	* Handles the trigger click; by default toggles between expanding and collapsing the picker component.
	* @protected
	*/
	onTriggerClick: function() {
		var me = this;
		if (!me.readOnly && !me.disabled) {
			if (me.isExpanded) {
				me.collapse();
			} else {
				me.expand();
			}
			me.inputEl.focus();
		}
	},

	triggerBlur: function() {
		var picker = this.picker;

		this.callParent(arguments);
		if (picker && picker.isVisible()) {
			//picker.hide();
		}
	},

	mimicBlur: function(e) {
		var me = this,
		picker = me.picker;
		// ignore mousedown events within the picker element
		if (!picker || !e.within(picker.el, false, true) && !me.isEventWithinPickerLoadMask(e)) {
			me.callParent(arguments);
		}
	},

	onDestroy : function(){
		var me = this,
		picker = me.picker;

		Ext.EventManager.removeResizeListener(me.alignPicker, me);
		Ext.destroy(me.keyNav);
		if (picker) {
			delete picker.pickerField;
			picker.destroy();
		}
		me.callParent();
	},

	/**
	* returns true if the picker has a load mask and the passed event is within the load mask
	* @private
	* @param {Ext.EventObject} e
	* @return {Boolean}
	*/
	isEventWithinPickerLoadMask: function(e) {
		var loadMask = this.picker.loadMask;

		return loadMask ? e.within(loadMask.maskEl, false, true) || e.within(loadMask.el, false, true) : false;
	}

});


/**
* A Picker field that contains a tree panel on its popup, enabling selection of tree nodes.
*/
Ext.define('Ext.xf.GridPicker', {
	extend: 'Ext.xf.field.Picker',
	xtype: 'gridpicker',

	triggerCls: Ext.baseCSSPrefix + 'form-arrow-trigger',

	config: {
		/**
		* @cfg {Ext.data.TreeStore} store
		* A tree store that the tree picker will be bound to
		*/
		store: null,

		/**
		* @cfg {String} displayField
		* The field inside the model that will be used as the node's text.
		* Defaults to the default value of {@link Ext.tree.Panel}'s `displayField` configuration.
		*/
		displayField: null,

		/**
		* @cfg {Array} columns
		* An optional array of columns for multi-column trees
		*/
		columns: null,

		/**
		* @cfg {Boolean} selectOnTab
		* Whether the Tab key should select the currently highlighted item. Defaults to `true`.
		*/
		selectOnTab: true,

		/**
		* @cfg {Number} maxPickerHeight
		* The maximum height of the tree dropdown. Defaults to 300.
		*/
		maxPickerHeight: 300,

		/**
		* @cfg {Number} minPickerHeight
		* The minimum height of the tree dropdown. Defaults to 100.
		*/
		minPickerHeight: 100
	},

	editable: false,

	initComponent: function() {
		var me = this;
		me.callParent(arguments);

		me.addEvents(
		/**
		* @event select
		* Fires when a tree node is selected
		* @param {Ext.ux.TreePicker} picker        This tree picker
		* @param {Ext.data.Model} record           The selected record
		*/
		'select'
		);

		me.store.on('load', me.onLoad, me);
	},

	/**
	* Creates and returns the tree panel to be used as this field's picker.
	*/
	createPicker: function() {
		var me = this;
		var picker = this.grid;
		var view = picker.getView();


		view.on('render', me.setPickerViewStyles, me);

		if (Ext.isIE9 && Ext.isStrict) {
			// In IE9 strict mode, the tree view grows by the height of the horizontal scroll bar when the items are highlighted or unhighlighted.
			// Also when items are collapsed or expanded the height of the view is off. Forcing a repaint fixes the problem.
			view.on({
				scope: me,
				highlightitem: me.repaintPickerView,
				unhighlightitem: me.repaintPickerView,
				afteritemexpand: me.repaintPickerView,
				afteritemcollapse: me.repaintPickerView
			});
		}
		return picker;
	},

	/**
	* Sets min/max height styles on the tree picker's view element after it is rendered.
	* @param {Ext.tree.View} view
	* @private
	*/
	setPickerViewStyles: function(view) {
		view.getEl().setStyle({
		'min-height': this.minPickerHeight + 'px',
		'max-height': this.maxPickerHeight + 'px'
		});
	},

	/**
	* repaints the tree view
	*/
	repaintPickerView: function() {
		var style = this.picker.getView().getEl().dom.style;

		// can't use Element.repaint because it contains a setTimeout, which results in a flicker effect
		style.display = style.display;
	},

	/**
	* Aligns the picker to the input element
	*/
	alignPicker: function() {
		var me = this,
		picker;

		if (me.isExpanded) {
			picker = me.getPicker();
			if (me.matchFieldWidth) {
				// Auto the height (it will be constrained by max height)
				if (me.config.doWidth)
				{
					picker.setWidth(me.config.doWidth);
				} else
				{
					picker.setWidth(me.bodyEl.getWidth());
				}
			}
			if (picker.isFloating()) {
				me.doAlign();
			}
		}
	},

	/**
	* Handles a click even on a tree node
	* @private
	* @param {Ext.tree.View} view
	* @param {Ext.data.Model} record
	* @param {HTMLElement} node
	* @param {Number} rowIndex
	* @param {Ext.EventObject} e
	*/
	onItemClick: function(view, record, node, rowIndex, e) {
		this.selectItem(record);
	},

	/**
	* Handles a keypress event on the picker element
	* @private
	* @param {Ext.EventObject} e
	* @param {HTMLElement} el
	*/
	onPickerKeypress: function(e, el) {
		var key = e.getKey();

		if(key === e.ENTER || (key === e.TAB && this.selectOnTab)) {
			this.selectItem(this.picker.getSelectionModel().getSelection()[0]);
		}
	},

	/**
	* Changes the selection to a given record and closes the picker
	* @private
	* @param {Ext.data.Model} record
	*/
	selectItem: function(record) {
		var me = this;
		me.setValue(record.getId());
		me.picker.hide();
		me.inputEl.focus();
		me.fireEvent('select', me, record)

	},

	/**
	* Runs when the picker is expanded.  Selects the appropriate tree node based on the value of the input element,
	* and focuses the picker so that keyboard navigation will work.
	* @private
	*/
	onExpand: function() {
		var me = this,
		picker = me.picker,
		store = picker.store,
		value = me.value;

		/*
		if(value) {
		picker.selectPath(store.getNodeById(value).getPath());
		} else {
		picker.getSelectionModel().select(store.getRootNode());
		}
		*/


		Ext.defer(function() {
			picker.getView().focus();
		}, 1);
	},

	/**
	* Sets the specified value into the field
	* @param {Mixed} value
	* @return {Ext.ux.TreePicker} this
	*/
	setValue: function(value) {
		
		
		//console.info('setValue',value,this.rawConfig);
		
		var me = this,
		record;

		me.value = value;

		if (me.store.loading) {
			// Called while the Store is loading. Ensure it is processed by the onLoad method.
			return me;
		}

		// try to find a record in the store that matches the value
		record = value ? me.store.getById(value) :'';
		
		if (value === undefined) {
			me.value = '';
		} else {
			record = me.store.getById(value);
		}

		var fin = "";
		
		if (this.rawConfig.value == value) {
			fin = this.rawConfig.value_preFetched;
		}
		
		// set the raw value to the record's display field if a record was found
		me.setRawValue(record ? record.get(me.displayField) : fin);

		return me;
	},

	getSubmitValue: function(){
		return this.value;
	},

	/**
	* Returns the current data value of the field (the idProperty of the record)
	* @return {Number}
	*/
	getValue: function() {
		return this.value;
	},

	/**
	* Handles the store's load event.
	* @private
	*/
	onLoad: function() {
		var value = this.value;

		if (value) {
			this.setValue(value);
		}
	}

});

