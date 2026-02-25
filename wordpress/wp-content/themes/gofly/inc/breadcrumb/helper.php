<?php

namespace Egns\Inc;

class Breadcrumb_Helper
{

    /**
     * Initializes a singleton instance
     *
     * @return \Breadcrumb_Helper
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Main construcutor 
     *
     * @return void
     */
    public function __construct()
    {
        // slient is golden
    }


    
}

Breadcrumb_Helper::init();
