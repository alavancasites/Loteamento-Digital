<?
/*********************************************************
*Controle de versao: 2.2
*********************************************************/
//include("gzip/gzipHTML.php");
include_once('extranet/autoload.php');
$criteria_files = new CDbCriteria();
$criteria_files->addCondition("t.ativo = '1'");
$criteria_files->order = 'posicao asc';
$categorias = ArquivoCategoria::model()->findAll($criteria_files);
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
                <?
                if(count($categorias)){

                    foreach ($categorias as $categoria) {
                        $criteria_files = new CDbCriteria();
                        $criteria_files->addCondition("t.ativo = '1'");
                        $criteria_files->addCondition("t.idarquivo_categoria = '".$categoria->idarquivo_categoria."'");
                        $arquivos = Arquivo::model()->findAll($criteria_files);

                        if(count($arquivos)){

                            ?>
                            <h3><?=Util::formataTexto($categoria->nome)?></h3>
                            <?
                            foreach ($arquivos as $arquivo) {
                                ?>
                                <a href="extranet/uploads/Arquivo/<?=$arquivo->arquivo?>" target="_blank" class="bt_degrade coluna um-terco"><?=Util::formataTexto($arquivo->titulo)?></a>
                                <?
                            }
                            ?>
                            <div class="clear"></div>
                            <?
                        }
                    }
                }else{
                    echo 'Nenhum arquivo disponivel';
                }
                ?>
            </div>
        </div>
        <div><?php include ("rodape.php");?></div>
    </div>
    <?php include ("scripts.php");?>
</body>
</html>
