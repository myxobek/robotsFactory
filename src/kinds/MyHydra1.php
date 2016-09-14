<?php

namespace robotsFactory\kinds;

require_once ('Robot.php');

class MyHydra1 extends Robot
{
    ///////////////////////////////////////////////////////////////////////////////

    protected $weight = 10;
    protected $speed  = 20;
    protected $height = 30;

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * MyHydra1 constructor.
     */
    public function __construct()
    {
        $this->type = $this->getClassName( __CLASS__ );
    }

    ///////////////////////////////////////////////////////////////////////////////
}