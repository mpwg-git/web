/**
* A Provider implementation which saves and retrieves state via cookies. The CookieProvider supports the usual cookie
* options, such as:
*
* - {@link #path}
* - {@link #expires}
* - {@link #domain}
* - {@link #secure}
*
* Example:
*
*     var cp = Ext.create('Ext.state.CookieProvider', {
*         path: "/cgi-bin/",
*         expires: new Date(new Date().getTime()+(1000*60*60*24*30)), //30 days
*         domain: "sencha.com"
*     });
*
*     Ext.state.Manager.setProvider(cp);
*
*/
Ext.define('Ext.state.XRProvider', {
	extend: 'Ext.state.Provider',

	/**
	* @cfg {String} path
	* The path for which the cookie is active. Defaults to root '/' which makes it active for all pages in the site.
	*/

	/**
	* @cfg {Date} expires
	* The cookie expiration date. Defaults to 7 days from now.
	*/

	/**
	* @cfg {String} domain
	* The domain to save the cookie for. Note that you cannot specify a different domain than your page is on, but you can
	* specify a sub-domain, or simply the domain itself like 'sencha.com' to include all sub-domains if you need to access
	* cookies across different sub-domains. Defaults to null which uses the same domain the page is running on including
	* the 'www' like 'www.sencha.com'.
	*/

	/**
	* @cfg {Boolean} [secure=false]
	* True if the site is using SSL
	*/

	/**
	* Creates a new CookieProvider.
	* @param {Object} [config] Config object.
	*/
	constructor : function(config){
		var me = this;
		me.user_id = config.user_id || -1
		me.user_states = config.user_states || {}
		me.callParent(arguments);
		me.state = me.readCookies();
	},

	// private
	set : function(name, value){
		var me = this;

		if(typeof value == "undefined" || value === null){
			me.clear(name);
			return;
		}
		me.setCookie(name, value);
		me.callParent(arguments);
	},

	// private
	clear : function(name){
		this.clearCookie(name);
		this.callParent(arguments);
	},

	// private
	readCookies : function(){
		return this.user_states;
	},

	// private
	setCookie : function(name, value){

		xframe.ajax({
			scope:this,
			url: "/xgo/xplugs/xredaktor/ajax/xr_state_provider/set",
			params : {
				user_id: this.user_id,
				name: name,
				value: Ext.encode(value)
			},
			stateless: function(success,json)
			{
			}
		});

	},

	// private
	clearCookie : function(name){
		
		xframe.ajax({
			scope:this,
			url: "/xgo/xplugs/xredaktor/ajax/xr_state_provider/clear",
			params : {
				user_id: this.user_id,
				name: name
			},
			stateless: function(success,json)
			{
			}
		});
		
	}
});