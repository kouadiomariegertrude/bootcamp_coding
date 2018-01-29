<?php include('connexion.php');
include('menu.php');
	/*
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
	/*	if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) 
		{
			$sql= "INSERT INTO codeuses (nom,prenom,date_naissance,image,email,mdp resume) 
			VALUES (
					'".mysqli_real_escape_string($link,$_POST['nom'])."',
					 '".mysqli_real_escape_string($link,$_POST['prenom'])."',
					 	'".($_POST['date_naissance'])."', 
					 			 '".($_FILES['image']['name'])."',
					 			  
		

					 '".($_POST['users'])."')";
			if (isset($_GET['id']))
				{
					$sql="UPDATE articles SET titre='".$_POST['titre']."', 
					description='".$_POST['description']."', 
					image='".$_FILES['image']['name']."', 
					id_categories='".$_POST['categories']."', 
					id_users='".$_POST['users']."' WHERE id=".$_GET['id']; 
	 			} 
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='<h3 style="color:green">Insertion reussie!</h3>';
			}else{
				$msg=mysqli_error($link);
			}
		}
		
}*/
 ?>


<div class="row" style="background-color: #aa1b4f; ">

        <div class="col-md-12" style="float: left;padding: 15px 10px;height: 500px;width: 100%; border-radius: 40px; background-color: #f1eeea">
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
				<div class="col-md-2"> 
				</div>
				<div class="col-md-7">

					<form action="" method="POST" role="form" style=" text-align:left">
						<legend style=" text-align:left">se connecter</legend>

						<div class="form-group">
							<label for="">facebook</label>
							<input type="email" name="email" class="form-control" id="" placeholder="lien profil">
						</div>

						<div class="form-group">
							<label for="">twitter</label>
							<input type="email" name="email" class="form-control" id="" placeholder="lien profil">
						</div>

						<div class="form-group">
							<label for="">google+</label>
							<input type="email" name="email" class="form-control" id="" placeholder="lien profil">
						</div>
					
						<button type="submit" name="btnValider" class="btn btn-primary btn-block">valider</button>
					</form>
				</div>
				<div class="col-md-3"> 
				</div>
				
			</div>

			
</div></div></div></div>

				

				





















<?php include('footer.php'); ?>