<!DOCTYPE html>
<html lang="en">
<head>
    <?=$this->load->view('includes/header');?>
    <?=$this->load->view('includes/css');?>
    <?=link_tag('assets/css/menu.css');?>
</head>
<body style="background:url(<?=site_url('assets/img/bg-inicial.png');?>) repeat;">
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 back-red col-height-full">
            <div class="row full-heigth">
                <div style="background:url(<?=site_url('assets/img/banner-bg.png');?>) repeat;background-size: 100% 190px;" class="col-xs-12 back-orange heigth-full-top">
                    <?php if(file_exists('./assets/img/banner-fg.png')){?><img src="<?=site_url('assets/img/banner-fg.png'); ?>" height="180px"/><?php } ?>
                </div>
                <div class="col-xs-2 heigth-full-body back-yellow">
                    <table id="tb_menu">
                        <tr>
                            <td class="td_menu"><?=$this->load->view('main/inicial/menu');?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-10 heigth-full-body back-green">
                    <table id="tb_corpo">
                        <tr>
                            <td class="td_menu" align="center"><?php if(isset($tela) && $tela!=''){echo $this->load->view('main/inicial/'.$tela);};?></td>
                        </tr>
                    </table>
                </div>
                <div style="background:url(<?=site_url('assets/img/rodape-bg.png');?>) repeat;" class="col-xs-12 heigth-full-footer">
                    <div class="col-xs-2">
                        <a href="<?=base_url().'login';?>"><img src="<?=site_url('assets/img/acessoRestrito.png'); ?>" width="60%" height="60%"/></a>
                    </div>
                    <div class="col-xs-10 align-div-footer">
                        <?=$infoAd->rodape;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('includes/js');?>
</body>
</html>