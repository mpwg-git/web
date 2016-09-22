<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 13:24:16
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebJKiP1" */ ?>
<?php /*%%SmartyHeaderCode:7062058735677ef703a6847-58500446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a233f71cb134fad60b56d7a8b1b9d774192f2619' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebJKiP1',
      1 => 1450700656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7062058735677ef703a6847-58500446',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK']!=''){?>
    
    <div class="maching-infos-detail">
        <h3 class="headline">Matching Details</h3>
            <span class="whitetext">
                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIEN'][2];?>

                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIEN'][3];?>

                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIEN'][4];?>

            </span>
        </h3>    
    </div>
    
<?php }?>