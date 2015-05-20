<!DOCTYPE html>
<html lang="en">
<head>
    <?=$this->load->view('includes/header');?>
    <?=link_tag('assets/css/login.css');?>
</head>
<body>
<div class="container">
    <div id="login-form">
        <h3>Login</h3>
        <fieldset>
            <?=form_open('login/actionLogin')?>
                <?=form_input(array('name'=>'usuario', 'placeholder'=>'Usuário','required'=>true), set_value('usuario'), 'autofocus')?>
                <?=form_password(array('name'=>'senha', 'placeholder'=>'Senha','required'=>true))?>
                <input type="submit" value="Login">
                <footer class="clearfix">
                    <p><a href="#">Esqueci a senha</a> | <a href="<?=base_url()?>">Voltar</a></p>
                </footer>
            <?=form_close();?>
        </fieldset>
    </div>
</div>
<?=$this->load->view('includes/js');?>
</body>
</html>