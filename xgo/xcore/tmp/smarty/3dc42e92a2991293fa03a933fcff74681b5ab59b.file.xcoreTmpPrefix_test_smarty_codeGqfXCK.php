<?php /* Smarty version Smarty-3.0.7, created on 2015-11-19 12:25:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGqfXCK" */ ?>
<?php /*%%SmartyHeaderCode:315606233564db1c648ebf1-76730682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dc42e92a2991293fa03a933fcff74681b5ab59b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGqfXCK',
      1 => 1447932358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '315606233564db1c648ebf1-76730682',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="js-toggle-favourite <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
" data-type="<?php echo $_smarty_tpl->getVariable('theType')->value;?>
" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
" <?php if ($_smarty_tpl->getVariable('addSpecialStyle')->value==1){?>style="position: relative;
    z-index: 9; display: inline-block;
    font-size: 2.31vw;"<?php }?>>
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