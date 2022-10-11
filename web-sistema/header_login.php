<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Responsive bootstrap 4 admin template" name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">


<?php
include_once("RequestManager.php");
$request_manager = new RequestManager();
$base_url = $request_manager->getBaseUrl($absolute = true) . '/';
$server = $_SERVER['SERVER_NAME'];
?>
?>
<base href="<?= $base_url ?>" />
<meta property="og:title" content="<?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos" />
<meta property="og:description" content="<?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos" />
<meta property="og:type" content="website" />
<meta property="og:url" content="url" />
<meta property="og:image" content="" />
<meta property="og:site_name" content="<?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos" />
<meta name="Title" content="<?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos" />
<meta name="reply-to" content="email do cliente" />
<meta name="description" content="<?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos" />
<meta name="keywords" content="" />
<meta name="copyright" content="Copyright 2018" />
<meta name="DC.date.created" content="2018-08-01" />
<meta name="URL" content="<?php echo Yii::app()->sistema_url; ?>" />
<link rel="stylesheet" type="text/css" href="gzip/gzip.php?arquivo=../css/login.css&amp;cid=<?= $cid ?>" />
<!-- App css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

<?php include("analytics.php"); ?>