<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 15:56:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCZJ5GV" */ ?>
<?php /*%%SmartyHeaderCode:18448717875653291935a950-43884680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd616d38fb29e76639cebb45772dc87418a7bbda7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCZJ5GV',
      1 => 1448290585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18448717875653291935a950-43884680',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="js-toggle-favourite <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
" data-type="<?php echo $_smarty_tpl->getVariable('theType')->value;?>
">
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