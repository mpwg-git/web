<?php /* Smarty version Smarty-3.0.7, created on 2016-04-30 19:10:28
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCHXHE1" */ ?>
<?php /*%%SmartyHeaderCode:3423511655724e7048e3143-56260674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0decff654df401e7df9440a4cfab799cb2b5e9f3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCHXHE1',
      1 => 1462036228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3423511655724e7048e3143-56260674',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="all-rows-container-top">
    <div class="all-rows-container clearfix">
        <div class="left-row <?php echo $_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_LEFT')->value;?>
">
            <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_LEFTROW')->value,'return'=>1),$_smarty_tpl);?>

        </div>
        
       
        <div class="middle-row darkgrey <?php echo $_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_MIDDLE')->value;?>
">
       
            <div class="scrollbarfix">
                <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_MIDDLEROW')->value,'return'=>1),$_smarty_tpl);?>

            </div>
        </div>
        <div class="right-row <?php echo $_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_RIGHT')->value;?>
">
            <div class="content">
                
                <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_RIGHTROW')->value,'extraParams'=>$_smarty_tpl->getVariable('DESKTOP_RIGHTROW_PARAMS')->value,'return'=>1),$_smarty_tpl);?>

                
                <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

                
            </div>
        </div>
    </div>
</div>