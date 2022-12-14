<?php
include_once('extranet/autoload.php');
session_start();

function readfile_chunked($filename,$retbytes=true) {
	$chunksize = 1*(1024*1024); // how many bytes per chunk
	$buffer = '';
	$cnt =0;
	$handle = fopen($filename, 'rb');
	if ($handle === false) {
		return false;
	}
	while (!feof($handle)) {
		$buffer = fread($handle, $chunksize);
		echo $buffer;
		ob_flush();
		flush();
		if ($retbytes) {
			$cnt += strlen($buffer);
		}
	}
	$status = fclose($handle);
	if ($retbytes && $status) {
		return $cnt; // return num. bytes delivered like readfile() does.
	}
	return $status;
}

ob_clean();
ob_start();
$erro_ret = '<h1><i class="fa fa-paperclip"></i>  Arquivo n?o encontrado!</h1>';
$erro = true;
$diretorio = '';
if(is_numeric($_GET['id'])){
	// $model_obj = NULL;
	// $dir = '';
	// $erro = false;
	// $model = $_GET['model'];
	// switch($model){
	//
	// 	case 'arquivo':

		$dir = 'Arquivo';
		$model_obj = Arquivo::model()->findByPk($_GET['id'], array('condition'=>"ativo = '1'"));

		$arquivo = $model_obj->arquivo;
	// 	break;
	// 	default:
	// 	$erro = true;
	// 	break;
	// }

	$diretorio = "extranet/uploads/".$dir.'/';

}
if(is_file($diretorio.$arquivo)){

	$file_extension = end(explode('.',$arquivo));

	switch( $file_extension ){
		case "pdf":  $ctype="application/pdf"; break;
		case "exe	": $ctype="application/octet-stream"; break;
		case "zip":  $ctype="application/zip"; break;
		case "rar":  $ctype="application/rar"; break;
		case "doc":  $ctype="application/msword"; break;
		case "docx": $ctype="application/msword"; break;
		case "xls":  $ctype="application/vnd.ms-excel"; break;
		case "xlsx": $ctype="application/vnd.ms-excel"; break;
		case "ppt":  $ctype="application/vnd.ms-powerpoint"; break;
		case "pptx": $ctype="application/vnd.ms-powerpoint"; break;
		case "gif":  $ctype="image/gif"; break;
		case "png":  $ctype="image/png"; break;
		case "jpg":  $ctype="image/jpg"; break;
		default:     $ctype="application/force-download";
	}

	header("Pragma: public"); // required
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false); // required for certain browsers
	header("Content-Type: $ctype");
	// change, added quotes to allow spaces in filenames, by Rajkumar Singh
	header("Content-Disposition: attachment; filename=\"".$arquivo."\";" );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".filesize($diretorio.$arquivo));
	readfile_chunked($diretorio.$arquivo);
}else{
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos</title>
		<?php include ("header.php");?>
	</head>
	<body>
		<div id="topo"><?php include ("topo.php");?></div>
		<div id="wrapper" class="internas">
			<div class="caminho"><div class="container container-1200"><a href="terrenos">Inicial</a><i class="icon-right"></i>Downloads</div></div>
			<div class="container container-1200">
				<?php //include ("avisos_lista.php");?>
				<h2 class="tit mt50">DOWNLOADS</h2>
				<div class="downloads_lista mt80">
					<?=$erro_ret?>
				</div>
			</div>
			<div><?php include ("rodape.php");?></div>
		</div>
		<?php include ("scripts.php");?>
	</body>
	</html>

	<?
}
ob_end_flush();
?>
