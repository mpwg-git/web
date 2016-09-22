<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 12:08:01
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetO7TSw" */ ?>
<?php /*%%SmartyHeaderCode:72137498655c8780136ad32-85784114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72a2b6678ce1fa6e911aa43f0e766384b9956e9c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetO7TSw',
      1 => 1439201281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72137498655c8780136ad32-85784114',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><header class="clearfix">
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