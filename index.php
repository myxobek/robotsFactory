<?php

namespace robotsFactory;

error_reporting(E_ALL);
ini_set("display_errors", 1);

///////////////////////////////////////////////////////////////////////////////

use robotsFactory\kinds\MyHydra1;
use robotsFactory\kinds\MyHydra2;

///////////////////////////////////////////////////////////////////////////////

require_once ('src/Factory.php');
require_once ('src/kinds/MyHydra1.php');
require_once ('src/kinds/MyHydra2.php');

require_once ('src/UnionRobot.php');

///////////////////////////////////////////////////////////////////////////////

$factory = new Factory();

$factory->addType( new MyHydra1() );
$factory->addType( new MyHydra2() );

var_dump( $factory->createMyHydra1( 5 ) );
var_dump( $factory->createMyHydra2( 10 ) );

$unionRobot = new UnionRobot();

$unionRobot->addRobot( new MyHydra2() );

$unionRobot->addRobot( $factory->createMyHydra2(2) );

$factory->addType( $unionRobot );

$res = reset( $factory->createUnionRobot(1) );

echo( $res->getSpeed() );
echo('<br/>');
echo( $res->getWeight() );

