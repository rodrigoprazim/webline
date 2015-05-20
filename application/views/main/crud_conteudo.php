<div id="gerenciador-full">
    <fieldset>
        <?=$this->load->view('includes/admin/header');?>
        <a href="<?=base_url().'admin/conteudo'?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
        <br/><br/>
        <fieldset>
            <legend style="font-size: 12px;"><span style="font-weight: bold">Menu</span></legend>
            <fieldset>
                <table class="table_full_into table_subtitle">
                    <tr>
                        <td>CRUD Conteúdo</td>
                    </tr>
                </table>
                <?=form_open('admin',array('id'=>'formGeral','name'=>'formGeral'));?>
                <table class="sep-table">
                    <tr>
                        <td colspan="10"><?php if(validation_errors()!=''){?><div class="alert alert-danger" role="alert"><?=validation_errors();?></div><?php }?></td>
                    </tr>
                    <tr>
                        <td>
                            <span style="font-weight:bold;font-size: 20px;"><?=$menuList->row()->descricao;?></span>
                        </td>
                        <td>
                            <a href="<?=base_url().'admin/menu';?>" title="Adicionar novo Menu" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span></a>
                        </td>
                    </tr>
                </table>
                <table class="table table-condensed">
                    <tr>
                        <td>
                            <div class="form-group">
                                <?php $value = $cont != NULL ? $cont->row()->descricao : NULL ;?>
                                <?=form_textarea(array('value'=>$value,'name'=>'conteudo', 'id' => 'elm1', 'class'=>'form-control input-sm', 'rows'=>'4', 'cols'=>'80'), set_value('conteudo'));?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <?php $link = $cont != NULL ? 'actionEditarConteudo' : 'actionAdicionarConteudo';?>
                        <td colspan="10" align="right">
                            <a href="<?=base_url().'admin';?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
                            <a href="javascript:void(0);" class="btn btn-default btn-sm" onClick="formSubmit('formGeral','<?=base_url().'admin/'.$link.'/'.$this->uri->segment(3);?>')"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</a>
                        </td>
                    </tr>
                </table>
                <?=form_close();?>
            </fieldset>
            <br/>
        </fieldset>
    </fieldset>
</div>