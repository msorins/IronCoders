<?php

/*
 * @CODOLICENSE
 */

namespace CODOF\Importer\Drivers;


abstract class Driver {

    /**
     * No. of rows to process set by the user
     * @var int 
     */
    public $max_rows;
    
    /**
     *
     * @var PDO 
     */
    protected $db;
    
    public function __construct(\PDO $db) {

        $this->db = $db;
    }

    /**
     * Table prefix 
     * @var string 
     */    
    public function set_prefix($prefix) {
        
        define('DBPRE', $prefix);
    }
    
    
}