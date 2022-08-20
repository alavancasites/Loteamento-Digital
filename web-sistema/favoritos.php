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
    <div id="wrapper" class="internas">
        <div class="caminho"><div class="container container-1200"><a href="terrenos">Inicial</a><i class="icon-right"></i>Favoritos</div></div>
        <div class="container container-1200">
            <?php include ("avisos_lista.php");?>
            <h2 class="tit mt50">FAVORITOS</h2>
            <div class="empreendimento_lista">
                <?
                if(count($empreendimentos)){
                    foreach ($empreendimentos as $empreendimento){
                        $criteria_imoveis = new CDbCriteria();
                        $criteria_imoveis->addCondition("t.ativo = '1'");
                        $criteria_imoveis->addCondition("t.status <> 'vendido'");
                        $criteria_imoveis->addCondition("t.idempreendimento = '".$empreendimento->idempreendimento."'");
                        $criteria_imoveis->addCondition("imovel_favorito.idcorretor = '".$model_sessao->idcorretor."'");
                        $criteria_imoveis->join  = 'INNER JOIN imovel_favorito ON imovel_favorito.idimovel = t.idimovel';
                        $criteria_imoveis->group = 't.idimovel';
                        $criteria_imoveis->select = 't.*';
                        $imoveis = Imovel::model()->findAll($criteria_imoveis);
                        ?>
                        <div class="accordionButton">

                            <div class="colunas col-13"><h2><?php echo $empreendimento->nome ?></h2><h3><?php echo count($imoveis) ?> LOTES</h3></div>
                            <div class="colunas col-3"><div class="status disponivel"><strong><?php echo $empreendimento->count_disponiveis(); ?></strong> DISPON&Iacute;VEIS</div></div>
                            <div class="colunas col-3"><div class="status reservado"><strong><?php echo $empreendimento->count_reservados(); ?></strong> RESERVADOS</div></div>
                            <div class="colunas col-1"><i></i></div>
                            <div class="clear"></div>
                        </div>
                        <div class="accordionContent">
                            <a href="quadra/<?php echo $empreendimento->idempreendimento ?>/<?php echo Util::removerAcentos($empreendimento->nome) ?>" class="bt_empreendimento"><i class="icon-empreendimento"></i> + VER QUADRA NO MAPA</a>
                            <?
                            foreach($imoveis as $imovel){
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
