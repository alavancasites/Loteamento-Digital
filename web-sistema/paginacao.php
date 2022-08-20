<div class="text-center m-t-30">
        <ul class="pagination">
            <li>
                <a href="<?=$pagination->route?>?page=1<?=$pageRoute?>"  aria-label="Previous" >
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a <?=$pagina > 1 ? ' href="'.$pagination->route.'?page='.($pagina-1).($pageRoute).'" ' : 'style="display:none;"';?> >&lsaquo;</a></li>
            <?
            if($pagina > 2){
                ?>
                <li><a onclick="return false;">...</a></li>
                <?
            }
            for ($i=$pagina-1; $i<($pagina+2); $i++){
                if($i > 0 && $i <= $pagination->pageCount){
                    ?>
                    <li <? if ($i==$pagina) echo 'class="active"'; ?>><a href="<?=$pagination->route?>?page=<?=$i?><?=$pageRoute?>" ><?=$i?></a></li>
                    <?
                }
            }
            if($pagina < $pagination->pageCount-1){
                ?>
                <li><a onclick="return false;">...</a></li>
                <?
            }
            ?>
            <li><a <?=$pagina < $pagination->pageCount ? ' href="'.$pagination->route.'?page='.($pagina+1).($pageRoute).'" ' : 'style="display:none;"';?> >&rsaquo;</a></li>
            <li>
                <a href="<?=$pagination->route?>?page=<?=$pagination->pageCount;?><?=$pageRoute?>"  aria-label="Next" >
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
</div>
