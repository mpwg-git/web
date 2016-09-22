<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 16:15:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code46MUMt" */ ?>
<?php /*%%SmartyHeaderCode:208487602956532da2ec39e5-63324606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d864cb65803de0b004c42c8a82d50a84879b250' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code46MUMt',
      1 => 1448291746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208487602956532da2ec39e5-63324606',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>
<div class="js-toggle-favourite <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
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