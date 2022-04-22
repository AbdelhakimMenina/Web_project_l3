<?php 

                $conn=mysqli_connect("localhost","pma","pma","app");  
                 $error = false; 
                 $erreur=false;
                 $message=false;
                 $err=false;
                if(isset($_POST['sub'])){
                	$requete1="select * from utilisateurs ";
                   $resultat=mysqli_query($conn,$requete1);  // execution de requette 
                   $row=mysqli_fetch_array($resultat);
                    $nom=$_POST['nom'];
                    $prenom=$_POST['prenom'];
                    $email=$_POST['email'] ;
                    $tel=$_POST['Tél']; 
                    $password=$_POST['motp'];                   
                    $genre=$_POST['gender'];
                    $subject=" Confirmation "; // on récupere les données entrées par utilisateur 
	                $message="Votre Compte à été bien Confirmer ";
	                $headers =  'From: webprojet48@gmail.com' . "\r\n" . 
	                     'Subject: $subject' . "\r\n" .
	                     'Message: $message' . "\r\n" .
	                     'MIME-Version: 1.0' . "\r\n" .
	                     'Content-type: text/html; charset=utf-8' . "\r\n" .
	                     'X-Mailer: PHP/' . phpversion();     
	                 
                    $mdplength = strlen($password);
                    $to=$email;
                    //Le mot de passe hasher
                     $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                  
                     
                 
                    if($mdplength >= 8)
                     {           
                       
                        
                            if($row['email']!= $email){
                               if(mail($to, $subject, $message, $headers))
	                                {
                                        $requete="INSERT INTO utilisateurs(name,first_name,email,password,phone,genre)  values ('$nom','$prenom','$email','$passwordHash','$tel','$genre') ";
                                        $result=mysqli_query($conn,$requete); 
                                        if($result) {  $message=true; }   
                                        }else{
                                           $erreur=true;
                                        }  
                                    }
                               else{$err=true;}
                              } else { 
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
			height: 770px;
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
        		padding-top: 10%;
        		font-size: 40px

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

	<div class="container" style="width: 80%!important;" >
		<div class="row" style="margin-top: 10%;">
			<div class="col-lg-6 col-sm-12" style="padding-right: 5%;"> 
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

			<div class="col-lg-6 col-sm-12" >

					<form action="Form.php" method="post">
                          
                        <h1 style="padding-bottom: 5%;padding-left: 5%;font-family: Apple Chancery, cursive;"> Event Registration Form </h1>
						<label for="fname">Name :</label>
						<input type="text" id="fname" placeholder="Your Name..." name="nom" required>

						<label for="lname">First Name :</label>
						<input type="text" id="lname" name="prenom" placeholder="Your First Name..." required>
						
						<label for="Email"> Email :</label>
						<input type="email" id="fname"  placeholder="Your Email..." name="email" required>

						<label for="password"> Password :</label>
						<input type="password" id="fname"  placeholder="Your password..." name="motp" required>

						<label for="Phone"> Phone :</label>
						<input type="text" id="fname" placeholder="Ex : +33 6 XX XX XX XX" name="Tél" required>

						<label>Gender :</Label> 
						<input type="radio" name="gender" value="Femme">
						<label>Female</label>

						<input type="radio" name="gender" value="Homme">
						<label>Male</label>

						<input type="submit" value="Register" id="submit" name="sub">

						<?php 
                                
                            if($error== true) {  

                               echo '<br><div class="alert alert-danger" role="alert" style="font-size:15px!important;" > Votre mot de passe doit contenir 8 caractères minimum.</div>'; 

                            }
                          if($erreur == true) {  

                               echo '<br><div class="alert alert-danger" role="alert" style="font-size:15px!important;" > Votre Email N existe Pas .</div>'; 

                            }

                            if($message==true ){ 

                               echo '<br><div class="alert alert-success" role="alert" style="font-size:15px!important;" >Votre inscription a été Bien faite </div> '; 

                            }

                            if($err==true){
                            	 echo '<br><div class="alert alert-danger" role="alert" style="font-size:15px!important;" > Ce Compte existe déja </div> '; 
                            }

                        ?>

						<p>Already registered ? <a href="Form2.php">Log in </a> </p>

						<div class="container" style="font-size: 300%; padding-left: 23%;">
							<div class="container" >
								<div class="row" >
									<div class="col-lg-12 col-sm-12" style="padding-right: 6%;  ">
								    	<a target="_blank" href="https://fr-fr.facebook.com/univsorbonneparisnord/">
								    		<i class="iconify" data-icon="entypo-social:facebook-with-circle"></i>
								    	</a>

						    

						    
								    	<a target="_blank" href="https://twitter.com/univ_spn?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
								    		<i class="iconify" data-icon="entypo-social:twitter-with-circle"></i>
								    	</a>
						    

						    
								    	<a target="_blank" href="https://www.instagram.com/univ_spn/">
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