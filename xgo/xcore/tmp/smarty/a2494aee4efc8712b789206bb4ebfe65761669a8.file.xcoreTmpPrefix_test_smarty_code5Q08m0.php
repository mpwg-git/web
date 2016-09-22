<?php /* Smarty version Smarty-3.0.7, created on 2016-05-23 20:12:49
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5Q08m0" */ ?>
<?php /*%%SmartyHeaderCode:194513050357434821ef0f60-19448873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2494aee4efc8712b789206bb4ebfe65761669a8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5Q08m0',
      1 => 1464027169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194513050357434821ef0f60-19448873',
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
            <button><?php echo smarty_function_xr_translate(array('tag'=>'Erneut Bestätigungsmail senden'),$_smarty_tpl);?>
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