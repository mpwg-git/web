<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 10:53:25
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecPiazT" */ ?>
<?php /*%%SmartyHeaderCode:82799893356937b956fe9d8-27495147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8b35d2b1340a4965fe3632fc543290a19178275' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecPiazT',
      1 => 1452506005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82799893356937b956fe9d8-27495147',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<head>
    <style type="text/css">

    </style>
    
    <script type="text/javascript" src="testupload.js"></script>
    
</head>    
<body>
    
<div id="yourId"></div>
<form action="fe_testupload.php" method="post">
    Name: <input type="text" name="name">
    Image: <input type="file" name="image" id="image">
    <button type="submit">Submit</button>
</form>


