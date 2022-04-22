<?php
  session_start();
  $conn=mysqli_connect("localhost","pma","pma","app");  
  $error = false;
  if(isset($_POST['sub'])){ 
  	  $user=$_SESSION['user'];
	  $pass1=$_POST['pass1'];     
      $pass2=$_POST['pass2']; 
      if($pass1==$pass2)
        {  
            if(isset($user)){
            $requete="UPDATE utilisateurs set password='$pass1' where  email='$user' ";
            $resultat=mysqli_query($conn,$requete);
            if($resultat==true){
                    // header('refresh:2;url=loginpage.php');
            	       echo "valider";
                     //exit;
                   }
             }}else{ 

             	 header('refresh:2;url=confirm.php');
                 $error = true;

              }   
                      
        }

  ?>
<!DOCTYPE html>
 <html>
  <head>

	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
	  <title>HTML CSS Form</title>
	  <style type="text/css"> 
		 form{
			background-color: #f2f2f2; /*CSS color picker*/
			border-radius: 30px;
			padding: 20px;
			max-width: 700px;
			height: 490px;
			margin: auto;
			box-shadow: 10px -5px 5px #197d6b;			
			border: solid #197d6b;
	   	}

		#fname, #lname, #email, #phone, #submit{
			width: 100%;
			padding: 6px 14px;
			margin-top: 4px ;
			margin-bottom: 8px;
			border: 2px solid #ccc;
			border-radius: 30px;
			box-sizing: border-box;
			
		}

		#submit{
			background-color: #4CAF50;
			color: white;
			padding: 12px 18px;
			margin-top: 8px;
			cursor: pointer;

		}

		#submit:hover{
			background-color: darkgreen;
		}

		.circle{
		  position: fixed;
		  border-radius: 50%;
		  background: white;
		  animation: ripple 15s infinite;
		  box-shadow: 0px 0px 1px 0px #508fb9;
		}

		.small{
		  width: 200px;
		  height: 200px;
		  left: -100px;
		  bottom: -50px;
		}

		.medium{
		  width: 400px;
		  height: 400px;
		  left: -200px;
		  bottom: -100px;
		}

		.large{
		  width: 600px;
		  height: 600px;
		  left: -300px;
		  bottom: -200px;
		}

		.xlarge{
		  width: 800px;
		  height: 800px;
		  left: -400px;
		  bottom: -300px;
		}

		.xxlarge{
		  width: 1000px;
		  height: 1000px;
		  left: -500px;
		  bottom: -300px;
		}

		.shade1{
		  opacity: 0.1;
		}
		.shade2{
		  opacity: 0.25;
		}

		.shade3{
		  opacity: 0.35;
		}

		.shade4{
		  opacity: 0.4;
		}

		.shade5{
		  opacity: 0.9;
		}

		@keyframes ripple{
		  0%{
		    transform: scale(0.8);
		  }
		  
		  50%{
		    transform: scale(1.2);
		  }
		  
		  100%{
		    transform: scale(0.8);
		  }
		}

		body{
                  
                  background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
                  height: 100%;
			      margin: 0;
			      background-repeat: no-repeat;
			      background-attachment: fixed;
        }

   #h1{
        		font-family:cursive;
        		font-weight: bold;
        		text-shadow:-1px -1px 0 #000, 1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000, 1px 1px 2px #141414, 1px 1px 3px #141414, 1px 1px 5px #141414, 1px 1px 7px #141414, 1px 1px 10px #141414, 1px 1px 12px #141414, 1px 1px 18px #141414;
        		color:#fff;
        		padding-top: 8%;
        		font-size: 40px
        }

	 </style>
 </head>

<body>

	<div class='ripple-background'>
		<div class='circle xxlarge shade1'></div>
		<div class='circle xlarge shade2'></div>
		<div class='circle large shade3'></div>
		<div class='circle mediun shade4'></div>
		<div class='circle small shade5'></div>
	</div>

	<div class="container"  >
		<div class="row" style="margin-top: 10%;">

			<div class="col-lg-6 col-sm-12 " style="padding-right: 5%; padding-top: 7%;  "> 
				<h1 id="h1">
       				 Pourquoi vous avez besoin d'un compte ? 
       			</h1>	<br>

           		<h3 style="font-weight: bold; font-size:32px; padding-left:18px; padding-bottom: 15px;">
                 	<i> Vous pourrez ainsi consulter : </i>
           		</h3>

            	<ol style="font-size:20px; font-weight: bold; padding-left:50px;">
	                <li>     La liste des langues définis et leurs descriptions       </li>

	                <li>     Les informations des auteurs et sources        </li>

	                <li>     La typologie des langues               </li>

	                <li>     Le système de numération en langue et le système calendaire             </li>

	                <li>     Accéder à votre éspace utilisateur               </li>

           		 </ol>

        	</div>

			<div class="col-lg-6 col-sm-12" style="padding-top: 7%;" >

				<form action="confirm.php" method="post">

                    <h1 style="padding-bottom: 5%;padding-left: 16%;font-family: Apple Chancery, cursive;"> Event Login Form </h1>
					<label for="fname"> Enter your password :</label>
					<input type="password" id="fname" placeholder="Your Password..." required name="pass1">

					<label for="lname">Confirme your Password :</label>
					<input type="password" id="lname" placeholder="Your Password..." required name="pass2">

					<input type="submit" value="Log in" id="submit" name="sub" ></br>

				    <?php if($error) 
				          echo '<div class="alert alert-danger" role="alert" style="font-size:15px!important;" >Erreur :Les mot de passe ne sont pas authentique </div>'; ?>

					<div class="container" style="font-size: 300%; padding-left: 23%;padding-top: 29px;">
							<div class="container" >
								<div class="row" >
									<div class="col-lg-12 col-sm-12" style="padding-right: 6%;  ">
								    	<a target="_blank" href="https://fr-fr.facebook.com/univsorbonneparisnord/">
								    		<i class="iconify" data-icon="entypo-social:facebook-with-circle"></i>
								    	</a>
								    	<a target="_blank" href="https://twitter.com/univ_spn?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
								    		<i class="iconify" data-icon="entypo-social:twitter-with-circle"></i>
								    	</a>
								    	<a target="_blank" href="http://pinterest.com/pin/create/button/?url=https://www.julianlloyd.me/post-flop-connections/&#038;media=https://www.julianlloyd.me/wp-content/uploads/2021/08/Post-flop.jpg&#038;description=Post-flop%20connections">
								    		<i class="iconify" data-icon="entypo-social:instagram-with-circle"></i>
								   		</a>
								    	<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&#038;title=Post-flop%20connections&#038;url=https://www.julianlloyd.me/post-flop-connections/">
								    		<i class="iconify" data-icon="entypo-social:linkedin-with-circle"></i>
								    	</a>
								    </div>
								</div>
							</div>   
						</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>