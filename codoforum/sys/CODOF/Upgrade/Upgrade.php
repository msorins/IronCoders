<?php

/*
 * @CODOLICENSE
 */

/**
 * 
 * Codoforum Upgrader
 */

class Upgrade {

    
    
    /**
     * Checks if the required php version is compatible with installed php
     * @param float $required_php_version
     * @return bool
     */
    private function isCompatible($required_php_version) {
        
        return version_compare( PHP_VERSION, $required_php_version, '>=' );        
    }
}
