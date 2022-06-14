<?php
       include '../db/connexion.php';
$id_users =$_GET['id']; //


if(isset( $_POST['addtitre']) && isset( $_POST['addurl']) && isset( $_POST['addchemind'])){
    $addtitre = htmlspecialchars($_POST['addtitre']); 
    $addurl = htmlspecialchars($_POST['addurl']); 
    $addchemind = htmlspecialchars($_POST['addchemind']);
   $adddate= htmlspecialchars($_POST['adddate']);
   $id_project = htmlspecialchars($_POST['upid']);  

    $sql = "SELECT * FROM project WHERE url_project = :addurl";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':addurl' => $addurl));    
    $count = $prepare->rowCount();

    if ( $count == 1) {
      while($result = $prepare->fetch()) {
        if($addurl == $result['url_project']){
          header("Location:../../connecter.php?id=erreurexist");
        }
      }
    }
          
    if($count == 0){  
    
 
              
      $sql = "INSERT INTO project (titre_project, img_project, url_project, date_project, id_users) VALUES ( :titre_project, :img_project, :url_project, :date_project, :id_users )"; 
      $prepare = $db->prepare($sql);   
      $prepare ->execute(array(':titre_project'=>$addtitre, ':img_project' => $addurl, ':url_project' => $addchemind, ':date_project' => $adddate, ':id_users' => $id_users  ));

          header("Location: ../../connecter.php?id=succesinscrit");
    
    }
  } else {
    if(isset( $_POST['uptitre']) && isset( $_POST['upurl']) && isset( $_POST['upchemind'])){
      $uptitre = htmlspecialchars($_POST['uptitre']); 
      $upurl = htmlspecialchars($_POST['upurl']); 
      $upchemind = htmlspecialchars($_POST['upchemind']);
     $update= htmlspecialchars($_POST['update']);
     $id_project = htmlspecialchars($_POST['upid']);
    
  
      $sql = "SELECT * FROM project WHERE titre_project= :uptitre and url_project= :upchemind and img_project= :upurl ;";
      $prepare = $db->prepare($sql);   
      $prepare ->execute(array(':uptitre' => $uptitre, ':upurl' => $upurl , ':upchemind' => $upchemind));    
      $count = $prepare->rowCount();
  
      if ( $count == 1) {
        while($result = $prepare->fetch()) {
          if($upurl == $result['url_project']){
            header("Location:../../connecter.php?id=erreurexistup");
          }
        }
      }
            
      if($count == 0){  
    
                
        $sql = "UPDATE  project  SET  titre_project =:titre_project , img_project =:img_project , url_project =:url_project , date_project =:date_project , id_users =:id_users WHERE id_project = :id_project"; 
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array(':titre_project'=>$uptitre, ':img_project' => $upurl, ':url_project' => $upchemind, ':date_project' => $update, ':id_users' => $id_users ,"id_project"=>$id_project ));
          
            header("Location: ../../connecter.php?id=successup");
      
      }
    } else {
      if($_POST["delete"]){
        $id_project = htmlspecialchars($_POST['delid']);
        $sql = "DELETE FROM project WHERE id_project = :id_project"; 
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array("id_project"=>$id_project ));
        header("Location: ../../connecter.php?id=successdel");
       
      }else{
        header("Location: ../../connecter.php?id=erreurm");
      }
    }
  }
  


