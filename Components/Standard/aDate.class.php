<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Components;

use Adianti\Widget\Base\TScript;
use Adianti\Widget\Form\AdiantiWidgetInterface;
use const LANG;

/**
 * Description of aDate
 *
 * @author adm01
 */
class aDate extends aEdit implements AdiantiWidgetInterface {

    private $mask;
    protected $id;

    /**
     * Class Constructor
     * @param $name Name of the widget
     */
    public function __construct($name) {
        parent::__construct($name);
        \Adianti\Control\TPage::include_js('app/lib/Components/Standard/adate.js');
        $this->id = 'adate_' . mt_rand(1000000000, 1999999999);
        $this->mask = 'yyyy-mm-dd';

        $newmask = $this->mask;
        $newmask = str_replace('dd', '99', $newmask);
        $newmask = str_replace('mm', '99', $newmask);
        $newmask = str_replace('yyyy', '9999', $newmask);
        parent::setMask($newmask);
    }

    /**
     * Define the field's mask
     * @param $mask  Mask for the field (dd-mm-yyyy)
     */
    public function setMask($mask) {
        $this->mask = $mask;
        $newmask = $this->mask;
        $newmask = str_replace('dd', '99', $newmask);
        $newmask = str_replace('mm', '99', $newmask);
        $newmask = str_replace('yyyy', '9999', $newmask);
        parent::setMask($newmask);
    }

    /**
     * Convert a date to format yyyy-mm-dd
     * @param $date = date in format dd/mm/yyyy
     */
    public static function date2us($date) {
        if ($date) {
            // get the date parts
            $day = substr($date, 0, 2);
            $mon = substr($date, 3, 2);
            $year = substr($date, 6, 4);
            return "{$year}-{$mon}-{$day}";
        }
    }

    /**
     * Convert a date to format dd/mm/yyyy
     * @param $date = date in format yyyy-mm-dd
     */
    public static function date2br($date) {
        if ($date) {
            // get the date parts
            $year = substr($date, 0, 4);
            $mon = substr($date, 5, 2);
            $day = substr($date, 8, 2);
            return "{$day}/{$mon}/{$year}";
        }
    }

    /**
     * Enable the field
     * @param $form_name Form name
     * @param $field Field name
     */
    public static function enableField($form_name, $field) {
        TScript::create(" adate_enable_field('{$form_name}', '{$field}'); ");
    }

    /**
     * Disable the field
     * @param $form_name Form name
     * @param $field Field name
     */
    public static function disableField($form_name, $field) {
        TScript::create(" adate_disable_field('{$form_name}', '{$field}'); ");
    }

    /**
     * Shows the widget at the screen
     */
    public function show() {
        $js_mask = str_replace('yyyy', 'yy', $this->mask);
        $language = strtolower(LANG);
        if (parent::getEditable()) {
            TScript::create("adate_start( '#{$this->id}', '{$this->mask}', '{$language}');");
        }

        parent::show();
    }

}
