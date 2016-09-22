<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 11:03:28
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3mp8Lq" */ ?>
<?php /*%%SmartyHeaderCode:2035881902569620f0e75381-58162309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cec2c7399472af65a5834a518b2911266b544c01' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3mp8Lq',
      1 => 1452679408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2035881902569620f0e75381-58162309',
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
<img src="http://placehold.it/350x350?text=RaumFallbackImage" />
<?php }?>