<?php /* Smarty version Smarty-3.0.7, created on 2015-10-05 10:30:31
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejzhdbA" */ ?>
<?php /*%%SmartyHeaderCode:157291226556123527868319-48739496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c67f5f4050fade911c0435c9789df95a01af6aae' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejzhdbA',
      1 => 1444033831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157291226556123527868319-48739496',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><header class="clearfix <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    <nav class="left-row">
        <div class="main-nav">
            <span>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks">DE</a>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks">| EN</a>
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
" class="main-item profile-image blackandwhite" style="vertical-align:top">
                    </a>
                    
                </a>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
"><span class="main-item icon-Lupe"></span></a>
                
            </div>
            
            <div class="logo-legend-section pull-right">
                
                
                <?php echo smarty_function_xr_atom(array('a_id'=>782,'showFace'=>0,'return'=>1,'desc'=>'icons block / fav'),$_smarty_tpl);?>

                
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