<?php
session_start();
include('connexion.php');
include('menu.php');
 ?>

		<div class="container">

			<div class="row">

				<div class="col-md-4"> 
				</div>
				<div class="col-md-4">

					<form action="" method="POST" role="form" style="color: white; text-align:left">
						<legend style="color: white; text-align:left">se connecter</legend>

						<div class="form-group">
							<label for="">EMAIL</label>
							<input type="email" name="email" class="form-control" id="" placeholder="Exemple@email.com">
						</div>

						<div class="form-group">
							<label for="">MOT DE PASSE</label>
							<input type="password" name="mdp" class="form-control" id="" placeholder="Saisir le mot de passe">
						</div>
					
						<button type="submit" name="btnValider" class="btn btn-primary btn-block">valider</button>
					</form>
					<?php if (isset($_POST['btnValider']) ){

								$sql="SELECT * FROM user WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 0,1";
								$req= mysqli_query($link,$sql);
								if (mysqli_num_rows($req)>0) {
									$data= mysqli_fetch_array($req);
									$_SESSION['variable']=$data['id'];
									header('location:accueil.php');
								}else{
									echo "Si identifiant rejete, creer un compte";
								}
						} ?>
					<br>
						<!--a href="inscription.php"> <button type="submit" class="btn btn-info"> S'inscrire </button></a-->

						<a href="inscription.php"><button type="submit" name="btnValider" class="btn btn-warning">s'inscrire</button></a>
				</div>
				<div class="col-md-4"></div>

			</div>

		</div>

		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>

	
	<?php include('footer.php'); ?>