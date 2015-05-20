<div id="gerenciador-full">
    <fieldset>
        <?=$this->load->view('includes/admin/header');?>
        <fieldset>
            <legend style="font-size: 12px;">Conteúdo</legend>
            <a href="<?=base_url().'admin/menu'?>" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Menu</a>
            <a href="<?=base_url().'admin/conteudo'?>" class="btn btn-primary"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> Conteúdo</a>
            <a href="<?=base_url().'admin/infoAd'?>" class="btn btn-primary"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> Informações Adicionais</a>
        </fieldset>
    </fieldset>
</div>