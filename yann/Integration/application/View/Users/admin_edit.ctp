<div class=''>
<h1>Edit d'Utilisateur</h1>
<?php


 
//Creer le formulaire d'inscription
echo $this->Form->create('User');
echo $this->Form->input('civility_id', array(
      'options' => $optionsCiv,
      
      'label' => 'Civilité'
  ));


echo $this->Form->input('usercategorie_id', array(
      'options' => $optionsCat,
      
      'label' => 'Catégorie d\'utilisateur'
  ));

echo $this->Form->input('maxweeklypub', array('label' => 'Nombre de publications pas semaine'));
echo $this->Form->input('email' , array('label' => 'Email'));
//echo $this->Form->input('remail', array('label' => 'Confirmation d\'Email')); 		NECESSAIRE POUR ADMIN ???
echo $this->Form->input('username', array('label' => 'Nom d\'utilisateur'));
echo $this->Form->input('lastname', array('label' => 'Nom'));
echo $this->Form->input('firstname', array('label' => 'Prénom'));

//Date => Minimum 10 ans, maximum 100 ans
echo $this->Form->input('birth', array( 'label' => 'Date de naissance', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' =>date('Y') - 10));
echo $this->Form->input('street', array('label' => 'Rue'));
echo $this->Form->input('zipcode', array('label' => 'Code Postal'));
echo $this->Form->input('city', array('label' => 'Ville'));

echo $this->Form->end('Sauvegarde');


//Lien Annuler
echo $this->Html->link('Annuler',
	array( 'action'=>'index')
);

?>

</div>