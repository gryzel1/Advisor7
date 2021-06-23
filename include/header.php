<div class="header">
      <div class="block container margin-auto">
        <div class="is-header">
          <div class="columns">
            <div class="column">
              <p class="advisor"><img src="img/logo.png" alt="pink" style="width:50px;margin-top:15px"> Advisor7 <?php if($_SESSION["cuid"]!="test0000")echo '<a id="addButtonMobile" class="is-hidden-desktop" style="color:white;font-size:20px;"><i class="fas fa-plus-square"></i></a><a href="modify.php" class="is-hidden-desktop" style="color:white;font-size:20px;margin-left:5px"><i class="fas fa-pen-square"></i></a>'; ?></p>
              <p class="prenom"><span class="bjr">Bonjour </span><?php echo $_SESSION["prenom"]; ?> <a href="disconnect.php" style="color:white"><i class="fas fa-sign-out-alt"></i></a></p>
            </div>
            <div class="column button-column">
              <br>
              <?php
              if($_SESSION["cuid"]!="test0000"){
                echo '<a id="addButton" class="pink-button is-hidden-touch" href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Ajouter un restaurant</a>
                <br><br>
                <a class="pink-button is-hidden-touch" href="modify.php"><i class="fas fa-pen"></i>&nbsp;&nbsp;Modifier la liste</a>';
              }
               ?>
            </div>
          </div>
        </div>
      </div>
    </div>