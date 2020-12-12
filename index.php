<?php
session_start();
include_once 'controllers/authantication.php';$admin = new Admin();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'include/head.php';
?>
<body id="mimin" class="dashboard form-signin-wrapper">
<div class="container">
    <form class="form-signin" method="post">
        <div class="panel periodic-login">
            <div class="panel-body text-center">
                <!-- <p class="atomic-mass hour"><?php echo date("H:i:s"); ?></p> -->
                <p class="element-name">Login To City Care Admin</p>
                <i class="icons icon-arrow-down"></i>
                <div align="center" style="color: red;" id="err"> </div>
                <div align="center" style="color: #12CC5C;" id="msg"></div>
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" name="username" onclick="onmouserightclick()" required>
                    <span class="bar"></span>
                    <label>Username</label>
                </div>
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" class="form-text" name="password" onclick="onmouserightclick()" required>
                    <span class="bar"></span>
                    <label>Password</label>
                </div>
                <input type="submit" class="btn col-md-12" name="Login" value="Login"/>
            </div>
           <!--
               <div class="text-center" style="padding:5px;">
                    <a href="forgotpass.html">Forgot Password </a>
                    <a href="reg.html">| Signup</a>
                </div>
            -->
        </div>
    </form>
</div>
<script>
    function onmouserightclick()
    {
        document.getElementById("err").innerHTML="";
    }
</script>
<?php
if(isset($_POST['Login'])){
    extract($_REQUEST);
    $login=$admin->check_login($username,$password);
    if($login)
    {
        ?>
        <script>
            document.getElementById("msg").innerHTML="<i class='icon icon-login'></i> Login Successfully !!!";
            window.location='dashboard.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            document.getElementById("err").innerHTML="! Invalid Login Username And Password !!!";
        </script>
        <?php
    }
}
?>
<!-- end: Content -->
<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/moment.min.js"></script>
<script src="asset/js/icheck.min.js"></script>
<!-- custom -->
<script src="asset/js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-aero',
            radioClass: 'iradio_flat-aero'
        });
    });
    $(document).ready(function() {
        var currentdate = new Date();
        var l=0;
        function callme()
        {
            currentdate = new Date();
            $('.hour').html(currentdate.getHours() + ":" +currentdate.getMinutes()+":" +currentdate.getSeconds());
            l=l+5;
        }
        window.setInterval(callme,1000);
    });
</script>
<!-- end: Javascript -->
</body>
</html>