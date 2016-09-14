<?php

namespace robotsFactory\kinds;

abstract class Robot
{
    protected $weight;
    protected $speed;
    protected $height;

    protected $type;

    ///////////////////////////////////////////////////////////////////////////////

    abstract public function __construct();

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * @return  string
     */
    public function getType()
    {
        return $this->type;
    }

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * @param   string  $class
     *
     * @return  string
     */
    public function getClassName( $class )
    {
        $path = explode('\\', $class);
        return array_pop( $path );
    }

    ///////////////////////////////////////////////////////////////////////////////
    /**
     * @return  int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * @return  int
     */
    public function getHeight()
    {
        return $this->height;
    }

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * @return  int
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    ///////////////////////////////////////////////////////////////////////////////
}