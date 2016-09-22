<?php /* Smarty version Smarty-3.0.7, created on 2016-07-09 09:25:40
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/652.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:11486944955780a6f446aa84-40305607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68607c0de252fb128cead9584ae246a5962471cc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/652.cache-3.html',
      1 => 1468049140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11486944955780a6f446aa84-40305607',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?>
<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>

	
<?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>

<?php echo smarty_function_xr_atom(array('a_id'=>892,'return'=>1),$_smarty_tpl);?>


<?php }else{ ?>

<div class="search-start">
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"WO?"),$_smarty_tpl);?>
</h2>
    <form>
        <?php echo smarty_function_xr_atom(array('a_id'=>764,'addClass'=>"location-start",'return'=>1),$_smarty_tpl);?>

    </form>
    <div class="einleitungstext">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"> <span><?php echo smarty_function_xr_translate(array('tag'=>"Deine"),$_smarty_tpl);?>
</span><br/> </a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"><span><?php echo smarty_function_xr_translate(array('tag'=>"Pers"),$_smarty_tpl);?>
</span><br/> </a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"><span><?php echo smarty_function_xr_translate(array('tag'=>"Önliche"),$_smarty_tpl);?>
</span><br/></a>
        <span><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"WG"),$_smarty_tpl);?>
</a><span class="icon-duck drduck">
        </span></span><br/>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"><span><?php echo smarty_function_xr_translate(array('tag'=>"Suchma"),$_smarty_tpl);?>
</span></a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"><span><?php echo smarty_function_xr_translate(array('tag'=>"schine"),$_smarty_tpl);?>
</span></a>
        
        
        <span class="find">Find People, not just Rooms.</span>
        <span class="icons">
            <span class="icon-kamm"></span>
            <span class="icon-klopapier"></span>
            <span class="icon-foen"></span>
            <span class="icon-zahnbuerste"></span>
            <span class="icon-rasierer"></span>
            <span class="icon-badewanne"></span>
        </span>
    </div>
        
</div>

<?php }?>