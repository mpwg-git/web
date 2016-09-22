<?php /* Smarty version Smarty-3.0.7, created on 2016-07-09 09:34:22
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejd7tpT" */ ?>
<?php /*%%SmartyHeaderCode:9960983135780a8fe7ee1e6-53342191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75f5eb7640cd668071d44dd231658aab1b5fc429' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejd7tpT',
      1 => 1468049662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9960983135780a8fe7ee1e6-53342191',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>
<div class="search-start default-container-padding">
   
   <div class="row">
       <div class="col-xs-4">
           <?php echo smarty_function_xr_imgWrapper(array('s_id'=>18448,'h'=>200,'style'=>"max-width: 100px;",'class'=>"img-responsive"),$_smarty_tpl);?>

       </div>
       <div class="col-xs-7 text-center">
           <?php echo smarty_function_xr_translate(array('tag'=>"DIE"),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>"PERSÖNLICHE"),$_smarty_tpl);?>
<br/>
           <?php echo smarty_function_xr_translate(array('tag'=>"WG-SUCHMASCHINE"),$_smarty_tpl);?>
<br/>
           <?php echo smarty_function_xr_translate(array('tag'=>"Find People. Not just"),$_smarty_tpl);?>
<br/>
           <?php echo smarty_function_xr_translate(array('tag'=>"rooms"),$_smarty_tpl);?>
.<span class="icon-duck drduck"></span>
       </div>
   </div>
   
    <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
    
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"> 
            <span class="bigicon icon-WorumGehts"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        </a>    
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"> 
            <span class="bigicon icon-Registrieren"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span></span>   
        </a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"> 
            <span class="bigicon icon-Anmelden"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
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
