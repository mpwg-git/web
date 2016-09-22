<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:56:51
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYfas7o" */ ?>
<?php /*%%SmartyHeaderCode:36497130055d5b274007329-91800863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d7c451d7f4a46a2b6acdc5a13a3f138f1109a92' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYfas7o',
      1 => 1440068211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36497130055d5b274007329-91800863',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
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
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                    
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
                    
                </a>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
"><span class="main-item icon-Lupe"></span></a>
                
            </div>
            
            <div class="logo-legend-section pull-right">
                
                <div class="item">
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'FAVS','m_suffix'=>"favourites"),$_smarty_tpl);?>
">
                        <span class="icon-Favourite_inaktiv"></span>
                        Favourites
                    </a>
                </div>
                <div class="item">
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'BLOCKED','m_suffix'=>"blocked"),$_smarty_tpl);?>
">
                        <span class="icon-Blocked_inaktiv"></span>
                        Blocked
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <nav class="right-row">
        <div class="right-logo pull-right">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>180,'w'=>144,'h'=>22),$_smarty_tpl);?>
</a>
        </div>
    </nav>
</header>