<?php /* Smarty version Smarty-3.0.7, created on 2015-08-13 00:51:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8Pekqb" */ ?>
<?php /*%%SmartyHeaderCode:156953140755cbcdf6ca77a0-52488262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '813881004830b53c9e8b5a598ebabb26b3e84a8e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8Pekqb',
      1 => 1439419894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156953140755cbcdf6ca77a0-52488262',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="col-xs-4 picture-col">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>13,'id'=>$_smarty_tpl->getVariable('data')->value['ID'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['ID']),$_smarty_tpl);?>
">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'h'=>500,'w'=>470,'rmode'=>"cco",'class'=>"img-responsive shower-img"),$_smarty_tpl);?>

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
                        <p class="durchschnitt"><?php echo $_smarty_tpl->getVariable('data')->value['ALTERSDURCHSCHNITT'];?>
 Jahre</p>
                        <?php }?>
                        
                        <p class="mitbewohner">
                            <?php echo smarty_function_xr_atom(array('a_id'=>751,'mitbewohner'=>$_smarty_tpl->getVariable('data')->value['MITBEWOHNER'],'return'=>1),$_smarty_tpl);?>

                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>