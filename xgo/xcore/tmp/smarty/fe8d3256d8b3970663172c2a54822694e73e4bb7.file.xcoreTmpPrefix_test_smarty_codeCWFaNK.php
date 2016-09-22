<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 11:36:39
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCWFaNK" */ ?>
<?php /*%%SmartyHeaderCode:11117420665694d737376aa2-71611694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe8d3256d8b3970663172c2a54822694e73e4bb7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCWFaNK',
      1 => 1452594999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11117420665694d737376aa2-71611694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php if (!$_smarty_tpl->getVariable('user')->value){?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['USER'], null, null);?>
<?php }?>

<div class="profilerstellen meinprofil-meinedaten">
   
    <?php echo smarty_function_xr_atom(array('a_id'=>783,'return'=>1,'desc'=>'oben'),$_smarty_tpl);?>

    
    <div class="mainform">
        <form class="form-mein-user" id="form-mein-user">
            <h3><?php echo smarty_function_xr_translate(array('tag'=>"Über Mich"),$_smarty_tpl);?>
</h3>
       
            <?php echo smarty_function_xr_atom(array('a_id'=>784,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'profile'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'return'=>1,'desc'=>'userdaten'),$_smarty_tpl);?>
 
            
            
            <div class="submitbutton-container">
                <button class="pull-right" id="form-mein-profil-save-user" data-redirect="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Speichern"),$_smarty_tpl);?>
</button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>