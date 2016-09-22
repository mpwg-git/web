<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 13:28:28
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZe9IXX" */ ?>
<?php /*%%SmartyHeaderCode:13973702595677f06ce29e31-04548921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10878a2167b9f836fd8550dd9b4b241fb78e579b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZe9IXX',
      1 => 1450700908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13973702595677f06ce29e31-04548921',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
1<?php if ($_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK']!=''){?>
    
    <div class="maching-infos-detail">
        <h3 class="headline">Matching Details</h3>
            <span class="whitetext">
                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIEN'][2];?>

                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIEN'][3];?>

                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIEN'][4];?>

            </span>
        </h3>    
    </div>
    
<?php }?>2