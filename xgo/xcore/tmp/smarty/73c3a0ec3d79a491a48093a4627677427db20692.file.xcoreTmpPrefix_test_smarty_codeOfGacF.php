<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 15:32:06
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOfGacF" */ ?>
<?php /*%%SmartyHeaderCode:34534717056780d665dcd36-27048483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73c3a0ec3d79a491a48093a4627677427db20692' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOfGacF',
      1 => 1450708326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34534717056780d665dcd36-27048483',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="meinprofil-uebermich">

     <div class="meinprofil-profilbild">
        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="profilbild-hochladen">Profilbild hochladen</span>
    </div>

    <div class="meinprofil-uebermich-inner">
    
    <span class="subheadline">
        <?php echo smarty_function_xr_translate(array('tag'=>"Über mich"),$_smarty_tpl);?>

    </span>
    
        <form>
            <div class="form-group geschlecht">
                <div class="radio">
                    <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='F')){?>
                    <label for="female">
                        <input id="female" type="radio" name="gender" value="female" checked="checked">
                        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                        <span class="icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                    </label>
                    <?php }else{ ?>
                    <label for="male">
                        <input id="male" type="radio" name="gender" value="male">
                        <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
                        <span class="icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                    </label>
                    <?php }?>
                </div>
            </div>
          
            
            <div class="form-group">
                <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname"),$_smarty_tpl);?>
</label>
                <input id="vorname" name="vorname" class="form-control" />
            </div>
            <div class="form-group">
                <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname"),$_smarty_tpl);?>
</label>
                <input id="nachname" name="nachname" class="form-control" />
            </div>
            <div class="form-group">
                <label for="geburtsdatum"><?php echo smarty_function_xr_translate(array('tag'=>"Geburtsdatum"),$_smarty_tpl);?>
</label>
                <input id="geburtsdatum" name="geburtsdatum" class="form-control" />
            </div>
            <div class="form-group">
                <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"Email"),$_smarty_tpl);?>
</label>
                <input id="email" name="email" class="form-control" />
            </div>
             <div class="form-group">
                <label for="telefon"><?php echo smarty_function_xr_translate(array('tag'=>"Telefon"),$_smarty_tpl);?>
</label>
                <input id="telefon" name="telefon" class="form-control" />
            </div>
            
            <div class="form-group">
                <label for="land"><?php echo smarty_function_xr_translate(array('tag'=>"Land"),$_smarty_tpl);?>
</label>
                
                <select id="land" name="LAND" class="form-control select-helvetica">
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user')->value['LAND_COMBO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['selected']=='1'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['label'];?>
</option>
                    <?php }} ?>
                </select>
                
            </div>
            
            <div class="form-group">
                <label for="beschreibung"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
                <textarea id="beschreibung" name="beschreibung" class="form-control" placeholder="..."><?php echo $_smarty_tpl->getVariable('user')->value['wz_BESCHREIBUNG'];?>
</textarea>
            </div>
            
            
        </form>
    </div>    
</div>