Ext.Loader.setConfig({enabled: true});
Ext.Loader.setPath('Ext.ux', '/xgo/xframe/libs/extjs/examples/ux');

Ext.require([
'Ext.ux.TabCloseMenu',
'Ext.util.History',
'Ext.ux.IFrame',
'Ext.ux.form.SearchField',
'Ext.ux.grid.FiltersFeature',
'Ext.ux.ProgressBarPager',
'Ext.ux.DataView.LabelEditor',
'Ext.ux.DataView.DragSelector',
'Ext.ux.TreePicker',
'Ext.ux.CheckColumn'
]);

var xbootstrap = (function() {
	return new function() {

		this.load = function(fileListCSS, fileListJS, callback, scope, preserveOrder) {
			var scope       = scope || this,
			head        = document.getElementsByTagName("head")[0],
			fragment    = document.createDocumentFragment(),
			numFiles    = fileListCSS.length+fileListJS.length,
			loadedFiles = 0,
			me          = this;

			// Loads a particular file from the fileList by index. This is used when preserving order
			var loadFileIndex = function(index) {
				alert('x');
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

				Ext.each(fileListCSS, function(file, index) {
					fragment.appendChild(
					this.buildHtmlTag(file, onFileLoaded, 'css')
					);
				}, this);

				Ext.each(fileListJS, function(file, index) {
					fragment.appendChild(
					this.buildHtmlTag(file, onFileLoaded, 'js')
					);
				}, this);

				head.appendChild(fragment);
			}
		},

		this.buildHtmlTag = function(filename, callback,exten) {
			if (typeof this.loadedFiles == 'undefined') this.loadedFiles = {};
			if (typeof this.loadedFiles[filename] != "undefined") {
				callback();
				return this.loadedFiles[filename];
			}


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
	}
});

var list_css = [
"/xgo/xframe/media/css/loadAll.php",
"/xgo/xplugs/xredaktor/media/css/loadAll.php",
"/xgo/xframe/libs/jquery-file-upload/css/loadAll.php",
"/xgo/xframe/libs/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.min.css",
"/xgo/xframe/libs/jcrop-1902fbc/css/jquery.Jcrop.min.css",
"/xgo/xframe/libs/jquery-tokeninput/styles/token-input-credit.css",
"/xgo/xframe/libs/jquery-tokeninput/styles/token-input-xcredit.css",
"/xgo/xframe/libs/video/video-js.css",
"/xgo/xframe/libs/colorpick/css/colpick.css",
];



var list_js = ["/xgo/xframe/libs/extjs/bootstrap.js",
"/xgo/xframe/libs/dygraph/dygraph-combined.js",
"/xgo/xframe/media/js/loadAll.php",
"/xgo/xplugs/xredaktor/media/js/loadAll.php",
"/xgo/xplugs/xkalt/media/js/loadAll.php",
"/xgo/xframe/libs/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js",
"/xgo/xframe/libs/d3js/d3.v3.min.js",
"/xgo/xframe/libs/jquery-file-upload/js/loadAll.php",
"/xgo/xframe/libs/tinymce/tinymce.min.js",
"/xgo/xplugs/xredaktor/tinymce/loadAll.php",
"/xgo/xframe/libs/jcrop-1902fbc/js/jquery.Jcrop.min.js",

//"/xgo/xframe/libs/ace/src-noconflict/ext-language_tools.js",
//"/xgo/xframe/libs/ace/src-noconflict/ace.js",
"/xgo/xframe/libs/ace/src-noconflict/xgo.php",

"/xgo/xframe/libs/js-beautify-master/js/lib/beautify.js",
"/xgo/xframe/libs/js-beautify-master/js/lib/beautify-css.js",
"/xgo/xframe/libs/js-beautify-master/js/lib/beautify-html.js",
"/xgo/xframe/libs/lazyload/jq.lazyload.min.js",
"/xgo/xframe/libs/video/video.js",
"/xgo/xframe/libs/jquery-tokeninput/src/jquery.tokeninput.js",
"/xgo/xframe/libs/colorpick/js/colpick.js",
];


if (top.flyModus) {

	Ext.Loader.setConfig({enabled: true});
	Ext.Loader.setPath('Ext.ux', '/xgo/xframe/libs/extjs/examples/ux');
	
	
	var Base64 = {

		// private property
		_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

		// public method for encoding
		encode : function (input) {
			var output = "";
			var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
			var i = 0;

			input = Base64._utf8_encode(input);

			while (i < input.length) {

				chr1 = input.charCodeAt(i++);
				chr2 = input.charCodeAt(i++);
				chr3 = input.charCodeAt(i++);

				enc1 = chr1 >> 2;
				enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
				enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
				enc4 = chr3 & 63;

				if (isNaN(chr2)) {
					enc3 = enc4 = 64;
				} else if (isNaN(chr3)) {
					enc4 = 64;
				}

				output = output +
				this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
				this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

			}

			return output;
		},

		// public method for decoding
		decode : function (input) {
			var output = "";
			var chr1, chr2, chr3;
			var enc1, enc2, enc3, enc4;
			var i = 0;

			input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

			while (i < input.length) {

				enc1 = this._keyStr.indexOf(input.charAt(i++));
				enc2 = this._keyStr.indexOf(input.charAt(i++));
				enc3 = this._keyStr.indexOf(input.charAt(i++));
				enc4 = this._keyStr.indexOf(input.charAt(i++));

				chr1 = (enc1 << 2) | (enc2 >> 4);
				chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
				chr3 = ((enc3 & 3) << 6) | enc4;

				output = output + String.fromCharCode(chr1);

				if (enc3 != 64) {
					output = output + String.fromCharCode(chr2);
				}
				if (enc4 != 64) {
					output = output + String.fromCharCode(chr3);
				}

			}

			output = Base64._utf8_decode(output);

			return output;

		},

		// private method for UTF-8 encoding
		_utf8_encode : function (string) {
			string = string.replace(/\r\n/g,"\n");
			var utftext = "";

			for (var n = 0; n < string.length; n++) {

				var c = string.charCodeAt(n);

				if (c < 128) {
					utftext += String.fromCharCode(c);
				}
				else if((c > 127) && (c < 2048)) {
					utftext += String.fromCharCode((c >> 6) | 192);
					utftext += String.fromCharCode((c & 63) | 128);
				}
				else {
					utftext += String.fromCharCode((c >> 12) | 224);
					utftext += String.fromCharCode(((c >> 6) & 63) | 128);
					utftext += String.fromCharCode((c & 63) | 128);
				}

			}

			return utftext;
		},

		// private method for UTF-8 decoding
		_utf8_decode : function (utftext) {
			var string = "";
			var i = 0;
			var c = c1 = c2 = 0;

			while ( i < utftext.length ) {

				c = utftext.charCodeAt(i);

				if (c < 128) {
					string += String.fromCharCode(c);
					i++;
				}
				else if((c > 191) && (c < 224)) {
					c2 = utftext.charCodeAt(i+1);
					string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
					i += 2;
				}
				else {
					c2 = utftext.charCodeAt(i+1);
					c3 = utftext.charCodeAt(i+2);
					string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
					i += 3;
				}

			}

			return string;
		}

	}

}

var xbootstrapx = xbootstrap();

function startUp()
{
	if (top.flyModus)
	{
		setTimeout(function(){
			xredaktor_fly_start();
		},100);
		return;
	}

	Ext.get('wrapper').remove();
	var viewport = xredaktor.getInstance().showDesktop(top.crossSettings);
	setTimeout(function(){
		Ext.get('loading').remove();
		Ext.get('loading-mask').fadeOut({remove:true});
	},100);
}

xbootstrapx.load(list_css,list_js,startUp,this,false);
