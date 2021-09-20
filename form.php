<!DOCTYPE html>
<html>
    <head>
        <title>PHP Form</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- imnput field validation -->
    <?php

    // define variables to empty values
    $fnameErr=$lnameErr=$emailErr=$passErr="";
    $fname=$lname=$email=$pass="";
    

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        //first name validation
        if(empty($_POST['fname']))
        {
            $fnameErr ="Name is Required";
        }else{
            $fname=$_POST['fname'];
            
            if(!preg_match("/^[a-zA-Z]*$/",$fname))
            {
                $fnameErr ="only alphabets and white space are allowed";
            }
        }

        //last name validation
        if(empty($_POST['lname']))
        {
            $lnameErr="Last name is required";
        }else{
            $lname=$_POST['lname'];

            if(!preg_match("/^[a-zA-Z]*$/",$lname))
            {
                $lnameErr="only alphabets and white space are allowed";
            }
        }

        //email validation
        if(empty($_POST['email']))
        {
            $emailErr="Email is required";
        }else{
            $email=$_POST['email'];

            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $emailErr="invalid email";
            }
        }

        //password validation
        if(empty($_POST['pass']))
        {
            $passErr="password is required";
        }else{
            if($_POST['pass']!=123456)
            {
                $passErr="invalid password";
            }
        } 
    }    
        
    ?>  

    <div class="form-box">
        <h1>PHP Sign In Form</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Enter your First Name</label>
            <span class="error"> <?php echo $fnameErr ?> </span>
            <input type="text" id="fname" name="fname" class="fname">

            <label>Enter your Last Name</label>
            <span class="error"><?php echo $lnameErr ?></span>
            <input type="text" id="lname" name="lname" class="lname">

            <label>Enter your Email</label>
            <span class="error"><?php echo $emailErr ?></span>
            <input type="text" id="email" name="email" class="email">

            <label>Enter your Password</label>
            <span class="error"><?php echo $passErr ?></span>
            <input type="password" id="pass" name="pass" class="pass">

            <button type="submit" name="submit" class="submit" id="submit">SUBMIT</button>
        </form>
    </div>
    </body>

    <div class="php-input">
        <?php
            if(isset($_POST['submit']))
            {
                if(empty($fnameErr) && empty($lnameErr) && empty($emailErr) && empty($passErr))
                {
                    echo "<h3 style='color:green;'>Form Submitted Successfully...</h3>"; 

                    echo '<h2>your input</h2>';

                    echo "First Name: ".$fname;
                    echo "<br>";
                    echo "Last Name: ".$lname;
                    echo "<br>";
                    echo "Email Add: ".$email;
                }else{
                    // echo "<h3 style='color:red;'>All inputs fields are required</h3>";
                }
            }
        ?>
    </div>  
</html>



