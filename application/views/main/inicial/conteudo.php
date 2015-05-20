<div id="titulo_conteudo" style="color: <?=$infoAd->c_menu;?>;border-bottom: 1px solid <?=$infoAd->c_menu;?>">
    <?=$menuD->row()->descricao;?>
</div>
<?php if($conteudo->num_rows()>0){echo $conteudo->row()->descricao;};?>