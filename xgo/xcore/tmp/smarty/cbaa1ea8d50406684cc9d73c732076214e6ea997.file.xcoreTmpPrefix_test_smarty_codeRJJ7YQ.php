<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 17:06:05
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRJJ7YQ" */ ?>
<?php /*%%SmartyHeaderCode:8100009115653396db3fc16-13132948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbaa1ea8d50406684cc9d73c732076214e6ea997' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRJJ7YQ',
      1 => 1448294765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8100009115653396db3fc16-13132948',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getRoomData",'var'=>"data"),$_smarty_tpl);?>


<?php if ($_REQUEST['dev']==1){?>
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

<?php }?>

<div class="profil">
    
    
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>814,'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <div class="profil profil-room">
            
            <div class="row">
                
                <div class="col-sm-12" style="">
                    <div class="pull-right" style="padding-top:20px;padding-right:10px;color:#04e0d7;">
                        <a href="javascript:history.back();">
                            <span class="icon-Close"></span>
                        </a>
                    </div>
                    <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
                        <div class="wg-img-wrapper">
                            <h3 class="headline">Die WGx</h3>
                            
                                <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

                        </div>
                    <?php }?>        
                </div>
                
            </div>
            
            
            
            <div class="clearfix"></div>
            
            
            <div class="profil-text">
                <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_BESCHREIBUNG'];?>

            </div>
            
            
            

            <div class="mitbewohner clearfix">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
                <?php echo smarty_function_xr_atom(array('a_id'=>812,'mitbewohner'=>$_smarty_tpl->getVariable('data')->value['ROOMIES'],'return'=>1),$_smarty_tpl);?>

            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>706,'return'=>1,'desc'=>'fakten container'),$_smarty_tpl);?>

            
            
        </div>
    </div>
    
</div>

<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT']!=0&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG']!=0){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>777,'lat'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT'],'lng'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG'],'return'=>1),$_smarty_tpl);?>

<?php }?>



