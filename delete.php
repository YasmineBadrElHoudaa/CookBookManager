<?php


include('config/db_connect.php') ;
if($_POST['delete']) {
   
    $idsupp=mysqli_real_escape_string($connect, $_POST['idsupp']) ;
    $sql="DELETE FROM recettes WHERE ID=$idsupp" ;
    if(mysqli_query($connect, $sql)) {
      header('location:index.php') ;


    }
    else {
        echo 'erreur :' . mysqli_error($connect) ;
    }
}

?>

<!DOCTYPE html>
    <html>
        <?php include('template/header.php'); ?>













<?php include('template/footer.php'); ?>
  

 
  </html>