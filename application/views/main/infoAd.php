<div id="gerenciador-full">
    <fieldset>
        <?=$this->load->view('includes/admin/header');?>
        <a href="<?=base_url().'admin'?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
        <br/><br/>
        <fieldset>
            <legend style="font-size: 12px;"><span style="font-weight: bold">Informações Adicionais</span></legend>
            <fieldset>
                <table class="table_full_into table_subtitle">
                    <tr>
                        <td>Banner</td>
                    </tr>
                </table>
                <table class="table_full_into" border="0">
                    <tr class="titulo_tr table_padding_vt">
                        <td colspan="3">Banner Foreground</td>
                        <td colspan="3">Banner background</td>
                    </tr>
                    <tr class="table_padding_vt table_padding_hz">
                        <td colspan="6">* Requisitos: Formato - .png / Tamanho máximo vertical: 180px</td>
                    </tr>
                    <tr class="table_padding_vt table_padding_hz">
                        <?=form_open_multipart('admin/actionUploadBannerFg');?>
                            <td width="30%"><input type="file" name="userfile"/></td>
                            <td align="center" width="10%"><?php if(file_exists('./assets/img/banner-fg.png')){?><img src="<?=site_url('assets/img/banner-fg.png'); ?>" width="30px" height="30px"/><?php } ?></td>
                            <td width="10%" align="right" nowrap><a href="<?=base_url().'admin/deleteBannerFg';?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Excluir</a> <?=form_button(array('type'=>'submit','name'=>'submit','class'=>'btn btn-primary btn-sm'),'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir');?></td>
                        <?=form_close();?>
                        <?=form_open_multipart('admin/actionUploadBannerBg');?>
                            <td width="30%"><input type="file" name="userfile"/></td>
                            <td align="center" width="10%"><?php if(file_exists('./assets/img/banner-bg.png')){?><img src="<?=site_url('assets/img/banner-bg.png'); ?>" width="30px" height="30px"/><?php } ?></td>
                            <td width="10%" align="right" nowrap><a href="<?=base_url().'admin/deleteBannerBg';?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Excluir</a> <?=form_button(array('type'=>'submit','name'=>'submit','class'=>'btn btn-primary btn-sm'),'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir');?></td>
                        <?=form_close();?>
                    </tr>
                    <?php if(isset($error1_1) || isset($error1_2)){?>
                    <tr class="table_padding_vt table_padding_hz">
                        <td colspan="2"><?php if(isset($error1_1)){echo '<span style="color:red;font-weight:bold;font-size:11px;font-family:Verdana;">'.$error1_1.'</span>';}?></td>
                        <td colspan="2"><?php if(isset($error1_2)){echo '<span style="color:red;font-weight:bold;font-size:11px;font-family:Verdana;">'.$error1_2.'</span>';}?></td>
                        <?=form_close();?>
                    </tr>
                    <?php } ?>
                </table>
                <?=form_close();?>
                <?=form_open_multipart('admin/actionUploadBg');?>
                <?php if(isset($error2)){echo '<span style="color:red;font-weight:bold;font-size:11px;font-family:Verdana;">'.$error2.'</span>';} ?>
                <table class="table_full_into table_subtitle">
                    <tr>
                        <td>Background</td>
                    </tr>
                </table>
                <table class="table_full_into">
                    <tr class="table_padding_vt table_padding_hz">
                        <td>* Requisitos: Formato - .png</td>
                    </tr>
                    <tr class="table_padding_vt table_padding_hz">
                        <td><input type="file" name="userfile"/></td>
                        <td align="center"><?php if(file_exists('./assets/img/bg-inicial.png')){?><img src="<?=site_url('assets/img/bg-inicial.png'); ?>" width="50px" height="30px"/><?php } ?></td>
                        <td align="right" nowrap><a href="<?=base_url().'admin/deleteBg';?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Excluir</a> <?=form_button(array('type'=>'submit','name'=>'submit','class'=>'btn btn-primary btn-sm'),'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir');?></td>
                    </tr>
                </table>
                <?=form_close();?>
                <?=form_open_multipart('admin/actionUploadRodapeBg');?>
                <?php if(isset($error3)){echo '<span style="color:red;font-weight:bold;font-size:11px;font-family:Verdana;">'.$error3.'</span>';} ?>
                <table class="table_full_into table_subtitle">
                    <tr>
                        <td>Rodapé Background</td>
                    </tr>
                </table>
                <table class="table_full_into">
                    <tr class="table_padding_vt table_padding_hz">
                        <td>* Requisitos: Formato - .png</td>
                    </tr>
                    <tr class="table_padding_vt table_padding_hz">
                        <td><input type="file" name="userfile"/></td>
                        <td align="center"><?php if(file_exists('./assets/img/rodape-bg.png')){?><img src="<?=site_url('assets/img/rodape-bg.png'); ?>" width="50px" height="30px"/><?php } ?></td>
                        <td align="right" nowrap><a href="<?=base_url().'admin/deleteRodapeBg';?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Excluir</a> <?=form_button(array('type'=>'submit','name'=>'submit','class'=>'btn btn-primary btn-sm'),'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir');?></td>
                    </tr>
                </table>
                <?=form_close();?>
                <?=form_open('admin/actionInfoAd',array('id' => 'formInfoAd', 'name' => 'formInfoAd'));?>
                <table class="table_full_into table_subtitle">
                    <tr>
                        <td>Rodapé</td>
                    </tr>
                </table>
                <table class="table_full_into">
                    <tr class="table_padding_vt table_padding_hz">
                        <td><?=form_textarea(array('value'=>$cont->rodape,'name'=>'rodape', 'id' => 'elm2', 'class'=>'form-control input-sm', 'rows'=>'4', 'cols'=>'80'), set_value('rodape'));?></td>
                    </tr>
                </table>
                <table class="table_full_into table_subtitle">
                    <tr>
                        <td>Cores Menu</td>
                    </tr>
                </table>
                <table class="table_full_into">
                    <tr class="titulo_tr table_padding_vt">
                        <td>Cor principal</td>
                        <td>Cor secundária</td>
                    </tr>
                    <tr class="table_padding_vt table_padding_hz">
                        <td><?=form_input(array('type'=>'color', 'value'=>$cont->c_menu,'name'=>'c_color', 'class'=>'form-control input-sm'), set_value('c_color'));?></td>
                        <td><?=form_input(array('type'=>'color', 'value'=>$cont->c_hover_menu,'name'=>'hover_color', 'class'=>'form-control input-sm'), set_value('hover_color'));?></td>
                    </tr>
                </table>
                <table class="table_full_into table_subtitle">
                    <tr>
                        <td>Informações de contato</td>
                    </tr>
                </table>
                <table class="table_full_into">
                    <tr class="titulo_tr table_padding_vt">
                        <td>E-Mail</td>
                        <td>Número Contato</td>
                    </tr>
                    <tr class="table_padding_vt table_padding_hz">
                        <td><?=form_input(array('value'=>$cont->email,'name'=>'email', 'class'=>'form-control input-sm'), set_value('email'));?></td>
                        <td><?=form_input(array('value'=>$cont->telefone,'name'=>'contato', 'id' => 'contato_', 'class'=>'form-control input-sm'), set_value('contato'));?></td>
                    </tr>
                    <table class="table_full_into">
                        <tr>
                            <td align="right"><?=form_button(array('type'=>'reset','name'=>'submit','class'=>'btn btn-primary btn-sm'),'<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpar');?> <?=form_button(array('type'=>'submit','name'=>'submit','class'=>'btn btn-primary btn-sm'),'<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar');?></td>
                        </tr>
                    </table>
                </table>
                <?=form_close();?>
            </fieldset>
            <br/>
        </fieldset>
    </fieldset>
</div>