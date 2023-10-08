<?php 

 include "./data/config.php";

 $secret_server = $_POST['sc_qr'];
 $code_server = $_POST['cd_qr'];
 $name_server = $_POST['nm_qr'];
 $err_msg = "";

 require_once "./googleLib/GoogleAuthenticator.php";
 
 $ga = new PHPGangsta_GoogleAuthenticator();


      if($code_server && $secret_server){

        $checkResult = $ga->verifyCode($secret_server, $code_server , 2 ); 

        $sql_find = "SELECT count(*) AS countUser, username FROM users WHERE username = '{$name_server}' ";
            $result = mysqli_query($db,$sql_find);
            $row = mysqli_fetch_array($result);
            $name_sql = $row['username'];
            $ct_sql = $row['countUser'];

         if ($checkResult && $ct_sql > 0) {

            $err_msg = array('val' => true, 'msg' => 'Success');
            echo json_encode($err_msg);

            $_SESSION['name'] = $name_sql;

        }else{
            $err_msg = array('val' => false, 'msg' => 'Error OTP Code');
            echo json_encode($err_msg);
        }
      }else{
        $err_msg = array('val' => false, 'msg' => 'Please type your otp code.');
        echo json_encode($err_msg);
      }
      
?>