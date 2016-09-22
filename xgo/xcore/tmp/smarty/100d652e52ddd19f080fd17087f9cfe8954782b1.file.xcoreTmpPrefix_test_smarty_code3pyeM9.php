<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:32:11
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3pyeM9" */ ?>
<?php /*%%SmartyHeaderCode:118196037555d19c0bd8eb29-39292596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '100d652e52ddd19f080fd17087f9cfe8954782b1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3pyeM9',
      1 => 1439800331,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118196037555d19c0bd8eb29-39292596',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-blocked" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
">
    
    <div class="inactive <?php if ($_smarty_tpl->getVariable('state')->value==true){?>hidden<?php }?>">
        <span class="icon icon-Blocked_inaktiv"></span>
        <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>    
    </div>
    
    <div class="active <?php if ($_smarty_tpl->getVariable('state')->value==false){?>hidden<?php }?>">
        <span class="icon-Blocked_aktiv">
		    <span class="path1"></span><span class="path2"></span><span class="path3"></span>
		</span>
		<?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>
    </div>
    
</div>