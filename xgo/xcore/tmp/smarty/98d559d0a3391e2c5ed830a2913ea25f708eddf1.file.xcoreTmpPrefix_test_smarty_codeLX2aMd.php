<?php /* Smarty version Smarty-3.0.7, created on 2016-08-30 17:11:28
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLX2aMd" */ ?>
<?php /*%%SmartyHeaderCode:67188779957c5a220b92bf7-77486678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98d559d0a3391e2c5ed830a2913ea25f708eddf1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLX2aMd',
      1 => 1472569888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67188779957c5a220b92bf7-77486678',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><header class="clearfix">
    <nav class="left-row">
        <div class="main-nav">
            <span>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks">DE</a>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks">| EN</a>
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