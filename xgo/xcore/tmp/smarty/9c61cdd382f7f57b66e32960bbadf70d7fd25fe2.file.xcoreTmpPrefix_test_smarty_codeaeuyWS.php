<?php /* Smarty version Smarty-3.0.7, created on 2015-08-03 17:10:11
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaeuyWS" */ ?>
<?php /*%%SmartyHeaderCode:26125175655bf84537f9a32-81284262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c61cdd382f7f57b66e32960bbadf70d7fd25fe2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaeuyWS',
      1 => 1438614611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26125175655bf84537f9a32-81284262',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="chat">
    <div class="js-chatheader header clearfix">
        
        <div class="name">Andi <br/> Mustermann</div>
        
        <div class="controls">
            <p class="control">
                neue Nachricht <span class="icon-Plus"></span>
            </p>
            <p class="control"> <span class="icon-Plus"></span>
                neue Gruppe
            </p>
            <p class="control"> <span class="icon-Melden"></span>
                Benutzer melden 
            </p>
        </div>
        
    </div>
    <div class="js-chatwindow chatwindow">
        
        <?php echo smarty_function_xr_atom(array('a_id'=>680,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>697,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>681,'dayChange'=>1,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>680,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>697,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>680,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>697,'return'=>1),$_smarty_tpl);?>

        
    </div>
    <div class="js-chattext textwindow">
        <textarea class="form-control"placeholder="Antworten..."></textarea>
    </div>
    
</div>