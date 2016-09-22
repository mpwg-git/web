<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 18:17:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHTvlLq" */ ?>
<?php /*%%SmartyHeaderCode:37226576456573e9938dc86-41473105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '668b939b61c0f92e3aee532214e0d064ac21c133' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHTvlLq',
      1 => 1448558233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37226576456573e9938dc86-41473105',
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