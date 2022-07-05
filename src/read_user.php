<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
require_once "../vendor/autoload.php";

use Samit\Simplerestapipsr4\Dbconnect;

// สร้าง object connectdb
$connectdb = new Dbconnect;
$db = $connectdb->getConnect();

$stmt = $db->prepare("SELECT * FROM users");
$stmt->execute();

// การอ่านข้อมูลออกมาแสดง
$result = $stmt->fetchAll();

// print_r($result);
echo json_encode($result);

// $userArr = array();

// while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//     extract($row);
//     $e = array(
//         "id"        => $id,
//         "username"  => $username,
//         "fullname"  => $fullname,
//         "email"     => $email,
//         "tel"       => $tel,
//         "status"    => $status
//     );
//     array_push($userArr, $e);
// }

// echo json_encode($userArr);
