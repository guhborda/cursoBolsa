<?php
include '../config.php';
include 'structure/head.php';
?>
<?php
if($_REQUEST){
    $url = explode('/',$_REQUEST['url']);
    if(count($url) > 1){
        include 'pages/404.view.php';
    }else{
        include 'template/sidenav.php';
        include 'pages/'.$_REQUEST['url'].'.view.php';
    }
    
}else{
    include 'pages/dashboard.view.php';
}

?>

<script>



    

    



</script>
</body>
</html>