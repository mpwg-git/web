<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 05:10:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeik1I6Z" */ ?>
<?php /*%%SmartyHeaderCode:21808557655dbdcb60e9377-36623786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ec315f9375dda894e0f889f20ec673b9a825055' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeik1I6Z',
      1 => 1440472246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21808557655dbdcb60e9377-36623786',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="button-container-favblock clearfix">
    <div class="inner clearfix">
        <div class="item">
            
            <?php echo smarty_function_xr_atom(array('a_id'=>769,'return'=>1),$_smarty_tpl);?>

            
        </div>
        <div class="item">
            
            <?php echo smarty_function_xr_atom(array('a_id'=>770,'return'=>1),$_smarty_tpl);?>

            
        </div>
        <div class="item">
             <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16,'id'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'m_suffic'=>$_smarty_tpl->getVariable('user')->value['wz_id']),$_smarty_tpl);?>
">
                <span class="icon icon-Chat_Profil">
    			    <span class="path1"></span><span class="path2"></span><span class="path3"><span class="path4"></span>
    		    </span>
    		 </a>
        </div>
        <div class="item">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>19),$_smarty_tpl);?>
">
                <span class="icon icon-Map_Profil"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
            </a>
        </div>
    </div>
</div>