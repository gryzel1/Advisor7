<div class="header">
      <div class="block container margin-auto">
        <div class="is-header">
          <div class="columns">
            <div class="column">
              <span style="float:left;padding-right:10px"> <img src="img/logo7.png" alt="Advisor7" style="height:70px;margin-top:25px"></span>
              <p class="advisor" style="padding-top:20px"> Advisor7 <?php if($_SESSION["cuid"]!="test0000")echo '<a id="addButtonMobile" class="is-hidden-desktop" style="color:white;font-size:20px;"><i class="fas fa-plus-square"></i></a><a href="modify.php" class="is-hidden-desktop" style="color:white;font-size:20px;margin-left:5px"><i class="fas fa-pen-square"></i></a>'; ?></p>
              <p class="prenom is-hidden-touch" style="margin-top:-20px"><span class="bjr">Bonjour </span><?php echo $_SESSION["prenom"]; ?> <a href="disconnect.php" style="color:white"><i class="fas fa-sign-out-alt"></i></a></p>
              <p class="prenom is-hidden-desktop" style="margin-top:-20px;font-size:20px;"><span class="bjr">Bonjour </span><?php echo $_SESSION["prenom"]; ?> <a href="disconnect.php" style="color:white"><i class="fas fa-sign-out-alt"></i></a></p>
            </div>
            <div class="column button-column" style="margin-top:5px;text-align:right">
              <br>
              <?php
              if($_SESSION["cuid"]!="test0000"){
                echo '<a id="addButton" class="pink-button is-hidden-touch" href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Proposer un restaurant</a>
                <br><br>
                <a class="pink-button is-hidden-touch" href="modify.php"><i class="fas fa-clipboard-list"></i>&nbsp;&nbsp;Consulter la liste</a>';
              }
               ?>
            </div>
          </div>
        </div>
      </div>
    </div>