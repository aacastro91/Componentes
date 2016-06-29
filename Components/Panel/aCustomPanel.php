<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Components;

use Adianti\Widget\Base\TElement;
use Adianti\Control\TPage;

/**
 * Description of aPanel
 *
 * @author Anderson
 */
class aCustomPanel extends TElement {

    private $elementos;
    private $Titulo;
    private $SubTitulo;
    private $toolbox;

    public function __construct() {
        parent::__construct('div');
        TPage::include_js('app/lib/Components/Panel/aCustomPanel.js');
        TPage::include_css('app/lib/Components/Panel/aCustomPanel.css');
        $this->toolbox = true;
        $this->elementos = array();
    }

    public function setToolBox($value) {
        $this->toolbox = $value;
    }

    public function addElemento($elemento) {
        $this->elementos[] = $elemento;
    }

    public function setTituloESubtitulo($titulo, $subtitulo = NULL) {
        $this->Titulo = $titulo;
        $this->SubTitulo = $subtitulo;
    }

    public function show() {
        $this->{'class'} = 'x_panel';

        $title = new TElement('div');
        $title->{'class'} = 'x_title';
        $title->add("<h2>{$this->Titulo} <small>$this->SubTitulo</small></h2>");
        if ($this->toolbox) {
            $title->add('<ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>');
        }
        $title->add('<div class="clearfix"></div>');

        $content = new TElement('div');
        $content->{'class'} = 'x_content';
        //$content->add('<br />');

        foreach ($this->elementos as $elemento) {
            $content->add($elemento);
            //$coluna->show();
        }
        parent::add($title);
        parent::add($content);
        parent::show();
    }

}
