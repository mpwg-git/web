<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:58:24
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewytTH4" */ ?>
<?php /*%%SmartyHeaderCode:9983079355502a6b09e08e6-25385100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6fe1c1a07be3d7c0f3684e8231bf7cc121c0a87' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewytTH4',
      1 => 1426237104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9983079355502a6b09e08e6-25385100',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getProducts')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getProducts.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xs_getProducts(array('var'=>'data'),$_smarty_tpl);?>


<div class="row">
    <div class="col-sm-4">
        
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
    
    <div class="col-sm-8">
        
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        
            <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>

        
            <div class="row">
                
                <div class="col-sm-4">
                    <?php echo $_smarty_tpl->tpl_vars['v']->value['BILD'];?>

                </div>
                
                
                <div class="col-sm-8">
                    
                    <p class="produktdetail-name"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_NAME'];?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_SHORT_DESC'];?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_LONG_DESC'];?>
</p>
                    
                    <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
"></a>
                    
                </div>

            </div>
        <?php }} ?>
        
    </div>
    
</div>