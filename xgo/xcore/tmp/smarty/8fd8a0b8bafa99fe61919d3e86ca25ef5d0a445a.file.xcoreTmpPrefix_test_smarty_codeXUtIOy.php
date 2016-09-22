<?php /* Smarty version Smarty-3.0.7, created on 2016-08-22 15:31:53
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXUtIOy" */ ?>
<?php /*%%SmartyHeaderCode:46777807457bafec978d917-26076037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fd8a0b8bafa99fe61919d3e86ca25ef5d0a445a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXUtIOy',
      1 => 1471872713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46777807457bafec978d917-26076037',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::redirectIfLoggedIn"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


<!-- DESKTOP PICTURES -->

<div class="black-bg">
    
    <?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
    
    <div class="row start-overlay">
        <div class="col-xs-12">
        
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <p class="start-text-1">
                        <?php echo smarty_function_xr_translate(array('tag'=>"Das Leben ist zu kurz für nervige Mitbewohner"),$_smarty_tpl);?>
<br />
                    </p>
                    <p class="start-text-2">
                        <?php echo smarty_function_xr_translate(array('tag'=>"Finde hier deine perfekte WG durch Persönlichkeitsmatching"),$_smarty_tpl);?>
<br/>
                    </p>
                    <br/>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>47),$_smarty_tpl);?>
" class="button start-button"><?php echo smarty_function_xr_translate(array('tag'=>'WG Zimmer<br> finden'),$_smarty_tpl);?>
</a>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>48),$_smarty_tpl);?>
" class="button start-button pull-right"><?php echo smarty_function_xr_translate(array('tag'=>'Neuen Mitbewohner<br> finden'),$_smarty_tpl);?>
</a>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <p class="start-text-2">
                        <?php echo smarty_function_xr_translate(array('tag'=>"Lärm, Party, Sauberkeit in der WG? Da hat jeder eine andere Meinung! Anstelle von 100 Interviews, Massen-Castings und böses Erwachen: "),$_smarty_tpl);?>
<?php echo smarty_function_xr_translate(array('tag'=>"Einige Fragen zu deinen Erwartungen und Dr. Duck findet jemanden der wirklich zu dir passt!"),$_smarty_tpl);?>

                    </p>
                    
                    <div class="text-center" style="padding-top: 8px;">
                        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
" class="button start-button start-button-wie"><?php echo smarty_function_xr_translate(array('tag'=>'Wie funktioniert das?'),$_smarty_tpl);?>
</a>
                    </div>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 start-meinungen">
                    <p>&nbsp;</p>
                    <?php echo smarty_function_xr_wz_fetch(array('id'=>893,'var'=>'aussagen'),$_smarty_tpl);?>

                    
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('aussagen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    
                    <div class="row start-meinungen-abstand">
                        <div class="col-xs-2">
                            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>400,'h'=>400,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>

                            <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_NAME'];?>

                        </div>
                        <div class="col-xs-10">
                            &bdquo;<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
&ldquo;
                        </div>
                    </div>
                    
                    <?php }} ?>
                    
                    <div class="row start-meinungen-abstand"></div>
                    
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
            
            <?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
            
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
            
            
            <?php }?>
            
        
        </div>
    </div>
</div>