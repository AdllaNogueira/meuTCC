<?php

namespace models;

class PedidosAdmin extends Model {

    protected $table = "pedidos";
    #nao esqueça da ID
    protected $fields = ["id","nome","tamanho","tipo","quantidade","turma_id","telefone"];
    
    public function findById($id){
        $sql = "SELECT pedidos.*, turmas.turma AS turma FROM {$this->table} "
                ." LEFT JOIN turmas ON turmas.id = pedidos.turma_id "
                ." WHERE pedidos.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function all(){
        $sql = "SELECT pedidos.*, turmas.turma AS turma FROM {$this->table} "
        ." LEFT JOIN turmas ON turmas.id = pedidos.turma_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }

    
}

