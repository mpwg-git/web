<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 12:18:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeocFSdD" */ ?>
<?php /*%%SmartyHeaderCode:70431720055dc41022a4a68-24750254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e7e696ff1780963f296a54a3bde046353a7fc2c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeocFSdD',
      1 => 1440497922,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70431720055dc41022a4a68-24750254',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="chatcontacts">
    
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Chat"),$_smarty_tpl);?>
</h1>
    <form>
        <div class="form-group">
            <div class="input-icon">
                <input class="form-control" name="date" class="js-search-personen" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Personen suchen'),$_smarty_tpl);?>
?"/>
                <span class="icon-Lupe"></span>
    		</div>
        </div>
    </form>
    
    <div class="contacts-wrapper">
       
       <?php echo $_smarty_tpl->getVariable('html')->value;?>

        
    </div>
    
</div>
