<?php
$path = "../view/";
$diretorio = dir($path);
$Routes=array(); 
$Realroutes = array();
while($arquivo = $diretorio -> read()){
    $Routes[]=$arquivo;
}
$diretorio -> close();
if($_POST['url']){

    $url = $_POST['url'].'.view.php';
    //var_dump($url);
    for($i=0;$i<count($Routes);$i++){
        if($url == "$Routes[$i]"){
            $Realroutes[] = $Routes[$i];
        }
    }
}
if($Realroutes != ''){
    echo json_encode($Realroutes);
}else{
    echo json_encode('Error 404');
}

?>