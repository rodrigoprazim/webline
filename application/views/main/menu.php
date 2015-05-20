<div id="gerenciador-full">
    <fieldset>
        <?=$this->load->view('includes/admin/header');?>
        <a href="<?=base_url().'admin'?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
        <br/><br/>
        <fieldset>
            <legend style="font-size: 12px;"><span style="font-weight: bold">Menu</span></legend>
            <fieldset>
                <table class="table_full_into table_subtitle">
                    <tr>
                        <td>CRUD Menu</td>
                    </tr>
                </table>
                <?=form_open('admin/actionMenu',array('id'=>'formGeral','name'=>'formGeral'));?>
                <table class="sep-table">
                    <tr>
                        <td colspan="10"><?php if(validation_errors()!=''){?><div class="alert alert-danger" role="alert"><?=validation_errors();?></div><?php }?></td>
                    </tr>
                    <tr>
                        <?php $valueIdEdt = $info==NULL ? '' : $info->id;
                        $readonly1 = $this->uri->segment(3)!='excluir'? : 'readonly' ;$readonly = $this->uri->segment(3)!='excluir'? : FALSE ;?>
                        <td><?=form_input(array('name'=>'id','value'=>$valueIdEdt,'placeholder'=>'ID','class'=>'form-control input-sm width-pers-id','maxlength'=>'10',$readonly1=>$readonly),set_value('id'));?></td>

                        <?php $valueDescEdt = $info==NULL ? '' : $info->descricao;
                        $readonly1 = $this->uri->segment(3)!='excluir'? : 'readonly' ;$readonly = $this->uri->segment(3)!='excluir'? : FALSE ;?>
                        <td><?=form_input(array('name'=>'menu','value'=>$valueDescEdt,'placeholder'=>'Menu','class'=>'form-control input-sm width-pers','required'=>'true','maxlength'=>'20',$readonly1=>$readonly),set_value('menu'));?></td>

                        <?php if($this->uri->segment(3)!=''){ ?>
                            <td><a href="<?=base_url().'admin/menu'?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a></td>
                            <?php if($this->uri->segment(3)=='excluir'){?>
                                <td><a href="<?=base_url().'admin/actionExcluirMenu/'.$this->uri->segment(4);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-remove"></span> Excluir</a></td>
                            <?php }else{?>
                                <td><a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="formSubmit('formGeral','<?=base_url().'admin/actionEditarMenu/'.$this->uri->segment(4);?>')"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
                            <?php } ?>
                        <?php }else{?>
                            <td><?=form_button(array('type'=>'submit','name'=>'submit','class'=>'btn btn-primary btn-sm'),'<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar');?></td>
                        <?php } ?>
                    </tr>
                </table>
                <?=form_close();?>
            </fieldset>
            <br/>
            <fieldset>
                <table class="table_full_into table_subtitle">
                    <tr>
                        <td>Listagem de Menu</td>
                    </tr>
                </table>
                <table class="table table-condensed table-hover" border="0">
                    <tr>
                        <th>Fila</th>
                        <th>Descrição</th>
                        <th>Data/Hora</th>
                        <th>Ação</th>
                    </tr>
                <?php foreach($menuList->result() as $menu){?>
                    <?php $linkConteudo = $this->admin_model->contarConteudo($menu->id)->num_rows()>0 ? 'editarConteudo' : 'adicionarConteudo' ;
                    $conteudo_id = $this->admin_model->contarConteudo($menu->id)->num_rows()>0 ? $this->admin_model->contarConteudo($menu->id)->row()->id : $menu->id ;
                    ?>
                    <tr>
                        <td width="1%" nowrap><?=$menu->id;?></td>
                        <td width="50%" nowrap><?=$menu->descricao;?></td>
                        <td width="5%" nowrap><?=date("d/m/Y - H:i", strtotime($menu->datahora));?></td>
                        <td width="1%" nowrap><a title="Adicionar Conteúdo" href="<?=base_url().'admin/'.$linkConteudo.'/'.$conteudo_id;?>"><span class="glyphicon glyphicon-plus-sign"></span></a> <a title="Editar" href="<?=base_url().'admin/menu/editar/'.$menu->id;?>"><span class="glyphicon glyphicon-pencil"></span></a> <a href="<?=base_url().'admin/menu/excluir/'.$menu->id;?>" title="Remover"><span class="glyphicon glyphicon-remove-circle"></span></a></td>
                    </tr>
                <?php } ?>
                </table>
            </fieldset>
        </fieldset>
    </fieldset>
</div>