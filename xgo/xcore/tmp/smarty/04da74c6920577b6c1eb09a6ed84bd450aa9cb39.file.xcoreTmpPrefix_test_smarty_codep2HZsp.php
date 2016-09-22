<?php /* Smarty version Smarty-3.0.7, created on 2016-04-30 15:36:04
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codep2HZsp" */ ?>
<?php /*%%SmartyHeaderCode:4918136385724b4c4ca5174-54967251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04da74c6920577b6c1eb09a6ed84bd450aa9cb39' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codep2HZsp',
      1 => 1462023364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4918136385724b4c4ca5174-54967251',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::redirectIfLoggedIn"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


<!-- DESKTOP PICTURES -->

<div class="black-bg">
    
    <?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
    
    <div class="row" style="position:absolute; top: 0px; z-index: 1; background-color: #FFFFFF; opacity: 0.8; height: 100%; width: 100%; margin-left: -3px;">
        <div class="col-xs-12">
        
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <p class="start-text-1">
                        <?php echo smarty_function_xr_translate(array('tag'=>"Das Leben ist zu kurz für nervige Mitbewohner"),$_smarty_tpl);?>
.<br />
                        <?php echo smarty_function_xr_translate(array('tag'=>"Finde hier deine perfekte WG durch Persönlichkeitsmatching"),$_smarty_tpl);?>
.
                    </p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <p class="start-text-1">
                        <?php echo smarty_function_xr_translate(array('tag'=>"Das Leben ist zu kurz für nervige Mitbewohner"),$_smarty_tpl);?>
.<br />
                        <?php echo smarty_function_xr_translate(array('tag'=>"Finde hier deine perfekte WG durch Persönlichkeitsmatching"),$_smarty_tpl);?>
.
                    </p>
                </div>
            </div>
        
        </div>
    </div>
    
    <?php }?>
    
    <div class="row picture-row">
        
        <div class="js-replacer-pictures-start">
            
            <div class="col-xs-4 picture-col">
                <div class="img-wrapper">
                    <div class="inner-wrapper">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>545,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>

                        <div class="overlay-bg">
                            <div class="overlay">
                                <p class="upper">
                                    <span class="pull-left drduck icon-duck"></span>
                                    <span class="pull-right">
                                        <span class="prozent">90%</span>
                                        <span class="match">match</span>
                                    </span>
                                </p>
                                <div style="clear:both"></div>
                                <p><?php echo smarty_function_xr_translate(array('tag'=>"Mit Lukas klappt jede sportliche Herausforderung."),$_smarty_tpl);?>
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 picture-col">
                <div class="img-wrapper">
                    <div class="inner-wrapper">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>546,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>

                        <div class="overlay-bg">
                            <div class="overlay">
                                <p class="upper">
                                    <span class="pull-left drduck icon-duck"></span>
                                    <span class="pull-right">
                                        <span class="prozent">93%</span>
                                        <span class="match">match</span>
                                    </span>
                                </p>
                                <div style="clear:both"></div>
                                <p><?php echo smarty_function_xr_translate(array('tag'=>"Auch wenn ihr immer einer Meinung seid, Sandra duscht alleine."),$_smarty_tpl);?>
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 picture-col">
                <div class="img-wrapper">
                    <div class="inner-wrapper">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>550,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>

                        <div class="overlay-bg">
                            <div class="overlay">
                                <p class="upper">
                                    <span class="pull-left drduck icon-duck"></span>
                                    <span class="pull-right">
                                        <span class="prozent">69%</span>
                                        <span class="match">match</span>
                                    </span>
                                </p>
                                <div style="clear:both"></div>
                                <p><?php echo smarty_function_xr_translate(array('tag'=>"Mit Alex ist der Wecker inklusive - nie wieder verschlafen."),$_smarty_tpl);?>
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 picture-col">
                <div class="img-wrapper">
                    <div class="inner-wrapper">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>549,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>

                        <div class="overlay-bg">
                            <div class="overlay">
                                <p class="upper">
                                    <span class="pull-left drduck icon-duck"></span>
                                    <span class="pull-right">
                                        <span class="prozent">74%</span>
                                        <span class="match">match</span>
                                    </span>
                                </p>
                                <div style="clear:both"></div>
                                <p><?php echo smarty_function_xr_translate(array('tag'=>"Mit Tanja Beautytipps beim Wellnesstag tauschen."),$_smarty_tpl);?>
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 picture-col">
                <div class="img-wrapper">
                    <div class=" logo">
                        <div class="inner-wrapper">
                            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>18448,'h'=>400,'w'=>375,'class'=>"img-responsive"),$_smarty_tpl);?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 picture-col">
                <div class="img-wrapper">
                    <div class="inner-wrapper">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>548,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>

                        <div class="overlay-bg">
                            <div class="overlay">
                                <p class="upper">
                                    <span class="pull-left drduck icon-duck"></span>
                                    <span class="pull-right">
                                        <span class="prozent">78%</span>
                                        <span class="match">match</span>
                                    </span>
                                </p>
                                <div style="clear:both"></div>
                                <p><?php echo smarty_function_xr_translate(array('tag'=>"Mit Patrick machst du die Nacht zum Tag."),$_smarty_tpl);?>
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 picture-col">
                <div class="img-wrapper">
                    <div class="inner-wrapper">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>547,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>

                        <div class="overlay-bg">
                            <div class="overlay">
                                <p class="upper">
                                    <span class="pull-left drduck icon-duck"></span>
                                    <span class="pull-right">
                                        <span class="prozent">84%</span>
                                        <span class="match">match</span>
                                    </span>
                                </p>
                                <div style="clear:both"></div>
                                <p><?php echo smarty_function_xr_translate(array('tag'=>"Für Philipp ist alles öko- logisch seine Politik ändert die Welt."),$_smarty_tpl);?>
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 picture-col">
                <div class="img-wrapper">
                    <div class="inner-wrapper">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>543,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>

                        <div class="overlay-bg">
                            <div class="overlay">
                                <p class="upper">
                                    <span class="pull-left drduck icon-duck"></span>
                                    <span class="pull-right">
                                        <span class="prozent">92%</span>
                                        <span class="match">match</span>
                                    </span>
                                </p>
                                <div style="clear:both"></div>
                                <p><?php echo smarty_function_xr_translate(array('tag'=>"Mit Lena wird putzen zur Homeparty"),$_smarty_tpl);?>
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 picture-col">
                <div class="img-wrapper">
                    <div class="inner-wrapper">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>544,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>

                        <div class="overlay-bg">
                            <div class="overlay">
                                <p class="upper">
                                    <span class="pull-left drduck icon-duck"></span>
                                    <span class="pull-right">
                                        <span class="prozent">65%</span>
                                        <span class="match">match</span>
                                    </span>
                                </p>
                                <div style="clear:both"></div>
                                <p><?php echo smarty_function_xr_translate(array('tag'=>"Katharina unterhält dich immer und überall."),$_smarty_tpl);?>
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        
        </div>
    </div>
</div>