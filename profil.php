<?php include('connexion.php');
include('menu.php'); ?>


<div class="row" style="background-color: #aa1b4f; ">

        <div class="col-md-12" style="float: left;padding: 15px 10px;height: 80%;width: 100%; border-radius: 40px; background-color: #f1eeea">
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

					<form action="" method="POST" role="form" style=" text-align:left">
						<legend style=" text-align:left">Inscription</legend>
					
						<div class="form-group">
							<label for="">NOM</label>
							<input type="text" name="nom" class="form-control" id="" placeholder="Entrer le nom">
						</div>

						<div class="form-group">
							<label for="">PRENOM</label>
							<input type="text" name="prenom" class="form-control" id="" placeholder="Entrer votre prenom">
						</div>


						<div class="form-group">
							<label for="">date de naissance</label>
							<input type="date" name="date" class="form-control" id="" placeholder="jj/mm/aaaa">
						</div>


						<div class="form-group">
							<label for="">resume</label>
							<select name="resume" class="form-control">
					
								<option value=""></option>
							</select>
						</div>



						<div class="form-group">
							<label for="">EMAIL*</label>
							<input type="email" name="email" class="form-control" id="" placeholder="Exemple@email.com" required >
						</div>

						<div class="form-group">
							<label for="">telephone</label>
							<input type="telephone" name="telephone" class="form-control" id="" placeholder="" required >
						</div>

						<div class="form-group">
							<label for="">MOT DE PASSE*</label>
							<input type="password" name="mdp" class="form-control" id="" placeholder="Saisir le mot de passe" required >
						</div>

						<div class="form-group">
							<label for="">photo</label>
							<input type="file" name="image" class="form-control" id="" placeholder="photo" required >
						</div>
					
						
					
						<button type="submit" name="btnValider" class="btn btn-primary btn-block">modifier</button>
						
					</form>
				</div>
				<div class="col-md-3"> 
				</div>
				
			</div>

			
</div></div></div></div>

				

				





















<?php include('footer.php'); ?>


