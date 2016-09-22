<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 23:37:18
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYJo4Ce" */ ?>
<?php /*%%SmartyHeaderCode:3861594025679d09e0de068-28287618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b257eb6d0b7ca057ec79dbed2825a5b8b3add520' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYJo4Ce',
      1 => 1450823838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3861594025679d09e0de068-28287618',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'libx::isDeveloper','var'=>'dev'),$_smarty_tpl);?>


<div class="col-xs-12 picture-col searchresult-single">
    
    <div class="img-wrapper searchresult-wrapper-js" data-userid="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">
        <div class="inner-wrapper">
            
            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>768,'colorspace'=>"gray",'var'=>'img'),$_smarty_tpl);?>

            
            <div class="img-responsive mobile-shower-img" style="background-image: url(<?php echo $_smarty_tpl->getVariable('img')->value['src'];?>
);">
            </div>
            
            
            <div class="matchinginfos">
                <?php if ($_smarty_tpl->getVariable('dev')->value){?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>
<?php }?>
                <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
<?php if ($_smarty_tpl->getVariable('data')->value['MATCHPERCENT']==''){?>?<?php }?></span>
                <span class="match">match</span>
            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>774,'return'=>1,'data'=>$_smarty_tpl->getVariable('data')->value,'desc'=>'map indicator'),$_smarty_tpl);?>

            
            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper is-suche">
                        <span class="pull-left drduck icon-duck"></span>
                        <span class="pull-right">
                            <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
<?php if ($_smarty_tpl->getVariable('data')->value['MATCHPERCENT']==''){?>?<?php }?></span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div style="clear:both"></div>
                    <div class="infos">
                        
                        <div class="item-search-geschlecht">
                            <?php if ($_smarty_tpl->getVariable('data')->value['GESCHLECHT']=='M'){?>
                                <span class="icon-mann_black"></span>
                            <?php }else{ ?>
                                <span class="icon-frau_black"></span>
                            <?php }?>    
                        </div>
                        
                        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</p>
                        <p class="durchschnitt"><?php echo $_smarty_tpl->getVariable('data')->value['ALTER'];?>
 Jahre</p>
                        
                        
                        <p class="button-search-profil-container">
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>14,'id'=>$_smarty_tpl->getVariable('data')->value['ID'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['ID']),$_smarty_tpl);?>
" class="btn button-search-profil">Profil</a>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>