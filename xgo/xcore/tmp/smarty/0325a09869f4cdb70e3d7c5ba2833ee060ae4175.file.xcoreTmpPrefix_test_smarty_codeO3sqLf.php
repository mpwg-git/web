<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:41:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeO3sqLf" */ ?>
<?php /*%%SmartyHeaderCode:34534479755d19e3f6d3956-26741051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0325a09869f4cdb70e3d7c5ba2833ee060ae4175' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeO3sqLf',
      1 => 1439800895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34534479755d19e3f6d3956-26741051',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
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
                    <?php echo smarty_function_xr_atom(array('a_id'=>769,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('user')->value['STATE_FAV'],'description'=>"Favourite",'return'=>1),$_smarty_tpl);?>

                </div>
            </p>
            
            <p>
                <div class="icons">
                    <?php echo smarty_function_xr_atom(array('a_id'=>770,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('user')->value['STATE_BLOCK'],'description'=>"Block",'return'=>1),$_smarty_tpl);?>

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