<?
define(admdin, $_SERVER['DOCUMENT_ROOT'].'/admin/');
include admdin.'system/system_base.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>MVA CMS Shop</title>
	<link rel="stylesheet" type="text/css" href="template/css/style.css">
	<link rel="stylesheet" type="text/css" href="template/css/preload.css">
	<link rel="stylesheet" type="text/css" href="template/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="template/css/animate.css">
	<link rel="stylesheet" type="text/css" href="template/css/table.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="template/js/mvacms_script.js"></script>
	<script src="template/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
<div class="MVACMS">
<?include_once admdin.'src/preload.php';?>
<? if (isset($_POST['login']) && isset($_POST['pass'])) { MVAauth($_POST['login'],$_POST['pass']);}
if (empty($_SESSION['login']) or empty($_SESSION['id'])) { include_once admdin.'template/auth.php';} else { ?>


<div class="top"><?include_once admdin.'template/blocks/top.php';?></div>
<div class="wrap">
	<div class="left"><?include_once admdin.'template/blocks/left.php';?></div>
	<div class="content animated">

content

	</div>
</div>
<div class="bottom"><?include_once admdin.'template/blocks/bottom.php';?></div>
</div>














<?}?>
</body>
</html>