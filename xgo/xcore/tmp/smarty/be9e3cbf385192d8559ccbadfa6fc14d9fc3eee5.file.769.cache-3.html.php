<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 13:58:56
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/769.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:132415546658c00010470fe6-39172909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be9e3cbf385192d8559ccbadfa6fc14d9fc3eee5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/769.cache-3.html',
      1 => 1488977911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132415546658c00010470fe6-39172909',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>
<div class="js-toggle-favourite js-toggle-fade" <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='biete'){?>data-type="room"<?php }else{ ?>data-type="<?php echo $_smarty_tpl->getVariable('theType')->value;?>
"<?php }?> data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
" <?php if ($_smarty_tpl->getVariable('addSpecialStyle')->value==1){?>style="position: relative;
    z-index: 9; display: inline-block;
    font-size: 2.31vw;"<?php }?>>
    <div class="inactive" <?php if ($_smarty_tpl->getVariable('state')->value==true){?>style="display: none;"<?php }?>>
        <span id="toggle-favourite" class="icon icon-Favourite_inaktiv"></span>
        <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('description')->value),$_smarty_tpl);?>
</span>
        <?php }?>    
    </div>
    
    <div class="active" <?php if ($_smarty_tpl->getVariable('state')->value==false){?>style="display: none;"<?php }?>>
        <span class="icon icon-Favourite_aktiv">
		    <span class="path1"></span><span class="path2"></span>
		</span>
		<?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('description')->value),$_smarty_tpl);?>
</span>
        <?php }?>
    </div>
    
</div>
