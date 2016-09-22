<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:25:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezgykqd" */ ?>
<?php /*%%SmartyHeaderCode:52557475755d19a77eca8e0-80590782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4536a9bab433e8809968ec6299a801c655a21a1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezgykqd',
      1 => 1439799927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52557475755d19a77eca8e0-80590782',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-blocked" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
">
    <div class="inactive">
        <span class="icon icon-Blocked_inaktiv"></span>
        <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>    
    </div>
    
    <div class="active">
        <span class="icon-Blocked_aktiv">
		    <span class="path1"></span><span class="path2"></span><span class="path3"></span>
		</span>
		<?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>
    </div>
    
</div>