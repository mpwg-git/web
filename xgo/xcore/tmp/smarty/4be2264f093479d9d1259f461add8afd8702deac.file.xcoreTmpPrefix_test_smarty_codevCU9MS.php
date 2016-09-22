<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 19:19:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevCU9MS" */ ?>
<?php /*%%SmartyHeaderCode:209673338355db521ce9dfa3-04130188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4be2264f093479d9d1259f461add8afd8702deac' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevCU9MS',
      1 => 1440436764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209673338355db521ce9dfa3-04130188',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
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
" class="btn button-search-profil">Profil</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>