<?php include('connexion.php');
include('menu.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		
			$sql= "INSERT INTO experiences (titre,date_debut,date_fin,entreprise_experience,description_poste,id_codeuses)
			VALUES (
					'".mysqli_real_escape_string($link,$_POST['titre'])."',
					 '".mysqli_real_escape_string($link,$_POST['date_debut'])."',
					 '".mysqli_real_escape_string($link,$_POST['date_fin'])."'
					 '".mysqli_real_escape_string($link,$_POST['entreprise_experience'])."',
					 '".mysqli_real_escape_string($link,$_POST['description_poste'])."',
					 '".mysqli_real_escape_string($link,$_POST['id_codeuses'])."')";
			if (isset($_GET['id']))
				{
					$sql="UPDATE experiences SET titre='".$_POST['titre']."', 
					date_debut='".$_POST['date_debut']."',
					date_fin='".$_POST['date_fin']."', 
					entreprise_experience='".$_POST['entreprise_experience']."', 
					description_poste='".$_POST['description_poste']."', 
					id_codeuses='".$_POST['id_codeuses']."' WHERE id=".$_GET['id']; 
	 			} 
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='<h3 style="color:green">Insertion reussie!</h3>';
			}else{
				$msg=mysqli_error($link);
			}
		
		
}
	if (isset($_GET['id'])){
	$update="SELECT * FROM experiences WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	if (isset($_GET['sup'])){
	$delete="DELETE FROM experiences WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
	}

 ?>


<div class="row" style="background-color: #aa1b4f; ">

        <div class="col-md-12" style="float: left;padding: 15px 10px;height: 50%;width: 100%; border-radius: 40px; background-color: #f1eeea">
			<div class="row">
				<div class="col-md-3">
				<a href="profil.php">modifier profil <br></a>
				<a href="cv.php">creer cv<br></a>
				<a href="infos.php">afficher votre cv</a><br>
				<a href="diplome.php">ajouter diplome</a><br>
				<a href="interet.php">ajouter centre d'interet</a><br>
				<a href="experience.php">ajouter experience</a><br>
				</a></div>
				<div class="col-md-9">
				<div class="row">
				<div class="col-md-1"> 
				</div>
				<div class="col-md-7">


		<form action="" method="POST" role="form"  style=" text-align:left">
						<legend style=" text-align:center">experiences</legend>
					
						<div class="form-group">
							<label for="">organisation</label>
							<input type="text" name="entreprise_experience" class="form-control" id="" placeholder="Entrer le nom" value="<?php if (isset($_GET['id'])) echo $dataU['entreprise_experience']; ?>">
						</div>

						<div class="form-group">
							<label for="">poste occupe</label>
							<input type="text" name="titre" class="form-control" id="" placeholder="" value="<?php if (isset($_GET['id'])) echo $dataU['titre']; ?>">
						</div>

						<div class="form-group">
						<label for="">description poste</label>
							<textarea  name="description_poste" class="form-control" id="" placeholder="" type="text" value="<?php if (isset($_GET['id'])) echo $dataU['description_poste']; ?>"></textarea>
						</div>


						<div class="form-group">
							<label for="">date debut</label>
							<input type="date" name="date_debut" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if (isset($_GET['id'])) echo $dataU['date_debut']; ?>">
						</div>

						<div class="form-group">
							<label for="">date fin</label>
							<input type="date" name="date_fin" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if (isset($_GET['id'])) echo $dataU['date_fin']; ?>">
						</div>

						<div class="form-group">
							<label for="">id_codeuse</label>
							<select name="id" class="form-control">
					<?php
					//recupere toutes les categories dans la bd
					$sqlusers="SELECT * FROM codeuses";
					//execute la requete et on la stock dans $repcategorie
					$repusers=mysqli_query($link,$sqlusers);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($datausers=mysqli_fetch_array($repusers)) {
						?>
						<option value="<?php echo $datausers['id'];?>">
						<?php echo $datausers['id'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						</div>
					

			
						<button type="submit" name="btnValider" class="btn btn-primary btn-block">Valider</button>
						
					</form>
<br><br>
</div></div></div>
					<div>
				<table border="2" class="table">
					<thead style="background-color: yellow">
						<tr>
					 		<th><b>Numero</b></th>
					 		<th><b>organisation</b></th>
					 		<th><b>poste</b></th>
					 		<th><b>description</b></th>	
					 		<th><b>date debut</b></th>	
					 		<th><b>date fin</b></th>
					 		<th><b>id_codeuse</b></th>			 		
					 		<th><b>modifier</b></th>
					 		<th><b>suprimer</b></th>
				 		</tr>
					</thead>

					<tbody >
							<?php	
							$n=1;
							$list=" SELECT * FROM experiences";
										
							$res= mysqli_query($link,$list);
							 while ($data = mysqli_fetch_array($res)){
							?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $data['entreprise_experience']; ?></td>
								<td><?php echo $data['titre']; ?></td>
								<td><?php echo $data['description_poste']; ?></td>
								<td><?php echo $data['date_debut']; ?></td>
								<td><?php echo $data['date_fin']; ?></td>
								<td><?php echo $data['id']; ?></td>			
																		
								<td><a href="?id=<?php echo $data['id'];?>" class="btn btn-primary" >Modifier</a></td>
								<td><a href="?sup=<?php echo $data['id'];?>" class="btn btn-warning">Supprimer</a>	</td>
								
							</tr>
							<?php
								$n++;
							}?>
					</tbody>
				 
			 	</table>
			 	
			 	</div>

			 	
	</div>

				</div>
				<div class="col-md-4"></div>

			</div>

		</div></div></div></div>

		<?php 
	include('footer.php');
	

 ?>




								/*$sql="UPDATE experiences SET 
								titre='".$_POST['titre']."',
								date_debut='".$_POST['date_debut']."',
								date_fin='".$_POST['date_fin']."',
								entreprise='".$_POST['entreprise']."',
								description_poste='".$_POST['description_poste']."',
								id_codeuses='".$_POST['id_codeuses']."'
								 WHERE id=".$_GET['id'];
							}else
								{
						
									$sql="INSERT INTO experiences (titre,date_debut,date_fin,entreprise,description_poste,id_codeuses)
										 VALUES (
								 		'".$_POST['titre']."',
								 		'".$_POST['date_debut']."',
								 		'".$_POST['date_fin']."',
								 		'".$_POST['entreprise']."',
								 		'".$_POST['description_poste']."',
								 		'".$_POST['id_codeuses']."')"; //die(sql);
													}
											$result=mysqli_query($link,$sql);
											if ($result) {
											echo "<h3 style=color:green>Super! Insertion reussie</h3>";
											# code...
											}else{
											echo "mysql_error()";
											die();
					}

			}*/
			