<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 13:38:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesZ7yFe" */ ?>
<?php /*%%SmartyHeaderCode:196413901755c9dec228e266-55935026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3db84fb712bee220383dc9db24959d975e41cba7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesZ7yFe',
      1 => 1439293122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196413901755c9dec228e266-55935026',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="upload-image add-image">
    <span class="bild-hinzufuegen">Bild hinzufügen</span>
    <label class="img-upload-label">
        <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
        <span class="upload-progress-bar"></span>
    </label>
</div>

<div id="upload-image-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Crop</h4>
            </div>
            <div class="modal-body">
                <div class="add-image-crop-area modal fade">
    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

