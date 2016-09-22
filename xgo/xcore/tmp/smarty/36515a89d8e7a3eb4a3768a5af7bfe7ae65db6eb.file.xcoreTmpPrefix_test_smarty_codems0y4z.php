<?php /* Smarty version Smarty-3.0.7, created on 2015-08-21 15:57:52
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codems0y4z" */ ?>
<?php /*%%SmartyHeaderCode:82009644855d72e6025d8b7-22170742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36515a89d8e7a3eb4a3768a5af7bfe7ae65db6eb' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codems0y4z',
      1 => 1440165472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82009644855d72e6025d8b7-22170742',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="picture-col">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            
            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>768,'var'=>'img'),$_smarty_tpl);?>

            
            
            <div class="img-responsive shower-img mobile-shower-img" style="background-image: url(<?php echo $_smarty_tpl->getVariable('img')->value['src'];?>
); background-size: cover;">
                
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
                    <div class="infos">
                        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</p>
                        <p class="zimmer"><?php echo $_smarty_tpl->getVariable('data')->value['PREIS'];?>
 € / Zimmer</p>
                       
                       
                        <div class="button-container-favblock clearfix">
                            <div class="inner clearfix">
                                <div class="item">
                                    <span class="icon icon-Favourite_inaktiv"></span><span class="item-beschreibung">Favorit</span>
                                </div>
                                <div class="item">
                                    <span class="icon icon-Blocked_inaktiv"></span><span class="item-beschreibung">Blockieren</span>        
                                </div>
                            </div>
                        </div>
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