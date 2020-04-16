<?php
include ('../config.php');

include ('../autoload.php');
include ('structure/head.php');
?>
<div class="master_section  clearfix" id="wrapper"></div>
    
          

<?php 
    if(isset($_SESSION['user'])){ 

        if(isset($_GET['url'])){
            
            $url= $_GET['url'];
            
            $url= explode('/',$url);
            print_r($url);
            // var_dump($url);
            // var_dump($url);
             if(isset($url[0]) && !empty($url[0])){
              // var_dump('existe url3 url='.$url[0]);
                
              
                if($auth){  
                echo "<script>$('.master_section').empty();
                    $('.master_section').load('view/$url[0].view.php'); 
                </script>";
                }else{

                    echo "<script>$('.master_section').empty();
                    $('.master_section').load('view/login.view.php'); 
                </script>";


                }
            }else{
              if($auth){
                echo "
                 <script>
                 console.log('vazio');
                      $('.master_section ').empty();
                         $('.master_section').load('view/dashboard.view.php');
               </script>";
              }else{
                echo "
                <script>
                console.log('vazio');
                     $('.master_section ').empty();
                        $('.master_section').load('view/login.view.php');
              </script>";
              }
            }
            if($url[0] == 'sair' ){
                
                require_once '../functions/Sair.func.php';
              
            }
              
            }else{
                if($auth){
                echo "
                 <script>
                    console.log('vazio');
                 
                     $('.master_section').load('view/dashboard.view.php');
                </script>";
                }else{
                    echo "
                 <script>
                 console.log('vazio');
                      $('.master_section ').empty();
                         $('.master_section').load('view/login.view.php');
               </script>";
                }
          }
    ?>
       
       


<?php
}else{
   echo "<script>$('.master_section').load('view/login.view.php');</script>";
}
?>
<script>
    $(document).ready(function(){
        $('.sidenav-toggler').on('click',function(e){
        e.preventDefault();
        

        $('#sidenav-main').toggleClass('show');

    });
    });
    
    </script>
</body>
</html>