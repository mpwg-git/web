<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 05:04:17
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaIEwKE" */ ?>
<?php /*%%SmartyHeaderCode:613416658561c74b14c0295-26804135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '242fdcb68a17144396616d76811d7a5addeaa5b5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaIEwKE',
      1 => 1444705457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '613416658561c74b14c0295-26804135',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="col-xs-4 picture-col searchresult-single">
    
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>14,'id'=>$_smarty_tpl->getVariable('data')->value['ID'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['ID']),$_smarty_tpl);?>
">
    <div class="img-wrapper" data-userid="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">
        <div class="inner-wrapper">
            
            <?php if ($_smarty_tpl->getVariable('data')->value['FAV']==1&&1==2){?>
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
                        
                        <?php if ($_smarty_tpl->getVariable('data')->value['ALTER']!=''){?>
                            <p class="durchschnitt"><?php echo $_smarty_tpl->getVariable('data')->value['ALTER'];?>
 Jahre</p>
                        <?php }?>
                        
                        <div class="button-container-favblock clearfix">
                            <div class="inner clearfix">
                                <div class="item">
                                    
                                    <?php echo smarty_function_xr_atom(array('a_id'=>769,'state'=>$_smarty_tpl->getVariable('data')->value['FAV'],'userId'=>$_smarty_tpl->getVariable('data')->value['ID'],'return'=>1,'desc'=>"fav icon"),$_smarty_tpl);?>

                                    
                                </div>
                                <div class="item">
                                    
                                    <?php echo smarty_function_xr_atom(array('a_id'=>770,'state'=>$_smarty_tpl->getVariable('data')->value['BLOCK'],'userId'=>$_smarty_tpl->getVariable('data')->value['ID'],'addClass'=>"js-toggle-fade",'return'=>1,'desc'=>"block icon"),$_smarty_tpl);?>
                                    
                                           
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>