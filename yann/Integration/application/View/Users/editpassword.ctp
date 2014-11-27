
<!-- Fichier: /app/View/Users/edit_password.ctp -->

<h1>Modifier mon mot de passe</h1>
<?php
//Creation le formulaire d'inscription
echo $this->Form->create('User');


echo $this->Form->input('password', array('label' => 'Mot de passe', 'value' => ''));
echo $this->Form->input('repassword', array('type' => 'password', 'label' => 'Confirmation Mot de passe', 'value' => ''));


echo $this->Form->end('Sauvegarder');


//Lien Annuler
echo $this->Html->link('Annuler',
	array( 'action'=>'edit')
);
?>