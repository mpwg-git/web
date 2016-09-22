<?php /* Smarty version Smarty-3.0.7, created on 2016-07-09 18:02:19
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAvx6kV" */ ?>
<?php /*%%SmartyHeaderCode:17651285875781200b82a5d6-95747353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1924bb370c6f200e7f5b1c5bb4700aeac6ce9f0d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAvx6kV',
      1 => 1468080139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17651285875781200b82a5d6-95747353',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div id="EmailConfirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo smarty_function_xr_translate(array('tag'=>'E-Mail Adresse bestätigen'),$_smarty_tpl);?>
</h4>
      </div>
      <div class="modal-body">
        <p>
            <?php echo smarty_function_xr_translate(array('tag'=>'Deine E-Mail Adresse muss noch bestätigt werden. Erst danach kannst du andere kontaktieren sund selbst von anderen Benutzern gefunden werden! In deiner Inbox findest du ein Mail dazu, wenn nicht, dann:'),$_smarty_tpl);?>

            <br /><br />
            <button id="sendEmailConfirmationAgain"><?php echo smarty_function_xr_translate(array('tag'=>'Erneut Bestätigungsmail senden'),$_smarty_tpl);?>
</button>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo smarty_function_xr_translate(array('tag'=>'Schließen'),$_smarty_tpl);?>
</button>
      </div>
    </div>

  </div>
</div>