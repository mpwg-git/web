<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:34:21
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2IM3cM" */ ?>
<?php /*%%SmartyHeaderCode:16825257895503118d2c00a4-11820493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4c586c0a038a7d8090aad52f896583eacdbe36d' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2IM3cM',
      1 => 1426264461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16825257895503118d2c00a4-11820493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getProducts')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getProducts.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xs_getProducts(array('var'=>'data'),$_smarty_tpl);?>


<div class="row">
    <div class="col-sm-4 col-lg-2">
        
        [FILTER]
        
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['FILTER']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <div class="panel-group">
        		<div class="panel panel-default">
        			
        			<div class="panel-heading">
        				<h4 class="panel-title"><a data-toggle="collapse" data-parent="#shopFilter_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" href=""><?php echo $_smarty_tpl->tpl_vars['v']->value['NAME'];?>
 <span class="icon icon-pfeil-down pull-right"></span></a></h4>
        			</div>
        			
        			<div id="#shopFilter_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="panel-collapse collapse in">
        				<div class="panel-body">
        					<ul>
        					
        					    <?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['OPTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
 $_smarty_tpl->tpl_vars['k2']->value = $_smarty_tpl->tpl_vars['v2']->key;
?>
								    <li><a href="<?php echo $_smarty_tpl->tpl_vars['v2']->value['URL'];?>
"><span class="icon icon-pfeil"></span><?php echo $_smarty_tpl->tpl_vars['v2']->value['NAME'];?>
</a> <small><?php echo $_smarty_tpl->tpl_vars['v2']->value['COUNT'];?>
</small></li>
								<?php }} ?>
								
        					</ul>
        				</div>
        			</div>
        			
        		</div>
        	</div>
        <?php }} ?>
        
    </div>
    
    <div class="col-sm-8 col-lg-10">
        
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        
        
            <div class="row productlist-item">
                
                <div class="col-sm-4">
                    <?php echo $_smarty_tpl->tpl_vars['v']->value['BILD'];?>

                </div>
                
                
                <div class="col-sm-8">
                    
                    <p class="productdetail-name"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_NAME'];?>
</p>
                    <p class="productdetail-desc-short"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_SHORT_DESC'];?>
</p>
                    <p class="productdetail-desc-long"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_LONG_DESC'];?>
</p>
                    
                    <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
" class="btn btn-default"><?php echo smarty_function_xr_translate(array('tag'=>'Details'),$_smarty_tpl);?>
</a>
                    
                </div>

            </div>
        <?php }} ?>
        
    </div>
    
</div>