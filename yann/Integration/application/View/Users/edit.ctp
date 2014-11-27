
<!-- Fichier: /app/View/Users/edit.ctp -->

<h1>Editer mon compte</h1>
<?php



//Creer le formulaire d'inscription
echo $this->Form->create('User');
echo $this->Form->input('email' , array('label' => 'Email'));
echo $this->Form->input('username', array('label' => 'Nom d\'utilisateur'));

echo $this->Form->input('street', array('label' => 'Rue'));
echo $this->Form->input('zipcode', array('label' => 'Code Postal'));
echo $this->Form->input('city', array('label' => 'Ville'));
echo $this->Form->end('Sauvegarder');
//Lien Annuler
echo $this->Html->link('Annuler',
	array( 'action'=>'index')
);
echo '<br/>';
echo $this->Html->link('Modifier mon mot de passe',
	array( 'action'=>'editpassword')
);
?>