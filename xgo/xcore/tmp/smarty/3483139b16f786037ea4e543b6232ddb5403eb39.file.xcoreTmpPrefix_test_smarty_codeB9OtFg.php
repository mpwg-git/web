<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 19:34:08
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB9OtFg" */ ?>
<?php /*%%SmartyHeaderCode:189577067555d60f901ff098-62826162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3483139b16f786037ea4e543b6232ddb5403eb39' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB9OtFg',
      1 => 1440092048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189577067555d60f901ff098-62826162',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>

<div class="profil">
    
     <?php echo smarty_function_xr_atom(array('a_id'=>789,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1,'desc'=>"profil main image"),$_smarty_tpl);?>

        
    <?php echo smarty_function_xr_atom(array('a_id'=>790,'return'=>1,'desc'=>"matching infos"),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
    
    <div class="maininfo">
        <h3 class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
</h3>
        <p class="subinfo"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
<?php if ($_smarty_tpl->getVariable('data')->value['USER']['ALTER']>0){?> | <?php echo $_smarty_tpl->getVariable('data')->value['USER']['ALTER'];?>
 Jahre<?php }?></p>
    </div>
    
    <div class="matchinginfo-satz">
        Ihr teilt nicht alle Ansichten aber Wesentliches passt.
    </div>
    
    <!-- Button Container -->
    <?php echo smarty_function_xr_atom(array('a_id'=>702,'return'=>1),$_smarty_tpl);?>


    <div class="wg-img-wrapper">
        <h3 class="headline">Die WG</h3>
        <div class="image-slider">
            <div class="item">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>179,'w'=>600,'h'=>300,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

            </div>
        </div>
        <div class="info-icon-container freetext-toggle"><span class="icon-Info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
    </div>
    
    <div class="freetext-container">
        <div class="freetext">
           <span class="icon-Close closer-freetext"></span>
            <p class="headline">
                <strong>FREETEXT</strong>
            </p>
            <p>
                Tem rem re lantiae pro explabo reptur acculpa rchillorum soluptas dolupis im facepe doluptius.
                Ur, officte mporro quis alis alibus, quiam, seditatiossi si que sitem qui veliquatem ipsunto quost quo ommo 
            </p>
        </div>
    </div>
    
    <div class="mitbewohner">
        <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
    </div>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>706,'return'=>1),$_smarty_tpl);?>

    
</div>