<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 14:07:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekIrdU5" */ ?>
<?php /*%%SmartyHeaderCode:68297707355defd873dcf62-16549280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e196307d9cfaf24a14f568fafccbf87582239ae3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekIrdU5',
      1 => 1440677255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68297707355defd873dcf62-16549280',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="col-xs-4 picture-col searchresult-single">
    
    
    <div class="img-wrapper" data-userid="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">
        <div class="inner-wrapper">
            
            <?php if ($_smarty_tpl->getVariable('data')->value['FAV']==1){?>
                <span class="overlay-fav">
                    <span class="overlay-fav-inner">
                        <span class="icon icon-Favourite_inaktiv"></span>    
                    </span>
                </span>
            <?php }?>
            
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'h'=>500,'w'=>470,'rmode'=>"cco",'class'=>"img-responsive shower-img"),$_smarty_tpl);?>

            
            <?php echo smarty_function_xr_atom(array('a_id'=>774,'return'=>1,'data'=>$_smarty_tpl->getVariable('data')->value,'desc'=>'map indicator'),$_smarty_tpl);?>

            
            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper is-suche">
                        <span class="pull-left drduck icon-duck"></span>
                        <span class="pull-right">
                            <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div style="clear:both"></div>
                    <div class="infos">
                        
                        <?php if ($_smarty_tpl->getVariable('data')->value['GESCHLECHT']=='M'){?>
                            <span class="icon-mann_black"></span>
                        <?php }else{ ?>
                            <span class="icon-frau_black"></span>
                        <?php }?>
                        
                        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</p>
                        <p class="durchschnitt"><?php echo $_smarty_tpl->getVariable('data')->value['ALTER'];?>
 Jahre</p>
                        
                        <div class="button-container-favblock clearfix">
                            <div class="inner clearfix">
                                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>14,'id'=>$_smarty_tpl->getVariable('data')->value['ID'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['ID']),$_smarty_tpl);?>
" style="    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    z-index: 1;"></a>
                                <div class="item">
                                    
                                    <?php echo smarty_function_xr_atom(array('a_id'=>769,'state'=>$_smarty_tpl->getVariable('data')->value['FAV'],'userId'=>$_smarty_tpl->getVariable('data')->value['ID'],'addSpecialStyle'=>1,'return'=>1,'desc'=>"fav icon"),$_smarty_tpl);?>

                                    
                                </div>
                                <div class="item">
                                    
                                    <?php echo smarty_function_xr_atom(array('a_id'=>770,'state'=>$_smarty_tpl->getVariable('data')->value['BLOCK'],'userId'=>$_smarty_tpl->getVariable('data')->value['ID'],'addSpecialStyle'=>1,'return'=>1,'desc'=>"block icon"),$_smarty_tpl);?>
                                    
                                           
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>