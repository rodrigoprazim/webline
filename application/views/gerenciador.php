<!DOCTYPE html>
<html lang="en">
    <head>
        <?=$this->load->view('includes/header');?>
        <?=link_tag('assets/css/bootstrap.css');?>
        <?=link_tag('assets/css/admin.css');?>
    </head>
    <body>
        <div class="container">
            <?php if($tela!='') $this->load->view('main/'.$tela);?>
        </div>
        <?=$this->load->view('includes/js');?>
    </body>
</html>