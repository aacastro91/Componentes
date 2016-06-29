<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Components;

use Adianti\Widget\Base\TElement;

/**
 * Description of aDash
 *
 * @author adm01
 */
class aDash extends TElement{
    
    function __construct() {
        parent::__construct('div');
        $st = new \Adianti\Widget\Base\TStyle('ln_solid');
        $st->border_top = "1px solid #e5e5e5";
        $st->color = "#ffffff";
        $st->background_color = "#ffffff";
        $st->height = "1px";
        $st->margin = "20px 0";
        $st->show();
        
        $this->{'class'} = 'ln_solid';
    }

}
