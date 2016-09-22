<?php /* Smarty version Smarty-3.0.7, created on 2015-07-18 12:00:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeaBd0R" */ ?>
<?php /*%%SmartyHeaderCode:130663372055aa23ccebd965-24090761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a31ddcd165c44a0a85bf123f04ad3bde5c323d5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeaBd0R',
      1 => 1437213644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130663372055aa23ccebd965-24090761',
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
        <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_RIGHTROW')->value,'return'=>1),$_smarty_tpl);?>

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