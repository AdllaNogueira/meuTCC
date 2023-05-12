<?php
use models\Pedidos;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class PedidosController {

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/pedidos/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Pedidos();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		$send['tipos'] = [0=>"Escolha uma opção", 1=>"Adulto", 2=>"Babylook"];

		
		$send['tamanhos'] = [0=>"Escolha uma opção", 1=>"PP", 2=>"P", 3=>"M", 4=>"G", 5=>"GG", 6=>"XGG"];

		#chama a view
		render("pedidos", $send);
	}

	
	function salvar($id=null){

		$model = new Pedidos();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("pedidos/index/$id");
	}

	function deletar(int $id){
		
		$model = new Pedidos();
		$model->delete($id);

		redirect("pedidos/index/");
	}


}
