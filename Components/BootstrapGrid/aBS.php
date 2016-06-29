<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Components;

use Adianti\Widget\Base\TElement;

/**
 * Boostrap Sizes.
 * 
 * Classe que contem os tamanhos das colunas do bootstrap.
 * Todos os valores são variaveis publicas e estáticas.
 *
 * @author Anderson
 */
class aBS {
    
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_01  = 'col-xs-1';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_02  = 'col-xs-2';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_03  = 'col-xs-3';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_04  = 'col-xs-4';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_05  = 'col-xs-5';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_06  = 'col-xs-6';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_07  = 'col-xs-7';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_08  = 'col-xs-8';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_09  = 'col-xs-9';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_10 = 'col-xs-10';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_11 = 'col-xs-11';
    /**
     * XS - Extra small devices Phones (<768px)
     * @var type string
     */
    static $XS_12 = 'col-xs-12';
    
    
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_01  = 'col-sm-1';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_02  = 'col-sm-2';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_03  = 'col-sm-3';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_04  = 'col-sm-4';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_05  = 'col-sm-5';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_06  = 'col-sm-6';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_07  = 'col-sm-7';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_08  = 'col-sm-8';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_09  = 'col-sm-9';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_10 = 'col-sm-10';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_11 = 'col-sm-11';
    /**
     * SM - Small devices Tablets (≥768px)
     * @var type string
     */
    static $SM_12 = 'col-sm-12';
    
    
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_01  = 'col-md-1';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_02  = 'col-md-2';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_03  = 'col-md-3';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_04  = 'col-md-4';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_05  = 'col-md-5';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_06  = 'col-md-6';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_07  = 'col-md-7';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_08  = 'col-md-8';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */    
    static $MD_09  = 'col-md-9';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_10 = 'col-md-10';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_11 = 'col-md-11';
    /**
     * MD - Medium devices Desktops (≥992px)
     * @var type string
     */
    static $MD_12 = 'col-md-12';
    
    
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_01  = 'col-lg-1';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_02  = 'col-lg-2';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_03  = 'col-lg-3';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_04  = 'col-lg-4';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_05  = 'col-lg-5';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_06  = 'col-lg-6';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_07  = 'col-lg-7';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_08  = 'col-lg-8';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_09  = 'col-lg-9';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_10 = 'col-lg-10';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_11 = 'col-lg-11';
    /**
     * LG - Large devices Desktops (≥1200px)
     * @var type string
     */
    static $LG_12 = 'col-lg-12';
    
    
    
