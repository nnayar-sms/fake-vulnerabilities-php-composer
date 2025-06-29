<?php

use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Router\Http\Query;
use Zend\Mvc\Router\Http\RouteMatch;

require_once 'vendor/autoload.php';

$route = new Query(['query' => ['foo' => 'bar']]);

$request = new Request();
$request->setUri('http://example.com/?foo=bar');
// ruleid: ssc-b73f9cd8-85a2-6279-f3f9-bc9dabd49b32
$match = $route->match($request);

if ($match instanceof RouteMatch) {
    echo "Matched! Params:\n";
    print_r($match->getParams());
} else {
    echo "No match.\n";
}
