<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 17:44:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegB2yEp" */ ?>
<?php /*%%SmartyHeaderCode:21357229435644c1e9ddda67-01287865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce6d4c4c1b66fe5d78996588aa40a4450d03589d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegB2yEp',
      1 => 1447346665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21357229435644c1e9ddda67-01287865',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="picture-col">
    <div class="img-wrapper searchresult-wrapper-js">
        <div class="inner-wrapper">
            
            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>768,'var'=>'img'),$_smarty_tpl);?>

            <div class="img-responsive shower-img mobile-shower-img" style="background-image: url(<?php echo $_smarty_tpl->getVariable('img')->value['src'];?>
);">
                
            </div>
            
            <div class="matchinginfos">
                <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
</span>
                <span class="match">match</span>
            </div>
            
            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper">
                        <span class="drduck icon-duck"></span>
                        <span class="">
                            <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div class="clearfix"></div>
                    
                    <div class="item-search-geschlecht">
                        <?php if ($_smarty_tpl->getVariable('data')->value['GESCHLECHT']=='M'){?>
                            <span class="icon-mann_black"></span>
                        <?php }else{ ?>
                            <span class="icon-frau_black"></span>
                        <?php }?>    
                    </div>
                
                    <div class="infos">
                        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</p>
                        <?php if ($_smarty_tpl->getVariable('data')->value['PREIS']>0){?>
                            <p class="zimmer"><?php echo $_smarty_tpl->getVariable('data')->value['PREIS'];?>
 € / Zimmer</p>
                       <?php }?>
                       
                       <p class="button-search-profil-container">
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>13,'id'=>$_smarty_tpl->getVariable('data')->value['ID'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['ID']),$_smarty_tpl);?>
" class="btn button-search-profil"><?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>
</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>