<table class="table table-condensed">
    <?php if($conteudo->num_rows()>0){?>
        <tr>
            <th>Descrição</th>
            <th>Data/Hora</th>
            <th>Ações</th>
        </tr>
        <?php foreach($conteudo->result() as $conteudo){?>
        <tr>
            <td><?=$conteudo->descricao?></td>
            <td width="5%" nowrap><?=date("d/m/Y - H:i", strtotime($conteudo->datahora));?></td>
            <td width="1%" nowrap><a title="Editar" href="<?=base_url().'admin/editarConteudo/'.$conteudo->id;?>"><span class="glyphicon glyphicon-pencil"></span></a> <a title="Excluir" href="<?=base_url().'admin/actionExcluirConteudo/'.$conteudo->id;?>"><span class="glyphicon glyphicon-remove-circle"></span></a></td>
        </tr>
        <?php } ?>
    <?php }else{ ?>
        <tr>
            <td align="center"><a href="<?=base_url().'admin/adicionarConteudo/'.$menuId;?>" title="Adicionar conteúdo" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Adicionar conteúdo</a></td>
        </tr>
    <?php } ?>
</table>