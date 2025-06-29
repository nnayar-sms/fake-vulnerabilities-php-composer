<?php
use Zend\Json\Json;

$xmlString = file_get_contents('php://input'); // Potentially attacker-controlled
// ruleid: ssc-35676523-0fc0-c34f-a821-be2a80ff071a
$json = Json::fromXml($xmlString);

echo $json;


use Zend\XmlRpc\Fault;

$xmlString = file_get_contents('php://input'); // Potential attacker-controlled XML

$fault = new Fault();
// ruleid: ssc-35676523-0fc0-c34f-a821-be2a80ff071a
$fault->loadXml($xmlString);
// ruleid: ssc-35676523-0fc0-c34f-a821-be2a80ff071a
if (Fault::isFault($fault)) {
    echo "Fault Code: " . $fault->getCode();
    echo "Fault String: " . $fault->getMessage();
}




use Zend\XmlRpc\Response;

$xmlString = file_get_contents('php://input'); // XML input from untrusted source
$response = new Response();
// ruleid: ssc-35676523-0fc0-c34f-a821-be2a80ff071a
$response->loadXml($xmlString);

$result = $response->getReturnValue();
echo "Result: " . $result;
