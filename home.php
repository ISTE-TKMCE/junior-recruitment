<?php
include('includes/config.php');
if(isset($_POST['submit']))
{

// $file = $_FILES['image']['name'];
// $file_loc = $_FILES['image']['tmp_name'];
// $folder="images/"; 
// $new_file_name = strtolower($file);
// $final_file=str_replace(' ','-',$new_file_name);

$name=$_POST['name'];
$email=$_POST['email'];
$branch=$_POST['branch'];
$batch=$_POST['batch'];
$mobileno=$_POST['mobileno'];
$prefa=$_POST['pref1'];
$prefb=$_POST['pref2'];
$prefc=$_POST['pref3'];
$prefd=$_POST['pref4'];
$why=$_POST['why'];
$text=$_POST['text'];


if(strlen((string)$mobileno)!=10){
    echo "<script type='text/javascript'>alert('Wrong Number, Retry');</script>";
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else{
// echo("$name,$email,$branch,$batch,$mobileno,$prefa,$prefb,$prefc,$prefd,$why,$text");

// if(move_uploaded_file($file_loc,$folder.$final_file))
// 	{
// 		$image=$final_file;
//     }
// $notitype='Create Account';
// // $reciver='Admin';
//  $sender=$email;

    
$sql ="INSERT INTO `users`(`name`, `email`, `branch`, `batch`, `mobile`, `prefa`, `prefb`, `prefc`, `prefd`, `why`, `text`, `status`) VALUES (:name, :email, :branch, :batch, :mobileno, :prefa, :prefb, :prefc, :prefd, :why, :text, 0)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':branch', $branch, PDO::PARAM_STR);
$query-> bindParam(':batch', $batch, PDO::PARAM_STR);
$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
$query-> bindParam(':prefa', $prefa, PDO::PARAM_STR);
$query-> bindParam(':prefb', $prefb, PDO::PARAM_STR);
$query-> bindParam(':prefc', $prefc, PDO::PARAM_STR);
$query-> bindParam(':prefd', $prefd, PDO::PARAM_STR);
$query-> bindParam(':why', $why, PDO::PARAM_STR);
$query-> bindParam(':text', $text, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
  $hello="Hello";
    $subject = "ISTE Welcomes You";
    $msg = "Thank you for being an applicant of Junior Execom recruitment of ISTE students' chapter TKMCE. 
    We hope you and your family are doing well amidst these challenging  times.
    You have applied for the positions of ($prefa,$prefb,$prefc,$prefd) as your 1st ,2nd ,3rd and 4th preferences respectively.We want to let you know that we are in the process of reviewing your application. We are quite touched with your passion and hunger to lead,learn and grow.  You can ask all the doubts and other questions regarding this. We will be happy to help you. 
    <br>Please join the WhatsApp through the link :https://chat.whatsapp.com/F0CZ3PKMHGaCt1erwzuSkh<br>
    We will let you know about the interview and other details regarding the selection process via  this WhatsApp group.
    We look forward to see you soon.<br>Sincerely <br>
    Bhagyasree.V.S<br>
    Chairperson <br>
    ISTE Students chapter TKMCE";
    // Content-Type helps email client to parse file as HTML 
    // therefore retaining styles
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $message = "<html>
    <head>
        <title>Thankyou</title>
    </head>
    <body>
      <p>".$hello." ".$name."</p>
      <p></p>
      <br>
        <h1>" . $subject . "</h1>
        <p>.$msg.</p>
    </body>
    </html>";
  if (mail($email, $subject, $message, $headers)) {
//   echo "<script type='text/javascript'>alert('Email Sent');</script>";
  }else{
    echo("$name,$email,$subject,$message,$headers");
    echo "<script type='text/javascript'>alert(".$email." ".$subject." ".$message." ".$headers.");</script>";
  }
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}

}
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <title>Registration | ISTE JUNIOR EXECOM</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

    <link rel="stylesheet" href="css/trial.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/styles.css">
	  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,600;1,700&display=swap" rel="stylesheet"> 
    <script type="text/javascript">
    

// 	function validate()
//         {
//             var extensions = new Array("jpg","jpeg");
//             var image_file = document.regform.image.value;
//             var image_length = document.regform.image.value.length;
//             var pos = image_file.lastIndexOf('.') + 1;
//             var ext = image_file.substring(pos, image_length);
//             var final_ext = ext.toLowerCase();
//             for (i = 0; i < extensions.length; i++)
//             {
//                 if(extensions[i] == final_ext)
//                 {
//                 return true;
                
//                 }
//             }
//             alert("Image Extension Not Valid (Use Jpg,jpeg)");
//             return false;
//         }
        
// </script>
</head>

<body style="font-family: 'Montserrat', sans-serif;">
    <header>
    <?php include('includes/header.php');?>
</header>
<br><br><br>
	<div class="login-page bk-img">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                        <h1 class="text-center text-bold mt-2x">Register</h1>
                        <h4 class="text-center mt-2x">Personal Details</h4>
                        <div class="hr-dashed"></div>
						<div class="well row pt-1x pb-2x bk-light text-center">
                         <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Name<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="name" class="form-control input" required>
                            </div>
                            <label class="col-sm-1 control-label">Email<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">Branch<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="branch" class="form-control input" placeholder="Eg: Mechanical" required>
                            </div>
                            
                            
                            <label class="col-sm-1 control-label">Batch<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="batch" class="form-control" required>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Phone<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="number" name="mobileno" class="form-control" required>
                            </div>
                            </div>
                            <h4 class="text-center mt-2x">Recruitment Details</h4><br>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">&nbsp;1<sup>st</sup> Pref<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="pref1" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Documentation">Documentation</option>
                            <option value="Co Designer">Co Designer</option>
                            <option value="Public">Public Relations</option>
                            <option value="Student">Student Rep</option>
                            <option value="Programme Coordinator">Programme Coordinator</option>
                            <option value="Registration">Registration</option>
                            <option value="Finance Manager">Finance Manager</option>
                            <option value="Technical">Technical Support</option>
                            <option value="Web">Web Team</option>
                            </select>
                            </div>
                            <label class="col-sm-1 control-label">&nbsp;2<sup>nd</sup> Pref<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="pref2" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Documentation">Documentation</option>
                            <option value="Co Designer">Co Designer</option>
                            <option value="Public">Public Relations</option>
                            <option value="Student">Student Rep</option>
                            <option value="Programme Coordinator">Programme Coordinator</option>
                            <option value="Registration">Registration</option>
                            <option value="Finance Manager">Finance Manager</option>
                            <option value="Technical">Technical Support</option>
                            <option value="Web">Web Team</option>
                            </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">&nbsp;3<sup>rd</sup> Pref<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="pref3" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Documentation">Documentation</option>
                            <option value="Co Designer">Co Designer</option>
                            <option value="Public">Public Relations</option>
                            <option value="Student">Student Rep</option>
                            <option value="Programme Coordinator">Programme Coordinator</option>
                            <option value="Registration">Registration</option>
                            <option value="Finance Manager">Finance Manager</option>
                            <option value="Technical">Technical Support</option>
                            <option value="Web">Web Team</option>
                            </select>
                            </div>
                            <label class="col-sm-1 control-label">&nbsp;4<sup>th</sup> Pref<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="pref4" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Documentation">Documentation</option>
                            <option value="Co Designer">Co Designer</option>
                            <option value="Public">Public Relations</option>
                            <option value="Student">Student Rep</option>
                            <option value="Programme Coordinator">Programme Coordinator</option>
                            <option value="Registration">Registration</option>
                            <option value="Finance Manager">Finance Manager</option>
                            <option value="Technical">Technical Support</option>
                            <option value="Web">Web Team</option>
                            </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <br>
                            <label class="col-sm-4 col-lg-12 alignment" >Why ISTE?<span style="color:red">*</span><br></label>
                            <br>
                            <div class="col-sm-5 col-lg-12">
                            <textarea class="form-control" rows = "5" name = "why"></textarea><br>
                            </div>
                            <br><br>
                            <label class="col-sm-4 col-lg-12 alignment">Tell us why you will be favorable for this position<span style="color:red">*</span><br></label>
                            <br>
                            <div class="col-sm-5 col-lg-12">
                            <textarea class="form-control" rows = "5" name = "text"></textarea><br>
                            </div>
</div>
                        

                            <!-- <div class="form-group">
                            <label class="col-sm-1 control-label">&nbsp;Gender<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="gender" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                            </div>

                             <div class="form-group">
                            <label class="col-sm-1 control-label">Avtar<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <div><input type="file" name="image" class="form-control"></div>
                            </div>
                            </div>-->

								<br>
                                <button class="btn btn-primary" name="submit" type="submit">Register</button>
                                </form>
                                <br>
                                <br>
								<!-- <p>Login as a Admin <a href="admin/index.php" >Admin</a></p> -->
							</div>
						</div>
				</div>
			</div>
        </div>
        <footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <br><br><br>
                    <img src="./images/logo1.png">
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-4">
                    <h3> Contact </h3>
                    <ul>
                        <br/>
                        <li>
                            <p>Fardeen Khan K 7356334434</p>
                        </li>
                        <li>
                            <p>Sreelekshmi N S 8547282695</p>
                        </li>
                    </ul>
                </div>
               
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
                          
    <div class="footer-bottom">
        <div class="container">
            <center><p class=" copyright text-center" style="text-align:center;"> &copy Designed and Developed by 404 ISTE </p></center>
       
        </div>
    </div>
    <!--/.footer-bottom--> 

</footer>
    </div>

    
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>
</html>