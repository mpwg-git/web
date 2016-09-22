<?php /* Smarty version Smarty-3.0.7, created on 2015-11-16 19:51:36
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelig1dx" */ ?>
<?php /*%%SmartyHeaderCode:1842865555564a25b82a5ae3-55616351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbb37fa5d2350fe3c9799eb765499e373b574367' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelig1dx',
      1 => 1447699896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1842865555564a25b82a5ae3-55616351',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"data"),$_smarty_tpl);?>


<?php if ($_REQUEST['dev']==1){?>
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

<?php }?>

<div class="col-xs-4 meinprofil-links">
    <?php echo smarty_function_xr_atom(array('a_id'=>678,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

</div>

<div class="col-xs-8 default-container-paddingtop meinprofil-meinedaten meinprofil-biete">
    
    <div class="pull-right" style="font-size: 0.924vw; padding-top:5px; color:#04e0d7;">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                <span class="icon-Close"></span>
            </a>
    </div>  
    
    
    <span class="looklikeh1">
        Mein Raum
    </span>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>748,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
        
    <?php echo smarty_function_xr_atom(array('a_id'=>732,'profile'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'return'=>1),$_smarty_tpl);?>

    
</div>