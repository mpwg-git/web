<?php /* Smarty version Smarty-3.0.7, created on 2015-07-18 12:11:50
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJvJ4RC" */ ?>
<?php /*%%SmartyHeaderCode:73109804355aa266657cea0-53421308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56896f2e76ec959c2ad8bb5b221ca5ca0ca2d7e5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJvJ4RC',
      1 => 1437214310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73109804355aa266657cea0-53421308',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="left-row">
    <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_LEFTROW')->value,'return'=>1),$_smarty_tpl);?>

</div>
<div class="middle-row darkgrey">
    <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_MIDDLEROW')->value,'return'=>1),$_smarty_tpl);?>

</div>
<div class="right-row">
    <div class="content">
        <span class="close">
            <span class="icon-Close"></span>
        </span>
        <div class="clearfix"></div>
        <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_RIGHTROW')->value,'extraParams'=>$_smarty_tpl->getVariable('DESKTOP_RIGHTROW_PARAMS')->value,'return'=>1),$_smarty_tpl);?>

        <div class="footer">
            <a href="#">IMPRESSUM</a> | <a href="#">AGBs</a> | <a href="#">FAQ</a><br />
            &copy; WHO SHOWERS FIRST - est. 2015
            <div class="pull-right">
                <a href="#"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>174,'h'=>40,'return'=>1),$_smarty_tpl);?>
</a>
                <a href="#"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>169,'h'=>40,'return'=>1),$_smarty_tpl);?>
</a>
            </div>
        </div>
    </div>
</div>