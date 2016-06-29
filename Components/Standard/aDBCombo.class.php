<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Components;

use Adianti\Core\AdiantiCoreTranslator;
use Adianti\Database\TCriteria;
use Adianti\Widget\Base\TElement;
use Adianti\Widget\Form\TForm;
use Adianti\Widget\Wrapper\TDBCombo;
use Exception;

/**
 * Description of aDBCombo
 *
 * @author adm01
 */
class aDBCombo extends TDBCombo {

    public function __construct($name, $database, $model, $key, $value, $ordercolumn = NULL, TCriteria $criteria = NULL) {
        parent::__construct($name, $database, $model, $key, $value, $ordercolumn, $criteria);

        $this->{'class'} = 'tcombo form-control';
        $this->setSize(-1);
    }

    public function show() {
        // define the tag properties
        $this->tag->name = $this->name;    // tag name

        if ($this->id) {
            $this->tag->id = $this->id;
        }

        if ($this->size == -1) {
            if (strstr($this->size, '%') !== FALSE) {
                $this->setProperty('style', "width:{$this->size};", false); //aggregate style info
            } else {
                $this->setProperty('style', "width:{$this->size}px;", false); //aggregate style info
            }
        }

        if ($this->defaultOption !== FALSE) {
            // creates an empty <option> tag
            $option = new TElement('option');

            $option->add($this->defaultOption);
            $option->value = '';   // tag value
            // add the option tag to the combo
            $this->tag->add($option);
        }

        if ($this->items) {
            // iterate the combobox items
            foreach ($this->items as $chave => $item) {
                if (substr($chave, 0, 3) == '>>>') {
                    $optgroup = new TElement('optgroup');
                    $optgroup->label = $item;
                    // add the option to the combo
                    $this->tag->add($optgroup);
                } else {
                    // creates an <option> tag
                    $option = new TElement('option');
                    $option->value = $chave;  // define the index
                    $option->add($item);      // add the item label
                    // verify if this option is selected
                    if (((string)$chave === $this->value) AND ( $this->value !== NULL)) {
                        // mark as selected
                        $option->selected = 1;
                    }

                    if (isset($optgroup)) {
                        $optgroup->add($option);
                    } else {
                        $this->tag->add($option);
                    }
                }
            }
        }

        // verify whether the widget is editable
        if (parent::getEditable()) {
            if (isset($this->changeAction)) {
                if (!TForm::getFormByName($this->formName) instanceof TForm) {
                    throw new Exception(AdiantiCoreTranslator::translate('You must pass the ^1 (^2) as a parameter to ^3', __CLASS__, $this->name, 'TForm::setFields()'));
                }

                $string_action = $this->changeAction->serialize(FALSE);
                $this->setProperty('changeaction', "__adianti_post_lookup('{$this->formName}', '{$string_action}', this)");
                $this->setProperty('onChange', $this->getProperty('changeaction'));
            }
        } else {
            // make the widget read-only
            //$this->tag-> disabled   = "1"; // the value don't post
            $this->tag->{'onclick'} = "return false;";
            $this->tag->{'style'} .= ';pointer-events:none';
            $this->tag->{'class'} = 'tfield_disabled'; // CSS
        }
        // shows the combobox
        $this->tag->show();
    }

}
