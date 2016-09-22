<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 10:01:23
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVgOYb6" */ ?>
<?php /*%%SmartyHeaderCode:9756962465694c0e367a8c1-61120585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86c3422b802a7ce93023d8d7aebc2d3943b2e7e7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVgOYb6',
      1 => 1452589283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9756962465694c0e367a8c1-61120585',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getFrage",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_cookie::sc_checkFragencookie','var'=>'showIntrotext'),$_smarty_tpl);?>


<div class="col-xs-12 default-container-paddingtop meinprofil-wgtest">
    
    <span class="looklikeh1">
    <?php echo smarty_function_xr_translate(array('tag'=>"WG-Leben"),$_smarty_tpl);?>

    </span>
    <p class="wgtest-beschreibung">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte nimm dir ein paar Minuten um die Fragen zu beantworten. Es gibt keine falschen oder richtigen Antworten, sei ehrlich über dich und deine Erwartungen und WhoShowersFirst hilft dir wirklich passende Mitbewohner zu finden."),$_smarty_tpl);?>

        <br>
        <?php echo smarty_function_xr_translate(array('tag'=>"Beantworte die Fragen wie du bist und wie du dir deine WG wünscht. Über Vergabe der Sterne entscheidest du wie wichtig dir dieses Thema ist. Null Sterne bedeutet es ist dir egal, 4 Sterne ist ein Muss."),$_smarty_tpl);?>

        
    </p>
    
    <div class="js-wgtest-replacer clearfix">    
        
        <?php if ($_smarty_tpl->getVariable('wgteststate')->value==1&&$_REQUEST['restart']!=1){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>779,'return'=>1,'desc'=>'alle fragen beantworted'),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_atom(array('a_id'=>766,'return'=>1),$_smarty_tpl);?>

        <?php }?>
        
    </div>
    
</div>