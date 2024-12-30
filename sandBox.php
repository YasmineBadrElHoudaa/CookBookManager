<?php
//sessionn*************
if (isset($_POST['submit'])) {
   //check cookie
   setcookie('type_d_utilisation',$_POST['type_d_utilisation'],time()+86400) ;
   
   
   //check session  
    session_start() ;
    $_SESSION['name'] = $_POST['name']  ;
header('Location: index.php') ;
}






?>
<!DOCTYPE html>
<html>
    <head>
    <title> les delices de Yasmine </title>


</head>
<body>
   <form action ="sandBox.php" method="POST">
       <input type="text" name="name">
       <select name="type_d_utilisation">
          <option value="CHercher_recette">CHercher_recette</option>
          <option value="Poster_recette">Poster_recette</option>

       </select>
     <input type="submit" name="submit" value="submit"  > 



   </form>



</body>



</html>