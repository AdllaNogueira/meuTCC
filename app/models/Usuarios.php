<?php

namespace models;

class Usuarios extends Model {

    protected $table = "usuarios";
    #nao esqueça da ID
    protected $fields = ["id","email","senha","tipo"];
    
    
    
}
