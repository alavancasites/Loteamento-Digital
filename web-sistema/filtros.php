<?php
$criteria_empreendimento = new CDbCriteria();
$criteria_empreendimento->addCondition("t.ativo = '1'");
$criteria_empreendimento->addCondition("imovels.ativo = '1'");
$criteria_empreendimento->with = array('imovels');
$criteria_empreendimento->together = true;
$empreendimentos_filtro = Empreendimento::model()->findAll($criteria_empreendimento);
$lista_empreendimento = CHtml::listData($empreendimentos_filtro, 'idempreendimento', 'nome');

$criteria_cidade = new CDbCriteria();
$criteria_cidade->addCondition("empreendimentos.ativo = '1'");
$criteria_cidade->with = array('empreendimentos','empreendimentos.imovels');
$criteria_cidade->together = true;
$cidades_filtro = Cidade::model()->findAll($criteria_cidade);
$lista_cidade = CHtml::listData($cidades_filtro, 'idcidade', 'nome');

$criteria_bairro = new CDbCriteria();
$criteria_cidade->with = array('empreendimentos','empreendimentos.imovels');
$criteria_bairro->together = true;
$bairros_filtro = Bairro::model()->findAll($criteria_bairro);
$lista_bairro = CHtml::listData($bairros_filtro, 'idbairro', 'nome');

?>
<div class="filtros">
    <form id="form1" name="form1" method="get" action="terrenos">
        <select id="empreendimento" name="empreendimento" class="colunas col-3">
            <option value="">QUADRA</option>
            <?php
              if(count($lista_empreendimento)){
                foreach ($lista_empreendimento as $key => $value) {
            ?>
              <option value="<?=$key?>" <?=$_GET['empreendimento']==$key?'selected="selected"':''?>><?=$value?></option>
            <?php
                }
              }
            ?>
        </select>
        <input type="text" name="metragem_min" class="colunas col-4" placeholder="METRAGEM MÍNIMO" value="<?=$_GET['metragem_min']?>">
        <input type="text" name="metragem_max" class="colunas col-4" placeholder="METRAGEM MÁXIMO" value="<?=$_GET['metragem_max']?>">
        <input type="text" name="valor_min" class="colunas col-4 moeda" placeholder="VALOR MÍNIMO" value="<?=$_GET['valor_min']?>">
        <input type="text" name="valor_max" class="colunas col-4 moeda" placeholder="VALOR MÁXIMO" value="<?=$_GET['valor_max']?>">
        <button type="submit" class="colunas col-1 icon-buscar"></button>
        <div class="clear"></div>
    </form>
</div>
