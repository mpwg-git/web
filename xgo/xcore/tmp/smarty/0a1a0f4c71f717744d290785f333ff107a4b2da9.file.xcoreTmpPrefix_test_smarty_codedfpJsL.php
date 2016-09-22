<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 15:22:27
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedfpJsL" */ ?>
<?php /*%%SmartyHeaderCode:17934070505697af23825095-10256157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a1a0f4c71f717744d290785f333ff107a4b2da9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedfpJsL',
      1 => 1452781347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17934070505697af23825095-10256157',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>

<div class="profil">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>789,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1,'desc'=>"profil main image"),$_smarty_tpl);?>

    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>790,'return'=>1,'matchGesamt'=>$_smarty_tpl->getVariable('matching')->value['RESULT']['matchGesamt'],'desc'=>"matching infos"),$_smarty_tpl);?>

    
    <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
        <div class="wg-img-wrapper">
            <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

        </div>
    <?php }?>
    
    
    <div class="maininfo">
        <div class="pull-right" style="padding-top:2px;padding-right:10px;color:#04e0d7;">
            <a href="#" onclick="fe_map.refreshSearch()">
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
    
    <div class="fakten clearfix">
        <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_GEBURTSDATUM']!='0000-00-00'&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_GEBURTSDATUM']!=''){?>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Geburtstag"),$_smarty_tpl);?>
</span><span class="info"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_GEBURTSDATUM'],"%d.%m.%Y");?>
</span>
        </div>
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_TELEFON']!=''){?>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Telefonnummer"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['wz_TELEFON'];?>
</span>
        </div>
        <?php }?>
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
