<?php /* Smarty version Smarty-3.0.7, created on 2014-11-14 16:27:48
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeImL5gk" */ ?>
<?php /*%%SmartyHeaderCode:114746907654662d84537056-00655806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '314b74873bd58511e2cd421b7d2797d77d3c2cc5' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeImL5gk',
      1 => 1415982468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114746907654662d84537056-00655806',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<span class="detailprevnextcontainer">
        		   
    <?php if (($_smarty_tpl->getVariable('buttons')->value['BUTTON_PREV']!='')){?>
        <a href="<?php echo $_smarty_tpl->getVariable('buttons')->value['BUTTON_PREV'];?>
" class="but detailbutton_prev">Prev</a>
    <?php }?>
    <?php if (($_smarty_tpl->getVariable('buttons')->value['BUTTON_NEXT']!='')){?>
        <a href="<?php echo $_smarty_tpl->getVariable('buttons')->value['BUTTON_NEXT'];?>
" class="but detailbutton_next">Next</a>
    <?php }?>

</span>