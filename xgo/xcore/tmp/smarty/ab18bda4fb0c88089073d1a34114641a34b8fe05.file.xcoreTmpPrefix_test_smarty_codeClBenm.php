<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:21:32
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeClBenm" */ ?>
<?php /*%%SmartyHeaderCode:118802724255d1998c052a21-52200515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab18bda4fb0c88089073d1a34114641a34b8fe05' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeClBenm',
      1 => 1439799692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118802724255d1998c052a21-52200515',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-favourite" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
">
    <div class="inactive">
        <span class="icon icon-Favourite_inaktiv"></span>
        <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>    
    </div>
    
    <div class="active">
        <span class="icon-Favourite_aktiv">
		    <span class="path1"></span><span class="path2"></span>
		</span>
		<?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
            <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
        <?php }?>
    </div>
    
</div>