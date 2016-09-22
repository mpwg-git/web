<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 11:02:49
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezJEXg7" */ ?>
<?php /*%%SmartyHeaderCode:973813122569620c9e263a8-22112170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '645b1379d75bedd01d3a315a7e77dbc3e27b8524' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezJEXg7',
      1 => 1452679369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '973813122569620c9e263a8-22112170',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('icontype')->value=='frau'){?>
<span class="icon-frau" data-x><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
<?php }elseif($_smarty_tpl->getVariable('icontype')->value=='mann'){?>
Mann
<?php }elseif($_smarty_tpl->getVariable('icontype')->value=='raum'){?>
<img src="http://placehold.it/350x350" />
<?php }?>