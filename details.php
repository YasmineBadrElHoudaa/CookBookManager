<?php 
include('config/db_connect.php') ;

 
  






//CHECK GET REQUEST ID PARAM

if(isset($_GET['ID'])) {
    $ID = mysqli_real_escape_string($connect, $_GET['ID']) ;
    //make sql
 $sql = "SELECT * FROM recettes WHERE ID=$ID" ;
 // GET QUERY RESULLT
 $result = mysqli_query($connect, $sql) ;
 // fetch result in array format 
 $recette = mysqli_fetch_assoc($result) ;
 
 
 print_r($recette) ; 
 }
?>
<!DOCTYPE html>
    <html>
        <?php include('template/header.php'); ?>
        <div class="container center">
        <?php if($recette): ?>
            <h4><?php echo htmlspecialchars($recette['Titre']) ; ?></h4>
            <p>creer par : <?php echo htmlspecialchars($recette['Email']) ?></p>
            <p> <?php echo date($recette['Creation'])        ?> </p>
            <h5> Les ingredients :</h5>
            <p> <?php echo htmlspecialchars($recette['Ingredients']) ?></p>
            <form action="delete.php" method="POST">
            <input type="hidden" name="idsupp" value="<?php echo $recette['ID']?>">
            <input  type="submit" name="delete" value="delete" class="btn brand z-depth-0"> 
            
            </form>
            <?php else: ?>
                <h5>cette recette n existe pas </h5>           
            
            
            <?php endif  ?>
        

        </div>

        
            
            

          <?php include('template/footer.php'); ?>
  

 
     </html>