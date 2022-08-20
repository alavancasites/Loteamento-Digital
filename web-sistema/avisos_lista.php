<?
$criteria = new CDbCriteria();
$criteria->addCondition("ativo = '1'");
$criteria->addCondition("data_entrada <= '".date('Y-m-d H:i:s')."'");
$criteria->addCondition("data_saida >= '".date('Y-m-d H:i:s')."'");
$criteria->order = 'data desc';
$avisos = Aviso::model()->findAll($criteria);
if(count($avisos)){
foreach ($avisos as $aviso) {
?>
<div class="aviso">
  <input type="checkbox" id="alert-<?=$i?>"/>
  <label class="close" title="close" for="alert-<?=$i?>"> <i class="icon-close"></i> </label>
  <?php
  if($aviso->idempreendimento){
      ?>
      <a href="quadra/<?=$aviso->idempreendimento?>/<?=Util::removerAcentos($aviso->empreendimento->nome)?>">
      <?php
  }
  ?>
  <p class="mensagem"><?=$aviso->texto?></p>
  <?php
  if($aviso->idempreendimento){
      ?>
      </a>
      <?php
  }
  ?>
</div>
<?
  }
}
?>
