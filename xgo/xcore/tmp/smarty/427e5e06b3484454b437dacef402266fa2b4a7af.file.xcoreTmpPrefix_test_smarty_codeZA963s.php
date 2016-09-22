<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 00:42:29
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZA963s" */ ?>
<?php /*%%SmartyHeaderCode:89459912255de40d5739d48-14143589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '427e5e06b3484454b437dacef402266fa2b4a7af' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZA963s',
      1 => 1440628949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89459912255de40d5739d48-14143589',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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
                Fülle dein Profil aus.<br />
                Lorem ipsum dolor sit sed,
                etiam in nonullum.
            </a>
        </li>
       
        <li <?php if ($_smarty_tpl->getVariable('P_ID')->value==10&&$_smarty_tpl->getVariable('wteststate')->value!=1){?>class="active"<?php }?>>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
">
                
                <?php if ($_smarty_tpl->getVariable('wgteststate')->value==1){?>
                
                    <?php echo smarty_function_xr_translate(array('tag'=>"Du hast bereits alle WG-Test Fragen beantwortet."),$_smarty_tpl);?>

                
                <?php }elseif($_smarty_tpl->getVariable('wgteststate')->value==2){?>
                    Du hast bereits einige Fragen beantwortet. <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
">WG-Test fortsetzen</a>
                <?php }else{ ?>
                
                    Beantworte die Fragen,
                    lorem ipsum dolor sit sed.<br />
                    Etiam in nonullum.
                    
                <?php }?>
            </a>
        </li>
        <li <?php if ($_smarty_tpl->getVariable('P_ID')->value==15){?>class="active"<?php }?>>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
">
                Wähle deine gewünschte
                Mitgliedschaft. Lorem in 
                sed etiam nonulli quibus es.
                Dolor sit sed.
            </a>
        </li>
    </ol>
    
    <p class="gleich-waehlen">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
" class="uppercase">
            <span class="icon-pfeil"></span>Gleich ein Package wählen?
        </a>
    </p>
    
    <p class="line-3">
        Und schon kannst du lorem ipsum dolor sit. Sed etiam in nonulli.
    </p>
    
</div>