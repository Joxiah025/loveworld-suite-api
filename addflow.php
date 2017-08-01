<?php 
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
include("includes/db.php");

$input = json_decode(file_get_contents('php://input'));

if( $input->title != "" ){
    $title = secureTxt($input->title);
    $bg = secureTxt($input->bg);
    $btnColor = secureTxt($input->btnColor);
    $textColor = secureTxt($input->textColor);
    $user = getID($input->user);
    $timer = time();
    
    $q = $conn->prepare("INSERT INTO flow (title,bg,textColor,btnColor,user,created) VALUES(:title,:bg,:txt,:btn,:user,:created)");
    $q->bindValue(':title', $title);
    $q->bindValue(':bg', $bg);
    $q->bindValue(':txt', $textColor);
    $q->bindValue(':btn', $btnColor);
    $q->bindValue(':user', $user);
    $q->bindValue(':created', $timer);
    
    if($q->execute()){
        $flowId = $conn->lastInsertId();
        echo json_encode(array('status' => 200, 'message' => ['id' => $flowId ]));
    }else{
        echo json_encode(array('status' => 401,'message' => 'There was an error adding this flow component, try again!'));
    }
    
}else{
    echo json_encode(array('status' => 400,'message' => 'No flow component found!'));
}
?>