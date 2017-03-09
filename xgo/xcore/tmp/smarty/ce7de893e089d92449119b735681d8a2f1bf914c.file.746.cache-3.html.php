<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 13:39:38
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/746.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:164460411358bffb8a9b8fd6-31528234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce7de893e089d92449119b735681d8a2f1bf914c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/746.cache-3.html',
      1 => 1488885596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164460411358bffb8a9b8fd6-31528234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 <div id="content">


    <div id="gui-frame" class="frame">
        <img id="gui_image" src="<?php echo $_smarty_tpl->getVariable('image')->value['src'];?>
">
      
        <input type="hidden" id="origW" name="origW" value="<?php echo $_smarty_tpl->getVariable('image')->value['trueW'];?>
" />
        <input type="hidden" id="origH" name="origH" value="<?php echo $_smarty_tpl->getVariable('image')->value['trueH'];?>
" />

    	<input type="hidden" id="s_id" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['s_id'];?>
" />
    	<input type="hidden" id="new_s_id" name="new_s_id" value="" />
    	<input type="hidden" id="type" name="type" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" />
    	<input type="hidden" id="refid" name="refid" value="<?php echo $_smarty_tpl->getVariable('refid')->value;?>
" />
      
    </div>

    <div id="controls">
        <button id="rotate_left" class="button guillotine" title="Rotate left"><i class="fa fa-rotate-left"></i></button>
        <button id="zoom_out" class="button guillotine"title="Zoom out"><i class="fa fa-search-minus"></i></button>
        <button id="zoom_in" class="button guillotine" title="Zoom in"><i class="fa fa-search-plus"></i></button>
        <button id="rotate_right" class="button guillotine" title="Rotate right"><i class="fa fa-rotate-right"></i></button>
        <button id="close-image-cropper" class="button guillotine close-image-cropper pull-left" title="Close"><i class="fa fa-times"></i></button>
        <button id="save-gui-image" class="button guillotine save-gui-image pull-right" title="Save image"><i class="fa fa-floppy-o"></i></button>
    </div>