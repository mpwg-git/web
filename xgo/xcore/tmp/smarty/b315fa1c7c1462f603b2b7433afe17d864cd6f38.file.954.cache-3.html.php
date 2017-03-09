<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 11:50:35
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/954.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:190953512058bfe1fb2e0c16-40930713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b315fa1c7c1462f603b2b7433afe17d864cd6f38' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/954.cache-3.html',
      1 => 1488970157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190953512058bfe1fb2e0c16-40930713',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div id="und-los-gehts" class="container">
    <div class="row">
        <h1 class="los-gehts mpwg-color text-center"><?php echo smarty_function_xr_translate(array('tag'=>'fp_h1-undlosgehts'),$_smarty_tpl);?>
</h1>
        <p class="fp-text los-gehts text-center"><?php echo smarty_function_xr_translate(array('tag'=>'fp_text-undlosgehts'),$_smarty_tpl);?>
</p>
            <div class="col-md-1 hidden-sm hidden-xs">&nbsp;</div>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>47),$_smarty_tpl);?>
">
                    <div id="btn-wgzimmer" class="col-md-4 col-sm-4 big-text-btn">
                        <img class="svg btn-icon-wgzimmer" src="/xstorage/template/redesign/svg/icon-wg-zimmer-finden-black.svg" alt="<?php echo smarty_function_xr_translate(array('tag'=>'fp_btn-rooms-undlosgehts'),$_smarty_tpl);?>
">
                        <h2 class="text-center text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'fp_h2-rooms-undlosgehts'),$_smarty_tpl);?>
</h2>
                        <p class="fp-text-small text-center">
                            <?php echo smarty_function_xr_translate(array('tag'=>'fp_text-rooms-undlosgehts'),$_smarty_tpl);?>

                        </p>
                        <button type="button" class="btn-lg col-md-12 btn-icons-reg text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'fp_btn-rooms-undlosgehts'),$_smarty_tpl);?>
</button>
                    </div>
                </a>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>48),$_smarty_tpl);?>
">
                    <div id="btn-mitbewohner" class="col-md-4 col-sm-4 big-text-btn">
                        <img class="svg btn-icon-mitbewohner" src="/xstorage/template/redesign/svg/icon-mitbewohner-finden-black.svg" alt="Mitbewohner finden">
                        <h2 class="text-center text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'fp_h2-mitbewohner-undlosgehts'),$_smarty_tpl);?>
</h2>
                        <p class="fp-text-small text-center">
                            <?php echo smarty_function_xr_translate(array('tag'=>'fp_text-mitbewohner-undlosgehts'),$_smarty_tpl);?>

                        </p>
                        <button type="button" class="btn-lg col-md-12 btn-icons-reg text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'fp_btn-mitbewohner-undlosgehts'),$_smarty_tpl);?>
</button>
                    </div>
                </a>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>47),$_smarty_tpl);?>
">
                    <div id="btn-wg" class="col-md-4 col-sm-4 big-text-btn">
                        <img class="svg btn-icon-wgsuchtwg" src="/xstorage/template/redesign/svg/icon-wg-sucht-wg-black.svg" alt="WG sucht WG">
                        <h2 class="text-center text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'fp_h2-wg-undlosgehts'),$_smarty_tpl);?>
</h2>
                        <p class="fp-text-small text-center">
                            <?php echo smarty_function_xr_translate(array('tag'=>'fp_text-wg-undlosgehts'),$_smarty_tpl);?>

                        </p>
                        <button type="button" class="btn-lg col-md-12 btn-icons-reg text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'fp_btn-wg-undlosgehts'),$_smarty_tpl);?>
</button>                        
                    </div>
                </a>
            </div>
            <div class="col-md-1 hidden-sm hidden-xs">&nbsp;</div>
    </div>
</div>

<script>
$("#btn-wgzimmer").mouseover(function(e){
    $("img.svg.btn-icon-wgzimmer").attr('src', '/xstorage/template/redesign/svg/icon-wg-zimmer-finden-turkis.svg');
    $("#btn-wgzimmer h2").css({'color': '#04e0d7', 'border-top': '2px solid #04e0d7'});
    $("#btn-wgzimmer .fp-text-small").css('color', '#04e0d7');
    $("#btn-wgzimmer button").css({'background-color': '#04e0d7', 'box-shadow': '0.126rem 0.126rem 0.126rem #04e0d7'});
});
$("#btn-wgzimmer").mouseout(function(e){
    $("img.svg.btn-icon-wgzimmer").attr('src', '/xstorage/template/redesign/svg/icon-wg-zimmer-finden-black.svg');
    $("#btn-wgzimmer h2").css({'color': '#646464', 'border-top': '2px solid #646464'});
    $("#btn-wgzimmer .fp-text-small").css('color', '#333');
    $("#btn-wgzimmer button").css({'background-color': '#646464', 'box-shadow': '0.126rem 0.126rem 0.126rem #646464'});
});

$("#btn-mitbewohner").mouseover(function(e){
    $("img.svg.btn-icon-mitbewohner").attr('src', '/xstorage/template/redesign/svg/icon-mitbewohner-finden-turkis.svg');
    $("#btn-mitbewohner h2").css({'color': '#04e0d7', 'border-top': '2px solid #04e0d7'});
    $("#btn-mitbewohner .fp-text-small").css('color', '#04e0d7');
    $("#btn-mitbewohner button").css({'background-color': '#04e0d7', 'box-shadow': '0.126rem 0.126rem 0.126rem #04e0d7'});
});
$("#btn-mitbewohner").mouseout(function(e){
    $("img.svg.btn-icon-mitbewohner").attr('src', '/xstorage/template/redesign/svg/icon-mitbewohner-finden-black.svg');
    $("#btn-mitbewohner h2").css({'color': '#646464', 'border-top': '2px solid #646464'});
    $("#btn-mitbewohner .fp-text-small").css('color', '#333');
    $("#btn-mitbewohner button").css({'background-color': '#646464', 'box-shadow': '0.126rem 0.126rem 0.126rem #646464'});
});

$("#btn-wg").mouseover(function(e){
    $("img.svg.btn-icon-wgsuchtwg").attr('src', '/xstorage/template/redesign/svg/icon-wg-sucht-wg-turkis.svg');
    $("#btn-wg h2").css({'color': '#04e0d7', 'border-top': '2px solid #04e0d7'});
    $("#btn-wg .fp-text-small").css('color', '#04e0d7');
    $("#btn-wg button").css({'background-color': '#04e0d7', 'box-shadow': '0.126rem 0.126rem 0.126rem #04e0d7'});
});
$("#btn-wg").mouseout(function(e){
    $("img.svg.btn-icon-wgsuchtwg").attr('src', '/xstorage/template/redesign/svg/icon-wg-sucht-wg-black.svg');
    $("#btn-wg h2").css({'color': '#646464', 'border-top': '2px solid #646464'});
    $("#btn-wg .fp-text-small").css('color', '#333');
    $("#btn-wg button").css({'background-color': '#646464', 'box-shadow': '0.126rem 0.126rem 0.126rem #646464'});
});
</script>


