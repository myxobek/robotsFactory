<?php

namespace robotsFactory;

class Factory
{
    private $types = [];

    private $known_function_prefixes = [
        'create'
    ];

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * @param   $Object
     */
    public function addType( $Object )
    {
        $this->types[ $Object->getType() ] = $Object;
    }

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * @return  array
     */
    public function getTypes()
    {
        return array_keys( $this->types );
    }

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * @param   string  $name
     * @param   array   $arguments
     *
     * @return  bool
     */
    public function __call( $name, $arguments )
    {
        foreach ( $this->known_function_prefixes as $prefix )
        {
            if ( 0 === strpos( $name, $prefix ) )
            {
                $type = substr( $name, strlen( $prefix ) );

                if ( array_key_exists( $type, $this->types ) )
                {
                    return $this->{$prefix}( $type, $arguments );
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }

    ///////////////////////////////////////////////////////////////////////////////

    /**
     * @param   string  $type
     * @param   array   $arguments
     *
     * @return  array
     */
    private function create( $type, $arguments )
    {
        $count = isset( $arguments[0] ) ? $arguments[0] : 0;

        $result = [];

        for( $i = 0; $i < $count; ++$i )
        {
            $result[] = clone $this->types[$type];
        }

        return $result;
    }

    ///////////////////////////////////////////////////////////////////////////////
}