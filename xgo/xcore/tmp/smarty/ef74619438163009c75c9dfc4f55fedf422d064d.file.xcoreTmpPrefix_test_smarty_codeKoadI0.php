<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 20:34:11
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKoadI0" */ ?>
<?php /*%%SmartyHeaderCode:102333290155df5823e2c4d4-21868814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef74619438163009c75c9dfc4f55fedf422d064d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKoadI0',
      1 => 1440700451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102333290155df5823e2c4d4-21868814',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-blocked <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
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