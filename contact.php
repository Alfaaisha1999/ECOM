<?php require('top.php');

// if(isset($_POST['send']))
// {
// // getting Post values
// $name=get_safe_value($con,$_POST['name']);
// $email=get_safe_value($con,$_POST['email']);
// $mobile=get_safe_value($con,$_POST['mobile']);
// $comment=get_safe_value($con,$_POST['message']);
// $uip = $_SERVER ['REMOTE_ADDR'];
// date_default_timezone_set('Asia/Kolkata');
// date_default_timezone_get();
// $date=date('d-m-y H:i:s a');
// $isread=0;
// //echo $name,$email,$phoneno,$subject,$message,$uip,$isread;
// // Insert quaery 
// $query=mysqli_query($conn,"INSERT INTO `contactdata`(`name`, `email`, `mobile`, `subject`, `message`, `user_ip`, `date`, `read`) VALUES('$name','$email','$phoneno','$subject','$message','$uip','$date','$isread')");

//     if ($query) {
        
//       //  echo "<script>alert('New record created successfully');</script>";
        
// //mail function for sending mail
// $to= 'info@capablehub.in';
// $headers .= "MIME-Version: 1.0"."\r\n";
// $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
// $headers .= "From:".$email."\r\n";
// $body.="<html></body><div>
// <div><b>Name:</b> $name,</div>
// <div><b>Phone Number:</b> $phoneno,</div>
// <div><b>Email Id:</b> $email,</div>";
// $body.="<div style='padding-top:8px;'><b>Message :</b>$message</div><div></div></body></html>";
// if(mail($to,$subject,$body,$headers)){
// //mail function for replying  mail to user

//     $to= "echo '$email'";
//     $sub="welcome '$name' You For contact Us" ;
//     $headers .= "MIME-Version: 1.0"."\r\n";
//     $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
//     $headers .= "From:no-reply@capablehub.in "."\r\n";
//     $headers .= "Reply-To:info@capablehub.in "."\r\n";
//     $messagebody.=' <html><body> 
//         <h1>Thanks you '.$name.' for Contact us!</h1> 
//        <p>We Will Get Back to You soon! for you valuable Responce. Enjoy Services <a href="https://www.capablehub.in">Clic Here!</a>  And explore Kistfree World.</p>
//     </body> 
//     </html>';
//     $mail=mail($to,$sub,$messagebody,$headers);
// if(($mail)>0){
// echo "<script>alert('Thank you $name for contact we will Get Back to you soon.');window.location.href='../contact.php'</script>";
// }
// }
// }
// else
// {
// echo "<script>alert('Something went wrong. Please try again');window.location.href='../contact.php'</script>";}
// }
?>
<section ><!----------this a cotacts area----------->
  <h3 class="center-align">Contact Us</h3>
  <div class="row fontpara"><div class="col s8 m6 l4 offset-s2 offset-m3 offset-l4"><hr></div></div>
  <div class="row ">
    <div class="col s12 m6 l6">
    <div class="card">
        <div class="row">
          <div class="col s12">
            <div class="icon-block">
              <h2 class="center light-black-text"><i class="material-icons medium">mail</i></h2>
              <h4 class="center">We Are Here! You Can Contact</h4>
              <p class="light center contact" style="margin:auto;padding:0 10px;"><i class="material-icons"></i>You Have any Questions send Them We will resolve your query or Have any Suggetion send to me
              we Value your appreciation most of the Relationship.</p>
            </div>
          </div>
          <div class="col s12 contact">
            <ul class="collapsible">
              <li>
                <div class="collapsible-header"><i class="material-icons">place</i> Plot No. Z-20 FF-4 Badri Mahal, Zone-I, M.P.Nagar,Bhopal, Madhya Pradesh 462011</div>
                <div class="collapsible-body "><span>This is a corporate address of Capablehub Private Limited.</span></div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">mail</i>For Information &nbsp;<a href="mailto:info@capablehub.in" class="black-text">info@capablehub.in</a></div>
                <div class="collapsible-body"><span>Email to Capablehub Pvt.Ltd. on this email id for any inquiry for service and suggetions.</span></div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">mail</i>For Help & Support &nbsp;<a href="mailto:support@capablehub.in" class="black-text">support@capablehub.in</a></div>
                <div class="collapsible-body"><span>Email to Capablehub Pvt.Ltd. on this email id for any inquiry service help or suggetions.</span></div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">phone_iphone</i><a href="tel:+91-8982337072" class="black-text">+91-8982337072</a></div>
                <div class="collapsible-body"><span>This is Contact Number of Capablehub Pvt.Ltd. and Whatsapp Messages also available.</span></div>
              </li>
            </ul>
          </div>
          <div class="col s12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14664.67043645229!2d77.434272!3d23.2369871!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbc2cadea08370204!2sCAPABLE%20HUB%20PRIVATE%20LIMITED!5e0!3m2!1sen!2sin!4v1659696365752!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="col s12 m6 l5 center"> <!---contact-form---->
      <div class="card-panel">
        <h5 class="center">Write! Your Message.</h5>
        <form method="post" action="" id="contact-form">

        <div class="input-field col s12">
              <input  id="name" type="text" name="name" class="">
              <label for="name">Enter Your Name</label>
              <small class="left"></small>
            </div>

            <div class="input-field col s12">
              <input id="email" type="email" name="email" class="validate">
              <label for="email">Enter Your Email</label>
              <small class="left"></small>
            </div>

            <div class="input-field col s12">
              <input id="mobile" type="tel" name="mobile" maxlength="10" pattern="[6789][0-9]{9}" class="validate">
              <label for="mobile" class="contactfont">Enter Your Mobile</label>
              <small class="left"></small>
            </div>


            <div class="input-field col s12">
              <textarea id="messages" class="materialize-textarea" name="message"></textarea>
              <label for="messages">Enter Your Message</label>
              <small class="left"></small>
            </div>
            <div id="myalert"></div>
            <div class="center">
              <button type="submit" id='sendContact' class="btn btn-medium waves-effect waves black">Send Messages</button>
            </div>
          <!--input id="sendContact" class="btn btn-medium waves-effect waves-light " type="submit" value="Send"-->
        </form>
      </div>   
    </div><!---contact-form end---->
  </div>
</section>
<?php require('footer.php');
?>