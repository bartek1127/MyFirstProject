<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My first project/ Bartek </title>
    </head>
    <h3>Voer een tekst in</h3>
    <body>
      <form action="Presenter.php" method="post">
          <input type="text" name="naam" />
          <input type = "submit" value="submit"/>
                    
      </form>
        <?php
        
        echo $viewData["palindroom"];
        echo "<br>";
        echo $viewData["message"];
        echo "<br>";
         echo $viewData["action"];
        ?>
    </body>
</html>
