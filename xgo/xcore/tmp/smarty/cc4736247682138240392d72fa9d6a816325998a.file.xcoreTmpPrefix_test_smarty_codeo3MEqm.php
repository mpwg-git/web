<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 19:37:54
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo3MEqm" */ ?>
<?php /*%%SmartyHeaderCode:202411499455d610720d6726-56871883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc4736247682138240392d72fa9d6a816325998a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo3MEqm',
      1 => 1440092274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202411499455d610720d6726-56871883',
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
        <span class="icon icon-Blocked_aktiv">
		    <span class="path1"></span><span class="path2"></span><span class="path3"></span>
		</span>
		<?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>
    </div>
    
</div>