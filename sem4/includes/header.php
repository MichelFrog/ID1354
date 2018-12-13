<nav class="main-nav">
        <div class="login">
            <?php if(isset($_SESSION['userId'])){
                $currentUser = $_SESSION['username'];
                echo 'Logged in as:'." ".$currentUser;
                echo 
                '<form class="logoutform" action="includes/logout.include.php" method="post">
                <button 
                        id="logoutsubmit"
                        class="logut" 
                        type="submit" 
                        name="logout-submit"> Logout </button>
                <div>
                        <p class="formMsg"></p>
                </div>
                </form>';
        }else{
        echo'
        <form class="loginform" action="includes/login.include.php" method="POST">
        <input  id="username" 
                type="text" 
                name="mailid" 
                placeholder="Email/Username..">
        <input  id="password" 
                type="password" 
                name="pwd" 
                placeholder="Enter your password..">
        <button  id="loginsubmit" 
                type="submit" 
                name="login">Login</button>
        <div>
                <p class="formMsg"></p>
        </div>
        </form>
        <a href="signup.php"><p class="signup">Signup</p></a>';
        echo'</div>';
        }
        ?>
        <?php include('includes/nav.php') ?>

        </nav>