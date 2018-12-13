<?php if(isset($_SESSION['userId'])){
    $currentUser = $_SESSION['username'];
    echo 'Logged in as:'." ".$currentUser;
    echo '<form action="includes/logout.include.php" method="post">
          <button class="logut" type="submit" name="logout-submit"> Logout </button>
          <p id="form-mesage"></p>
          </form>';
    }
    else {
    echo '<form id="login-form" action="includes/login.include.php" method="POST">
        <input id="username" type="text" name="mailid" placeholder="Email/Username..">
        <input id="password" type="password" name="pwd" placeholder="Enter your password..">
        <button id="submit" type="submit" name="login"> Login </button>
        <p class="form-mesage"></p>
     </form>
     <a href="signup.php"><p class="signup">Signup</p></a>';
    }
    ?>

