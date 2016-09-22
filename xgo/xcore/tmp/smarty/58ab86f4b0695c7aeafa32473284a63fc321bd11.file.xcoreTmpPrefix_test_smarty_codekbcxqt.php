<?php /* Smarty version Smarty-3.0.7, created on 2015-08-05 15:08:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekbcxqt" */ ?>
<?php /*%%SmartyHeaderCode:128581264355c20ade274848-34377173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58ab86f4b0695c7aeafa32473284a63fc321bd11' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekbcxqt',
      1 => 1438780126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128581264355c20ade274848-34377173',
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
                neue Nachricht <span class="icon-rel icon-plus-rel"></span>
            </p>
            <p class="control"> <span class="icon-rel icon-plus-rel"></span>
                neue Gruppe
            </p>
            <p class="control"> <span class="icon-rel icon-melden-rel"></span>
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