<?php /* Smarty version Smarty-3.0.7, created on 2015-11-13 17:02:01
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBmlHKs" */ ?>
<?php /*%%SmartyHeaderCode:815203942564609799d7fd7-03238862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a62d492c9e81374c2885f65fdd6ca4df0429d3b1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBmlHKs',
      1 => 1447430521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '815203942564609799d7fd7-03238862',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="matchinginfos">
    <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
    
    <p class="match-text">

        <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['GESAMT'];?>

    </p>
        
    <span class="prozent"><?php echo $_smarty_tpl->getVariable('matchGesamt')->value;?>
</span>
    <span class="match">match</span>
</div>

<div class="clearfix"></div>


<div class="clearfix"></div>