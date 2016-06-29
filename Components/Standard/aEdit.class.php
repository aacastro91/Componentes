<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Components;

use Adianti\Control\TAction;
use Adianti\Core\AdiantiCoreTranslator;
use Adianti\Widget\Base\TScript;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TForm;
use Exception;
use Adianti\Control\TPage;

/**
 * Description of aEdit
 *
 * @author Anderson
 */
class aEdit extends TEntry {

    private $class;

    private $mask;
    private $completion;
    private $exitAction;
    private $numericMask;
    private $decimals;
    private $decimalsSeparator;
    private $thousandSeparator;
    private $replaceOnPost;
    
    /**
     * Cria um campo do tipo input do html
     * @param String $name Nome do input no html
     * @param String $type Tipo do input, pondendo ser
     *      qualquer tipo que é usado no html (ex: password)
     */
    function __construct($name, $type = 'text') {
        parent::__construct($name);
		TPage::include_css('app/lib/Components/Standard/aEdit.css');
        $this->size = 0;
        $this->tag->class = 'tfield form-control';
        $this->tag->type = $type;
        $this->class = '';
    }
    
    public function setClass($class){
        $this->class = $class;
    }

    /**
     * Define the field's mask
     * @param $mask A mask for input data
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
    }

    /**
     * Define the field's numeric mask (available just in web)
     * @param $decimals Sets the number of decimal points.
     * @param $decimalsSeparator Sets the separator for the decimal point.
     * @param $thousandSeparator Sets the thousands separator.
     */
    public function setNumericMask($decimals, $decimalsSeparator, $thousandSeparator, $replaceOnPost = FALSE)
    {
        $this->numericMask = TRUE;
        $this->decimals = $decimals;
        $this->decimalsSeparator = $decimalsSeparator;
        $this->thousandSeparator = $thousandSeparator;
        $this->replaceOnPost = $replaceOnPost;
    }

    /**
     * Define the field's value
     * @param $value A string containing the field's value
     */
    public function setValue($value)
    {
        if ($this->replaceOnPost)
        {
            $this->value = number_format($value, $this->decimals, $this->decimalsSeparator, $this->thousandSeparator);
        }
        else
        {
            $this->value = $value;
        }
    }

    /**
     * Return the post data
     */
    public function getPostData()
    {
        if (isset($_POST[$this->name]))
        {
            if ($this->replaceOnPost)
            {
                $value = $_POST[$this->name];
                $value = str_replace( $this->thousandSeparator, '', $value);
                $value = str_replace( $this->decimalsSeparator, '.', $value);
                return $value;
            }
            else
            {
                return $_POST[$this->name];
            }
        }
        else
        {
            return '';
        }
    }

    /**
     * Define max length
     * @param  $length Max length
     */
    public function setMaxLength($length)
    {
        if ($length > 0)
        {
            $this->tag-> maxlength = $length;
        }
    }

    /**
     * Define options for completion
     * @param $options array of options for completion
     */
    function setCompletion($options)
    {
        $this->completion = $options;
    }

    /**
     * Define the action to be executed when the user leaves the form field
     * @param $action TAction object
     */
    function setExitAction(TAction $action)
    {
        if ($action->isStatic())
        {
            $this->exitAction = $action;
        }
        else
        {
            $string_action = $action->toString();
            throw new Exception(AdiantiCoreTranslator::translate('Action (^1) must be static to be used in ^2', $string_action, __METHOD__));
        }
    }

    public function show() {
        // define the tag properties
        $this->tag->name = $this->name;    // TAG name
        $this->tag->value = $this->value;   // TAG value
        
        if ($this->class !== ""){
            $this->tag->class = $this->tag->class . ' ' . $this->class;
            $this->class = "";
        }
        
        if (!isset($this->tag->type)) {
            $this->tag->type = 'text';         // input type
        }

        if (is_numeric($this->size)) {
            if ($this->size <> 0) {
                $this->setProperty('style', "width:{$this->size}px", FALSE);
            }
        }
        else
        if (is_string($this->size)){
            if ($this->size !== "") {
                $this->setProperty('style', "width:{$this->size}", FALSE);
            }
        }


        if ($this->id) {
            $this->tag->{'id'} = $this->id;
        } else {
            $this->tag->{'id'} = $this->name;
        }

        // verify if the widget is non-editable
        if (parent::getEditable()) {
            if (isset($this->exitAction)) {
                if (!TForm::getFormByName($this->formName) instanceof TForm) {
                    throw new Exception(AdiantiCoreTranslator::translate('You must pass the ^1 (^2) as a parameter to ^3', __CLASS__, $this->name, 'TForm::setFields()'));
                }
                $string_action = $this->exitAction->serialize(FALSE);

                $this->setProperty('exitaction', "serialform=(\$('#{$this->formName}').serialize());
                                                 __adianti_ajax_lookup('$string_action&'+serialform, document.{$this->formName}.{$this->name})", FALSE);
                $this->setProperty('onBlur', $this->getProperty('exitaction'), FALSE);
            }

            if ($this->mask) {
                $this->tag->onKeyPress = "return tentry_mask(this,event,'{$this->mask}')";
            }
        } else {
            $this->tag->readonly = '1';
            $this->tag->{'class'} = "form-control tfield_disabled";
            $this->tag->onmouseover = "style.cursor='default'";
            //$this->tag->{'disabled'} = 'disabled';
        }

        // shows the tag
        $this->tag->show();

        if (isset($this->completion)) {
            $options = json_encode($this->completion);
            TScript::create(" tentry_autocomplete( '{$this->name}', $options); ");
        }
        if ($this->numericMask) {
            TScript::create("tentry_numeric_mask( '{$this->name}', {$this->decimals}, '{$this->decimalsSeparator}', '{$this->thousandSeparator}'); ");
        }
    }

}
