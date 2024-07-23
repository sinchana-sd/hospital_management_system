<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Doctors</title>
</head>
<body>
    <?php
        include("../include1/header.php");
        include("../include1/connection.php");

    ?>
    <div class="container-field">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php

                    include("sidenav.php");

                    ?>

                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Total Doctors</h5>
                    <?php

                        $query = "SELECT * FROM doctors WHERE status = 'Approved' ORDER BY data_reg ASC";

                        $res = mysqli_query($connect,$query);

                        $output = "";

$output .= "
<table class='table table-bordered'>
    <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Surname</th>
        <th>Username</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Country</th>
        <th>Salary</th>
        <th>Date Register</th>
        <th>Action</th>
    </tr>
";

if (mysqli_num_rows($res) < 1)
{
    $output .= "
        <tr>
        <td colspan ='10' class='text-center'>No job Request Yet.</td>
        </tr>
    ";
}

while($row = mysqli_fetch_array($res))
{
    $output .= "
        <tr>
            <td>" .$row['id']."</td>
            <td>" .$row['fname']."</td>
            <td>" .$row['sname']."</td>
            <td>" .$row['username']."</td>
            <td>" .$row['gender']."</td>
            <td>" .$row['phone']."</td>
            <td>" .$row['country']."</td>
            <td>" .$row['salary']."</td>
            <td>" .$row['data_reg']."</td>
            <td>
                <a href='edit.php?id=".$row['id']."'>
                    <button class='btn btn-info'>Edit</button>
                </a>
            </td>
        
    ";
}

    $output .= "
    </tr>
    </table>
    
    ";
    echo $output;

                    ?>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>