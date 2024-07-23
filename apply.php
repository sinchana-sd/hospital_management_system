<?php

    include("include1/connection.php");
    if(isset($_POST['apply']))
    {
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $password = $_POST['pass'];
        $confirm_password = $_POST['con_pass'];

        $error = array();
        if(empty($fname))
        {
            $error['apply'] = "Enter firstname";
          
        }
        else if(empty($sname))
        {
            $error['apply'] = "Enter Surname";
        }
        else if(empty($uname))
        {
            $error['apply'] = "Enter username";
        }
        else if(empty($email))
        {
            $error['apply'] = "Enter Email address";
        }
        else if(empty($gender))
        {
            $error['apply'] = "Select your gender";
        }
        else if(empty($phone))
        {
            $error['apply'] = "Enter Phone number";
        }
        else if(empty($country))
        {
            $error['apply'] = "Select Country";
        }
        else if(empty($password))
        {
            $error['apply'] = "Enter Password";
        }
        else if($confirm_password != $password)
        {
            $error['apply'] = "Both Password do not match";
        }

    if(count($error) == 0)
    {
        $query = "INSERT INTO doctors (fname,sname,username,email,gender,phone, country, password, salary,data_reg, status, profile) 
        VALUES('$fname','$sname','$uname','$email','$gender','$phone','$country','$password','0',NOW(),'Pending','doctor1.jpg')";

        $result = mysqli_query($connect,$query);

        if($result)
        {
            echo "<script>alert('You have Successfully')</script>";
            header("Location:doctorlogin.php");
            exit();
        }
        else{
            echo "<script>alert('Failed')</script>";
        }

    }

    }
    if(isset($error['apply']))
    {
        $s = $error['apply'];
        $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
    }
    else{
        $show = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-image:url(images/hospital.jpg);backgroung-repeat:no-repeat;background-size:cover;">
    <?php
        include("include1/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                    <h5 class="text-center">Apply Now</h5>
                    <div>
                        <?php
                           echo $show;

                        ?>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" name="fname" class="form-control"
                            autocomplete="off" placeholder="Enter First name" value="<?php
                            if(isset($_POST['fname'])) echo $_POST['fname'];?>">
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control"
                            autocomplete="off" placeholder="Enter Surname" value="<?php
                            if(isset($_POST['sname'])) echo $_POST['sname'];?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control"
                            autocomplete="off" placeholder="Enter Username" value="<?php
                            if(isset($_POST['uname'])) echo $_POST['uname'];?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                            autocomplete="off" placeholder="Enter Email address" value="<?php
                            if(isset($_POST['email'])) echo $_POST['email'];?>">
                        </div>
                        <div class="from-group">
                            <label>Select Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="tel" name="phone" class="form-control" pattern="[0-9]{10}" maxlength="10"
                            autocomplete="off" placeholder="Enter Phone number" value="<?php
                            if(isset($_POST['phone'])) echo $_POST['phone'];?>" required>
                        </div>
                        <div class="from-group">
                            <label>Select Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                                <option value="Germany">Germany</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control"
                            autocomplete="off" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control"
                            autocomplete="off" placeholder="Enter confirm Password">
                        </div>
                        <input type="submit" name="apply" value="Apply now" class="btn btn-success">
                        <p>I already have an account <a href="doctorlogin.php"></a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>

    </div>
    
</body>
</html>