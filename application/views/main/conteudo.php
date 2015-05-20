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
                        <td>CRUD Conteúdo</td>
                    </tr>
                </table>
                <table class="sep-table">
                    <tr>
                        <?php if($menuList->num_rows()>0){?>
                        <td>
                            <select class="form-control" name="menu" id="menu" onChange="showMenu(this.value)">
                                <option value="" selected>Selecione...</option>
                                <optgroup label="Menus">
                                    <?php foreach($menuList->result() as $menu){?>
                                        <option value="<?=$menu->id;?>"><?=$menu->descricao;?></option>
                                    <?php } ?>
                                </optgroup>
                            </select>
                        </td>
                        <?php } ?>
                        <td>
                            <a href="<?=base_url().'admin/menu';?>" title="Adicionar novo Menu" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span></a>
                        </td>
                    </tr>
                </table>
                <table class="table table-condensed">
                    <tr>
                        <td><div id="txtHint"><b>Nenhum menu selecionado.</b></div></td>
                    </tr>
                </table>
            </fieldset>
            <br/>
        </fieldset>
    </fieldset>
</div>
<script type="text/javascript">
    function showMenu(str)
    {
        if (str=="")
        {
            document.getElementById("txtHint").innerHTML="<b>Nenhum menu selecionado.</b>";
            return;
        }
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getConteudo/"+str,true);
        xmlhttp.send();
    }
</script>