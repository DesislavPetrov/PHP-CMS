<?php include "includes/init.php" ?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $uname = $_POST['username'];
        $email = $_POST['email'];
        $email_conf = $_POST['email_confirm'];
        $pword = $_POST['password'];
        $pword_conf = $_POST['password_confirm'];
        $comments = $_POST['comments'];

        if(strlen($lname)<3){
            $error[] = "Last name must be at least 3 characters long";
        }
        if(strlen($uname)<6){
            $error[] = "User name must be at least 6 characters long";
        }
        if(strlen($pword)<6){
            $error[] = "Password must be at least 6 characters long";
        }
        if($pword != $pword_conf){
            $error[] = "Passwords do not match";
        }
        if($email != $email_conf){
            $error[] = "Email addresses do not match";
        }
        
        if(count_field_val($pdo, "users", "username", $uname) != 0){
            $error[] = "Username '{$uname}' already exists";
        }
        
        if(count_field_val($pdo, "users", "email", $email) != 0){
            $error[] = "Email '{$email}' already exists";
        }

        if(!isset($error)){
            try {
                $sql = "INSERT INTO users (firstname, lastname, username, email, password, comments, validationcode, active, joined, last_login) VALUES (:firstname, :lastname, :username, :email, :password, :comments, 'test', 0, current_date, current_date)";

                $stmnt = $pdo->prepare($sql);
                $user_data = [':firstname'=>$fname, ':lastname'=>$lname,':username'=>$uname, ':email'=>$email, ':password'=>$pword, ':comments'=>$comments];
                $stmnt->execute($user_data);
                $_SESSION['message'] = "User succesfully registered";
                // we replace this code with the code on the below row "header("Location: index.php");
                redirect("index.php");
            } catch (PDOException $e){
                echo "Error: ".$e->getMessage();
            }
        }


    } else {
        $fname = "";
        $lname = "";
        $uname = "";
        $email = "";
        $email_conf = "";
        $pword = "";
        $pword_conf = "";
        $comments = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include "includes/header.php" ?>
    <body>
        <?php include "includes/nav.php" ?>


        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php
    if(isset($error)){
        foreach($error as $msg){
            echo "<p class='bg-danger text-center'>{$msg}</p>";
        }
    }
                    ?>



                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="register-form" method="post" role="form" >
                                        <div class="form-group">
                                            <input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First Name" value="<?php echo $fname ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lastname" id="lastname" tabindex="2" class="form-control" placeholder="Last Name" value="<?php echo $lname ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="3" class="form-control" placeholder="Username" value="<?php echo $uname ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="register_email" tabindex="4" class="form-control" placeholder="Email Address" value="<?php echo $email ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email_confirm" id="email-confirm" tabindex="4" class="form-control" placeholder="Confirm Email Address" value="<?php echo $email_conf ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Password" value="<?php echo $pword ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirm" id="password-confirm" tabindex="6" class="form-control" placeholder="Confirm Password" value="<?php echo $pword_conf ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="comments" id="comments" tabindex="7" class="form-control" placeholder="Comments"><?php echo $comments ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-custom" value="Register Now">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php" ?>
    </body>
</html>