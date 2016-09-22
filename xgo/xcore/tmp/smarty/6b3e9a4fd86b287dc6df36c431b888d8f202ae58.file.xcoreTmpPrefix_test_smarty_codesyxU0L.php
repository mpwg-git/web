<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 13:23:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesyxU0L" */ ?>
<?php /*%%SmartyHeaderCode:114367029555d5b894797418-35009635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b3e9a4fd86b287dc6df36c431b888d8f202ae58' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesyxU0L',
      1 => 1440069780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114367029555d5b894797418-35009635',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-blocked" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
">
    
    <div class="inactive" <?php if ($_smarty_tpl->getVariable('state')->value==true){?>style="display: none;"<?php }?>>
        <span class="icon icon-Blocked_inaktiv"></span>
        <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>    
    </div>
    
    <div class="active" <?php if ($_smarty_tpl->getVariable('state')->value==false){?>style="display: none;"<?php }?>>
        <span class="icon-Blocked_aktiv">
		    <span class="path1"></span><span class="path2"></span><span class="path3"></span>
		</span>
		<?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>
    </div>
    
</div>