<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:33:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTnQNdH" */ ?>
<?php /*%%SmartyHeaderCode:105953509955cb3d0354bab8-01018290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6b9174fcc05a7e4cd7deb573249d7a13eb9e193' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTnQNdH',
      1 => 1439382787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105953509955cb3d0354bab8-01018290',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen?"),$_smarty_tpl);?>
</label>
     <div class="v-center multiple-select-container">
        <select class="form-control name="SPRACHEN" multiple-select" multiple="multiple">
			<option value='Deutsch'>Deutsch</option>
            <option value='English'>English</option>
            <option value='Francais'>Francais</option>
            <option value='Espanol'>Espanol</option>
		</select>
    </div>
</div>