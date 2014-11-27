<?php



class UsersController extends AppController {




    public $helpers = array('Html', 'Form');
    public $components = array('Session');




    public function index() {
        $users = $this->User->find('all', array('order' => 'User.id ASC'));
        
        $this->set('users', $users);
        
    }
    public function add() {

        //Vérifie si des données POST sont envoyées
        if ($this->request->is('Post')) {
            

            //Va chercher la fonctions pour mettre tous les champs dans la meme casse
            $this->request->data = $this::modifCasse($this->request->data);

           
                debug($this->request->data);
                
                //Le if sauvgarde les données si elles ont été envoyées et validées
                if ($this->User->save($this->request->data)) {
                    //Affiche un message de confirmation
                    $this->Session->setFlash(__('Votre compte a bien été crée.'));
                    //Renvoi sur l'index
                    return $this->redirect(array('controller'=>'Users' ,'action' => 'index'));
                }
                //Affiche message d'erreur
                $this->Session->setFlash(__('Impossible de créer votre compte.'));
            


        
        }
        
       $civilities = $this::civilityTab();
       $this->set('option', $civilities);

            
    

        
}
    //Fin Add


    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }

        

        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;



            //Enleve tous les espaces en debut et fin de chaine
            $this::removeWiteSpace($this->request->data);
            //Va chercher la fonctions pour mettre tous les champs dans la meme casse
            $this->request->data = $this::modifCasse($this->request->data);

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Votre compte a bien été modifié.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Impossible de sauvegarder vos modifications.'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }


        //Envoi de civilities dans edit
        $civilities = $this::civilityTab();
        $this->set('option', $civilities);


        $this->set('id', $id);
    }

        public function editPassword($id = null) {

                if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }

        

        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;

            

            //Enleve tous les espaces en debut et fin de chaine
            $this::removeWiteSpace($this->request->data);
            debug($user);

           /* if($user["password"] == $this->request->data["User"]["password"]){*/
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Votre mot de passe a bien été modifié.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Impossible de sauvegarder vos nouveau mot de passe.'));
           /* }else{
                $this->Session->setFlash(__('Oldpassword incorrect'));
            }*/
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }


        $this->set('id', $id);
    }



    public function civilityTab(){
        //Envoi de la table Civilities ///////////////////////////////////////////////////////
                                                                                            //                   
        $civilities = $this->User->Civility->find('all');                                   //                                                               //
        foreach($civilities as $civility){                                                  //
                                                                                            //
                $tCivilities[$civility['Civility']['id']]=$civility['Civility']['label'];   //
        }                                                                                   //
                                                                                            //
        return $tCivilities;                                                                //
        //////////////////////////////////////////////////////////////////////////////////////
    }

    public function modifCasse($user){

        
        
            //Ici on modifie la casse de Nom/Prenom/Email/Ville/Rue 
            $user["User"]["lastname"] = AppController::titleCase($user["User"]["lastname"]);
            $user["User"]["firstname"] = AppController::ucname($user["User"]["firstname"]);
            $user["User"]["mail"] = AppController::lowerCase($user["User"]["mail"]);
            $user["User"]["city"] = AppController::ucname($user["User"]["city"]); 
            $user["User"]["street"] = AppController::ucname($user["User"]["street"]);

            return $user;

    }

    public function removeWiteSpace($user){
        //Ici on supprime les espaces au début / fin des chaines (sauf date de naissance)
            foreach ($user["User"] as $k=>$v){
                if($k != 'birth'){
                    $user["User"][$k] = ltrim($user["User"][$k]);
                    $user["User"][$k] = rtrim($user["User"][$k]);
                }
            }
    }

}
 


