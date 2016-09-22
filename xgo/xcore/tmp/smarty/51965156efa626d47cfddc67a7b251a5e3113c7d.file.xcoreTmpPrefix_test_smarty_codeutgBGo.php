<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 16:10:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeutgBGo" */ ?>
<?php /*%%SmartyHeaderCode:203579249755d5dff2ef3216-98346766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51965156efa626d47cfddc67a7b251a5e3113c7d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeutgBGo',
      1 => 1440079858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203579249755d5dff2ef3216-98346766',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>

<div class="profil">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>789,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1,'desc'=>"profil main image"),$_smarty_tpl);?>

        
    <?php echo smarty_function_xr_atom(array('a_id'=>790,'return'=>1,'desc'=>"matching infos"),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
    
    <div class="maininfo">
        <h3 class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
</h3>
        <p class="subinfo"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
<?php if ($_smarty_tpl->getVariable('data')->value['USER']['ALTER']>0){?> | <?php echo $_smarty_tpl->getVariable('data')->value['USER']['ALTER'];?>
 Jahre<?php }?></p>
    </div>
    
    <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
        <div class="wg-img-wrapper">
            <h3 class="headline">Die WG</h3>
                <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

        </div>
    <?php }?>
    
    <?php if ((count($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_MITBEWOHNER']['F'])>0||count($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_MITBEWOHNER']['M'])>0)){?>
        <div class="mitbewohner">
            <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
            <?php echo smarty_function_xr_atom(array('a_id'=>752,'mitbewohner'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_MITBEWOHNER'],'return'=>1),$_smarty_tpl);?>

        </div>
    <?php }?>
    
   <?php echo smarty_function_xr_atom(array('a_id'=>706,'return'=>1),$_smarty_tpl);?>

    
   <?php echo smarty_function_xr_atom(array('a_id'=>702,'return'=>1,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'desc'=>'button container'),$_smarty_tpl);?>

    
</div>