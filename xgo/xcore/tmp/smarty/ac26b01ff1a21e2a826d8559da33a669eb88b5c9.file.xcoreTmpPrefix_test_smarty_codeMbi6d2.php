<?php /* Smarty version Smarty-3.0.7, created on 2015-10-30 13:39:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMbi6d2" */ ?>
<?php /*%%SmartyHeaderCode:143873452563364ff3f83e8-93733635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac26b01ff1a21e2a826d8559da33a669eb88b5c9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMbi6d2',
      1 => 1446208767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143873452563364ff3f83e8-93733635',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK']!=''){?>
    
    <div class="maching-infos-detail">
        <h3 class="headline" style="">Matching Details</h3>
            <span class="whitetext">
                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK'];?>

            </span>
        </h3>    
    </div>
    
<?php }?>