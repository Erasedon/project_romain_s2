<?php
       include 'connexion.php';
       
       if(isset( $_POST['mail']) && isset( $_POST['mdp'])){
           $mail = htmlspecialchars($_POST['mail']); 
           $mdp = htmlspecialchars($_POST['mdp']);
           
           $sql = "SELECT * FROM users INNER JOIN avoir ON avoir.id_users = users.id_users
            INNER JOIN role ON role.id_role = avoir.id_role WHERE email_users = :email_users"; 
                    $prepare = $db->prepare($sql);   
                    $prepare ->execute(array(':email_users' => $mail));
                    $result = $prepare->fetch();
                    $count = $prepare->rowCount();
                    if($count > 0){
                 
                        if($mail == $result['email_users'] && password_verify($mdp,$result['mdp_users'])){
                          
                            header("Location:../../connecter.php");
                            
                        } else {
                            header("Location:../../connexion.php?id=ermailmdp");
                        }
                    } else {
                      
                        session_destroy(); 
                        header("Location:../../connexion.php?id=erexistpas");
                    }
                }else{
                    header("Location:../../connexion.php?id=ncompris");
                    
        }

?>