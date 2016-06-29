<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Components;

use Adianti\Widget\Base\TElement;
use Exception;

/**
 * Description of aRow
 *
 * @author Anderson
 */
class aRow extends TElement{
    
    protected $colunas;

    public function __construct() {
        parent::__construct('div');
        $this->{'style'} ='margin-bottom: 15px;';
        $this->{'class'} ='row';
        $this->colunas = array();        
    }
    
    public function novaColuna($tamanhos){
        $coluna = new aCol($tamanhos);
        $this->colunas[] = $coluna;
        return $coluna;
    }
    
    public function addCol($objects, $sizes){
        if (!is_array($objects)){
            throw new Exception('Tipos de objetos inválidos');
        }
        
        if (!is_array($sizes)){
            throw new Exception('Tipos de tamanhos inválidos');
        }
        
        $col = $this->novaColuna($sizes);
        foreach ($objects as $item) {
            $col->add($item);
        }
    }

    public function show(){
        
        foreach ($this->colunas as $coluna) {
            parent::add($coluna);
            //$coluna->show();
        }
        parent::show();
    }
}
