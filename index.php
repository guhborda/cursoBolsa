<?php
include 'config.php';
include 'structure/head.php';
?>
<?php
if($_REQUEST){
    $url = explode('/',$_REQUEST['url']);
    if( $_REQUEST['url'] != '' && $_REQUEST['url'] != '/'){

    
        if(count($url) > 1){
            include 'pages/404.view.php';
        }else{
            include 'pages/'.$_REQUEST['url'].'.view.php';
        }
    }else{
        include 'pages/pricing.view.php';

    }
}else{
    include 'pages/pricing.view.php';
}

?>

    <script src="sw.js"></script>


</body>
</html>