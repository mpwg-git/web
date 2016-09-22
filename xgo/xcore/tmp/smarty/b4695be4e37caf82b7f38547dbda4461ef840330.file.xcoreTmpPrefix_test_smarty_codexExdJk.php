<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 19:18:49
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexExdJk" */ ?>
<?php /*%%SmartyHeaderCode:185541690555db51f973d678-14784583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4695be4e37caf82b7f38547dbda4461ef840330' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexExdJk',
      1 => 1440436729,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185541690555db51f973d678-14784583',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="col-xs-12 picture-col searchresult-single">
    
    <div class="img-wrapper searchresult-wrapper-js" data-userid="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">
        <div class="inner-wrapper">
            
            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>768,'colorspace'=>'Gray','var'=>'img'),$_smarty_tpl);?>

            <div class="img-responsive shower-img mobile-shower-img" style="background-image: url(<?php echo $_smarty_tpl->getVariable('img')->value['src'];?>
);">
            </div>
            
            <div class="matchinginfos">
                <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
</span>
                <span class="match">match</span>
            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>774,'return'=>1,'data'=>$_smarty_tpl->getVariable('data')->value,'desc'=>'map indicator'),$_smarty_tpl);?>

            
            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper is-suche">
                        <span class="pull-left drduck icon-duck"></span>
                        <span class="pull-right">
                            <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div style="clear:both"></div>
                    <div class="infos">
                        
                        <div class="item-search-geschlecht">
                            <?php if ($_smarty_tpl->getVariable('data')->value['GESCHLECHT']=='M'){?>
                                <span class="icon-mann_black"></span>
                            <?php }else{ ?>
                                <span class="icon-frau_black"></span>
                            <?php }?>    
                        </div>
                        
                        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</p>
                        <p class="durchschnitt"><?php echo $_smarty_tpl->getVariable('data')->value['ALTER'];?>
 Jahre</p>
                        
                        
                        <p class="button-search-profil-container">
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>14,'id'=>$_smarty_tpl->getVariable('data')->value['ID'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['ID']),$_smarty_tpl);?>
" class="btn button-search-profil">Profil</a>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>