<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 18:17:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/770.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:121158571956573e99b94435-58768774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea4e1aa91eee0b6959db61f24aa6345f1d51aee8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/770.cache.html',
      1 => 1448558233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121158571956573e99b94435-58768774',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><!-- 770 default -->
<div class="js-toggle-blocked <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
" <?php if ($_smarty_tpl->getVariable('isRoom')->value==1){?>data-type="room"<?php }else{ ?>data-type="<?php echo $_smarty_tpl->getVariable('theType')->value;?>
"<?php }?> data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
">
        
    <div class="inactive" <?php if ($_smarty_tpl->getVariable('state')->value==true){?>style="display: none;"<?php }?>>
        <span class="icon icon-Blocked_inaktiv"></span>
        <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('description')->value),$_smarty_tpl);?>
</span>
        <?php }?>    
    </div>
    
    <div class="active" <?php if ($_smarty_tpl->getVariable('state')->value==false){?>style="display: none;"<?php }?>>
        <span class="icon icon-Blocked_aktiv">
		    <span class="path1"></span><span class="path2"></span><span class="path3"></span>
		</span>
		<?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('description')->value),$_smarty_tpl);?>
</span>
        <?php }?>
    </div>
    
</div>