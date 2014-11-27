<?php



class UsersController extends AppController {







    public function index() {
        if($this->Session->read('Auth.User.id'))
            $this->set('usercategorie', $this->Auth->user('usercategorie_id'));
    }

    public function admin_listusers(){
        if($this->Session->read('Auth.User.id') && $this->Auth->user('usercategorie_id') == 1){
                    $users = $this->User->find('all', array('order' => array('Usercategorie.label', 'User.lastname')));

                    $this->set('users', $users);
                    $this->set('usercategorie', $this->Auth->user('usercategorie_id'));
                }
    }

    public function admin_viewuser($id = null){
        if($id == null || $this->Auth->user('usercategorie_id') != 1)
            $id = $this->Auth->user('id');


        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }

        

        if ($this->request->is(array('post', 'put'))) {
                return $this->redirect(array('controller' => 'users', 'action' => 'admin_listusers'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
        $tCategories = $this::UserTab($this->User->Usercategorie->find('all'), 'Usercategorie');
        $this->set('optionsCat', $tCategories);
        $tCivilities = $this::UserTab($this->User->Civility->find('all'), 'Civility');
        $this->set('optionsCiv', $tCivilities);
    }

    public function add() {

        //Vérifie si des données POST sont envoyées
        if ($this->request->is('Post')) {
            $this->User->create();
            

            //Va chercher la fonctions pour mettre tous les champs dans la meme casse
            $this->request->data = $this::modifCasse($this->request->data);
            $user=$this->request->data;
           
                
                //Le if sauvgarde les données si elles ont été envoyées et validées
                if ($this->User->save($this->request->data)) {

                    $this::mail($this->request->data,'Votre inscription sur le site FPAHP', 'welcome', array('username' => $user['user']['firstname']));
                    if($this->Auth->user('usercategorie_id') == 1){
                        //Affiche un message de confirmation
                        $this->Session->setFlash(__('Le compte a bien été crée.'));
                        //Renvoi sur l'index
                        return $this->redirect(array('controller'=>'Users' ,'action' => 'admin_listusers'));
                    }
                    //Affiche un message de confirmation
                    $this->Session->setFlash(__('Votre compte a bien été crée.'));
                    //Renvoi sur l'index
                    return $this->redirect(array('controller'=>'Users' ,'action' => 'index'));
                }
                //Affiche message d'erreur
                $this->Session->setFlash(__('Impossible de créer votre compte.'));
            


        
        }
        
       $civilities = $this::UserTab($this->User->Civility->find('all'), 'Civility');
       $this->set('option', $civilities);

            
    

        
}
    //Fin Add


    public function edit() {
          
        
            $id = $this->Auth->user('id');


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
                $this->Session->setFlash(__('Votre compte a bien été sauvegardé.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Impossible de sauvegarder vos modifications.'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }



    }
    public function admin_delete($id = null) {
        if($this->Auth->user('usercategorie_id') == 1){
                if ($this->request->is('get')) {
                    throw new MethodNotAllowedException();
                }
                if ($this->User->delete($id)) {
                    $this->Session->setFlash(
                        __('L\'Utilisateur a bien été supprimé')
                    );
                    return $this->redirect(array('action' => 'admin_listusers'));
                }
        }else{
            $this->Session->setFlash(
                        __('Vous n\'avez pas les droits de supprimer cet utilisateur')
                    );
        }
}

    public function admin_edit($id = null) {
          
        if($id == null || $this->Auth->user('usercategorie_id') != 1)
            $id = $this->Auth->user('id');


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
                $this->Session->setFlash(__('Le compte a bien été sauvegardé.'));
                return $this->redirect(array('controller' => 'users', 'action' => 'admin_listusers'));
            }
            $this->Session->setFlash(__('Impossible de sauvegarder vos modifications.'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
        $tCategories = $this::UserTab($this->User->Usercategorie->find('all'), 'Usercategorie');
        $this->set('optionsCat', $tCategories);
        $tCivilities = $this::UserTab($this->User->Civility->find('all'), 'Civility');
        $this->set('optionsCiv', $tCivilities);

    }
    public function editpassword($id = null) {
        if($id == null)
            $id = $this->Auth->user('id');

        
         

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

            
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Votre mot de passe a bien été modifié.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Impossible de sauvegarder vos nouveau mot de passe.'));
       
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }


        
    }


    

    public function login() {
        if ($this->request->is('post')) {
            
            if ($this->Auth->login()) {
                if($this->Auth->redirect() == '/Users/login'){
                    return $this->redirect(array('action' => 'index'));
                }
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }




    public function forgetpassword(){
       if($this->request->is('post')){
            $v = current($this->request->data);

            $user = $this->User->find('first', array(
                    'conditions' => array(
                        'email' => $v["email"])
                )
            );
            $v['id'] = $user['User']['id'];
            
            $this->User->id = $user['User']['id'];
            if(empty($user)){
                $this->Session->setFlash("Aucun utilisateur ne correspond à ce mail");
            }else{
                $newpassword = substr( str_shuffle( 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789' ) , 0 , 10 );
                $v['password'] = $newpassword;
                if($this->User->save($v)){ 
                    $this->Session->setFlash("Un mail vous a été envoyé avec un nouveau mot de passe");
                    $this::mail($user, 'Mot de passe oublié', 'forgetpassword',array('newpassword' => $newpassword));
                    return $this->redirect(array('action' => 'index'));
               }
            }
       }
    }







    /*UserTab($userData, $table)
        2 Paramètres:   -   La requête avec le find('...') de la table souhaitée 
                        -   Le nom de la table souhaitée
        Retour: Tableau avec l'ID en clé et le label en valeur
        Exemple:    $tCategories = $this::UserTab($this->User->Usercategorie->find('all'), 'Usercategorie');
    */
    public function UserTab($userData, $table){
        //Envoi d'une table            ///////////////////////////////////////////////////////                 
        $rows = $userData;                                                                  //
        foreach($rows as $row){                                                             //
                                                                                            //
                $tRows[$row[$table]['id']]=$row[$table]['label'];                           //
        }                                                                                   //
        return $tRows;                                                                      //
        //////////////////////////////////////////////////////////////////////////////////////
    }



    /*modifCasse($user)
        1 Paramètre:    -$this->request->data
        Fonction: Réccupère l'User, et transforme les chaînes selon les casse souhaitées
        Retour: Renvoi toutes les chaines de la fonction avec la casse souhaitée
        exemple: $this->request->data = $this::modifCasse($this->request->data);
    */
    public function modifCasse($user){

        
        
            //Ici on modifie la casse de Nom/Prenom/Email/Ville/Rue 
            $user["User"]["lastname"] = AppController::titleCase($user["User"]["lastname"]);
            $user["User"]["firstname"] = AppController::ucname($user["User"]["firstname"]);
            $user["User"]["email"] = AppController::lowerCase($user["User"]["email"]);
            $user["User"]["city"] = AppController::ucname($user["User"]["city"]); 
            $user["User"]["street"] = AppController::ucname($user["User"]["street"]);

            return $user;

    }

    /*removeWiteSpace($user)
        1 param:    -$this->request->data
        Fonction: Enleve tous les espaces de début et fin de chaine sauf pour la date
        Retour: un tableau
    */
    public function removeWiteSpace($user){
        //Ici on supprime les espaces au début / fin des chaines (sauf date de naissance)
            foreach ($user["User"] as $k=>$v){
                if($k != 'birth'){
                    $user["User"][$k] = ltrim($user["User"][$k]);
                    $user["User"][$k] = rtrim($user["User"][$k]);
                }
            }
    }

    public function beforeFilter() {
        parent::beforeFilter();
        // Permet aux utilisateurs de s'enregistrer et de se déconnecter
        $this->Auth->allow('add', 'logout', 'mail', 'forgetPassword');
    }

    /*mail($user, $subject, $template, $vartosend)
        4 Paramètres:   -$user: $this->request->data
                        -$subject: Sujet du mail
                        -$template: Le nom du template à utilisé
                        -$vartosend: Un tableau contenant toutes les variables à envoyer
        Retour: Aucun, Envoi un Mail
    */
    public function mail($user, $subject, $template, $vartosend){
        
        App::uses('CakeEmail', 'Network/Email');
        //Envoi Email
        $CakeEmail = new CakeEmail('default');
        $CakeEmail->from('admin@peche-alpes-haute-provence.com');
        $CakeEmail->to($user['User']['email']);
        $CakeEmail->subject($subject);
        $CakeEmail->template($template);

        $CakeEmail->viewVars($vartosend);
        $CakeEmail->emailFormat('html');
        $CakeEmail->send();
        
        return true;
        
    }


}
 


