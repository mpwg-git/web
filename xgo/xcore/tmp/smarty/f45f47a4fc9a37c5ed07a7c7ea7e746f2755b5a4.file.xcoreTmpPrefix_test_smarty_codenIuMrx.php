<?php /* Smarty version Smarty-3.0.7, created on 2017-02-10 11:45:36
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenIuMrx" */ ?>
<?php /*%%SmartyHeaderCode:677842302589d99d096f9e7-26139016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f45f47a4fc9a37c5ed07a7c7ea7e746f2755b5a4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenIuMrx',
      1 => 1486723536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '677842302589d99d096f9e7-26139016',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="und-los-gehts" class="container">
    <div class="row">
        <h1 class="mpwg-color text-center">Und los geht's...</h1>
        <div class="row">
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-8">
                <p class="fp-text text-center">
                    Lärm, Party, Sauberkeit in der WG? Da hat jeder eine andere Meinung! Anstelle von 100 Interviews, Massen-Castings und böses Erwachen: Einige Fragen zu deinen Erwartungen und Dr. Duck findet jemanden der wirklich zu dir passt!
                </p>
                <img src="/xstorage/template/img/redesign/tmp_2.jpg" style="margin-top: 9rem; display: none;">
                
                <div class="row">
                    <div class="col-md-4 big-text-btn">
                        <img class="svg btn-icon-wgzimmer" src="/xstorage/template/redesign/svg/icon-wg-zimmer-finden-black.svg" alt="WG Zimmer finden">
                        <h2 class="text-center text-uppercase">Zimmer</h2>
                        <p class="fp-text-small text-center">
                            So einfach geht's. Sequi que consedit ututestm cum qui cumq osam harum event. Abore voloria volo omndebit atectumquis maximent.
                        </p>
                        <button type="button" class="btn-lg col-md-12 btn-icons-reg text-uppercase">Zimmer suchen</button>
                    </div>
                    <div class="col-md-4 big-text-btn">
                        <img class="svg btn-icon-mitbewohner" src="/xstorage/template/redesign/svg/icon-mitbewohner-finden-black.svg" alt="Mitbewohner finden">
                        <h2 class="text-center text-uppercase">Mitbewohner</h2>
                        <p class="fp-text-small text-center">
                            So einfach geht's. Sequi que consedit ututestm cum qui cumq osam harum event. Abore voloria volo omndebit atectumquis maximent.
                        </p>
                        <button type="button" class="btn-lg col-md-12 btn-icons-reg text-uppercase">Mitbewohner suchen</button>
                    </div>
                    <div class="col-md-4 big-text-btn">
                        <img class="svg btn-icon-wgsuchtwg" src="/xstorage/template/redesign/svg/icon-wg-sucht-wg-black.svg" alt="WG sucht WG">
                        <h2 class="text-center text-uppercase">WG</h2>
                        <p class="fp-text-small text-center">
                            So einfach geht's. Sequi que consedit ututestm cum qui cumq osam harum event. Abore voloria volo omndebit atectumquis maximent.
                        </p>
                        <button type="button" class="btn-lg col-md-12 btn-icons-reg text-uppercase">WG suchen</button>                        
                    </div>
                </div>
                
            </div>
            <div class="col-md-2">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    /*
 * Replace all SVG images with inline SVG
 */
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
</script>