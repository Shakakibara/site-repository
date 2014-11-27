<div class="container singup">
	<div class='row'>
	<h1 class="text-center">Inscription</h1>
	<?php


	//Reccupere les données de Civility
	$options = $option; 
	//Creer le formulaire d'inscription
	echo $this->Bs->col('md12');
			echo $this->BsForm->create('User');
			echo $this->BsForm->input('civility_id', array(
			      'options' => $options,
			      
			      'empty' => '(choisissez)',
			      'label' => 'Civilité'
			  ));
			echo $this->BsForm->input('mail' , array('label' => 'Email'));
			echo $this->BsForm->input('remail', array('label' => 'Confirmation d\'Email'));
			echo $this->BsForm->input('username', array('label' => 'Nom d\'utilisateur'));
			echo $this->BsForm->input('password', array('label' => 'Mot de passe'));
			echo $this->BsForm->input('repassword', array('type' => 'password', 'label' => 'Confirmation Mot de passe'));
			echo $this->BsForm->input('lastname', array('label' => 'Nom'));
			echo $this->BsForm->input('firstname', array('label' => 'Prénom'));

			//Date => Minimum 13 ans, maximum 100 ans
			echo $this->BsForm->input('birth', array( 'label' => 'Date de naissance', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' =>date('Y') - 13,'class'=>'date-combo-box'));
			echo $this->BsForm->input('street', array('label' => 'Rue'));
			echo $this->BsForm->input('zipcode', array('label' => 'Code Postal'));
			echo $this->BsForm->input('city', array('label' => 'Ville'));
			echo $this->BsForm->submit('Sauvegarde');
			echo $this->BsForm->end();
			echo $this->Bs->btn('Annuler',
				array( 'controller'=>'users','action'=>'index'),
				array('class'=> 'col-md-offset-9  btn btn-warning btn-md annuler-singup',"data-dismiss"=>"modal","aria-hidden"=>"true")
			);
	echo $this->Bs->close();


	?>

	</div>
</div>