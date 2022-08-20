<?
/*********************************************************
*Controle de versao: 2.2
*********************************************************/
//include("gzip/gzipHTML.php");
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
    <div id="wrapper">
        <div class="container container-1200">
            <?php //include ("avisos_lista.php");?>
            <?php include ("filtros.php");?>
            <div class="empreendimento_lista">
                <?
                if(count($empreendimentos)){
                    foreach ($empreendimentos as $empreendimento){
                        $criteria_imoveis = new CDbCriteria();
                        $criteria_imoveis->addCondition("ativo = '1'");
                        $criteria_imoveis->addCondition("status <> 'vendido'");
                        $criteria_imoveis->addCondition("destaque = '1'");
                        $criteria_imoveis->addCondition("idempreendimento = '".$empreendimento->idempreendimento."'");
                        $criteria_imoveis->group = 'idimovel';
                        $criteria_imoveis->select = '*';
                        ?>
                        <div class="accordionButton">

                            <div class="colunas col-13"><h2><?php echo $empreendimento->nome ?></h2><h3><?php echo count($empreendimento->imovels($criteria_imoveis)) ?> LOTES</h3></div>
                            <div class="colunas col-3"><div class="status disponivel"><strong><?php echo $empreendimento->count_disponiveis(); ?></strong> DISPON&Iacute;VEIS</div></div>
                            <div class="colunas col-3"><div class="status reservado"><strong><?php echo $empreendimento->count_reservados(); ?></strong> RESERVADOS</div></div>
                            <div class="colunas col-1"><i></i></div>
                            <div class="clear"></div>
                        </div>
                        <div class="accordionContent">
                            <a href="quadra/<?php echo $empreendimento->idempreendimento ?>/<?php echo Util::removerAcentos($empreendimento->nome) ?>" class="bt_empreendimento"><i class="icon-mapa"></i> + VER QUADRA NO MAPA</a>
                            <?
                            $imoveis = Imovel::model()->findAll($criteria_imoveis);
                            foreach($imoveis as $i=>$imovel){
                                $link_fav = 'add-favorito?id='.$imovel->idimovel;
                                if($imovel->favorito($model_sessao->getPrimaryKey())){
                                    $link_fav = 'remove-favorito?id='.$imovel->idimovel;
                                }
                                 ?>
                                <div class="colunas col-5 imoveis_lista">
                                    <? include('imovel_mostra.php');?>
                                </div>
                                <?
                            }
                            ?>
                            <div class="clear"></div>
                        </div>
                        <?
                    }
                }

                $pagination = $data_provider->pagination;
				$pagina = $pagination->currentPage+1;
				if($pagination->pageCount > 1){
					include('paginacao.php');
				}
                ?>
            </div>
        </div>
        <div><?php include ("rodape.php");?></div>
    </div>
    <?php include ("scripts.php");?>
</body>
</html>
