<?php 
function checkuser($userName,$password){
    $conn = connectdb();
    $stsm = $conn->prepare("SELECT * FROM  user WHERE userName = '".$userName."' AND password ='".$password."' ");
    $stsm->execute();
    $result = $stsm ->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stsm->fetchALL();
    return $kq[0]['role'];
}
?>