<br><br><br><br><br>
<?php
    include("connection.php");
?>

<?php
    if (isset($_POST['searchdata']))
    {  
        $search1 = $_POST['search'];

        $quary = "SELECT * FROM info  where employeeid  = '$search1' ";
        $data1 = mysqli_query($conn, $quary);
        $result1 = mysqli_fetch_assoc($data1);

        // $namee = $result1['name'];
        // echo $namee;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center">

        <form action="" method="POST" class="form1">
        <h1>Employee Data Enty Automation Software</h1>
        <div class="form">
            <input type="text"  name="search" class="textfild" placeholder="Search ID"
            value="<?php if (isset($_POST['searchdata'])){echo  $result1['employeeid'];}?>">

            <input type="text"  name="name" class="textfild"  placeholder="Employee name " accordion 
            value="<?php if (isset($_POST['searchdata'])){echo  $result1['emp_name'];}?>" >

            <select name="gender" id="" class="textfild">
                    <option value="No Selection">Select Gender</option>
                    <option value="Male"
                    <?php
                        if ($result1['gender']=='Male'){
                            echo "selected";
                        }
                    ?>
                    >Male</option>
                    <option value="Female" 
                    <?php
                        if ($result1['gender']=='Female'){
                            echo "selected";
                        }
                    ?>
                    >Female</option>
                    <option value="Other"
                    <?php
                        if ($result1['gender']=='Other'){
                            echo "selected";
                        }
                    ?>
                    >Other</option> 
            </select>
            <input type="text" name="email" class="textfild" placeholder="Enter Your Email" value="<?php if (isset($_POST['searchdata'])){echo  $result1['email'];}?>">

            <select name="department" id=""  class="textfild">
                    <option value="No Department">Enter Department</option>

                    <option value="ICT" 
                    <?php
                            if ($result1['department']=='ICT'){
                                echo "selected";
                            }
                        ?>
                        >ICT</option>

                    <option value="WEB"
                    <?php
                            if ($result1['department']=='WEB'){
                                echo "selected";
                            }
                        ?>
                        >WEB</option>

                    <option value="Hotel Turisoum"
                    <?php
                            if ($result1['department']=='Hotel Turisoum'){
                                echo "selected";
                            }
                        ?>
                    >Hotel Turisoum</option>

                    <option value="Digital Marketing" 
                    <?php
                            if ($result1['department']=='Digital Marketing'){
                                echo "selected";
                            }
                        ?>
                    >Digital Marketing</option>

            </select>


            <textarea  style="height: 80px;"  name="address"  class="textfild" placeholder="Enter Address" ><?php if (isset($_POST['searchdata'])){echo  $result1['emp_address'];} ?></textarea>     

            <input type="submit" name="searchdata" value="Search" class="btn" style="background-color: green;">
            <input type="submit" name="save" value="Save" class="btn" style="background-color:teal ;">
            <input type="submit" name="update" value="Update" class="btn" style="background-color: springgreen;">
            <input type="submit" name="delete" value="Delete" class="btn" style="background-color: red;" onclick="return checkdelete()">
            <input type="submit" name="" value="Clear" class="btn" style="background-color: turquoise;">




        </div>
        </form>
    </div>

    
</body>
</html>



<script>
    function checkdelete()
    {
        return confirm('Are you sure you want to delete this record ?')
    }
</script>
 
<?php


if (isset($_POST['save']))
{
    //$id          =$_POST['search'];
    $name        =$_POST['name'];
    $gender      =$_POST['gender'];
    $email       =$_POST['email'];
    $department  =$_POST['department'];
    $address     =$_POST['address'];

    $quary ="insert into info (emp_name, gender,email, department, emp_address)
    values('$name', '$gender', '$email', '$department', '$address')";
    $data = mysqli_query($conn, $quary);
    if($data)
    {
       
       echo "<script> alert('Data is saved into the Database') </script>" ;
    }
    else
    {
        echo "Data is Not Saved";
        echo "<script> alert('Data is Failed Saved') </script>" ;

    }



}
?>





<?php
    if (isset($_POST['delete']))
    {
        $ide = $_POST['search'];
        $quary1= "DELETE FROM info WHERE employeeid ='$ide' ";
        $data = mysqli_query($conn, $quary1);
        if ($data){
            echo "<script> alert('Record Delete') </script>" ;

        }
        else{
                        echo "<script> alert('Record Not DElete') </script>" ;

        }
    }
?>


<?php
 if (isset($_POST['update']))
 {
    $id          =$_POST['search'];
    $name        =$_POST['name'];
    $gender      =$_POST['gender'];
    $email       =$_POST['email'];
    $department  =$_POST['department'];
    $address     =$_POST['address'];

    $quary2 = "UPDATE info SET  emp_name = '$name' , gender = '$gender', email = '$email', department = '$department' , emp_address = '$address' WHERE employeeid = '$id'";
    
    $data = mysqli_query($conn, $quary2);
        if ($data){
            echo "<script> alert('Record Update Successfully') </script>" ;

        }
        else{
            echo "<script> alert('Please wait a bit then try again') </script>" ;

        }
 }
?>










