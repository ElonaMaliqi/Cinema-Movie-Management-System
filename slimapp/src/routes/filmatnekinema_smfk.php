<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//require '../vendor/autoload.php';
//require 'db.php';

$app = new \Slim\App();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});
// Shfaq te gjithe filmatnekinema
$app->get('/api/filmatnekinema_smfk', function (Request $request, Response $response) {
    $sql = 'SELECT * FROM filmatnekinema_smfk';
	try{
		//Shfaq db Object
		$db = new db();
		//Lidhja 
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$filmatnekinema_smfk = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($filmatnekinema_smfk);
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});

// Shfaq nje film
$app->get('/api/filminekinema/{ID}', function (Request $request, Response $response) {
	//Per te marr ID te filmit ne kinema krijo variabel
	$ID = $request->getAttribute('ID');
	
    $sql = "SELECT * FROM filmatnekinema_smfk WHERE ID = '$ID'";
	try{
		//Shfaq db Object
		$db = new db();
		//Konekto 
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$filminekinema = $stmt->fetch(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($filminekinema);
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});


// Shto film ne kinema
$app->post('/api/filminekinema/shto', function (Request $request, Response $response) {
	
	$TitulliFilmit_SMFK = $request->getParam('TitulliFilmit_SMFK');
	$ZhanriFilmit_SMFK = $request->getParam('ZhanriFilmit_SMFK');
	$VersioniFilmit_SMFK = $request->getParam('VersioniFilmit_SMFK');
	$SallaFilmit_SMFK = $request->getParam('SallaFilmit_SMFK');
	$DataFilmit_SMFK = $request->getParam('DataFilmit_SMFK');
	$OrariFilmit_SMFK = $request->getParam('OrariFilmit_SMFK');
	$KohezgjatjaFilmit_SMFK = $request->getParam('KohezgjatjaFilmit_SMFK');
	
    $sql = "INSERT INTO filmatnekinema_smfk (TitulliFilmit_SMFK, ZhanriFilmit_SMFK, VersioniFilmit_SMFK, SallaFilmit_SMFK, DataFilmit_SMFK, OrariFilmit_SMFK, KohezgjatjaFilmit_SMFK ) 
	VALUES(:TitulliFilmit_SMFK, :ZhanriFilmit_SMFK, :VersioniFilmit_SMFK, :SallaFilmit_SMFK, :DataFilmit_SMFK, :OrariFilmit_SMFK, :KohezgjatjaFilmit_SMFK)";
	try{
		//Shfaq db Object
		$db = new db();
		//Konekto 
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':TitulliFilmit_SMFK',$TitulliFilmit_SMFK);
		$stmt->bindParam(':ZhanriFilmit_SMFK',$ZhanriFilmit_SMFK);
		$stmt->bindParam(':VersioniFilmit_SMFK',$VersioniFilmit_SMFK);
		$stmt->bindParam(':SallaFilmit_SMFK',$SallaFilmit_SMFK);
		$stmt->bindParam(':DataFilmit_SMFK',$DataFilmit_SMFK);
		$stmt->bindParam(':OrariFilmit_SMFK',$OrariFilmit_SMFK);
		$stmt->bindParam(':KohezgjatjaFilmit_SMFK',$KohezgjatjaFilmit_SMFK);
		
		$stmt->execute();
		echo'{"notice":{"text":"Filmi u Shtua"}';
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});




// Perditeso film ne kinema
$app->put('/api/filminekinema/perditeso/{ID}', function (Request $request, Response $response) {
	//Per te marr ID te filmit krijo variabel
	$ID = $request->getAttribute('ID');
	$TitulliFilmit_SMFK = $request->getParam('TitulliFilmit_SMFK');
	$ZhanriFilmit_SMFK = $request->getParam('ZhanriFilmit_SMFK');
	$VersioniFilmit_SMFK = $request->getParam('VersioniFilmit_SMFK');
	$SallaFilmit_SMFK = $request->getParam('SallaFilmit_SMFK');
	$DataFilmit_SMFK = $request->getParam('DataFilmit_SMFK');
	$OrariFilmit_SMFK = $request->getParam('OrariFilmit_SMFK');
	$KohezgjatjaFilmit_SMFK = $request->getParam('KohezgjatjaFilmit_SMFK');
    $sql = "UPDATE filmatnekinema_smfk SET
	TitulliFilmit_SMFK = :TitulliFilmit_SMFK,
	ZhanriFilmit_SMFK = :ZhanriFilmit_SMFK,
	VersioniFilmit_SMFK = :VersioniFilmit_SMFK,
	SallaFilmit_SMFK = :SallaFilmit_SMFK,
	DataFilmit_SMFK = :DataFilmit_SMFK,
	OrariFilmit_SMFK = :OrariFilmit_SMFK,
	KohezgjatjaFilmit_SMFK = :KohezgjatjaFilmit_SMFK
	WHERE ID = '$ID'";
	try{
		//Shfaq db Object
		$db = new db();
		//Konekto 
		$db=$db->connect();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':TitulliFilmit_SMFK',$TitulliFilmit_SMFK);
		$stmt->bindParam(':ZhanriFilmit_SMFK',$ZhanriFilmit_SMFK);
		$stmt->bindParam(':VersioniFilmit_SMFK',$VersioniFilmit_SMFK);
		$stmt->bindParam(':SallaFilmit_SMFK',$SallaFilmit_SMFK);
		$stmt->bindParam(':DataFilmit_SMFK',$DataFilmit_SMFK);
		$stmt->bindParam(':OrariFilmit_SMFK',$OrariFilmit_SMFK);
		$stmt->bindParam(':KohezgjatjaFilmit_SMFK',$KohezgjatjaFilmit_SMFK);
		$stmt->execute();
		echo'{"notice":{"text":"Filmi u Modifikua"}';
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});


// Fshij film ne kinema
$app->delete('/api/filminekinema/fshij/{ID}', function (Request $request, Response $response) {
	//Per te marr ID te filmit krijo variabel
	$ID = $request->getAttribute('ID');
	
    $sql = "DELETE FROM filmatnekinema_SMFK WHERE ID = '$ID'";
	try{
		//Shfaq db Object
		$db = new db();
		//Konekto 
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->execute();
		echo'{"notice":{"text":"Filmi u Fshi"}';
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});




