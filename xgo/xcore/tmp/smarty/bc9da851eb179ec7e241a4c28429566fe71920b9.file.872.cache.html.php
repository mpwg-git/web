<?php /* Smarty version Smarty-3.0.7, created on 2017-02-10 17:58:14
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/872.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:736642198589df1263cee68-35826033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc9da851eb179ec7e241a4c28429566fe71920b9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/872.cache.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '736642198589df1263cee68-35826033',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label for="zusatzkosten-val"><?php echo smarty_function_xr_translate(array('tag'=>"Zusatzkosten?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_lastChanged']==$_smarty_tpl->getVariable('data')->value['ROOM']['wz_created']){?>
            <input class="form-control" name="ZUSATZKOSTEN" value="" id="zusatzkosten-val" placeholder="0" />
        <?php }else{ ?>
            <input class="form-control" name="ZUSATZKOSTEN" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZUSATZKOSTEN'];?>
" id="zusatzkosten-val" placeholder="0"  />
        <?php }?>        
    </div>
    <!--<div class="error-div" id="ZUSATZKOSTEN_error">-->
    <!--    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>-->
    <!--    <span class="error-message">Bitte Zusatzkosten angeben</span>-->
    <!--</div>-->
</div>