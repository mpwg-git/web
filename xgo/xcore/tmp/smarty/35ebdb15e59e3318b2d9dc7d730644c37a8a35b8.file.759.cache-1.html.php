<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 14:42:45
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/759.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:197873203058aaf2558ccb06-59366397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35ebdb15e59e3318b2d9dc7d730644c37a8a35b8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/759.cache-1.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197873203058aaf2558ccb06-59366397',
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
    
    <?php if (count($_smarty_tpl->getVariable('searchSession')->value)==3&&count($_smarty_tpl->getVariable('searchSession')->value['location'])==0&&$_smarty_tpl->getVariable('searchSession')->value['filter']==''){?>
        <?php $_smarty_tpl->tpl_vars['searchSession'] = new Smarty_variable(false, null, null);?>
    <?php }?>
    
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['searchSession'] = new Smarty_variable(false, null, null);?>
<?php }?>

<div class="searchform default-container-padding">
    <h1><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</a></h1>
    <form>
        
        <div class="form-group">
            <div class="radio">
                <label for="typ-suche" class="no-padding-left">
                    <input id="typ-suche" type="radio" name="search-type" value="suche" <?php if ($_smarty_tpl->getVariable('searchSession')->value['type']=="suche"||($_smarty_tpl->getVariable('searchSession')->value['type']==''&&$_smarty_tpl->getVariable('userType')->value=="suche")){?> class="active" <?php }?>>
                    <span><?php echo smarty_function_xr_translate(array('tag'=>"Room"),$_smarty_tpl);?>
</span>
                </label>
                <label for="typ-biete">
                    <input id="typ-biete" type="radio" name="search-type" value="biete" <?php if ($_smarty_tpl->getVariable('searchSession')->value['type']=="biete"||($_smarty_tpl->getVariable('searchSession')->value['type']==''&&$_smarty_tpl->getVariable('userType')->value=="biete")){?> class="active" <?php }?>>
                    <span><?php echo smarty_function_xr_translate(array('tag'=>"Roomie"),$_smarty_tpl);?>
</span>
                </label>
            </div>
        </div>
        
        
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

            <!--<small class="small"><?php echo smarty_function_xr_translate(array('tag'=>'Dieser Ort wird auch verwendet, um von Anbietern gefunden zu werden.'),$_smarty_tpl);?>
</small>-->
        </div>
        
        
        <?php echo smarty_function_xr_atom(array('a_id'=>781,'searchSession'=>$_smarty_tpl->getVariable('searchSession')->value,'return'=>1,'desc'=>'slider range'),$_smarty_tpl);?>

        
        <?php if ($_SESSION['xredaktor_feUser_wsf']['wz_TYPE']=='suche'){?>
            <div class="">
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
" class="blue-link"><?php echo smarty_function_xr_translate(array('tag'=>"Weitere Suchkriterien"),$_smarty_tpl);?>
</a>
            </div>
            <br/>
        <?php }?>
        
        <div class="results-links">
            <div class="form-group">
                <a class="karte-anzeigen js-toggle-map">
                    <span class="icon-Map"><span class="path1"></span><span class="path2"></span></span> <?php echo smarty_function_xr_translate(array('tag'=>"Karte anzeigen"),$_smarty_tpl);?>

                </a>
            </div>
        </div>
        
        
        <div class="results-rechts">
        </div>
        
        <div class="clearfix"></div>
        
         <?php echo smarty_function_xr_atom(array('a_id'=>778,'showFace'=>0,'return'=>1,'desc'=>'hidden filter field'),$_smarty_tpl);?>

        
    </form>
    <?php echo smarty_function_xr_atom(array('a_id'=>793,'return'=>1,'desc'=>'map mobile'),$_smarty_tpl);?>

    
    <div class="register-fragen">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>17),$_smarty_tpl);?>
" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'Trefferliste'),$_smarty_tpl);?>
" class="button start-button"><?php echo smarty_function_xr_translate(array('tag'=>'Trefferliste'),$_smarty_tpl);?>
</a>
    </div>
    
</div>
