<?php /* Smarty version Smarty-3.0.7, created on 2015-11-03 09:45:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewk0JrA" */ ?>
<?php /*%%SmartyHeaderCode:19016163675638743c2ec794-29214412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8731515a6c17dd3008790ad600ffdf767bd52389' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewk0JrA',
      1 => 1446540348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19016163675638743c2ec794-29214412',
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

        <span class="" >
                <?php echo $_smarty_tpl->getVariable('single')->value['MATCHING']['RESULT']['matchGesamt'];?>
    
            </span>
        
        <div class="roomie-matching-info" style="bottom:-21px;">
            
            
            
            <span class="prozent" >
                <?php echo $_smarty_tpl->getVariable('single')->value['MATCHING']['RESULT']['matchGesamt'];?>
    
            </span>
        </div>
    </a>    
</div>