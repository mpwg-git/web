<?php /* Smarty version Smarty-3.0.7, created on 2016-08-04 13:36:00
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRhKQ2S" */ ?>
<?php /*%%SmartyHeaderCode:29048059857a328a0765d08-35158599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7d999e49000ae8ac8c37adf6037bb96898d5a38' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRhKQ2S',
      1 => 1470310560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29048059857a328a0765d08-35158599',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if (isset($_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'])){?> 
    <?php $_smarty_tpl->tpl_vars['searchSession'] = new Smarty_variable($_SESSION['xredaktor_feUser_wsf']['SEARCH']['SEARCH_ARRAY'], null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['searchSession'] = new Smarty_variable(false, null, null);?>
<?php }?>

<div class="searchform">
    <h1><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
" style="font-size:8.046vw"><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</a></h1>
    <form>
        <div class="form-group">
            
            <div class="radio">
                <label for="typ-suche" class="no-padding-left radio">
                    <input id="typ-suche" type="radio" name="search-type"  value="suche" <?php if ($_smarty_tpl->getVariable('searchSession')->value['type']=="suche"||($_smarty_tpl->getVariable('searchSession')->value['type']==''&&$_smarty_tpl->getVariable('userType')->value=="suche")){?> class="active" <?php }?>>
                    <span><?php echo smarty_function_xr_translate(array('tag'=>"Room"),$_smarty_tpl);?>
</span>
                </label>
                <label for="typ-biete" class="radio">
                    <input id="typ-biete"  type="radio" name="search-type" value="biete" <?php if ($_smarty_tpl->getVariable('searchSession')->value['type']=="biete"||($_smarty_tpl->getVariable('searchSession')->value['type']==''&&$_smarty_tpl->getVariable('userType')->value=="biete")){?> class="active" <?php }?>>
                    <span><?php echo smarty_function_xr_translate(array('tag'=>"Roomie"),$_smarty_tpl);?>
</span>
                </label>
                <br><br>
            </div>
            
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Wann?"),$_smarty_tpl);?>
</label><br>
            
            
            
            
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
            <?php echo smarty_function_xr_atom(array('a_id'=>764,'return'=>1),$_smarty_tpl);?>

            <small>Dieser Ort wird auch verwendet, um von Anbietern gefunden zu werden.</small>
        </div>
       
        <?php echo smarty_function_xr_atom(array('a_id'=>781,'return'=>1,'desc'=>'slider umkreis'),$_smarty_tpl);?>

        
        <?php if ($_SESSION['xredaktor_feUser_wsf']['wz_TYPE']=='suche'){?>
        <div class="">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Weitere Suchkriterien"),$_smarty_tpl);?>
</a>
        </div>
        <br/>
        <?php }?>
       
        <?php if ($_smarty_tpl->getVariable('P_ID')->value!=19&&$_smarty_tpl->getVariable('P_ID')->value!=11){?>
            <div id="map" class="map"></div>
        <?php }?>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>778,'return'=>1,'desc'=>'hidden filter field'),$_smarty_tpl);?>

        
    </form>
</div>
