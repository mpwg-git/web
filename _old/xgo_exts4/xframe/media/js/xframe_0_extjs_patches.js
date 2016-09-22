/*



	1) Tree Picker, doWidth setzen 




*/






/**** PATCHES EXTJS *****/

/*

Ext.apply(Ext.form.field.Radio.prototype, {
onChange: function(newVal, oldVal) {
var me = this;
Ext.form.field.Radio.superclass.onChange.apply(this, arguments);

if (newVal) {
var form = this.up('form');

this.getManager().getByName(me.name).each(function(item){
if (item !== me && form === item.up('form')) {
item.setValue(false);
}
}, me);
}
}
});

/*
Overrides for fixing clearOnLoad for TreeStore
* /
Ext.override(Ext.data.TreeStore, {
load: function(options) {
options = options || {};
options.params = options.params || {};


var me = this,
node = options.node || me.tree.getRootNode(),
root;


// If there is not a node it means the user hasnt defined a rootnode yet. In this case lets just
// create one for them.
if (!node) {
node = me.setRootNode({
expanded: true
});
}


if (me.clearOnLoad) {
node.removeAll(false);
}


Ext.applyIf(options, {
node: node
});
options.params[me.nodeParam] = node ? node.getId() : 'root';


if (node) {
node.set('loading', true);
}


return me.callParent([options]);
}
});



Ext.override(Ext.grid.plugin.CellEditing, {
startEdit: function(record, columnHeader) {
if (columnHeader && columnHeader.isCheckerHd) {
return false;
}
return this.callOverridden(arguments);
}
});

*/