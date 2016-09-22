<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 11:06:32
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeybQFEd" */ ?>
<?php /*%%SmartyHeaderCode:26041122755cb0c98112f67-63179223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7556784c27eefc5d5d2f590031f500c89df9719' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeybQFEd',
      1 => 1439370392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26041122755cb0c98112f67-63179223',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="col-xs-4 picture-col">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>13),$_smarty_tpl);?>
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
                        <p class="durchschnitt"><?php echo $_smarty_tpl->getVariable('data')->value['ALTERSDURCHSCHNITT'];?>
 Jahre</p>
                        <p class="mitbewohner">
                            
                            <?php if ($_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['F']>0){?>
                                <?php while ($_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['F']>0){?>
                                    <span class="icon-frau_black"></span>
                                    <?php if (!isset($_smarty_tpl->tpl_vars['data']) || !is_array($_smarty_tpl->tpl_vars['data']->value)) $_smarty_tpl->createLocalArrayVariable('data', null, null);
$_smarty_tpl->tpl_vars['data']->value['MITBEWOHNER']['F'] = $_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['F']-1;?>
                                <?php }?>
                            <?php }?>
                            
                            <?php if ($_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['M']>0){?>
                                <?php while ($_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['M']>0){?>
                                    <span class="icon-mann_black"></span>
                                    <?php if (!isset($_smarty_tpl->tpl_vars['data']) || !is_array($_smarty_tpl->tpl_vars['data']->value)) $_smarty_tpl->createLocalArrayVariable('data', null, null);
$_smarty_tpl->tpl_vars['data']->value['MITBEWOHNER']['M'] = $_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['M']-1;?>
                                <?php }?>
                            <?php }?>
                            
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>