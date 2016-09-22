<?php /* Smarty version Smarty-3.0.7, created on 2016-01-15 11:59:02
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/808.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:15560074345698d0f6103520-63518205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cb0abe7b0f1b50622d785db7067e479d2aa9034' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/808.cache.html',
      1 => 1452797263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15560074345698d0f6103520-63518205',
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