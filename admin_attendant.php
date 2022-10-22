<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
};

if(isset($_POST['add_attendant'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $station_name = mysqli_real_escape_string($conn, $_POST['station_name']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $previous_worked = mysqli_real_escape_string($conn, $_POST['previous_worked']);
    $tel_no = $_POST['tel_no'];
    $user_type = $_POST['user_type'];

    $select_attendants = mysqli_query($conn, "SELECT * FROM attendants WHERE email = '$email' && password = '$pass'")or die ('query failed');
    if(mysqli_num_rows($select_attendants) > 0){

      $message[] = 'attendant already exist!';

   }else{

      if($pass != $cpass){
         $message[] = 'password not matched!';
      }else{
        mysqli_query($conn, "INSERT INTO `attendants`(name, email, gender, station_name, password, previous_worked, tel_no, user_type) 
        VALUES('$name','$email','$gender', '$station_name', '$pass', '$previous_worked', '$tel_no', '$user_type')")or die('query failed');
            $message[] = 'Registration Succesfull!!';
           
      }
   }

}
?>
<!DOCTYPE html>
<html>

    <head>
       <title>Add Attendant</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> 
       <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
        <?php include 'admin_header.php'?>

         <section class="add-attendant">
            
            <form method="post" enctype="multipart/form-data">
                <h3> add station attendant</h3>
                <input type="text" name="name" class="box" placeholder=" name" required>
                <input type="email" name="email" class="box" placeholder=" email" required>
                <input type="text" name="gender" class="box" placeholder=" gender" required>
                <input type="text" name="tel_no" class="box" placeholder="+254 (0) 234567" required>
                <input type="text" name="station_name" class="box" placeholder=" assigned station name" required>
                <input type="password" name="password" class="box" placeholder="enter the password" required>
                <input type="password" name="cpassword" class="box" placeholder="confirm password" required>
                <input type="text" name="previous_worked" class="box" placeholder="previous work place" >
                <select name="user_type" id="">
                    <option value="attendant">station attendant</option>
                </select>
                <input type="submit" name="add_attendant" value="Register" class="btn">
            </form>
        </section>


       







        <script src="admin_script.js"></script>
    </body>
</html>