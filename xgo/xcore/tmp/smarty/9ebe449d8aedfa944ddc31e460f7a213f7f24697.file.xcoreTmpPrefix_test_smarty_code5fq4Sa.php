<?php /* Smarty version Smarty-3.0.7, created on 2016-09-19 12:52:49
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5fq4Sa" */ ?>
<?php /*%%SmartyHeaderCode:162863156257dfc381e57761-52405338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ebe449d8aedfa944ddc31e460f7a213f7f24697' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5fq4Sa',
      1 => 1474282369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162863156257dfc381e57761-52405338',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_modifier_replace')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.replace.php';
?>	
<meta property="og:site_name" content="MeinePerfekteWG"/>
<meta property="og:type" content="website" />
<?php if ($_smarty_tpl->getVariable('P_ID')->value==46){?>
    <?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','r_id'=>$_REQUEST['blogId'],'var'=>'blogEntry'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_vanityurls::sc_get_blog_detail_url','blogId'=>$_REQUEST['blogId'],'var'=>'blogEntryURL'),$_smarty_tpl);?>

    
    <?php if ($_smarty_tpl->getVariable('blogEntry')->value['wz_BILD']>0){?>
        <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('blogEntry')->value['wz_BILD'],'ext'=>'jpg','w'=>600,'var'=>'blogPostImage'),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['blogPostImage'] = new Smarty_variable(false, null, null);?>
    <?php }?>
    
    <meta property="og:title" content="<?php echo $_smarty_tpl->getVariable('blogEntry')->value['wz_HEADLINE'];?>
" />
    <meta property="og:description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('blogEntry')->value['wz_TEXT']);?>
" />
    <?php if ($_smarty_tpl->getVariable('blogPostImage')->value){?>
        <meta property="og:image" content="//www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('blogPostImage')->value['src'];?>
"/>
    <?php }?>
    <meta property="og:url" content="//www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('blogEntryURL')->value;?>
" />
    
    <meta name="twitter:title" content="<?php echo $_smarty_tpl->getVariable('blogEntry')->value['wz_HEADLINE'];?>
" />
    <meta name="twitter:description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('blogEntry')->value['wz_TEXT']);?>
" />
    <meta name="twitter:image" content="//www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('blogPostImage')->value['src'];?>
" />
    <meta name="twitter:url" content="//www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('blogEntryURL')->value;?>
" />

    <meta name="description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('blogEntry')->value['wz_TEXT']);?>
" />

<?php }elseif($_smarty_tpl->getVariable('P_ID')->value==13){?>

<?php if ($_smarty_tpl->getVariable('FBOG_DATA')->value){?>
    <?php if ($_smarty_tpl->getVariable('FBOG_DATA')->value['wz_PROFILBILD']>0){?>
    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('FBOG_DATA')->value['wz_PROFILBILD'],'var'=>"ogImage"),$_smarty_tpl);?>

    <meta property="og:image" content="//<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_smarty_tpl->getVariable('ogImage')->value['src'];?>
">
    <?php }else{ ?>
    <?php echo smarty_function_xr_img(array('s_id'=>792,'var'=>"ogImage"),$_smarty_tpl);?>

    <meta property="og:image" content="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_smarty_tpl->getVariable('ogImage')->value['src'];?>
">
    <?php }?>
    
    <meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REDIRECT_URL'];?>
?layoutV2">
    
    <meta property="og:title"         content="<?php echo smarty_function_xr_translate(array('tag'=>'FB_ShareRoom_Title'),$_smarty_tpl);?>
" />
	<meta property="og:description"   content="<?php echo smarty_modifier_replace(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('FBOG_DATA')->value['wz_BESCHREIBUNG']),'"','');?>
" />
   
    
<?php }?>

<?php }else{ ?>
    
    <?php echo smarty_function_xr_img(array('s_id'=>18388,'ext'=>'jpg','w'=>300,'var'=>'ogImage'),$_smarty_tpl);?>

    
    <meta property="og:title" content="MeinePerfekteWG.com - <?php echo smarty_function_xr_translate(array('tag'=>'Deine persönliche WG-Suchmaschine'),$_smarty_tpl);?>
" />
    <meta property="og:description" content="<?php echo smarty_function_xr_translate(array('tag'=>'Suchen'),$_smarty_tpl);?>
.<?php echo smarty_function_xr_translate(array('tag'=>'Matchen'),$_smarty_tpl);?>
.<?php echo smarty_function_xr_translate(array('tag'=>'Wohnen'),$_smarty_tpl);?>
. <?php echo smarty_function_xr_translate(array('tag'=>'Du entscheidest was dir wichtig ist und wir zeigen dir durch schnelle und simple Fragen wer zu dir passt'),$_smarty_tpl);?>
." />
    <meta property="og:image" content="http://www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('ogImage')->value['src'];?>
"/>
    <meta property="og:url" content="http://www.meineperfektewg.com" />
    
<?php }?>
