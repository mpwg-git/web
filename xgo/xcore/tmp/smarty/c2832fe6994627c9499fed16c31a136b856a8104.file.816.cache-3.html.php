<?php /* Smarty version Smarty-3.0.7, created on 2017-02-10 17:58:14
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/816.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:1286626256589df1263281c6-62171348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2832fe6994627c9499fed16c31a136b856a8104' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/816.cache-3.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1286626256589df1263281c6-62171348',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_lastChanged']==$_smarty_tpl->getVariable('data')->value['ROOM']['wz_created']){?>
            <input class="form-control" name="MIETE" value="" id="MIETE" placeholder="€?" rel="required"  />
        <?php }else{ ?>
            <input class="form-control" name="MIETE" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE'];?>
" id="MIETE" placeholder="€?" rel="required"  />
        <?php }?>
    </div>
    
    <div class="error-div" id="MIETE_error">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>"Bitte Miete(von) angeben"),$_smarty_tpl);?>
</span>
    </div>
    
</div>