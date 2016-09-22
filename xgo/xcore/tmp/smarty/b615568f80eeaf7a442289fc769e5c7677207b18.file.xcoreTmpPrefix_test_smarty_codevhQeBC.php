<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 14:53:31
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevhQeBC" */ ?>
<?php /*%%SmartyHeaderCode:5069708905693b3db74d913-82753933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b615568f80eeaf7a442289fc769e5c7677207b18' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevhQeBC',
      1 => 1452520411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5069708905693b3db74d913-82753933',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_translate(array('tag'=>'Weiblich'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('roomData')->value['wz_COUNT_MITBEWOHNER_F'];?>

<br>
<?php echo smarty_function_xr_translate(array('tag'=>'Männlich'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('roomData')->value['wz_COUNT_MITBEWOHNER_M'];?>

<br>

<?php if ($_smarty_tpl->getVariable('ageSpan')->value['FROM']!==false||$_smarty_tpl->getVariable('ageSpan')->value['TO']!==false){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>'Alter'),$_smarty_tpl);?>
:</span>
        <span class="info">
            <?php if ($_smarty_tpl->getVariable('ageSpan')->value['FROM']!==false){?><?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('ageSpan')->value['FROM'];?>
<?php }?>
            <?php if ($_smarty_tpl->getVariable('ageSpan')->value['TO']!==false){?>  <?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('ageSpan')->value['TO'];?>
<?php }?>
        </span>
    </div>
<?php }?>


<?php if ($_smarty_tpl->getVariable('mitbewohner')->value['F']>0){?>
    <?php while ($_smarty_tpl->getVariable('mitbewohner')->value['F']>0){?>
        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <?php if (!isset($_smarty_tpl->tpl_vars['mitbewohner']) || !is_array($_smarty_tpl->tpl_vars['mitbewohner']->value)) $_smarty_tpl->createLocalArrayVariable('mitbewohner', null, null);
$_smarty_tpl->tpl_vars['mitbewohner']->value['F'] = $_smarty_tpl->getVariable('mitbewohner')->value['F']-1;?>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('mitbewohner')->value['M']>0){?>
    <?php while ($_smarty_tpl->getVariable('mitbewohner')->value['M']>0){?>
        <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
        <?php if (!isset($_smarty_tpl->tpl_vars['mitbewohner']) || !is_array($_smarty_tpl->tpl_vars['mitbewohner']->value)) $_smarty_tpl->createLocalArrayVariable('mitbewohner', null, null);
$_smarty_tpl->tpl_vars['mitbewohner']->value['M'] = $_smarty_tpl->getVariable('mitbewohner')->value['M']-1;?>
    <?php }?>
<?php }?>
