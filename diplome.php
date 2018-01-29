<?php include('connexion.php');
include('menu.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		
			$sql= "INSERT INTO diplomes (annee,libelle,ecole) 
			VALUES (
					'".mysqli_real_escape_string($link,$_POST['annee'])."',
					 '".mysqli_real_escape_string($link,$_POST['libelle'])."',
					 '".mysqli_real_escape_string($link,$_POST['ecole'])."'
					)";
			if (isset($_GET['id']))
				{
					$sql="UPDATE diplomes SET annee='".$_POST['annee']."', 
					libelle='".$_POST['libelle']."', 
					ecole='".$_POST['ecole']."' WHERE id=".$_GET['id']; 
	 			} 
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='<h3 style="color:green">Insertion reussie!</h3>';
			}else{
				$msg=mysqli_error($link);
			}
		
		
}
	if (isset($_GET['id'])){
	$update="SELECT * FROM diplomes WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	if (isset($_GET['sup'])){
	$delete="DELETE FROM diplomes WHERE id=".$_GET['sup'];
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
						<legend style=" text-align:center">diplome</legend>
					
						<div class="form-group">
							<label for="">etablissement</label>
							<input type="text" name="ecole" class="form-control" id="" placeholder="Entrer le nom" value="<?php if (isset($_GET['id'])) echo $dataU['ecole']; ?>">
						</div>

						<div class="form-group">
							<label for="">diplome</label>
							<input type="text" name="libelle" class="form-control" id="" placeholder="" value="<?php if (isset($_GET['id'])) echo $dataU['libelle']; ?>">
						</div>


						<div class="form-group">
							<label for="">date obtention</label>
							<input type="date" name="annee" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if (isset($_GET['id'])) echo $dataU['annee']; ?>">
						</div>




					
						<button type="submit" name="btnValider" class="btn btn-primary btn-block">Valider</button>
						
					</form>
<br><br>
</div></div>
					<div>
				<table border="2" class="table">
					<thead style="background-color: yellow">
						<tr>
					 		<th><b>Numero</b></th>
					 		<th><b>etablissement</b></th>
					 		<th><b>diplome</b></th>
					 		<th><b>date obtention</b></th>		 		
					 		<th><b>modifier</b></th>
					 		<th><b>suprimer</b></th>
				 		</tr>
					</thead>

					<tbody >
							<?php	
							$n=1;
							$list=" SELECT * FROM diplomes
										"; 
							$res= mysqli_query($link,$list);
							 while ($data = mysqli_fetch_array($res)){
							?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $data['ecole']; ?></td>
								<td><?php echo $data['libelle']; ?></td>
								<td><?php echo $data['annee']; ?></td>			
																		
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