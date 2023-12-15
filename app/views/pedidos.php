<?php include 'layout-top.php' ?>


<img src="img/fardamento.jpg">

<form method='POST' action='<?=route('pedidos/salvar/'._v($data,"id"))?>'>


<label class='col-md-6'>
    Nome
    <input type="text" class="form-control <?=hasError("nome","is-invalid")?>" name="nome" value="<?=old("nome", _v($data,"nome"))?>" >
    <div class='invalid-feedback'><?=getValidationError("nome") ?></div>
</label>

<label class='col-md-2'>
    Turma
    <select name="turma_id" class="form-control">
        <?php
        foreach($turmas as $turma){
            _v($data,"turma_id") == $turma['id'] ? $selected='selected' : $selected='';
            print "<option value='{$turma['id']}' $selected>{$turma['turma']}</option>";
        }
        ?>
    </select></label>

<label class='col-md-2'>
    Telefone
    <input type="text" class="form-control tel <?=hasError("telefone","is-invalid")?>" name="telefone" value="<?=old("telefone", _v($data,"telefone"))?>" >
    <div class='invalid-feedback'><?=getValidationError("telefone") ?></div>
</label>

<label class='col-md-2'>
    Quantidade
    <input type="text" class="form-control <?=hasError("quantidade","is-invalid")?>" name="quantidade" value="<?=old("quantidade", _v($data,"quantidade"))?>" >
    <div class='invalid-feedback'><?=getValidationError("quantidade") ?></div>
</label>

<label class='col-md-6'>
    Tipo
    <select name="tipo" class="form-control">
        <?php
        foreach($tipos as $k=>$tipo){
            _v($data,"tipo") == $k ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$tipo</option>";
        }
        ?>
    </select>
</label>

<label class='col-md-6'>
    Tamanho
    <select name="tamanho" class="form-control">
        <?php
        foreach($tamanhos as $t=>$tamanho){
            _v($data,"tamanho") == $t ? $selected='selected' : $selected='';
            print "<option value='$t' $selected>$tamanho</option>";
        }
        ?>
    </select>
</label>

<button style="background-color: #9ADB91; border: #9ADB91" class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("pedidos")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Nome</th>
        <th>Turma</th>
        <th>Tamanho</th>
        <th>Tipo</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td><?=$item['nome']?></td>
            <td><?=$item['turma']?></td>
            <td><?=$tamanhos[$item['tamanho']]?></td>
            <td><?=$tipos[$item['tipo']]?></td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>