<?php /* Smarty version Smarty-3.0.7, created on 2015-11-17 10:06:38
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesqmTvh" */ ?>
<?php /*%%SmartyHeaderCode:825535793564aee1e075496-96791244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0e61569ae2950f7e38ae72e2911ceb5dad5771a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesqmTvh',
      1 => 1447751198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '825535793564aee1e075496-96791244',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>
<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>

<div class="profil">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>789,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1,'desc'=>"profil main image"),$_smarty_tpl);?>

    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>790,'return'=>1,'matchGesamt'=>$_smarty_tpl->getVariable('matching')->value['RESULT']['matchGesamt'],'desc'=>"matching infos"),$_smarty_tpl);?>

    
    <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
        <div class="wg-img-wrapper">
            <h3 class="headline">Die WG</h3>
                <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

        </div>
    <?php }?>
    
    
    <div class="maininfo">
        <div class="pull-right" style="padding-top:2px;padding-right:10px;color:#04e0d7;">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                <span class="icon-Close"></span>
            </a>
        </div> 
        
        <h3 class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
</h3>
        <p class="subinfo"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
<?php if ($_smarty_tpl->getVariable('data')->value['USER']['ALTER']>0){?> | <?php echo $_smarty_tpl->getVariable('data')->value['USER']['ALTER'];?>
 Jahre<?php }?></p>
        <span class="subheadline whoiam"><?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?><?php echo smarty_function_xr_translate(array('tag'=>"Suchender"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Anbieter"),$_smarty_tpl);?>
<?php }?></span>

    </div>
    
    
    <div class="profil-text">
         <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_BESCHREIBUNG'];?>

    </div>
    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>808,'matching'=>$_smarty_tpl->getVariable('data')->value['MATCHING'],'return'=>1,'desc'=>'matchinginfos detail'),$_smarty_tpl);?>

    
   <div class="fakten clearfix">
        <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Wunschliste"),$_smarty_tpl);?>
</h3>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>760,'return'=>1),$_smarty_tpl);?>

        
    </div>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>702,'return'=>1,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'desc'=>'button container'),$_smarty_tpl);?>

    
</div>

<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT']!=0&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG']!=0){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>777,'lat'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT'],'lng'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG'],'return'=>1),$_smarty_tpl);?>

<?php }?>
