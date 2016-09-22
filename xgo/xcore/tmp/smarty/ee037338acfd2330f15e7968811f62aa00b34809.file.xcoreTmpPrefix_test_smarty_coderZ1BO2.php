<?php /* Smarty version Smarty-3.0.7, created on 2016-08-12 14:12:11
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderZ1BO2" */ ?>
<?php /*%%SmartyHeaderCode:135778032257adbd1b6b00b4-90388335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee037338acfd2330f15e7968811f62aa00b34809' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderZ1BO2',
      1 => 1471003931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135778032257adbd1b6b00b4-90388335',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>

<div class="meinprofil-erklaerung">
    
    <span class="icon-duck"></span>
    <p class="line-1">dr duck says:</p>
    <span class="line-2 looklikeh1">hello</span>
    <p class="line-1"><?php echo $_SESSION['xredaktor_feUser_wsf']['wz_VORNAME'];?>
</p>
    <style>
        @media screen and (max-width: 1438px) {
            ol > li > a {
                display: inline-block;
                line-height: 1.5;
                vertical-align: text-top;
            }
        }
        @media screen and (max-width: 1204px) {
            ol > li > a {
                line-height: 1.2;
            }
        }
    </style>
    <ol>
        
        <li <?php if ($_smarty_tpl->getVariable('P_ID')->value==7||$_smarty_tpl->getVariable('P_ID')->value==8){?>class="active"<?php }?>>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
">
                <?php echo smarty_function_xr_translate(array('tag'=>"Fülle dein Profil aus.
                Lorem ipsum dolor sit sed,
                etiam in nonullum."),$_smarty_tpl);?>

            </a>
        </li>
       
        <li <?php if (($_smarty_tpl->getVariable('P_ID')->value==10&&$_smarty_tpl->getVariable('wgteststate')->value!=1)||$_smarty_tpl->getVariable('wgteststate')->value==1||$_smarty_tpl->getVariable('wgteststate')->value==2||$_smarty_tpl->getVariable('wgteststate')->value==0){?>class="active"<?php }?>>
            <?php if ($_smarty_tpl->getVariable('wgteststate')->value==1){?>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Du hast bereits alle WG-Test Fragen beantwortet."),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>"Klicke hier, um deine Antworten zu ändern"),$_smarty_tpl);?>
</a>
            <?php }elseif($_smarty_tpl->getVariable('wgteststate')->value==2){?>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>0),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Du hast bereits einige Fragen beantwortet."),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>"WG-Test fortsetzen"),$_smarty_tpl);?>
</a>
            <?php }else{ ?>
                 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>0),$_smarty_tpl);?>
" style="display:inline-block; line-height: 1.7;vertical-align:middle;"><?php echo smarty_function_xr_translate(array('tag'=>"Beantworte die Fragen, lorem ipsum dolor sit sed. Etiam in nonullum."),$_smarty_tpl);?>
</a>
            <?php }?>
        </li>
        
        <li <?php if ($_smarty_tpl->getVariable('P_ID')->value==15||$_smarty_tpl->getVariable('wgteststate')->value==1){?>class="active"<?php }?>>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
">
                <?php echo smarty_function_xr_translate(array('tag'=>'Suchergebnisse anzeigen'),$_smarty_tpl);?>

            </a>
        </li>
    </ol>
    
    
    <p class="line-3">
        <?php echo smarty_function_xr_translate(array('tag'=>"Und schon kannst du lorem ipsum dolor sit. Sed etiam in nonulli."),$_smarty_tpl);?>

    </p>
    
</div>