<div id="titulo_conteudo" style="color: <?=$infoAd->c_menu;?>;border-bottom: 1px solid <?=$infoAd->c_menu;?>">
    Contato
</div>
<table class="table_full_into table_subtitle">
    <tr>
        <td>Formulário de contato</td>
    </tr>
</table>
<?=form_open('home/enviarContato');?>
<table class="table_full_into back-c">
    <tr class="titulo_tr table_padding_vt">
        <td>Nome</td>
        <td>Telefone</td>
    </tr>
    <tr class="table_padding_vt table_padding_hz">
        <td><?=form_input(array('class'=>'form-control input-sm','required'=>'true'));?></td>
        <td><?=form_input(array('class'=>'form-control input-sm'));?></td>
    </tr>
    <tr class="titulo_tr table_padding_vt">
        <td>Website</td>
        <td>E-mail</td>
    </tr>
    <tr class="table_padding_vt table_padding_hz">
        <td><?=form_input(array('class'=>'form-control input-sm'));?></td>
        <td><?=form_input(array('class'=>'form-control input-sm','required'=>'true'));?></td>
    </tr>
    <tr class="titulo_tr table_padding_vt">
        <td colspan="2">Mensagem</td>
    </tr>
    <tr class="table_padding_vt table_padding_hz">
        <td colspan="2"><?=form_textarea(array('name'=>'mensagem','class'=>'form-control','rows'=>'4', 'cols'=>'80','required'=>'true'));?></td>
    </tr>
    <tr class="table_padding_vt table_padding_hz">
        <td align="left">Telefone de contato: <?=$infoAd->telefone;?></td>
        <td align="right"><?=form_button(array('type'=>'submit','name'=>'enviar','class'=>'btn btn-primary btn-sm'),'<span class="glyphicon glyphicon-send"></span> Enviar');?></td>
    </tr>
    <?=form_close();?>
</table>