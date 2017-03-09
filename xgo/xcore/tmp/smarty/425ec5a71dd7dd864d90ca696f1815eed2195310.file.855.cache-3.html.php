<?php /* Smarty version Smarty-3.0.7, created on 2017-02-10 17:58:14
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/855.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:558323212589df1262430f0-54379386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '425ec5a71dd7dd864d90ca696f1815eed2195310' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/855.cache-3.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '558323212589df1262430f0-54379386',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Unregistrierte Männer in WG?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_lastChanged']==$_smarty_tpl->getVariable('data')->value['ROOM']['wz_created']){?>
            <input class="form-control" name="UNREG_M" value="" id="UNREG_M" placeholder="0" rel="required"  />
        <?php }else{ ?>
            <input class="form-control" name="UNREG_M" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_UNREG_M'];?>
" id="UNREG_M" placeholder="0" rel="required"  />
        <?php }?>
    </div>
</div>