<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 11:03:29
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/878.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:497028648569620f119d512-60495828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11a3cd9d371dcfb2c76e81135358e54198a016e9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/878.cache.html',
      1 => 1452679408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '497028648569620f119d512-60495828',
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