<?php /* Smarty version Smarty-3.0.7, created on 2017-02-22 15:25:48
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6u0eiD" */ ?>
<?php /*%%SmartyHeaderCode:145548187658ad9f6cdbe716-83493678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31c0d747f0855fb208704a83ab9926cb375dc98e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6u0eiD',
      1 => 1487773548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145548187658ad9f6cdbe716-83493678',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div id="und-los-gehts" class="container">
    <div class="row">
        <h1 class="los-gehts mpwg-color text-center"><?php echo smarty_function_xr_translate(array('tag'=>'fp_h1-undlosgehts'),$_smarty_tpl);?>
</h1>
        <p class="fp-text los-gehts text-center">Lärm, Party, Sauberkeit in der WG? Da hat jeder eine andere Meinung! Anstelle von 100 Interviews, Massen-Castings und böses Erwachen: Einige Fragen zu deinen Erwartungen und Dr. Duck findet jemanden der wirklich zu dir passt!
        </p>
            <div class="col-md-1 hidden-sm hidden-xs">&nbsp;</div>
            <div class="col-md-10 col-sm-12">
                <!--<div class="row">-->
                    <div id="btn-wgzimmer" class="col-md-4 col-sm-4 big-text-btn">
                        <img class="svg btn-icon-wgzimmer" src="/xstorage/template/redesign/svg/icon-wg-zimmer-finden-black.svg" alt="WG Zimmer finden">
                        <h2 class="text-center text-uppercase">Zimmer</h2>
                        <p class="fp-text-small text-center">
                            So einfach geht's. Sequi que consedit ututestm cum qui cumq osam harum event. Abore voloria volo omndebit atectumquis maximent.
                        </p>
                        <button type="button" class="btn-lg col-md-12 btn-icons-reg text-uppercase">Zimmer suchen</button>
                    </div>
                    <div id="btn-mitbewohner" class="col-md-4 col-sm-4 big-text-btn">
                        <img class="svg btn-icon-mitbewohner" src="/xstorage/template/redesign/svg/icon-mitbewohner-finden-black.svg" alt="Mitbewohner finden">
                        <h2 class="text-center text-uppercase">Mitbewohner</h2>
                        <p class="fp-text-small text-center">
                            So einfach geht's. Sequi que consedit ututestm cum qui cumq osam harum event. Abore voloria volo omndebit atectumquis maximent.
                        </p>
                        <button type="button" class="btn-lg col-md-12 btn-icons-reg text-uppercase">Mitbewohner suchen</button>
                    </div>
                    <div id="btn-wg" class="col-md-4 col-sm-4 big-text-btn">
                        <img class="svg btn-icon-wgsuchtwg" src="/xstorage/template/redesign/svg/icon-wg-sucht-wg-black.svg" alt="WG sucht WG">
                        <h2 class="text-center text-uppercase">WG</h2>
                        <p class="fp-text-small text-center">
                            So einfach geht's. Sequi que consedit ututestm cum qui cumq osam harum event. Abore voloria volo omndebit atectumquis maximent.
                        </p>
                        <button type="button" class="btn-lg col-md-12 btn-icons-reg text-uppercase">WG suchen</button>                        
                    </div>
                <!--</div>-->
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



    /*
 * Replace all SVG images with inline SVG

jQuery('img.svg').each(function(){
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find('svg');

        // Add replaced image's ID to the new SVG
        if(typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if(typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass+' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
        }

        // Replace image with new SVG
        $img.replaceWith($svg);

    }, 'xml');
});
 */
</script>




<!---->