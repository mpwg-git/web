<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 20:34:48
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJmnNxp" */ ?>
<?php /*%%SmartyHeaderCode:561000505697f8584135e9-66989688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07c4972dc783bb0f4c13555faa3862e17cde7060' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJmnNxp',
      1 => 1452800088,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '561000505697f8584135e9-66989688',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('wgteststate')->value),$_smarty_tpl);?>

<div class="meinprofil-erklaerung">
    
    <span class="icon-duck"></span>
    <p class="line-1">dr duck says:</p>
    <span class="line-2 looklikeh1">hello</span>
    <p class="line-1"><?php echo $_SESSION['xredaktor_feUser_wsf']['wz_VORNAME'];?>
</p>
    
    <ol>
        
        <li <?php if ($_smarty_tpl->getVariable('P_ID')->value==7||$_smarty_tpl->getVariable('P_ID')->value==8){?>class="active"<?php }?>>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
">
                <?php echo smarty_function_xr_translate(array('tag'=>"Fülle dein Profil aus.
                Lorem ipsum dolor sit sed,
                etiam in nonullum."),$_smarty_tpl);?>

            </a>
        </li>
       
        <li <?php if ($_smarty_tpl->getVariable('P_ID')->value==10&&$_smarty_tpl->getVariable('wgteststate')->value!=1){?>class="active"<?php }?>>
            
            <?php if ($_smarty_tpl->getVariable('wgteststate')->value==1){?>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>1,'m_suffix'=>"restart"),$_smarty_tpl);?>
">
            <?php }else{ ?>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>0),$_smarty_tpl);?>
">
            <?php }?>    
                
                <?php if ($_smarty_tpl->getVariable('wgteststate')->value==1){?>
                
                    <?php echo smarty_function_xr_translate(array('tag'=>"Du hast bereits alle WG-Test Fragen beantwortet."),$_smarty_tpl);?>
 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Klicke hier, um deine Antworten zu ändern"),$_smarty_tpl);?>

                
                <?php }elseif($_smarty_tpl->getVariable('wgteststate')->value==2){?>
                    <?php echo smarty_function_xr_translate(array('tag'=>"Du hast bereits einige Fragen beantwortet."),$_smarty_tpl);?>
 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"WG-Test fortsetzen"),$_smarty_tpl);?>

                <?php }else{ ?>
                
                     <?php echo smarty_function_xr_translate(array('tag'=>"Beantworte die Fragen, lorem ipsum dolor sit sed. Etiam in nonullum."),$_smarty_tpl);?>

                    
                <?php }?>
            </a>
        </li>
        <li <?php if ($_smarty_tpl->getVariable('P_ID')->value==15){?>class="active"<?php }?>>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
">
                <?php echo smarty_function_xr_translate(array('tag'=>"Wähle deine gewünschte
                Mitgliedschaft. Lorem in 
                sed etiam nonulli quibus es.
                Dolor sit sed."),$_smarty_tpl);?>

            </a>
        </li>
    </ol>
    
    
    <p class="line-3">
        <?php echo smarty_function_xr_translate(array('tag'=>"Und schon kannst du lorem ipsum dolor sit. Sed etiam in nonulli."),$_smarty_tpl);?>

    </p>
    
</div>