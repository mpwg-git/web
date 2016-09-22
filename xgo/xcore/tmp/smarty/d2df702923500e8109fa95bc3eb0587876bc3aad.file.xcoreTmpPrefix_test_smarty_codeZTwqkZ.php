<?php /* Smarty version Smarty-3.0.7, created on 2015-08-04 11:59:38
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZTwqkZ" */ ?>
<?php /*%%SmartyHeaderCode:92778741155c08d0a58af32-47345192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2df702923500e8109fa95bc3eb0587876bc3aad' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZTwqkZ',
      1 => 1438682378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92778741155c08d0a58af32-47345192',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen?"),$_smarty_tpl);?>
</label>
     <div class="v-center">
        <select class="form-control multiple-select" multiple="multiple">
			<option value='Deutsch'>Deutsch</option>
            <option value='English'>English</option>
            <option value='Francais'>Francais</option>
            <option value='Espanol'>Espanol</option>
            <option value='Portuges'>Portuges</option>
		</select>
    </div>
</div>