<?php
defined('BASEPATH') OR exit("");

/**
 * Description of Genlib
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 08-May-2016
 */
class Genlib {
    protected $CI;
    
    public function __construct() {
        $this->CI = &get_instance();
    }
}
