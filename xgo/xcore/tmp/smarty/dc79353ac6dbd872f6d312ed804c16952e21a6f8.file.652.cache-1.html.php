<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 13:16:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/652.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:91481062556793f2cd0f2f3-46722883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc79353ac6dbd872f6d312ed804c16952e21a6f8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/652.cache-1.html',
      1 => 1450786604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91481062556793f2cd0f2f3-46722883',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::redirectIfLoggedIn",'var'=>"checkLoggedin"),$_smarty_tpl);?>



<div class="search-start default-container-padding">
    
    <div class="einleitungstext">
        <span class="deine"><?php echo smarty_function_xr_translate(array('tag'=>"Deine"),$_smarty_tpl);?>
</span><br/>
        <span><?php echo smarty_function_xr_translate(array('tag'=>"Persönliche"),$_smarty_tpl);?>
</span><br/>
        <span><?php echo smarty_function_xr_translate(array('tag'=>"Wg Suchma"),$_smarty_tpl);?>
</span>
        <span><?php echo smarty_function_xr_translate(array('tag'=>"schine"),$_smarty_tpl);?>
</span><span class="icon-duck drduck"></span>
        
        <span class="find">Find People, not just Rooms</span>
    </div>
    
    <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
    
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"> 
            <span class="bigicon icon-WorumGehts"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        </a>    
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"> 
            <span class="bigicon icon-Anmelden"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        </a>    
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"> 
            <span class="bigicon icon-Registrieren"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span></span>   
        </a>
    <?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>
        
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"><span class="bigicon en-icon-WorumGehts_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span></a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"><span class="bigicon en-icon-Registrieren_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></span></a>   
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"><span class="bigicon en-icon-Anmelden_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span></a>
            
    <?php }?>
    <br>
    <br>
    <br>
</div>
<br>
<br>
<?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>
