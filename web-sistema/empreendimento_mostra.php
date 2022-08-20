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
    <style type="text/css">
    <?php echo file_get_contents ('css/slick.css');
    ?>
</style>
</head>
<body>
    <div id="topo">
        <?php include ("topo.php");?>
    </div>
    <div id="wrapper" class="internas">
        <div class="caminho">
            <div class="container container-1200"> <a href="terrenos">Inicial</a> <i class="icon-right"></i>
                <?=$empreendimento->nome?>
            </div>
        </div>
        <div class="container container-1200">
            <?php include ("avisos_lista.php");?>
            <div class="mt20"><?php include ("filtros.php");?></div>
            <div class="imovel_conteudo mt60">
                <div class="colunas col-14">
                    <h2><?php echo $empreendimento->nome ?></h2>
                    <h3>
                        <?php
                        $criteria_imoveis = new CDbCriteria();
                        $criteria_imoveis->addCondition("status <> 'vendido'");
                        $criteria_imoveis->addCondition("ativo = '1'");
                    echo count($empreendimento->imovels($criteria_imoveis))
                    ?> LOTES</h3>
                </div>
                <div class="colunas col-3 mt10">
                    <div class="status disponivel"><strong><?php echo $empreendimento->count_disponiveis(); ?></strong> DISPON&Iacute;VEIS</div>
                </div>
                <div class="colunas col-3 mt10">
                    <div class="status reservado"><strong><?php echo $empreendimento->count_reservados(); ?></strong> RESERVADOS</div>
                </div>
                <div class="clear"></div>
                <div class="mt20 ">
                    <div id="mapa" style="height: 450px; width: 100%"></div>
                </div>
                <?php /* ?><div class="mt50">
                    <div class="colunas col-13">
                        <div class="slick imovel_galeria">
                            <?
                            if($empreendimento->foto!=''){
                                ?>
                                <img src="extranet/thumbnail/fill/800x700/Empreendimento/<?=$empreendimento->foto?>" />
                                <?
                            }
                            $fotos = $empreendimento->galeria->getGallery()->galleryPhotos;
                            if(count($fotos)){
                                foreach ($fotos as $foto){
                                    $img = $foto->id.'.jpg';
                                    $leg = Util::formataTexto($foto->description);
                                    ?>
                                    <img src="extranet/thumbnail/fill/800x700/gallery/<?=$img?>" />
                                    <?
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="colunas col-7">
                        <h4 class="mt10">DETALHES DO EMPREENDIMENTO</h4>
                        <div class="txt mt30">
                            <?=$empreendimento->descricao?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div><?php */ ?>
                <div class="empreendimento_lista">
                    <?
                    if(count($empreendimento->imovels($criteria_imoveis))){
                        foreach($empreendimento->imovels($criteria_imoveis) as $imovel){
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
                    }
                    ?>
                    <div class="clear"></div>
                </div>
                <?php /* ?><div class="mt80">
                    <div class="colunas col-10 andamento">
                        <h4>ANDAMENTO DA OBRA</h4>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt50">
                            <tbody>
                                <?
                                foreach ($empreendimento->andamento as $item=>$value){
                                    ?>
                                    <tr>
                                        <td width="50%"><?=$empreendimento->getAndamento($item)?></td>
                                        <td width="50%" align="right"><?=$value?>%</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><div class="mt10 mb40">
                                            <div style="width:<?=$value?>%"></div>
                                        </div></td>
                                    </tr>
                                    <?
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="clear"></div>
                </div><?php */ ?>
                <div class="mt80 imovel_formulario" id="contato">
                    <div class="colunas col-12 off-4 mt20">
                        <h4 class="text-center">TIRE SUAS D&Uacute;VIDAS</h4>
                        <?php
                        if($erro!=''){
                            echo $erro;
                        }else if($enviado){
                            ?>
                            <div class="aviso text-center">
                                <div class="sucesso">
                                    <h2>Contato enviado com sucesso!</h2>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <form id="form1" name="form1" method="post" action="quadra/<?=$empreendimento->idempreendimento?>/<?=Util::removerAcentos($empreendimento->nome)?>#contato">
                            <input name="Contato[nome]" type="text" id="" placeholder="Nome" class="u-full-width" value="<?=$contato->nome?>" />
                            <input name="Contato[email]" type="text" id="" placeholder="E-mail" class="u-full-width"  value="<?=$contato->email?>"/>
                            <input name="Contato[telefone]" type="text" id="" placeholder="Telefone" class="u-full-width telefone" value="<?=$contato->telefone?>" />
                            <input name="Contato[assunto]" type="text" id="" placeholder="Assunto" class="u-full-width"  value="<?=$contato->assunto?>"/>
                            <textarea rows="6" cols="40" name="Contato[mensagem]" id="" placeholder="Mensagem" class="u-full-width"><?=$contato->mensagem?></textarea>
                            <div class="text-center"><button name="enviar" type="submit" value="ENVIAR">ENVIAR</button></div>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div>
            <?php include ("rodape.php");?>
        </div>
    </div>
    <?php include ("scripts.php");?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkhJjMWNMgZeEgPRvAZbj-sYDR7KYBZuU&amp;sensor=false"></script>
    <script type="text/javascript" src="gzip/gzip.php?arquivo=../jquery/jquery.gmaps.js&cid=<?=$cid?>"></script>
    <script type="text/javascript" src="gzip/gzip.php?arquivo=../jquery/jquery.slick.min.js&cid=<?=$cid?>"></script>
    <script type="text/javascript">
    initialize(<?=$empreendimento->latitude?>, <?=$empreendimento->longitude?>);
    $('.imovel_galeria').slick({
        dots: true,
    });
</script>
</body>
</html>
