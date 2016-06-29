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
        $this->{'class'} = 'ln_solid';
    }

}
