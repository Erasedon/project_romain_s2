<?php 

include 'assets/db/connexion.php'; 

	$sql = "SELECT * FROM project"; 
	// $sql = "SELECT id_users FROM project"; 
	$prepare = $db->prepare($sql);   
		 $prepare ->execute();
		 $result = $prepare->fetchall(); 

?>
<div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Crud <b>des Projects</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajout  projet</span></a>
							<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>						
                            <div class="col-xm-4">
                                    <div class="search-box">
                                        <i class="material-icons">&#xE8B6;</i>
                                        <input type="text" class="form-control" placeholder="Search&hellip;">
                                    </div>
                            </div>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>Titre</th>
							<th>Url Img</th>
							<th>Dossier</th>
							<th>Date</th>
							<th>Createur</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($result as $row){
						?>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td><?php echo $row['titre_project'] ?></td>
							<td><?php echo $row['img_project'] ?></td>
							<td><?php echo $row['url_project'] ?></td>
							<td><?php $now =  new \DateTime($row['date_project']);  echo($now->format('d/m/Y')); ?></td>
							<td><?php echo $_SESSION['users'] ?></td>
							<td>
								<a href="#editEmployeeModal<?php echo $row['id_project'] ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Modifier">&#xE254;</i></a>
								<a href="#deleteEmployeeModal<?php echo $row['id_project']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i></a>
							</td>
						</tr>
					<?php   }?>
					</tbody>
				</table>
				<div class="clearfix">
					<div class="hint-text">Voir les <b>5</b> out of <b>25</b> entries</div>
					<ul class="pagination">
						<li class="page-item disabled"><a href="#">Precedent</a></li>
						<li class="page-item active"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item "><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">4</a></li>
						<li class="page-item"><a href="#" class="page-link">5</a></li>
						<li class="page-item"><a href="#" class="page-link">Suivant</a></li>
					</ul>
				</div>
			</div>
		</div>        
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="assets/include/traitementcrud.php?id=<?php echo $_SESSION['users']; ?>">
					<div class="modal-header">						
						<h4 class="modal-title">Ajouter project</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Titre</label>
							<input type="text" name="addtitre" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Url de l'image</label>
							<input type="text" name="addurl" class="form-control" required>
						</div>
						<div class="form-group">
							<label>chemin du dossier</label>
							<textarea name="addchemind" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="adddate" class="form-control"  required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
						<input type="submit" class="btn btn-success" value="Ajouter">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<?php 
	 foreach ($result as $row){
 
?>
	<div id="editEmployeeModal<?php echo $row['id_project']; ?>" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="assets/include/traitementcrud.php?id=<?php echo $_SESSION['users']; ?>">
					<div class="modal-header">						
						<h4 class="modal-title">Edit project</h4>
						<input type="text" name="upid" style="display:none" value="<?php echo $row['id_project']; ?>" >	
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Titre</label>
							<input type="text"  name="uptitre" value="<?php echo $row['titre_project'] ; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Url de l'image</label>
							<input type="text" name="upurl" value="<?php echo $row['img_project']  ; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>chemin du dossier</label>
							<textarea name="upchemind"  class="form-control" required><?php echo $row['url_project']  ; ?></textarea>
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="update"  class="form-control" value="<?php 
							
							$now =  new \DateTime($row['date_project']);  echo($now->format('d/m/Y'));   ?>" required>
						</div>
										
					</div>

					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
						<input type="submit" class="btn btn-info" value="Modifier">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- Delete Modal HTML -->
	<?php 
	 foreach ($result as $row){
 
?>
	<div id="deleteEmployeeModal<?php echo $row['id_project']; ?>" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
			<form method="post" action="assets/include/traitementcrud.php?id=<?php echo $_SESSION['users']; ?>">
					<div class="modal-header">						
						<h4 class="modal-title">Supprimer porject</h4>
						<input type="text" name="delid" style="display:none" value="<?php echo $row['id_project']; ?>" >	
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Anuuler">
						<input type="submit" class="btn btn-danger" name="delete" value="Supprimer">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>