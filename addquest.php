<?php 
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
include("includes/db.php");

$input = json_decode(file_get_contents('php://input'));

$cnt = count($input->questions);

if( $input->flowid->id != "" ){
    $i = 1;
    foreach($input->questions as $data){
        
        $label = secureTxt($data->label);
        $type = secureTxt($data->type);
        $req = secureTxt($data->required);
        $name = secureTxt($data->type.$i);

        $q = $conn->prepare("INSERT INTO questions (label,type,required,name,flowid) VALUES(:label,:type,:req,:name,:fid)");
        $q->bindValue(':label', $label);
        $q->bindValue(':type', $type);
        $q->bindValue(':req', $req);
        $q->bindValue(':name', $name);
        $q->bindValue(':fid', $input->flowid->id);
        $q->execute();
        $i++;
       
    }

       echo json_encode(array('status' => 200,'message' => 'Done!'));
       
 }else{
         echo json_encode(array('status' => 400,'message' => 'No flow component found!'));
 }
?>