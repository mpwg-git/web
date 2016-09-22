<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 10:21:37
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKvHsRX" */ ?>
<?php /*%%SmartyHeaderCode:137760833256445a21910e04-24691799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '939c0a44f4b85e52f064df99e9f12930f497e00e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKvHsRX',
      1 => 1447320097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137760833256445a21910e04-24691799',
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

<div class="searchform">
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
"<?php }?>/>
                <span class="add-on"><i class="icon-calendar"></i></span>
    		</div>
        </div>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>780,'return'=>1,'desc'=>'slider preis'),$_smarty_tpl);?>

        
        <?php if ($_smarty_tpl->getVariable('P_ID')->value!=19){?>
            <div id="map" class="map"></div>
        <?php }?>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>778,'return'=>1,'desc'=>'hidden filter field'),$_smarty_tpl);?>

        
    </form>
</div>
