<div class=''>
<h1>Profil utilisateur</h1>
<?php


 
//Creer le formulaire d'inscription
echo $this->Form->create('User');
echo $this->Form->input('civility_id', array(
      'options' => $optionsCiv,
      
      'label' => 'Civilité',
      'disabled' => 'disabled'
  ));


echo $this->Form->input('usercategorie_id', array(
      'options' => $optionsCat,
      
      'label' => 'Catégorie d\'utilisateur',
      'disabled' => 'disabled'
  ));

echo $this->Form->input('maxweeklypub', array('label' => 'Nombre de publications pas semaine','disabled' => 'disabled'));
echo $this->Form->input('email' , array('label' => 'Email','disabled' => 'disabled'));
//echo $this->Form->input('remail', array('label' => 'Confirmation d\'Email')); 		NECESSAIRE POUR ADMIN ???
echo $this->Form->input('username', array('label' => 'Nom d\'utilisateur','disabled' => 'disabled'));
echo $this->Form->input('lastname', array('label' => 'Nom','disabled' => 'disabled'));
echo $this->Form->input('firstname', array('label' => 'Prénom','disabled' => 'disabled'));

//Date => Minimum 10 ans, maximum 100 ans
echo $this->Form->input('birth', array( 'label' => 'Date de naissance', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' =>date('Y') - 10, 'disabled' => 'disabled'));
echo $this->Form->input('street', array('label' => 'Rue','disabled' => 'disabled'));
echo $this->Form->input('zipcode', array('label' => 'Code Postal','disabled' => 'disabled'));
echo $this->Form->input('city', array('label' => 'Ville','disabled' => 'disabled'));

echo $this->Form->end('Retour');




?>

</div>