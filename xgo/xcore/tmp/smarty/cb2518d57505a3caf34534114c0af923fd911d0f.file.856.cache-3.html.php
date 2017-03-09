<?php /* Smarty version Smarty-3.0.7, created on 2017-02-10 17:58:14
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/856.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:1793985885589df126211097-79758526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb2518d57505a3caf34534114c0af923fd911d0f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/856.cache-3.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1793985885589df126211097-79758526',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Unregistrierte Frauen in WG?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_lastChanged']==$_smarty_tpl->getVariable('data')->value['ROOM']['wz_created']){?>
            <input class="form-control" name="UNREG_F" value="" id="UNREG_F" placeholder="0" rel="required"  />
        <?php }else{ ?>
            <input class="form-control" name="UNREG_F" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_UNREG_F'];?>
" id="UNREG_F" placeholder="0" rel="required"  />
        <?php }?>
    </div>
</div>
