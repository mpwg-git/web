<?php /* Smarty version Smarty-3.0.7, created on 2015-10-30 10:52:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeR3ZzaX" */ ?>
<?php /*%%SmartyHeaderCode:90003715056333dec8fa2d5-33785949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50bcd16bda5be93757f8f5afb59dacaf3d8a934a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeR3ZzaX',
      1 => 1446198764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90003715056333dec8fa2d5-33785949',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><header class="clearfix black header-suche <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    <nav class="left-row">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
            
            <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyProfileImage",'var'=>'profImg'),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->getVariable('profImg')->value!=false){?>
                <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('profImg')->value,'w'=>25,'h'=>25,'var'=>"profileImg"),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_img(array('s_id'=>161,'w'=>25,'h'=>25,'var'=>"profileImg"),$_smarty_tpl);?>

            <?php }?>
            
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                <img src="<?php echo $_smarty_tpl->getVariable('profileImg')->value['src'];?>
" class="main-item profile-image blackandwhite" style="vertical-align:top">
            </a>
            
        </a>
    </nav>
    
    <nav class="middle-row">
        <div class="logo-legend-section pull-right">
            
            
            
            <div class="clearfix"></div>
        </div>
    </nav>
    
</header>