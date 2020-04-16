<!-- <script>
$(location).change(function(e){
    e.preventDefault();
var url = document.location.href;
console.log(url);
 $.ajax({
    
    url:'functions/Routes.func.php',
    method: 'POST',
    dataType: 'JSON',
    data:{url: url},
    success: function(response){
        if(response != 'empty' ){
            
            <?php
            //echo '<script>$(".main-content .container-fluid").load("view/'.response.'.view.php"); </script>';
            ?>
        }else{
            
            <?php
            //echo '<script>$(".master_section").load("view/login.view.php") </script>';
            ?>
        }
     }
    });
 }); -->

<!-- </script> -->
<!-- <?php
}else{
    // echo '<script>$(".master_section").load("view/login.view.php") </script>';
}
?> -->
