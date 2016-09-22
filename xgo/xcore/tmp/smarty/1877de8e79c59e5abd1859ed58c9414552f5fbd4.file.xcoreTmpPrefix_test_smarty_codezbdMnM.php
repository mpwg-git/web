<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 17:48:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezbdMnM" */ ?>
<?php /*%%SmartyHeaderCode:109584527955ca19537df5f2-27420025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1877de8e79c59e5abd1859ed58c9414552f5fbd4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezbdMnM',
      1 => 1439308115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109584527955ca19537df5f2-27420025',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="upload-image add-image" data-type="other">
    <span class="bild-hinzufuegen">Bild hinzufügen</span>
    <label class="img-upload-label">
        <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
        <span class="upload-progress-bar"></span>
    </label>
</div>

<div class="upload-image-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Crop</h4>
            </div>
            <div class="modal-body">
                <div class="add-image-crop-area">
    
                </div>
            </div>
            <div class="modal-footer">
                <!--- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary add-image-crop">Save changes</button>
            </div>
        </div>
    </div>
</div>

