<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;


header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT');
header('Access-Control-Allow-Origin: *');

# Get all customer
$app->get('/api/customers', function(Request $request, Response $response){
	$sql = 'SELECT * FROM customer';

	try {
		$db = new db();
		$db = $db->connect();
		$stmt = $db->query($sql);

		$customers = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;

		echo '{"success":true,"dados":'.json_encode($customers).'}';
	} catch (PDOException $e) {
		echo '{"error":{"text":'.$e->getMessage().'},"success":false}';
	}
});


# Get single customer
$app->get('/api/customer/{id}', function(Request $request, Response $response){
	$id = $request->getAttribute('id');
	$sql = "SELECT * FROM customer WHERE id = {$id}";

	try {
		$db = new db();
		$db = $db->connect();
		$stmt = $db->query($sql);

		$customer = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;

		echo '{"success":true,"dados":'.json_encode($customer).'}';
	} catch (PDOException $e) {
		echo '{"error":{"text":'.$e->getMessage().'},"success":false}';
	}
});


# Add customer
$app->post('/api/customer/add', function(Request $request, Response $response){
	$name = $request->getParam('name');
	$email = $request->getParam('email');
	$phone = $request->getParam('phone');

	$sql = "INSERT INTO customer (name, email, phone) VALUES (:name,:email,:phone)";

	try {
		$db = new db();
		$db = $db->connect();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':phone', $phone);

		$stmt->execute();
		$db = null;

		echo '{"success":true,"notice":"Customer added"}';
	} catch (PDOException $e) {
		echo '{"error":{"text":'.$e->getMessage().'},"success":false}';
	}
});


# Update customer
$app->post('/api/customer/update/{id}', function(Request $request, Response $response){
	$id = $request->getAttribute('id');

	$name = $request->getParam('name');
	$email = $request->getParam('email');
	$phone = $request->getParam('phone');

	$sql = "UPDATE customer SET name = :name, email = :email, phone = :phone WHERE id = {$id}";

	try {
		$db = new db();
		$db = $db->connect();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':phone', $phone);

		$stmt->execute();
		$db = null;

		echo '{"success":true,"notice":"Customer {$id} updated"}';
	} catch (PDOException $e) {
		echo '{"error":{"text":'.$e->getMessage().'},"success":false}';
	}
});


# Delete customer
$app->delete('/api/customer/delete/{id}', function(Request $request, Response $response){
	$id = $request->getAttribute('id');
	$sql = "DELETE FROM customer WHERE id = :id";

	try {
		$db = new db();
		$db = $db->connect();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id);

		$stmt->execute();
		$db = null;

		echo '{"success":true,"notice":"Customer {$id} deleted"}';
	} catch (PDOException $e) {
		echo '{"error":{"text":'.$e->getMessage().'},"success":false}';
	}
});