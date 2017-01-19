/**
 * IMAGE CROP PLUGIN
 */         

(function() {
	"use strict";
	
	var $, img;
	
	$ = jQuery;
	img = $('gui_image');
	
	
	$('#zoom_out, #zoom_in, #fit, #rotate_left, #rotate_right').unbind('click');
	
	$('#zoom_out').bind('click', function() {
		img.guillotine('zoomOut')
	});
	
	$('#zoom_in').bind('click', function() {
		img.guillotine('zoomIn')
	});
	
	$('#rotate_left').bind('click', function() {
		img.guillotine('rotateLeft')
	});
	
	$('#rotate_right').bind('click', function() {
		img.guillotine('rotateRight')
	});
	
	$('#fit').bind('click', function() {
		img.guillotine('fit')
	});
	
}).call(this);