<?php

use Adianti\Control\TPage;
use Adianti\Widget\Form\TLabel;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class aLabel extends TLabel{
    
    public function __construct($value) {
        parent::__construct($value);
        TPage::include_css('app/lib/Components/Standard/aLabel.css');        
        $this->{'class'} = 'control-label';        
        $this->style = 'width: 100%; text-align: left;';
    }
}