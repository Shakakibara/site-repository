
<!-- Fichier: /app/View/Users/edit.ctp -->

<h1>Editer mon compte</h1>
<?php



//Reccupere les données de Civility
$options = $option; 
//Creer le formulaire d'inscription
echo $this->Form->create('User');
echo $this->Form->input('civility_id', array(
      'options' => $options,
      
      'empty' => '(choisissez)',
      'label' => 'Civilité'
  ));
echo $this->Form->input('mail' , array('label' => 'Email'));
echo $this->Form->input('username', array('label' => 'Nom d\'utilisateur'));
echo $this->Form->input('lastname', array('label' => 'Nom'));
echo $this->Form->input('firstname', array('label' => 'Prénom'));

//Date => Minimum 10 ans, maximum 100 ans
echo $this->Form->input('birth', array( 'label' => 'Date de naissance', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' =>date('Y') - 10));
echo $this->Form->input('street', array('label' => 'Rue'));
echo $this->Form->input('zipcode', array('label' => 'Code Postal'));
echo $this->Form->input('city', array('label' => 'Ville'));
echo $this->Form->end('Sauvegarder');
//Lien Annuler
echo $this->Html->link('Annuler',
	array( 'action'=>'index')
);

echo $this->Html->link('Modifier mon mot de passe',
	array( 'action'=>'editPassword',  $id)
);
?>