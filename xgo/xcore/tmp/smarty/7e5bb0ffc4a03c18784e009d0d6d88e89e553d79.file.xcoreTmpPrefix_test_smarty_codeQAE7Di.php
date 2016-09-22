<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 10:59:26
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQAE7Di" */ ?>
<?php /*%%SmartyHeaderCode:26116086256961ffe037079-34601047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e5bb0ffc4a03c18784e009d0d6d88e89e553d79' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQAE7Di',
      1 => 1452679166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26116086256961ffe037079-34601047',
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
Raum
<?php }?>