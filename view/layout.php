 <!DOCTYPE html>
 <html lang="nl">

 <head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://use.typekit.net/eeo2zqp.css">
   <title>Steal it</title>
   <?php echo $css; ?>
 </head>

 <body class="<?php if($_GET['page']!== 'home') echo 'middle';?>">
   <header class="header <?php if ($_GET['page'] === "home") {
                            echo "display-none";
                          } ?>">
     <h1 class="display-none">Steal it inc</h1>
     <div class="div-image">
       <a href="index.php?page=index" class="link-image"><img src="./assets/logo.svg" class="stealit" alt="logo"></a>
     </div>
     <a href="index.php?page=index" class="link-overview"> <span class="material-icons arrow">arrow_back</span>Terug naar overzicht</a>
   </header>
   <?php {
      echo $content;
    } ?>
   <?php echo $js; ?>
 </body>

 </html>