    //offsets
    static $XS_OFFSET_01 = 'col-xs-offset-1';
    static $XS_OFFSET_02 = 'col-xs-offset-2';
    static $XS_OFFSET_03 = 'col-xs-offset-3';
    static $XS_OFFSET_04 = 'col-xs-offset-4';
    static $XS_OFFSET_05 = 'col-xs-offset-5';
    static $XS_OFFSET_06 = 'col-xs-offset-6';
    static $XS_OFFSET_07 = 'col-xs-offset-7';
    static $XS_OFFSET_08 = 'col-xs-offset-8';
    static $XS_OFFSET_09 = 'col-xs-offset-9';
    static $XS_OFFSET_10 = 'col-xs-offset-10';
    static $XS_OFFSET_11 = 'col-xs-offset-11';
    static $XS_OFFSET_12 = 'col-xs-offset-12';
    static $SM_OFFSET_01 = 'col-sm-offset-1';
    static $SM_OFFSET_02 = 'col-sm-offset-2';
    static $SM_OFFSET_03 = 'col-sm-offset-3';
    static $SM_OFFSET_04 = 'col-sm-offset-4';
    static $SM_OFFSET_05 = 'col-sm-offset-5';
    static $SM_OFFSET_06 = 'col-sm-offset-6';
    static $SM_OFFSET_07 = 'col-sm-offset-7';
    static $SM_OFFSET_08 = 'col-sm-offset-8';
    static $SM_OFFSET_09 = 'col-sm-offset-9';
    static $SM_OFFSET_10 = 'col-sm-offset-10';
    static $SM_OFFSET_11 = 'col-sm-offset-11';
    static $SM_OFFSET_12 = 'col-sm-offset-12';
    static $MD_OFFSET_01 = 'col-md-offset-1';
    static $MD_OFFSET_02 = 'col-md-offset-2';
    static $MD_OFFSET_03 = 'col-md-offset-3';
    static $MD_OFFSET_04 = 'col-md-offset-4';
    static $MD_OFFSET_05 = 'col-md-offset-5';
    static $MD_OFFSET_06 = 'col-md-offset-6';
    static $MD_OFFSET_07 = 'col-md-offset-7';
    static $MD_OFFSET_08 = 'col-md-offset-8';
    static $MD_OFFSET_09 = 'col-md-offset-9';
    static $MD_OFFSET_10 = 'col-md-offset-10';
    static $MD_OFFSET_11 = 'col-md-offset-11';
    static $MD_OFFSET_12 = 'col-md-offset-12';
    static $LG_OFFSET_01 = 'col-lg-offset-1';
    static $LG_OFFSET_02 = 'col-lg-offset-2';
    static $LG_OFFSET_03 = 'col-lg-offset-3';
    static $LG_OFFSET_04 = 'col-lg-offset-4';
    static $LG_OFFSET_05 = 'col-lg-offset-5';
    static $LG_OFFSET_06 = 'col-lg-offset-6';
    static $LG_OFFSET_07 = 'col-lg-offset-7';
    static $LG_OFFSET_08 = 'col-lg-offset-8';
    static $LG_OFFSET_09 = 'col-lg-offset-9';
    static $LG_OFFSET_10 = 'col-lg-offset-10';
    static $LG_OFFSET_11 = 'col-lg-offset-11';
    static $LG_OFFSET_12 = 'col-lg-offset-12';
    
