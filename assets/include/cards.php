<?php
include 'assets/db/connexion.php'; 

	$sql = "SELECT * FROM project"; 
	// $sql = "SELECT id_users FROM project"; 
	$prepare = $db->prepare($sql);   
		 $prepare ->execute();
		 $result = $prepare->fetchall(); 
         ?>

<div class="containers">
    <div class="titre">
        <h2>Les projets </h2>
    </div>  
    <div class="sous-container"> 
    <?php 
	 foreach ($result as $row){
 
?> 
        <div class="categorie-tb">
            <div class="test-tb">
                <div class="border">
                    <a style="text-decoration: none" href="<?php echo $row['url_project'] ?>">
                        <ul>
                            <li><img src="<?php echo $row['img_project'] ?>"></li>
                            <li>
                                <h6><?php echo $row['titre_project'] ?></h6>
                            </li>

                        </ul>
                    </a>
                </div>
            </div>
        </div>
       
    <?php } ?>
    </div>
</div>
                <div class="separator2"></div>