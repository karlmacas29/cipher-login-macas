<?php
include "./config.php";

$usernm = $_POST['user_nm'];
$passwd = $_POST['user_pd'];
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
        $msg = array('val' => false, 'msg' => 'Please use another Username');
        echo json_encode($msg);
    }elseif($count < 1){
        $sql_reg = "INSERT INTO users (username, password, status) VALUES ('{$usernm}', '{$passwd}', 'unblock') ";
        if ($db->query($sql_reg) === TRUE){
            $msg = array('val' => true, 'msg' => 'Success You Can Now LogIn');
            echo json_encode($msg);
        }else{
            $msg = array('val' => false, 'msg' => 'sql is False');
            echo json_encode($msg);
        }
    }else{
        $msg = array('val' => true, 'msg' => 'Please fill all the field');
        echo json_encode($msg);
    }

}
?>