    //push
    static $XS_PUSH_01 = 'col-xs-push-1';
    static $XS_PUSH_02 = 'col-xs-push-2';
    static $XS_PUSH_03 = 'col-xs-push-3';
    static $XS_PUSH_04 = 'col-xs-push-4';
    static $XS_PUSH_05 = 'col-xs-push-5';
    static $XS_PUSH_06 = 'col-xs-push-6';
    static $XS_PUSH_07 = 'col-xs-push-7';
    static $XS_PUSH_08 = 'col-xs-push-8';
    static $XS_PUSH_09 = 'col-xs-push-9';
    static $XS_PUSH_10 = 'col-xs-push-10';
    static $XS_PUSH_11 = 'col-xs-push-11';
    static $XS_PUSH_12 = 'col-xs-push-12';
    static $SM_PUSH_01 = 'col-sm-push-1';
    static $SM_PUSH_02 = 'col-sm-push-2';
    static $SM_PUSH_03 = 'col-sm-push-3';
    static $SM_PUSH_04 = 'col-sm-push-4';
    static $SM_PUSH_05 = 'col-sm-push-5';
    static $SM_PUSH_06 = 'col-sm-push-6';
    static $SM_PUSH_07 = 'col-sm-push-7';
    static $SM_PUSH_08 = 'col-sm-push-8';
    static $SM_PUSH_09 = 'col-sm-push-9';
    static $SM_PUSH_10 = 'col-sm-push-10';
    static $SM_PUSH_11 = 'col-sm-push-11';
    static $SM_PUSH_12 = 'col-sm-push-12';
    static $MD_PUSH_01 = 'col-md-push-1';
    static $MD_PUSH_02 = 'col-md-push-2';
    static $MD_PUSH_03 = 'col-md-push-3';
    static $MD_PUSH_04 = 'col-md-push-4';
    static $MD_PUSH_05 = 'col-md-push-5';
    static $MD_PUSH_06 = 'col-md-push-6';
    static $MD_PUSH_07 = 'col-md-push-7';
    static $MD_PUSH_08 = 'col-md-push-8';
    static $MD_PUSH_09 = 'col-md-push-9';
    static $MD_PUSH_10 = 'col-md-push-10';
    static $MD_PUSH_11 = 'col-md-push-11';
    static $MD_PUSH_12 = 'col-md-push-12';
    static $LG_PUSH_01 = 'col-lg-push-1';
    static $LG_PUSH_02 = 'col-lg-push-2';
    static $LG_PUSH_03 = 'col-lg-push-3';
    static $LG_PUSH_04 = 'col-lg-push-4';
    static $LG_PUSH_05 = 'col-lg-push-5';
    static $LG_PUSH_06 = 'col-lg-push-6';
    static $LG_PUSH_07 = 'col-lg-push-7';
    static $LG_PUSH_08 = 'col-lg-push-8';
    static $LG_PUSH_09 = 'col-lg-push-9';
    static $LG_PUSH_10 = 'col-lg-push-10';
    static $LG_PUSH_11 = 'col-lg-push-11';
    static $LG_PUSH_12 = 'col-lg-push-12';
    
    
    //pull
    static $XS_PULL_01 = 'col-xs-pull-1';
    static $XS_PULL_02 = 'col-xs-pull-2';
    static $XS_PULL_03 = 'col-xs-pull-3';
    static $XS_PULL_04 = 'col-xs-pull-4';
    static $XS_PULL_05 = 'col-xs-pull-5';
    static $XS_PULL_06 = 'col-xs-pull-6';
    static $XS_PULL_07 = 'col-xs-pull-7';
    static $XS_PULL_08 = 'col-xs-pull-8';
    static $XS_PULL_09 = 'col-xs-pull-9';
    static $XS_PULL_10 = 'col-xs-pull-10';
    static $XS_PULL_11 = 'col-xs-pull-11';
    static $XS_PULL_12 = 'col-xs-pull-12';
    static $SM_PULL_01 = 'col-sm-pull-1';
    static $SM_PULL_02 = 'col-sm-pull-2';
    static $SM_PULL_03 = 'col-sm-pull-3';
    static $SM_PULL_04 = 'col-sm-pull-4';
    static $SM_PULL_05 = 'col-sm-pull-5';
    static $SM_PULL_06 = 'col-sm-pull-6';
    static $SM_PULL_07 = 'col-sm-pull-7';
    static $SM_PULL_08 = 'col-sm-pull-8';
    static $SM_PULL_09 = 'col-sm-pull-9';
    static $SM_PULL_10 = 'col-sm-pull-10';
    static $SM_PULL_11 = 'col-sm-pull-11';
    static $SM_PULL_12 = 'col-sm-pull-12';
    static $MD_PULL_01 = 'col-md-pull-1';
    static $MD_PULL_02 = 'col-md-pull-2';
    static $MD_PULL_03 = 'col-md-pull-3';
    static $MD_PULL_04 = 'col-md-pull-4';
    static $MD_PULL_05 = 'col-md-pull-5';
    static $MD_PULL_06 = 'col-md-pull-6';
    static $MD_PULL_07 = 'col-md-pull-7';
    static $MD_PULL_08 = 'col-md-pull-8';
    static $MD_PULL_09 = 'col-md-pull-9';
    static $MD_PULL_10 = 'col-md-pull-10';
    static $MD_PULL_11 = 'col-md-pull-11';
    static $MD_PULL_12 = 'col-md-pull-12';
    static $LG_PULL_01 = 'col-lg-pull-1';
    static $LG_PULL_02 = 'col-lg-pull-2';
    static $LG_PULL_03 = 'col-lg-pull-3';
    static $LG_PULL_04 = 'col-lg-pull-4';
    static $LG_PULL_05 = 'col-lg-pull-5';
    static $LG_PULL_06 = 'col-lg-pull-6';
    static $LG_PULL_07 = 'col-lg-pull-7';
    static $LG_PULL_08 = 'col-lg-pull-8';
    static $LG_PULL_09 = 'col-lg-pull-9';
    static $LG_PULL_10 = 'col-lg-pull-10';
    static $LG_PULL_11 = 'col-lg-pull-11';
    static $LG_PULL_12 = 'col-lg-pull-12';
    
}
