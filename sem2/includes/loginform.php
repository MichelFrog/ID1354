<?php if(isset($_SESSION['userId'])){
    $currentUser = $_SESSION['username'];
    echo 'Logged in as:'." ".$currentUser;
    echo '<form action="includes/logout.include.php" method="post">
          <button class="logut" type="submit" name="logout-submit"> Logout </button>
         </form>';
    }
    else {
    echo '<form action="includes/login.include.php" method="post">
        <input type="text" name="mailid" placeholder="Email/Username..">
        <input type="password" name="pwd" placeholder="Enter your password..">
         <button class="login" type="submit" name="login-submit"> Login </button>
     </form>
     <a href="signup.php"><p class="signup">Signup</p></a>';
    }
    ?>

