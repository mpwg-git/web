<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:56:26
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codea451iI" */ ?>
<?php /*%%SmartyHeaderCode:2989197055d5b25a063827-68377627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab929893f0528d3c4bb76432b97c7f336083052e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codea451iI',
      1 => 1440068186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2989197055d5b25a063827-68377627',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><header class="clearfix <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    <nav class="left-row">
        <div class="main-nav">
            <span>
                <a href="#" class="navlinks">DE</a>
                <a href="#" class="navlinks">| EN</a>
                 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>28),$_smarty_tpl);?>
" class="navlinks">&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Abmelden</a>
            </span>
        </div>
    </nav>
    <nav class="middle-row">
        <div class="profile-nav">
            <div class="controls-wrapper">
                
                <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyProfileImage",'var'=>'profImg'),$_smarty_tpl);?>

                <?php if ($_smarty_tpl->getVariable('profImg')->value!=false){?>
                    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('profImg')->value,'w'=>44,'h'=>44,'var'=>"profileImg"),$_smarty_tpl);?>

                <?php }else{ ?>
                    <?php echo smarty_function_xr_img(array('s_id'=>161,'w'=>44,'h'=>44,'var'=>"profileImg"),$_smarty_tpl);?>

                <?php }?>
                
                
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                    <img src="<?php echo $_smarty_tpl->getVariable('profileImg')->value['src'];?>
" class="main-item profile-image" style="vertical-align:top">
                </a>
                
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
"><span class="main-item icon-Lupe"></span></a>
                
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
"><span class="main-item icon-Chat"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></span></a>
            </div>
            
            <div class="logo-legend-section pull-right">
                <div class="item">
                    <span class="icon-Favourite_inaktiv"></span>
                    Favourites
                </div>
                <div class="item">
                    <span class="icon-Blocked_inaktiv"></span>
                    Blocked
                </div>
            </div>
        </div>
    </nav>
</header>