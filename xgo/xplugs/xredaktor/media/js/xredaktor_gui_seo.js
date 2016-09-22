var xredaktor_gui_sseo = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xredaktor_gui";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_gui_sseo_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_gui_sseo_ = function(config) {
	this.config = config || {};
};

xredaktor_gui_sseo_.prototype = {

	getPanel: function(cfg_obj)
	{

		var fields 		= [];
		var fe_langs 	= xredaktor.getInstance().getCurrentSiteFeLangs();

		var fs = {
		};

		var tabs = {
		};



		Ext.each(fe_langs,function(cfg){

			var l = cfg.fel_ISO.toLowerCase();
			var L = cfg.fel_ISO.toUpperCase();

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_url_mode_'+l,
				text:	'URL-Settings',
				type: 	'info'
			});

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_url_mode_'+l,
				text:	xframe.lang('Mode'),
				combo: 	[['MANUAL',xframe.lang('Manual')],['AUTO',xframe.lang('Automatic')]]
			});

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_url_'+l,
				text:	xframe.lang('Auto'),
				type: 	'string'
			});

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_url_manual_'+l,
				text:	xframe.lang('Manual'),
				type: 	'string'
			});

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_sseo_page_canonical_'+l,
				text:	'Canonical',
				type: 	'string'
			});


			// TITLE

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				text:	'Title',
				type: 	'info'
			});

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_page_title_mode_'+l,
				text:	xframe.lang('Mode'),
				combo: 	[['MANUAL',xframe.lang('Manual')],['AUTO',xframe.lang('Automatic')]]
			});

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_page_title_'+l,
				text:	xframe.lang('Auto'),
				type: 	'string'
			});


			// DESC

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				text:	'Description',
				type: 	'info'
			});


			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_sseo_page_description_mode_'+l,
				text:	xframe.lang('Mode'),
				combo: 	[['MANUAL',xframe.lang('Manual')],['AUTO',xframe.lang('Automatic')]]
			});

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_sseo_page_description_'+l,
				text:	xframe.lang('Description'),
				type: 	'xr_field_textarea',
				hideLabel: true
			});


			// KEYWORDS

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				text:	'Keywords',
				type: 	'info'
			});

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_sseo_page_keywords_mode_'+l,
				text:	xframe.lang('Mode'),
				combo: 	[['MANUAL',xframe.lang('Manual')],['AUTO',xframe.lang('Automatic')]]
			});

			fields.push({
				tab: 	'SEO',
				fs: 	L,
				name: 	'wz_sseo_page_keywords_'+l,
				text:	xframe.lang('Description'),
				type: 	'xr_field_textarea',
				hideLabel: true
			});


		},this);

		fields.push({
			tab: 	'SEO',
			fs: 	'Generic',
			name: 	'wz_sseo_page_noindex',
			text:	'No-Index',
			combo: 	[['N',xframe.lang('No')],['Y',xframe.lang('Yes')]]
		});


		Ext.each(fe_langs,function(cfg){

			var l = cfg.fel_ISO.toLowerCase();
			var L = cfg.fel_ISO.toUpperCase();


			// TITLE

			fields.push({
				tab: 	'OG',
				fs: 	L,
				text:	xframe.lang('Title'),
				type:	'info'
			});

			fields.push({
				tab: 	'OG',
				fs: 	L,
				name: 	'wz_sseo_og_title_mode_'+l,
				text:	xframe.lang('Mode'),
				combo: 	[['MANUAL',xframe.lang('Manual')],['AUTO',xframe.lang('Automatic')]]
			});

			fields.push({
				tab: 	'OG',
				fs: 	L,
				name: 	'wz_sseo_og_title_'+l,
				text:	xframe.lang('Text'),
				type: 	'string',
				hideLabel: true
			});

			// DESCRIPTION

			fields.push({
				tab: 	'OG',
				fs: 	L,
				text:	xframe.lang('Description'),
				type:	'info'
			});

			fields.push({
				tab: 	'OG',
				fs: 	L,
				name: 	'wz_sseo_og_description_mode_'+l,
				text:	xframe.lang('Mode'),
				combo: 	[['MANUAL',xframe.lang('Manual')],['AUTO',xframe.lang('Automatic')]]
			});

			fields.push({
				tab: 	'OG',
				fs: 	L,
				name: 	'wz_sseo_og_description_'+l,
				text:	xframe.lang('Description'),
				type: 	'xr_field_textarea',
				hideLabel: true
			});

			// IMAGE

			fields.push({
				tab: 	'OG',
				fs: 	L,
				text:	xframe.lang('Image'),
				type:	'info'
			});

			fields.push({
				tab: 	'OG',
				fs: 	L,
				name: 	'wz_sseo_og_image_mode_'+l,
				text:	xframe.lang('Mode'),
				combo:	[['MANUAL',xframe.lang('Manual')],['AUTO',xframe.lang('Automatic')]]
			});

			fields.push({
				tab: 	'OG',
				fs: 	L,
				name: 	'wz_sseo_og_image_'+l,
				text:	xframe.lang('Image'),
				type: 	'image'
			});



		},this);


		fields.push({
			tab: 	'OG-Generic',
			fs: 	'Type',
			text:	'Type',
			name: 	'wz_sseo_og_type',
			type:	'xr_field_wizard',
			as_config: 	615
		});

		fields.push({
			tab: 	'OG-Generic',
			fs: 	'GEO',
			text:	'Latitude',
			name: 	'wz_sseo_og_latitude',
			type:	'xr_field_float'
		});

		fields.push({
			tab: 	'OG-Generic',
			fs: 	'GEO',
			text: 	'Longitude',
			name: 	'wz_sseo_og_longitude',
			type:	'xr_field_float'
		});

		fields.push({
			tab: 	'OG-Generic',
			fs: 	'GEO',
			text:	'Altitude',
			name: 	'wz_sseo_og_altitude',
			type:	'xr_field_float'
		});

		fields.push({
			tab: 	'OG-Generic',
			fs: 	'Address',
			text:	'Postal Code',
			name: 	'wz_sseo_og_postal_code',
			type:	'string'
		});

		fields.push({
			tab: 	'OG-Generic',
			fs: 	'Address',
			text:	'Locality',
			name: 	'wz_sseo_og_locality',
			type:	'string'
		});

		fields.push({
			tab: 	'OG-Generic',
			fs: 	'Address',
			text: 	'Country',
			name: 	'wz_sseo_og_country_name',
			type:	'xr_field_wizard',
			as_config: 	126
		});

		var gui = xredaktor_gui.getInstance().basicForm({

			title: 'SSEO',
			fs: fs,
			fields: fields,
			langs: fe_langs

		});

		return gui;
	}


}