<?php
//if(isset($_GET['submit'])){// pour verifie que apres click sur submit if there s a data sent or not
    //submit button have a variable into GET table //
    // any form its like an associative array in get-array and mail .. are there composents
    //echo $_GET['email'] ;
   // echo $_GET['titre'] ;
    //echo $_GET['ingredients'] ;                     

//}
// the fiiirst securite (htmlspecialchars : pour mettre tous type d entre sous forme de text qlq soit code ou text nrml)
//the secooooond id the basic validation ! if empty : sa veut dire si l utilisateur a remplit la donnée de cet element ou non : il doit la remplir (requis) 
// theee strong validation is using fonction de validation filtre_var filtrage de tous les donné
// pour filtrer un element il faut mettre le contenu de ce element dans une variable 
// apres on la passe dans la  fonction  de filtrage  comme premier argument  avec un dexieme argument le type de filtre utilisé selon le type de ce element(email.....)
// initialisez l erreur pour que si les case sont empty elle affiche le vide 
// dans le cas ou on a pas mettre des donné dans les cases : 
    // apres submt il faut affciher le contenu + errors , when cest vide il afficher le contenu initialser 
    // car les ingredients et tt va prendre des valeur dans else de empty (not empty) 
    // l effectation de donnee token by user c est dans le cas ou il sont remplis les element 
    //mais l affichage de donnée c'est dans tous les cas si sont rempli ou pas
    // dans le cas ou sont pas rempli il va donner erruer so pour eviter ça on initialise les element 
    // si rempli afficher remplissage si non afficher linitialisation '' 
    
    
    
    // ______________________****************redirecting__________________________**********
    //after cheking smthngs and its true then we want to back to home page : 
           // we use header(location : file of home page[notre exemple c est index.php]) 
           // exemple : if(condition){ header(location:homefile.php)} or else{ header(location:homefle.php)}

//**************************connectttt to data bases ********************
include('config/db_connect.php') ;


$email = $titre = $ingredients = '' ;
$errors = ['email' => '' , 'titre' =>'' , 'ingredients' => ''] ;

if(isset($_POST['submit'])){// pour verifie que apres click sur submit if there s a data sent or not
    //submit button have a variable into GET table //
    // any form its like an associative array in get-array and mail .. are there composents
    if(empty($_POST['email'])) {
        $errors['email'] = 'l email est requis <br />' ;
    }
             else { 
                 $email = $_POST['email'] ;
            if (!filter_var($email , FILTER_VALIDATE_EMAIL)) {
                  $errors['email'] = ' l email n est pas une adress valide ' ;
            }
                  }
    //************************/
    if(empty($_POST['titre'])) {
        $errors['titre'] = 'le titre est requis <br />' ;
    }   else { 
                $titre = $_POST['titre'] ;
                if (!preg_match('/^[a-zA-Z\s]+$/' , $titre)){
                    $errors['titre'] ='le titre doit étre des lettres est des espaces' ;
                }
                   }
    //************************/
    if(empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'les ingredients sont requis <br />' ;
    }
              else {  
                  $ingredients = $_POST['ingredients'] ;
                  if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/' , $ingredients)){
                      $errors['ingredients'] = 'les ingredients doit étre comma separated ' ;
                  }
                   }
        if(array_filter($errors)){
            echo 'form non valide ' ;
        } else {
            //Tous les donnéé sont valide : on va les stocké avec qlq securité 
            //mettre les doonnéée entré par utilisateur sou forme de net string : ne contient aucun code executable ....
            // pou r ignoer les attack sur base de donnée 

        $email = mysqli_real_escape_string($connect,$_POST['email']) ;
        $titre = mysqli_real_escape_string($connect,$_POST['titre']) ;
        $ingredients = mysqli_real_escape_string($connect,$_POST['ingredients']) ;

        $sql = "INSERT INTO recettes(Email,Titre,ingredients) VALUES ('$email','$titre','$ingredients')" ;
        //execution de commande insert 

        if (mysqli_query($connect,$sql)) {
            // succées
            header('location: index.php') ;

        }
        else {
            //erreuuuurr
            echo 'erreur : ' . mysqli_error($connect) ;
        }

         
        }

}
?>
<!DOCTYPE html>
    <html>
          <?php include('template/header.php'); ?>
         <section class="container grey-text">
         <h4 class="center"> Ajouter une recette </h4>
        <form class="white" action="add.php" method="POST">
        
        <label> Your Email: </label> 
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <div class="red-text"><?php echo $errors['email'] ;?> </div>
        
        <label> titre de recette : </label> 
        <input type="text" name="titre" value="<?php echo htmlspecialchars($titre) ; ?>">
        <div class="red-text"><?php echo $errors['titre'] ;?> </div>
        
        <label> les ingredients (comma separated): </label> 
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ; ?>">
        <div class="red-text"><?php echo $errors['ingredients'] ;?> </div>
        
        <div class="center">
         <input type="submit" name="submit" value="submit" class="btn brand" z-depth-0>
        </div>   



        </form>
        </section>  
         
         
          <?php include('template/footer.php'); ?>
    
  
  
  
  
        


     </html>
