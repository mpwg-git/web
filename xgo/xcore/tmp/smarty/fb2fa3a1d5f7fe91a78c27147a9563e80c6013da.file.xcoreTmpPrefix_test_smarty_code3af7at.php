<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 11:25:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3af7at" */ ?>
<?php /*%%SmartyHeaderCode:88204857855b74a79c9f0b7-76491577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb2fa3a1d5f7fe91a78c27147a9563e80c6013da' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3af7at',
      1 => 1438075513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88204857855b74a79c9f0b7-76491577',
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
                neue Nachricht 
            </p>
            <p class="control">
                neue Gruppe
            </p>
            <p class="control">
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