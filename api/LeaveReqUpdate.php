<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../LeaveReq.php';

$database = new Database();
$db = $database->getConnection();
$item = new LeaveReq($db);
var_dump($_POST);

$item->id = isset($_POST['id']) ? $_POST['id'] : die();
$item->name = $_POST['name'];
$item->roll_no = $_POST['roll_no'];
$item->level = $_POST['level'];
$item->leave_date = $_POST['leave_date'];
$item->status = $_POST['status'];
$item->req_reason = $_POST['req_reason'];
$item->acc_rej_reason = $_POST['acc_rej_reason'];
$item->course = $_POST['course'];
if ($item->updateLeaveReq()) {
    echo json_encode("Data updated.");
} else {
    echo json_encode("Data could not be updated");
}
