<?
if (count($erros = $model->getErrors()) > 0) {
?>

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?
        foreach ($erros as $erro) {
            if (is_array($erro)) {
                foreach ($erro as $err) {
                    echo ($err) . "<br/>";
                }
            } else
                echo ($erro) . "<br/>";
        }
        ?>
    </div>
<?
}
