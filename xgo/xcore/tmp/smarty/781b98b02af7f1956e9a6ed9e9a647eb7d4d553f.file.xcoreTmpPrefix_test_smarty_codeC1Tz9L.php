<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 13:31:12
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeC1Tz9L" */ ?>
<?php /*%%SmartyHeaderCode:14360113085677f110ac0c52-06779051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '781b98b02af7f1956e9a6ed9e9a647eb7d4d553f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeC1Tz9L',
      1 => 1450701072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14360113085677f110ac0c52-06779051',
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