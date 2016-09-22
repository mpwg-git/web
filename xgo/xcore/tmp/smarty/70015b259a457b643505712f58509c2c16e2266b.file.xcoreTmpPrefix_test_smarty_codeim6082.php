<?php /* Smarty version Smarty-3.0.7, created on 2015-12-23 01:11:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeim6082" */ ?>
<?php /*%%SmartyHeaderCode:11719403385679e6cc761424-58527988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70015b259a457b643505712f58509c2c16e2266b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeim6082',
      1 => 1450829516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11719403385679e6cc761424-58527988',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?>

<div class="col-xs-12 picture-col searchresult-single">
    
    <div class="img-wrapper searchresult-wrapper-js" data-userid="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">
        <div class="inner-wrapper">
            
            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>768,'colorspace'=>"gray",'var'=>'img'),$_smarty_tpl);?>

            
            <div class="img-responsive mobile-shower-img" style="background-image: url(<?php echo $_smarty_tpl->getVariable('img')->value['src'];?>
);">
            </div>
            
            
            <div class="matchinginfos">
                
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