<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 11:13:31
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegqFgYT" */ ?>
<?php /*%%SmartyHeaderCode:17415023735644664bb825a6-63234402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58bd61795de1d994397416db8b95e144340078da' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegqFgYT',
      1 => 1447323211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17415023735644664bb825a6-63234402',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getFrage",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>


<div class="col-xs-4 meinprofil-links">
    <?php echo smarty_function_xr_atom(array('a_id'=>678,'return'=>1),$_smarty_tpl);?>

</div>

<div class="col-xs-8 default-container-paddingtop meinprofil-wgtest">
    
    <div class="pull-right" style="font-size: 0.924vw;padding-right:30px;color:#04e0d7;">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                <span class="icon-Close"></span>
            </a>
    </div> 
    
    <span class="looklikeh1">
       <?php echo smarty_function_xr_translate(array('tag'=>"WG-Leben"),$_smarty_tpl);?>
 
    </span>
    
    <p class="wgtest-beschreibung">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte nimm dir ein paar Minuten um die Fragen zu beantworten. Es gibt keine falschen oder richtigen Antworten, sei ehrlich über dich und deine Erwartungen und WhoShowersFirst hilft dir wirklich passende Mitbewohner zu finden."),$_smarty_tpl);?>

        <br>
        <?php echo smarty_function_xr_translate(array('tag'=>"Beantworte die Fragen wie du bist und wie du dir deine WG wünscht. Über Vergabe der Sterne entscheidest du wie wichtig dir dieses Thema ist. Null Sterne bedeutet es ist dir egal, 4 Sterne ist ein Muss."),$_smarty_tpl);?>

 
    </p>
    
    <div class="js-wgtest-replacer">    
        
        <?php if ($_smarty_tpl->getVariable('wgteststate')->value==1&&$_REQUEST['restart']!=1&&!isset($_REQUEST['frageid'])){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>779,'return'=>1,'desc'=>'alle fragen beantworted'),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_atom(array('a_id'=>766,'return'=>1),$_smarty_tpl);?>

        <?php }?>
        
    </div>
    
</div>