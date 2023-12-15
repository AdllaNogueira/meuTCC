<?php include 'layout-top.php' ?>



<form method='POST' action='<?=route('usuarios/salvar/'._v($data,"id"))?>'>

<label class='col-md-3'>
    Email
    <input type="text" class="form-control" name="email" value="<?=_v($data,"email")?>" >
</label>

<label class='col-md-3'>
    Senha
    <input type="password" class="form-control" name="senha" value="<?=_v($data,"senha")?>" >
</label>

<label class='col-md-3'>
    Usuario
    <select name="tipo" class="form-control">
        <?php
        foreach($tipos as $k=>$tipo){
            _v($data,"tipo") == $k ? $selected='selected' : $selected='';
            print "<option value='10' $selected>$tipo</option>";
        }
        ?>
    </select>
</label>


<button style="background-color: #9ADB91; border: #9ADB91" class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("autenticacao")?>">Login</a>

</form>

<?php include 'layout-bottom.php' ?>