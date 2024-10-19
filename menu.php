<?php
if(session_status()==1)session_start();

?>
<nav class="navbar navbar-dark navbar-expand-md bg-success">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa fa-user"></i>&nbsp;Demo App</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    
                    <?php if(isset($_SESSION["UID"])){?>
                    <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="todolists.html">ToDo Lists</a></li>
                    <li class="nav-item"><a class="nav-link" href="assets/phpscript/Logout.php">Logout</a></li>

                    <?php } else { ?>
                    <li class="nav-item"><a class="nav-link active" href="login.html">Login</a></li>
                    <li class="nav-item"><a class="nav-link active" href="signup.html">New User ?</a></li>

                    <?php } ?>
                    

                </ul>
            </div>
        </div>
    </nav>