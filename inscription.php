<?php 
	include('connexion.php');
	include('menu.php');

		$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) {
	
			$sql= "INSERT INTO codeuses (nom,prenoms,date_naissance,image,specialisation,email,mdp,resume) 
			VALUES (
					'".mysqli_real_escape_string($link,$_POST['nom'])."',
					 '".mysqli_real_escape_string($link,$_POST['prenoms'])."',
					 '".mysqli_real_escape_string($link,$_POST['date_naissance'])."',
					 '".($_FILES['image']['name'])."',
					 '".mysqli_real_escape_string($link,$_POST['email'])."',
					 '".mysqli_real_escape_string($link,$_POST['mdp'])."',
					 '".mysqli_real_escape_string($link,$_POST['resume'])."')";
						
	 		
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='<h3 style="color:green">Insertion reussie!</h3>';
			}else{
				$msg=mysqli_error($link);
			}
		}
	}			

 ?>


		<div class="container">

			<div class="row" style="background-color: #aa1b4f; ">

				<div class="col-md-3"></div>
				<div class="col-md-6">

					<form action="" method="POST" role="form" enctype="multipart/form-data" style="float: left;padding: 15px 10px;height: 80%;width: 100%; border-radius: 40px; background-color: #f1eeea; text-align:left">
						<legend style=" text-align:center;">Inscription</legend>
					
						<div class="form-group">
							<label for="">NOM</label>
							<input type="text" name="nom" class="form-control" value="<?php if (isset ($_GET['id'])) echo $dataU['nom']; ?>">
						</div>

						<div class="form-group">
							<label for="">PRENOM</label>
							<input type="text" name="prenoms" class="form-control" id="" placeholder="Entrer votre prenom" value="<?php if (isset ($_GET['id'])) echo $dataU['prenoms']; ?>">
						</div>


						<div class="form-group">
							<label for="">date de naissance</label>
							<input type="date" name="date_naissance" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if (isset ($_GET['id'])) echo $dataU['date_naissance']; ?>">
						</div>


						<div class="form-group">
							<label for="">specialisation</label>
							<select name="resume" class="form-control">
					<!--?php
					//recupere toutes les categories dans la bd
					$sqlcategorie="SELECT * FROM codeuse";
					//execute la requete et on la stock dans $repcategorie
					$repcategorie=mysqli_query($link,$sqlcategorie);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($datacat=mysqli_fetch_array($repcategorie)) {
						?>-->
						<option value="">
	
							
						</option>
						<!--option value="<?php echo $datacat['id'];?>">
						<?php echo $datacat['libelle'];?>
							
						</option-->

						<!--?php
					}
					?>-->
								
							</select>
						</div>

						<div class="form-group">
							<label for="">resume</label>
							<textarea type="text" name="resume" class="form-control" id="" placeholder="Entrer votre prenom" value="<?php if (isset ($_GET['id'])) echo $dataU['resume']; ?>"></textarea>
						</div>



						<div class="form-group">
							<label for="">EMAIL*</label>
							<input type="email" name="email" required class="form-control" id="" placeholder="Exemple@email.com" value="<?php if (isset ($_GET['id'])) echo $dataU['email']; ?>"  >
						</div>

						<div class="form-group">
							<label for="">MOT DE PASSE*</label>
							<input type="password" name="mdp" class="form-control" id="" placeholder="Xxxxxx" value="<?php if (isset ($_GET['id'])) echo $dataU['mdp'];?>">
						</div>

						<div class="form-group">
							<label for="">photo</label>
							<input name="image" type="file"  required class="form-control" id="" placeholder=" Choisissez une image" required value="<?php if (isset ($_GET['id'])) echo $dataU['image']['name'];?>">
						</div>
					
						
					
						<button type="submit" name="btnValider" class="btn btn-primary btn-block">Valider</button>
						<!--?php 
							if (isset($_POST['btnValider']) ){

								$sql="SELECT * FROM user WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'";
								$req= mysqli_query($link,$sql);
								if (mysqli_num_rows($req)>0) {
									echo "email existe";
								}else{

								$sql= "INSERT INTO user (nom, prenom, email, mdp)
					 VALUES ('".mysqli_real_escape_string($link,$_POST['nom'])."',
					 		'".mysqli_real_escape_string($link,$_POST['prenom'])."',
					 		  '".mysqli_real_escape_string($link,$_POST['email'])."',
					 		  '".mysqli_real_escape_string($link, md5($_POST['mdp']))."')";
						$res=mysqli_query($link,$sql);
						if ($res) {
							echo "insertion reussie";
						}else{
							$msg=mysqli_error($link);
						}
						}
						}
						 ?>-->
					</form>

				</div>
				<div class="col-md-4"></div>

			</div>

		</div>

		<?php 
	include('footer.php');
	

 ?>