<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 14:32:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYjMTct" */ ?>
<?php /*%%SmartyHeaderCode:566239394564c7de9e7bf96-07988320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be694d9e040977c0e75eb0dafe2f6be3917b1efa' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYjMTct',
      1 => 1447853545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '566239394564c7de9e7bf96-07988320',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><div class="col-xs-4 picture-col searchresult-single searchresult-single-biete">
    
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>13,'id'=>$_smarty_tpl->getVariable('data')->value['ID'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['ID']),$_smarty_tpl);?>
">
    <div class="img-wrapper" data-userid="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'h'=>500,'w'=>470,'colorspace'=>"gray",'rmode'=>"cco",'class'=>"img-responsive"),$_smarty_tpl);?>

            
            <?php echo smarty_function_xr_atom(array('a_id'=>774,'return'=>1,'data'=>$_smarty_tpl->getVariable('data')->value,'desc'=>'map indicator'),$_smarty_tpl);?>

            
            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper">
                        <span class="pull-left drduck icon-duck"></span>
                        <span class="pull-right">
                            <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div style="clear:both"></div>
                    <div class="infos">
                        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</p>
                        <p class="zimmer">Zimmer für <?php echo $_smarty_tpl->getVariable('data')->value['PREIS'];?>
 €</p>
                        
                        <?php if ($_smarty_tpl->getVariable('data')->value['ALTERSDURCHSCHNITT']>0){?>
                        <p class="durchschnitt">Ø <?php echo $_smarty_tpl->getVariable('data')->value['ALTERSDURCHSCHNITT'];?>
 Jahre</p>
                        <?php }?>
                        
                        <p class="mitbewohner">
                            <?php echo smarty_function_xr_atom(array('a_id'=>751,'mitbewohner'=>$_smarty_tpl->getVariable('data')->value['MITBEWOHNER'],'return'=>1),$_smarty_tpl);?>

                        </p>
                        
                        
                        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_getUser2RoomState','fUserId'=>$_smarty_tpl->getVariable('data')->value['ID'],'var'=>'roomState'),$_smarty_tpl);?>

                        <div class="button-container-favblock clearfix">
                            <div class="inner clearfix">
                                <div class="item">
                                    <?php echo $_REQUEST['filter'];?>

                                    <?php $_smarty_tpl->tpl_vars['from'] = new Smarty_Variable($_smarty_tpl->getVariable('from',null,true,false)->value);if ($_smarty_tpl->tpl_vars['from']->value = 'favorites'){?>
                                        <?php echo smarty_function_xr_atom(array('a_id'=>769,'theType'=>'room','state'=>$_smarty_tpl->getVariable('roomState')->value['FAV'],'userId'=>$_smarty_tpl->getVariable('data')->value['ID'],'addClass'=>"js-toggle-fade",'return'=>1,'desc'=>"fav icon"),$_smarty_tpl);?>

                                    <?php }else{ ?>
                                        <?php echo smarty_function_xr_atom(array('a_id'=>769,'theType'=>'room','state'=>$_smarty_tpl->getVariable('roomState')->value['FAV'],'userId'=>$_smarty_tpl->getVariable('data')->value['ID'],'return'=>1,'desc'=>"fav icon"),$_smarty_tpl);?>

                                    <?php }?>
                                </div>
                                <div class="item">
                                    <?php echo smarty_function_xr_atom(array('a_id'=>770,'theType'=>'room','state'=>$_smarty_tpl->getVariable('roomState')->value['BLOCK'],'userId'=>$_smarty_tpl->getVariable('data')->value['ID'],'addClass'=>"js-toggle-fade",'return'=>1,'desc'=>"block icon"),$_smarty_tpl);?>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>