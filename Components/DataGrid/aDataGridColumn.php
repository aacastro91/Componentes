<?php

use Adianti\Widget\Datagrid\TDataGridColumn;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class aDataGridColumn extends TDataGridColumn{
    
    private $order;
    
    function __construct($name, $label, $align, $width = NULL, $order = false) {
        parent::__construct($name, $label, $align, $width);
        $this->order = $order;
    }
    
    function getOrder() {
        return $this->order;
    }

    function setOrder($order) {
        $this->order = $order;
    }



}