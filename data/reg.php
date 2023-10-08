<?php
include "./config.php";

require_once "../googleLib/GoogleAuthenticator.php";

$ga = new PHPGangsta_GoogleAuthenticator();


$usernm = $_POST['user_nm'];
$passwd = $_POST['user_pd'];
$secretKey = $ga->createSecret();
$msg = "";


if(!$usernm && !$passwd){
    $msg = array('val' => false, 'msg' => 'Please fill all the field');
    echo json_encode($msg);
}else{
        $sql_query = "SELECT count(*) AS cntUser, id, username, password, status FROM users WHERE username='{$usernm}' ";
        $result = mysqli_query($db,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        $id = $row['id'];
        $name = $row['username'];
        $st = $row['status'];
        $pd = $row['password'];

    if($name == $usernm){
        $msg = array('val' => false, 'msg' => 'Account Already Exist! Use another Username');
        echo json_encode($msg);
    }elseif($count < 1){
        $sql_reg = "INSERT INTO users (username, password, status, secret_key) VALUES ('{$usernm}', '{$passwd}', 'unblock', '{$secretKey}') ";
        if ($db->query($sql_reg) === TRUE){

            $qrCodeUrl = $ga->getQRCodeGoogleUrl($usernm, $secretKey, 'CipherWeb');
            
            $sql_fnd = "SELECT secret_key FROM users WHERE username = '{$usernm}' ";
            $result_fnd = mysqli_query($db,$sql_fnd);
            $rowCch = mysqli_fetch_array($result_fnd);

            $sc = $rowCch['secret_key'];
            
            if($sc){
                $msg = array('val' => true, 'url' => $qrCodeUrl, 'uname' => $usernm , 'secret' => $sc);
                echo json_encode($msg);
            }else{
                $msg = array('val' => false, 'msg' => 'SQL SELECT ERROR');
                echo json_encode($msg);
            }
            
            
        }else{
            $msg = array('val' => false, 'msg' => 'SQL INSERT ERROR');
            echo json_encode($msg);
        }
    }else{
        $msg = array('val' => false, 'msg' => 'It must be Valid');
        echo json_encode($msg);
    }

}
?>
