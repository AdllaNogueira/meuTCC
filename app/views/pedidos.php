<?php include 'layout-top.php' ?>



<form method='POST' action='<?=route('pedidos/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Nome
    <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-2'>
    Turma
    <input type="text" class="form-control" name="turma" value="<?=_v($data,"turma")?>" >
</label>

<label class='col-md-2'>
    Telefone
    <input type="text" class="form-control tel" name="telefone" value="<?=_v($data,"telefone")?>" >
</label>

<label class='col-md-2'>
    Quantidade
    <input type="text" class="form-control" name="quantidade" value="<?=_v($data,"quantidade")?>" >
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

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("pedidos")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Turma</th>
        <th>Tamanho</th>
        <th>Tipo</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("pedidos/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['turma']?></td>
            <td><?=$tamanhos[$item['tamanho']]?></td>
            <td><?=$tipos[$item['tipo']]?></td>
            <td>
                <a href='<?=route("pedidos/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>