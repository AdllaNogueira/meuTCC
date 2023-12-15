<?php include 'layout-top.php' ?>

<?php if (isset($msg) && $msg != "") : ?>
    <div class="alert alert-danger" role="alert">
    <?=$msg?>
    </div>
<?php endif; ?>

<form method='POST' action='<?=route('autenticacao/logar/')?>' style="margin: 0 auto; border: #9ADB91">

<label class='col-md-4'>
    E-mail
    <input type="text" class="form-control" name="email" value="" >
</label>

<label class='col-md-4'>
    Senha
    <input type="password" class="form-control" name="senha" value="" >
</label>

<button style="background-color: #9ADB91; border: #9ADB91" class='btn btn-primary col-12 col-md-3 mt-3'>Entrar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("usuarios")?>">Cadastrar</a>
</form>

<?php include 'layout-bottom.php' ?>