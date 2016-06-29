<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Components;

use aContainer;
use Adianti\Widget\Base\TElement;
use Adianti\Widget\Form\TField;
use Exception;

/**
 * Criar colunas do bootstrap
 * Cada coluna pode conter os seguintes tipos:
 *  -xs : Extra small devices Phones (<768px)
 *  -sm : Small devices Tablets (≥768px)
 *  -md : Medium devices Desktops (≥992px)
 *  -lg : Large devices Desktops (≥1200px)
 * 
 * E o tamanho de 1 a 12
 *
 * @author Anderson
 */
class aCol extends TElement {

    private $tamanho;
    private $elementos;
    private $validTipo = array('xs', 'sm', 'md', 'lg');

    function __construct($tamanhos) {

        if (!is_array($tamanhos)) {
            throw new Exception('Parâmetros inválidos');
        }

        if (count($tamanhos) >= 1) {
            if (strlen($tamanhos[0]) == 2) {
                $this->checkSizes($tamanhos);
                $new_size = [];
                for ($i = 0; $i < count($tamanhos); $i = $i + 2) {
                    $new_size[] = 'col-' . $tamanhos[$i] . '-' . $tamanhos[$i + 1] . ' ';
                }
                $tamanhos = $new_size;
            } else {
                
            }
        } else {
            throw new Exception('Parâmetros inválidos');
        }

        parent::__construct('div');
        $this->tamanho = $tamanhos;
        $this->elementos = array();
    }
    
    private function checkSizes($tamanhos) {
        for ($i = 0; $i < count($tamanhos); $i++) {
            if ($i % 2 === 0) {
                $tipo = $tamanhos[$i];
                if (!in_array($tipo, $this->validTipo)) {
                    throw new Exception('Parâmetros inválidos');
                }
            } else {
                $tamanho = $tamanhos[$i];
                if ($tamanho < 1 || $tamanho > 12) {
                    throw new Exception('Tamanho "^1" não é permitido.', $tamanho);
                }
            }
        }
    }

    public function add($item) {
        $this->elementos[] = $item;
    }

    public function show() {

        $class = "";
        for ($i = 0; $i < count($this->tamanho); $i++) {
            $class = $class . $this->tamanho[$i] . ' ';
        }

        $this->{'class'} = $class;
        foreach ($this->elementos as $elemento) {
            parent::add($elemento);
        }
        parent::show();
    }
    
    public static function searchPack(TField $id, TField $desc){
        $pack = new aContainer;
        $div1 = new aContainer;
        $div1->style = 'float : left;width : ' . ($id->getSize() + 25) . 'px';
        $div1->add($id);
        $div2 = new aContainer;
        $div2->style = 'overflow: hidden';
        $div2->add($desc);
        $pack->add($div1);
        $pack->add($div2);
        return $pack;
    }

}
