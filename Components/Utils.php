<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author Anderson
 */
class Utils {
    
    public static function getid(){
        return md5(uniqid(rand(), true));
    }
    
    /**
     * Colocar mascara em um valor
     * @param type $value
     * @param type $decimal
     * @return string
     */
    public static function formatar_valor($value, $decimal = 2){
        if (is_numeric($value)){
            return number_format($value, $decimal, ',', '.');
        }
        else{
            return number_format( self::to_number($value) , $decimal, ',', '.');
        }
         
    }
    
    /**
     * Tenta converter um número para double
     * @param type $value
     * @return real
     */
    public static function to_number($value, $decimal = 2){
         if (is_numeric($value)){
             return round($value,$decimal);
         }
         
         $value = str_replace('.', '' , $value);
         $value = str_replace(',', '.', $value);
         
         if (is_numeric($value)){
             return round($value,$decimal);
         }
         else{
             return round(0,$decimal);
         }
    }
    
}
