<?php 
session_start();
header("Access-Control-Allow-Origin: *");
include("config/db.php");

class data_respon{}
$dr = new data_respon();

// {'username':username, 'password':password}
$username = $_POST['username'];
$password = $_POST['password'];
$pass_hash = md5($password);

$qCekUser = $link -> query("SELECT id FROM tbl_user WHERE username='$username' AND password='$pass_hash';");
$jlhUser = mysqli_num_rows($qCekUser);

if($jlhUser > 0){
    $dr -> status = 'sukses';
}else{
    $dr -> status = 'gagal';
}

echo json_encode($dr);

?>