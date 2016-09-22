<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 18:28:01
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeR8lbDT" */ ?>
<?php /*%%SmartyHeaderCode:76201847255ca2291a3c631-41441241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e1821968fc72d1d924bb64a5dee335b71c5b8ff' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeR8lbDT',
      1 => 1439310481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76201847255ca2291a3c631-41441241',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><header class="clearfix <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    <nav class="left-row">
        <div class="main-nav">
            <span>
                <a href="#" class="navlinks">DE</a>
                <a href="#" class="navlinks">| EN</a>
            </span>
        </div>
    </nav>
    <nav class="middle-row">
        <div class="profile-nav">
            <div class="controls-wrapper">
                
                <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getProfileImage",'var'=>'profileImg'),$_smarty_tpl);?>

                
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>161,'w'=>44,'h'=>44,'rmode'=>"cco",'class'=>"main-item profile-image",'style'=>"vertical-align:top"),$_smarty_tpl);?>

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