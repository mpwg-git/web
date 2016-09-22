<?php /* Smarty version Smarty-3.0.7, created on 2015-07-23 14:28:18
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyWavJn" */ ?>
<?php /*%%SmartyHeaderCode:85222718155b0dde2aaf1f0-62880465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5628a8ad5b54f462710f6e8c0be606b90ffa2cfc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyWavJn',
      1 => 1437654498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85222718155b0dde2aaf1f0-62880465',
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