<div id="menu_cima">
    <ul>
        <?php if($menuList->num_rows()>0){?>
        <?php foreach($menuList->result() as $menu){?>
        <li class="menu_principal"><a style="color: <?=$infoAd->c_menu;?>; border-bottom: 1px solid <?=$infoAd->c_menu;?>" onMouseOut="this.style.color='<?=$infoAd->c_menu;?>'" onMouseOver="this.style.color='<?=$infoAd->c_hover_menu;?>'" href="<?=base_url().'home/index/'.$menu->id;?>"><?=$menu->descricao;?></a></li>
        <?php } } ?>
        <li class="menu_principal"><a style="color: <?=$infoAd->c_menu;?>; border-bottom: 1px solid <?=$infoAd->c_menu;?>" onMouseOut="this.style.color='<?=$infoAd->c_menu;?>'" onMouseOver="this.style.color='<?=$infoAd->c_hover_menu;?>'" href="<?=base_url().'home/contato';?>">Contato</a></li>
    </ul>
</div>