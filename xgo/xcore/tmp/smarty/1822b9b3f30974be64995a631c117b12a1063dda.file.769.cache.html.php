<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 18:15:51
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/769.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:62434040056573e47640af6-19721765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1822b9b3f30974be64995a631c117b12a1063dda' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/769.cache.html',
      1 => 1448558150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62434040056573e47640af6-19721765',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="js-toggle-favourite" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
" <?php if ($_smarty_tpl->getVariable('isRoom')->value==1){?>data-type="room"<?php }?>>
    <div class="inactive" <?php if ($_smarty_tpl->getVariable('state')->value==true){?>style="display: none;"<?php }?>>
        <span class="icon icon-Favourite_inaktiv"></span>
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