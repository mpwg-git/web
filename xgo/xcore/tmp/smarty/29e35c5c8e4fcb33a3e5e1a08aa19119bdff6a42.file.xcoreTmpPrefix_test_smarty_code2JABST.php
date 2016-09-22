<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 12:18:38
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2JABST" */ ?>
<?php /*%%SmartyHeaderCode:92713510855dc40fe487b49-63628027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29e35c5c8e4fcb33a3e5e1a08aa19119bdff6a42' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2JABST',
      1 => 1440497918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92713510855dc40fe487b49-63628027',
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