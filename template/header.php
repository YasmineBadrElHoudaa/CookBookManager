<?php
session_start() ;
if ($_SERVER['QUERY_STRING']=='noname'){
    session_unset() ;
}
if ($_SESSION['name'] != null){
    $name = $_SESSION['name'] ;
  
}
else $name = 'user' ;
//get cookie
if ($_COOKIE['type_d_utilisation'] != null) {

    $type_d_utilisation = $_COOKIE['type_d_utilisation'] ;
}
$type_d_utilisation = 'indéfinie' ;


?>




<head>
    <title> les delices de Yasmine </title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style type="text/css">
    .brand{
        background: #cbb09c  !important ;
    }
    .brand-text{
        color: #cbb09c  !important ;
    }
    form{
        max-width: 460px ;
        margin: 20px auto ;
        padding: 20px ;
    }
    .cook{
        width: 100px ;
        margin: 40px auto -30px ;
        display: block ;
        position: relative ;
        top: -30px ;
    }
    </style>

  
</head>
<body class ="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
     <a href="index.php" class="brand-logo brand-text">les delices de Yasmine</a>
     <ul id="nav-mobile" class="right hide-on-small-and-down">
     <li class="grey-text"> bonjour <?php echo $name  ; ?> </li>
     <li class="grey-text"> (<?php echo $type_d_utilisation  ; ?>)  </li>
          <li> <a href="add.php" class="btn brand z-depth-0"> Ajouter une recette </a>  </li>
          
     </ul>  
    
    </div>

    </nav>