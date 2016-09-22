<?php /* Smarty version Smarty-3.0.7, created on 2015-11-03 10:03:53
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/813.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:1371181625638787999c584-24377889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f2bbcda659810632c1cd8a72d6fb17b6a5266dd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/813.cache-3.html',
      1 => 1446541432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1371181625638787999c584-24377889',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="col-sm-3 room-roomie">
    <a href="<?php echo $_smarty_tpl->getVariable('single')->value['USER']['PROFILE_URL'];?>
">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('single')->value['USER']['wz_PROFILBILD'],'w'=>768,'class'=>"img-responsive"),$_smarty_tpl);?>

        <span class="roomie-matching-name" style="color:@blue;"><?php echo $_smarty_tpl->getVariable('single')->value['USER']['wz_VORNAME'];?>
</span>
        
        
        <div class="roomie-matching-info" style="color:@blue;">
            
            <span class="prozent" >
                <?php echo $_smarty_tpl->getVariable('single')->value['MATCHING']['RESULT']['matchGesamt'];?>
    
            </span>
            
        </div>
    </a>    
</div>