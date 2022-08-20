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
            <?php include ("avisos_lista.php");?>
            <?php include ("filtros.php");?>
            <div class="mapa mt20">
              <div id="mapa" style="width:100%; height:350px;"></div>
            </div>
            <div class="empreendimento_lista">
                <?
                if(count($empreendimentos)){
                    foreach ($empreendimentos as $empreendimento){
                        $criteria_imoveis = new CDbCriteria();
                        if(is_numeric($_GET['metragem_min'])){
                            $val = Util::formataMoedaFloat($_GET['metragem_min']);
                            $criteria_imoveis->addCondition("metragem >= '".$val."'");
                        }
                        if(is_numeric($_GET['metragem_max'])){
                            $val = Util::formataMoedaFloat($_GET['metragem_max']);
                            $criteria_imoveis->addCondition("metragem <= '".$val."'");
                        }
                        if(is_numeric($_GET['valor_min'])){
                            $val = Util::formataMoedaFloat($_GET['valor_min']);
                            $criteria_imoveis->addCondition("valor >= '".$val."'");
                        }
                        if(is_numeric($_GET['valor_max'])){
                            $val = Util::formataMoedaFloat($_GET['valor_max']);
                            $criteria_imoveis->addCondition("valor <= '".$val."'");
                        }
                        $criteria_imoveis->addCondition("status <> 'vendido'");
                        $criteria_imoveis->addCondition("ativo = '1'");
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
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzJYUy6qqswKMEwQqQ6ut8KdBYjujreVo&sensor=false&libraries=places"></script>
    <script type="text/javascript">

    function loadMap() {
        var map = new google.maps.Map(document.getElementById('mapa'), {
            center: new google.maps.LatLng(-27.7912465,-50.2756226),
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infoWindow = new google.maps.InfoWindow({map:map});

        downloadUrl('quadras.php', function(data) {
            console.log(data)
            var markers = JSON.parse(data.response);
            // console.log(json)
            // var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var name = markerElem.name;
                var description = markerElem.description;
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.lat),
                    parseFloat(markerElem.lng)
                );

                var contentString = '<div id="content">'+
                '<h1 id="firstHeading" class="firstHeading">'+name+'</h1>'+

                '<div id="siteNotice">'+
                '</div>'+
                '<div id="bodyContent" style="width:250px;">'+
                description+
                '</div>'+
                '</div>';


                var icon = {icon:'marcador.svg'};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                });

                marker.addListener('click', function() {
                    infoWindow.setContent(contentString);
                    infoWindow.open(map, marker);
                });
            });

        });



    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}

    $(document).ready( function(){

        loadMap();


    });

    </script>
</body>
</html>
