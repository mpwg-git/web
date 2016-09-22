<?php /* Smarty version Smarty-3.0.7, created on 2015-11-16 10:43:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyTRnJz" */ ?>
<?php /*%%SmartyHeaderCode:10960646755649a5386e8740-78051314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '171789c5b01f4e3763867da43415ba307839f79b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyTRnJz',
      1 => 1447667000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10960646755649a5386e8740-78051314',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if (isset($_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'])){?> 
    <?php $_smarty_tpl->tpl_vars['searchSession'] = new Smarty_variable($_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'], null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['searchSession'] = new Smarty_variable(false, null, null);?>
<?php }?>

<div class="searchform default-container-padding">
    <h1><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</a></h1>
    <form>
        
        
        
        <div class="form-group">
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Wann?"),$_smarty_tpl);?>
</label>
            <div class="input-icon hasDatePicker">
                <input class="form-control search-date datepicker" name="search-date" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('searchSession')->value!=false){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['date'];?>
"<?php }?> />
                <span class="add-on"><i class="icon-calendar"></i></span>
    		</div>
        </div>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>780,'searchSession'=>$_smarty_tpl->getVariable('searchSession')->value,'return'=>1,'desc'=>'slider preis'),$_smarty_tpl);?>

        
        <div class="form-group">
            <label for="location"><?php echo smarty_function_xr_translate(array('tag'=>"Wo?"),$_smarty_tpl);?>
</label>
            <?php echo smarty_function_xr_atom(array('a_id'=>764,'searchSession'=>$_smarty_tpl->getVariable('searchSession')->value,'return'=>1),$_smarty_tpl);?>

        </div>
        
        
        <?php echo smarty_function_xr_atom(array('a_id'=>781,'searchSession'=>$_smarty_tpl->getVariable('searchSession')->value,'return'=>1,'desc'=>'slider range'),$_smarty_tpl);?>

        
        <div class="results-links">
            <div class="form-group">
                <a class="karte-anzeigen js-toggle-map">
                    <span class="icon-Map"><span class="path1"></span><span class="path2"></span></span> <?php echo smarty_function_xr_translate(array('tag'=>"Karte anzeigen"),$_smarty_tpl);?>

                </a>
            </div>
        </div>
        
        
        <div class="results-rechts">
            <div class="form-group">
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>17),$_smarty_tpl);?>
" class="karte-anzeigen ergebnisse-anzeigen js-toggle-results">
                    <span class="icon-treffer"><span class="path1"></span><span class="path2"></span></span> <?php echo smarty_function_xr_translate(array('tag'=>"Ergebnisse anzeigen"),$_smarty_tpl);?>

                </a>
            </div>    
        </div>
        
        <div class="clearfix"></div>
        
         <?php echo smarty_function_xr_atom(array('a_id'=>778,'showFace'=>0,'return'=>1,'desc'=>'hidden filter field'),$_smarty_tpl);?>

        
    </form>
    <?php echo smarty_function_xr_atom(array('a_id'=>793,'return'=>1,'desc'=>'map mobile'),$_smarty_tpl);?>

    
</div>
