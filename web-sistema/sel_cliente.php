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
        <div class="caminho"><div class="container container-1200"><a href="terrenos">Inicial</a><i class="icon-right"></i>Selecionar acesso</div></div>
        <div class="container container-1200">
            <?php include ("avisos_lista.php");?>
            <div class="mt40 imovel_formulario">
                <h2 class="text-center tit">Selecione o loteamento que deseja acessar</h2>
                <hr>
                <?php
                if($model_sessao->clientes){
                    foreach ($model_sessao->clientes as $cliente_rel) {
                        // echo 'idcorretor_cliente='.$cliente_rel->idcorretor_cliente.'<br>';
                        // echo 'idcorretor='.$cliente_rel->idcorretor.'<br>';
                        // echo 'idcliente='.$cliente_rel->idcliente.'<br>';

                        $cliente = $cliente_rel->cliente;

                        ?>
                        <div class="colunas col-8  mt20">
                            <img style="margin-top:10px;" class="img-polaroid" src="extranet/uploads/Cliente/<?=$cliente->logomarca;?>"  width="100%"/>
                            <h3><?=$cliente->titulo?></h3>
                            <a class="btn btn-default" href="cliente?cliente=<?=md5($cliente->idcliente)?>" title="Acessar"> Acessar </a>

                        </div>
                        <?php
                    }

                }else{
                    ?>
                    <p>
                        <em>
                            Você não é vinculado a nenhum cliente!
                        </em>
                    </p>
                    <?php
                }
                ?>
                <div class="colunas col-12  mt20">


                </div>
                <div class="clear mt20"></div>
            </div>
        </div>
        <div><?php include ("rodape.php");?></div>
    </div>
    <?php include ("scripts.php");?>
</body>
</html>
