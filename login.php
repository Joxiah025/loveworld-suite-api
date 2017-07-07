<?php 
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
include("includes/db.php");

$input = json_decode(file_get_contents('php://input'));

if( $input->email != "" ){
    $email = secureTxt($input->email);
    $pwd = securePwd($input->password);
    
    $q = $conn->prepare("SELECT * FROM users WHERE email = :em AND password = :pwd");
    $q->bindValue(':em', $email);
    $q->bindValue(':pwd', $pwd);
    $q->execute();
    if($q->rowCount() > 0){
        $row = $q->fetch(PDO::FETCH_OBJ);
        //echo json_encode($row);
        echo json_encode(array('status' => 200, 'message' => [ 'authkey' => base64_encode(time().$row->id), 'email' => $row->email,'id'=>base64_encode($row->email)]));
    }else{
        echo json_encode(array('status' => 401,'message' => 'Authentication failed! Check your credentials'));
    }
    
}else{
    echo json_encode(array('status' => 400,'message' => 'Authentication failed! Empty fields found'));
}
?>