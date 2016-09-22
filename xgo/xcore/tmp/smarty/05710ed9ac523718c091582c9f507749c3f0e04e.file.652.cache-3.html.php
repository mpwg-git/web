<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 13:56:45
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/652.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:18976874805679488d735948-87867816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05710ed9ac523718c091582c9f507749c3f0e04e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/652.cache-3.html',
      1 => 1450786604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18976874805679488d735948-87867816',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?>
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