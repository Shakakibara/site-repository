<?php



class UsersController extends AppController {



    public $helpers = array('Html', 'Form');
    public $components = array('Session');



    public function index() {

        $this->set('users', $this->User->find('all'));

    }
    public function add() {

        //Vérifie si des données POST sont envoyées
        if ($this->request->is('Post')) {
            $this->User->create();
            

            //Ici on supprime les espaces au début / fin des chaines (sauf date de naissance)
            foreach ($this->request->data["User"] as $k=>$v){
                if($k != 'birth'){
                    $this->request->data["User"][$k] = ltrim($this->request->data["User"][$k]);
                    $this->request->data["User"][$k] = rtrim($this->request->data["User"][$k]);
                }
            }
            //Ici on modifie la casse de Nom/Prenom/Email/Ville 
            $this->request->data["User"]["lastname"] = AppController::titleCase($this->request->data["User"]["lastname"]);
            $this->request->data["User"]["firstname"] = AppController::ucname($this->request->data["User"]["firstname"]);
            $this->request->data["User"]["mail"] = AppController::lowerCase($this->request->data["User"]["mail"]);
            $this->request->data["User"]["city"] = AppController::ucname($this->request->data["User"]["city"]); 


            //Crypte le mot de passe
            if(User::beforeSave()){
                //Le if sauvgarde les données si elles ont été envoyées et validées
                if ($this->User->save($this->request->data)) {
                    //Affiche un message de confirmation
                    $this->Session->setFlash(__('Your account has been saved.'));
                    //Renvoi sur l'index
                    return $this->redirect(array('controller'=>'Users' ,'action' => 'index'));
                }
                //Affiche message d'erreur
                $this->Session->setFlash(__('Unable to add your account.'));
            }else{
                $this->Session->setFlash(__('Unable to hash the password.'));
            }
        }
        
        
       
        //Envoi de la table Civilities dans la Vue Users//////////////////////////////////////
        $this->loadModel('Civility');                                                       //                   
        $civilities = $this->Civility->find('all');                                         //
        $value = array();                                                                   //
        $option = array();                                                                  //
        foreach($civilities as $civility){                                                  //
                                                                                            //
                $tCivilities[$civility['Civility']['id']]=$civility['Civility']['label'];   //
        }                                                                                   //
                                                                                            //
        $this->set('option', $tCivilities);                                                 //
        //////////////////////////////////////////////////////////////////////////////////////
            


        
    }
    //Fin Inscription






}
 
