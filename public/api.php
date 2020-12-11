<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';

class MyDB extends SQLite3 {
    function __construct() {
       $this->open('../participants.db');
    }
 }
$db = new MyDB();
    if(!$db) {
        echo $db->lastErrorMsg();
        exit();
    }
 
$app = new \Slim\App;
$app->get(
    '/api/participants',
    function (Request $request, Response $response, array $args) use ($db) {
        
        
        $sql = "SELECT id, firstname, lastname FROM participant";
        $ret = $db->query($sql);
        #participants = [];
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            $participants[] = $row;
}
        $db->close();
        return $response->withJson($participants);
    }
);

$app->post(
    '/api/participants',
    function (Request $request, Response $response, array $args) use ($db) {    
      $requestData = $request->getParsedBody();
      if (!isset($requestData['firstname']) || !isset($requestData['lastname'])) {
     return $response->withStatus(400);
      }
      $sql = "INSERT INTO participant (firstname, lastname) VALUES('$requestData[firstname]', '$requestData[lastname]');";      
      $db->query($sql);
      return $response->withJson($requestData)->withStatus(201);
    }
);


 


$app->run();