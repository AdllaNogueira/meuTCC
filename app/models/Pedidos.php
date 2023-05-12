<?php

namespace models;

class Pedidos extends Model {

    protected $table = "pedidos";
    #nao esqueça da ID
    protected $fields = ["id","nome","tamanho","tipo","quantidade","turma","telefone"];
    
    
    
}

