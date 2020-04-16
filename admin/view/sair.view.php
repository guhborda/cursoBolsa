<?php

include '../functions/sair.func.php';

    if($response['Error'] == ''){
        echo "<script>$(location).attr('href','index.php');</script>";
    }

?>