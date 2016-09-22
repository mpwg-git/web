<?php /* Smarty version Smarty-3.0.7, created on 2015-08-19 10:12:28
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeH1GyoH" */ ?>
<?php /*%%SmartyHeaderCode:117472246155d43a6cde1ce7-59122177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '006da54aa51d93c15c8f01c56176da27e14b45f9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeH1GyoH',
      1 => 1439971948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117472246155d43a6cde1ce7-59122177',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT']!=0&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG']!=0){?>

   <script>

    top.showOnMap = {
    'lat':"<?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT'];?>
",
    'lng':"<?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG'];?>
"
    };
    </script>

<?php }?>