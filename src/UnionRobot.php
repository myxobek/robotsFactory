<?php

namespace robotsFactory;

use robotsFactory\kinds\Robot;

class UnionRobot extends Robot
{
    private $robots = [];

    ///////////////////////////////////////////////////////////////////////////////

    protected $weight = 0;
    protected $speed  = INF;
    protected $height = 0;

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * UnionRobot constructor.
     */
    public function __construct()
    {
        $this->type = $this->getClassName( __CLASS__ );
    }

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * @param   array|mixed     $robots
     */
    public function addRobot( $robots )
    {
        if ( !is_array( $robots ) )
        {
            $robots = [ $robots ];
        }

        for( $i = 0, $n = count( $robots ); $i < $n; ++$i )
        {
            $this->robots[] = $robots[$i];

            $this->weight += $robots[$i]->getWeight();
            $this->height += $robots[$i]->getHeight();

            $this->speed  = min( $this->speed, $robots[$i]->getSpeed() );
        }
    }
}