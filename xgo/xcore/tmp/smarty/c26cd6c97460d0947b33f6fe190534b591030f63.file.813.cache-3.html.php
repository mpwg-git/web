<?php /* Smarty version Smarty-3.0.7, created on 2017-02-21 11:12:55
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/813.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:192800177758ac12a7d30b25-69321252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c26cd6c97460d0947b33f6fe190534b591030f63' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/813.cache-3.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192800177758ac12a7d30b25-69321252',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>
<div class="col-sm-3 room-roomie">
    <a href="<?php echo $_smarty_tpl->getVariable('single')->value['USER']['PROFILE_URL'];?>
">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('single')->value['USER']['wz_PROFILBILD'],'w'=>768,'class'=>"img-responsive"),$_smarty_tpl);?>

        <span class="roomie-matching-name" style="color:@blue;"><?php echo $_smarty_tpl->getVariable('single')->value['USER']['wz_VORNAME'];?>
</span>
        
        
        <div class="roomie-matching-info" style="color:@blue;">
            
            <!--<span class="prozent" >-->
            <!--    <?php echo $_smarty_tpl->getVariable('single')->value['MATCHING']['RESULT']['matchGesamt'];?>
    -->
            <!--</span>-->
            
            <span class="prozent">
            <?php if ($_smarty_tpl->getVariable('single')->value['USER']['wz_id']==$_smarty_tpl->getVariable('roomData')->value['wz_ADMIN']){?>
                    <style>
                        .roomie-matching-info .prozent:after {
                            content: '100%';
                            font-size: 15px;
                        }
                        .matchinginfos .prozent{
                            margin-bottom: 0.75vw;
                        }
                        .profil .match-text {
                            display: none;
                        }
                    </style>
                <?php }else{ ?>
                    <?php echo $_smarty_tpl->getVariable('single')->value['MATCHING']['RESULT']['matchGesamt'];?>

                <?php }?>
            </span>
                
        </div>
    </a>    
</div>