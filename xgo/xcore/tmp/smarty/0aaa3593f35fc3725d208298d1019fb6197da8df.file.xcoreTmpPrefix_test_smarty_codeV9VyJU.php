<?php /* Smarty version Smarty-3.0.7, created on 2016-04-07 11:30:52
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeV9VyJU" */ ?>
<?php /*%%SmartyHeaderCode:281863505570628ccd4db42-10076694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0aaa3593f35fc3725d208298d1019fb6197da8df' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeV9VyJU',
      1 => 1460021452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281863505570628ccd4db42-10076694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="startsite">
    <ul class="menu">
        <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('extraParams')->value==1){?>class="active"<?php }?>><span class="bigicon icon-WorumGehts"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span></a>
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><span class="bigicon icon-Registrieren"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span></span></a>   
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"><span class="bigicon icon-Anmelden"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span></a>
            </li>
        <?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('extraParams')->value==1){?>class="active"<?php }?>><span class="bigicon en-icon-WorumGehts_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span></a>
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><span class="bigicon en-icon-Registrieren_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></span></a>   
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"><span class="bigicon en-icon-Anmelden_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span></a>
            </li>
        <?php }?>
    </ul>
</div>

