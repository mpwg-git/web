<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 05:50:06
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeD3INZM" */ ?>
<?php /*%%SmartyHeaderCode:1632816460561c7f6ee5a8c8-97352320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d1443295ff101fe2f0272df88fa6391486fee4a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeD3INZM',
      1 => 1444708206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1632816460561c7f6ee5a8c8-97352320',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if (isset($_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'])){?> 
    <?php $_smarty_tpl->tpl_vars['searchSession'] = new Smarty_variable($_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'], null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['searchSession'] = new Smarty_variable(false, null, null);?>
<?php }?>

<div class="searchform">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</h1>
    <form>
        
        <div class="form-group">
            <div class="radio">
                <label for="typ-suche" class="no-padding-left">
                    <input id="typ-suche" type="radio" name="search-type" value="suche" <?php if ($_smarty_tpl->getVariable('searchSession')->value['type']=="suche"||$_smarty_tpl->getVariable('searchSession')->value['type']==''){?> selected="selected" <?php }?>>
                    <span>Room</span>
                    <span class="fz">?</span>
                </label>
                <label for="typ-biete">
                    <input id="typ-biete" type="radio" name="search-type" value="biete" <?php if ($_smarty_tpl->getVariable('searchSession')->value['type']=="biete"){?> selected="selected" <?php }?>>
                    <span>Roomie</span>
                    <span class="fz">?</span>
                </label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Wann?"),$_smarty_tpl);?>
</label>
            <div class="input-icon hasDatePicker">
                <input class="form-control search-date datepicker" name="search-date" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('searchSession')->value!=false){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['date'];?>
"<?php }?>/>
                <span class="add-on"><i class="icon-calendar"></i></span>
    		</div>
        </div>
       
        <?php echo smarty_function_xr_atom(array('a_id'=>780,'return'=>1,'desc'=>'slider preis'),$_smarty_tpl);?>

        
        <div class="form-group">
            <label for="location"><?php echo smarty_function_xr_translate(array('tag'=>"Wo?"),$_smarty_tpl);?>
</label>
            <?php echo smarty_function_xr_atom(array('a_id'=>764,'return'=>1,'desc'=>'location autocomplete'),$_smarty_tpl);?>

        </div>
        
        
        <?php echo smarty_function_xr_atom(array('a_id'=>781,'return'=>1,'desc'=>'slider umkreis'),$_smarty_tpl);?>

        
        <div id="map" class="map"></div>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>778,'showFace'=>0,'return'=>1,'desc'=>'hidden filter field'),$_smarty_tpl);?>

        
    </form>
</div>
