<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 13:23:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecoNouN" */ ?>
<?php /*%%SmartyHeaderCode:41403318655d5b89b1bd912-08979437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7769b5ca91bbe7de18bfe0c68625569fc179c962' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecoNouN',
      1 => 1440069787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41403318655d5b89b1bd912-08979437',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-favourite" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
">
    <div class="inactive" <?php if ($_smarty_tpl->getVariable('state')->value==true){?>style="display: none;"<?php }?>>
        <span class="icon icon-Favourite_inaktiv"></span>
        <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>    
    </div>
    
    <div class="active" <?php if ($_smarty_tpl->getVariable('state')->value==false){?>style="display: none;"<?php }?>>
        <span class="icon-Favourite_aktiv">
		    <span class="path1"></span><span class="path2"></span>
		</span>
		<?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>
    </div>
    
</div>