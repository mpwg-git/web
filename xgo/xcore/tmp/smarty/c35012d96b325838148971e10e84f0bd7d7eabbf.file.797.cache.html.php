<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 11:11:55
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/797.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1531948177565437eb2b2008-97559589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c35012d96b325838148971e10e84f0bd7d7eabbf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/797.cache.html',
      1 => 1448359914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1531948177565437eb2b2008-97559589',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php if (!$_smarty_tpl->getVariable('user')->value){?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['USER'], null, null);?>

<?php }?>


<div class="geschlecht">
    <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='F')){?>
    <label for="female" class="radio">
        <input id="female" type="radio" name="GESCHLECHT" value="F" disabled="disabled" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='F')){?>checked="checked"<?php }?>>
        <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
    </label>
    <?php }else{ ?>
    <label for="male" class="radio">
        <input id="male" type="radio" name="GESCHLECHT" value="M" disabled="disabled" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='M')){?>checked="checked"<?php }?>>
        <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </label>
    <?php }?>
</div>