<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 22:52:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeH22o4T" */ ?>
<?php /*%%SmartyHeaderCode:120435272955cbb21304eb53-19562548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44ccf2232baa3ab1eb23a56bd8d5c0f37c5f2432' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeH22o4T',
      1 => 1439412754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120435272955cbb21304eb53-19562548',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="profil suche">

    <div class="profil-inner">
        
        <?php if ($_smarty_tpl->getVariable('user')->value['wz_PROFILBILD']==0){?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>540,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('user')->value['wz_PROFILBILD'],'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

        <?php }?>
        
        <div class="profil-inner-padding">
            <div class="matchinginfos">
                <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
                <span class="prozent">85</span>
                <span class="match">match</span>
                 <div class="clearfix"></div>
            </div>
            
            <p class="match-text">
                Laborepel milluptatem apiet a dis ametur, utectas itatemquaest mo eumquam quas erum aut est, ilibus as intem nimusam et ut esequatium.
            </p>
            
            <p>
                <div class="icons">
                    <span class="icon-Favourite_inaktiv"></span> <span class="icon-description">Favourite</span>
                </div>
            </p>
            
            <p>
                <div class="icons">
                    <span class="icon-Blocked_inaktiv"></span> <span class="icon-description">Block</span>
                </div>
            </p>
            
            
            <p>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>12),$_smarty_tpl);?>
">
                    <div class="icons">
                        <span class="icon-Chat_Profil">
        				<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
        				</span> <span class="icon-description">Nachricht</span>
                    </div>
                </a>
            </p>
            
           
        </div>
        
    </div>    
</div>