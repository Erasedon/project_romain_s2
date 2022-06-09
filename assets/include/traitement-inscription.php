<?php
require_once ('../../vendor/autoload.php');

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;


  include ('connexion.php');



  if(isset( $_POST['mail']) && isset( $_POST['mdp']) && isset( $_POST['Pseudo'])){
    $Pseudo = htmlspecialchars($_POST['Pseudo']); 
    $mail =  htmlspecialchars($_POST['mail']); 
    $mdp =  htmlspecialchars($_POST['mdp']);

    $sql = "SELECT * FROM users WHERE email_users = :email_users";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':email_users' => $mail));    
    $count = $prepare->rowCount();

    if ( $count == 1) {
      while($result = $prepare->fetch()) {
        if($mail == $result['email_users']){
          header("Location:../../inscription.php?id=erreurexist");
        }
      }
    }
          
    if($count == 0){  
    
      $mdp = password_hash( $mdp, PASSWORD_DEFAULT);
              
      $sql = "INSERT INTO users (pseudo_users, email_users, mdp_users) VALUES (:pseudo_users, :email_users, :mdp_users )"; 
      $prepare = $db->prepare($sql);   
      $prepare ->execute(array(':pseudo_users'=>$Pseudo, ':email_users' => $mail, ':mdp_users' => $mdp  ));

      $count1 = $prepare->rowCount();  
        if($count1 >= 1){
          $sql1 = "SELECT * FROM users  WHERE email_users = :email_users";
          $prepare1 = $db->prepare($sql1);   
          $prepare1 ->execute(array(':email_users' => $mail)); 
          while($row = $prepare1->fetch()){
            $sql = "INSERT INTO avoir (id_users) VALUES (:id_users)"; 
            $prepare = $db->prepare($sql);   
            $prepare ->execute(array(':id_users'=>$row['id_users'])); 
  
          }
          header("Location: ../../inscription.php?id=succesinscrit");
        } else { 
          header("Location: ../../inscription.php?id=succesinscrit");
        }
    }
  } else {
    header("location: ../../inscription.php?id=erreurm");
  }
  


 

// $sql = "SELECT * FROM users WHERE email_users = ? and mdp_users = ?";
// $prepare = $db->prepare($sql);   
// $prepare ->execute([$mail, $mdp]);

// $result = $prepare->fetch();


?>