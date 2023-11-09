<?php
use models\Pedidos;
use models\Turmas;
/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class PedidosController {


	#construtor, é iniciado sempre que a classe é chamada
	function __construct() {
    #se nao existir é porque nao está logado
    if (!isset($_SESSION["user"])){
        redirect("autenticacao");
        die();
    	}
	}

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

		$turmasModel = new Turmas();
        $send['turmas'] = $turmasModel->all();

		#chama a view
		render("pedidos", $send);
	}

	
	function salvar($id=null){

		$model = new Pedidos();

		#validacao
		$requeridos = ["nome"=>"Nome é obrigatório","telefone"=>"Telefone é obrigatório","quantidade"=>"Quantidade é obrigatório"];
		foreach($requeridos as $field=>$msg){
			#verifica se o campo está vazio
			if (!validateRequired($_POST,$field)){
				setValidationError($field, $msg);
			}
		}
	
		#se alguma validação tiver falhado
		if (count($_SESSION['errors'])){
			setFlash("error","Falha ao salvar usuário.");
			#volta para a página que estava
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			die();
		}
			    
			
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		setFlash("success","Salvo com sucesso.");

		redirect("pedidos/index/$id");
	}

	function deletar(int $id){
		
		$model = new Pedidos();
		$model->delete($id);

		redirect("pedidos/index/");
	}

}
