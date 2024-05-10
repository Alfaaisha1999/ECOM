<?php
// session_start();
if (!isset($_SESSION['USER_LOGIN'])) {
  $userid=$_SESSION['USER_ID'];  
    $sql="select * from users where id='$userid'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $uid=$row['id']; $name=$row['name'];$mobile=$row['mobile'];$uemail=$row['email'];$pic=$row['image'];
}else{
  ?>
  <script>
   // window.location.href = 'login.php';
  </script>
<?php
}
 ?> 