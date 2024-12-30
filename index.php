<?php
//the action on add page is for precise where we will put the data token by the form//
// method used to precise which one : post or GET to transform data to server//
//Conecting to data bases **********

include('Config/db_connect.php') ;

$sql = "SELECT * FROM recettes" ;

$result = mysqli_query($connect,$sql) ;
$recettes = mysqli_fetch_all($result, MYSQLI_ASSOC) ;
// after cheking the connexion  and  the 3steps with DB and stor our needs in  a var=recettes we have to close connexion
// we can also free our memoir from "result" to use it for anothr thng but not importnt not obliged  mysqli_free_result(result)//
//Close : mysqli_close($connect)

// transform our string to a array using explode function  in order to print it like a liste //
    //print_r(explode(',' , $recettes[0]['ingredients'])) ;


?>
<!DOCTYPE html>
    <html>
          <?php include('template/header.php'); ?>
          <h4 class ="center grey-text">recettes !</h4>
          <div class="container">
              <div class="row">
              
                <?php foreach($recettes as $recette) {?>
                    <div class="col s6 md3">
                        <div class="card z-depth-0">
                            <img src="https://i.pinimg.com/originals/3f/f5/98/3ff5984a7602cf5e017e2cb74430c28b.jpg" class="cook">
                            <div class="card-content center">
                                <h6><?php echo htmlspecialchars($recette['Titre'])?></h6>
                                <ul><?php foreach(explode(',',$recette['Ingredients']) as $ing) { ?> 
                                    <li> <?php echo htmlspecialchars($ing) ; ?> </li>
                                       
                               <?php } ?> 



                                </ul>
                            </div>
                            <div class ="card-action right-align">
                                <a class ="brand-text" href="details.php?ID=<?php echo $recette['ID']  ?>"> plus de details </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
              </div>
          </div>

                



          <?php include('template/footer.php'); ?>
  

 
     </html>
