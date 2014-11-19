<?php



class UtilisateurController extends AppController {



    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    
    public function index() {
        
        $this->set('utilisateur', $this->Utilisateur->find('all', array('order'=>'Utilisateur.idutilisateur')));
    }
    public function add() {
        if ($this->request->is('Post')) {
            $this->Utilisateur->create();
            if ($this->Utilisateur->save($this->request->data)) {
                $this->Session->setFlash(__('Your account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your account.'));
        }
        else
        {
            //$this->set('civilites', $this->Civilite->find('all'));
            debug($this->Utilisateur->Civilite);
        }
    }

    public function login(){
        if ($this->request->is('Post')) {
            $tab = $this->request->data["Post"];
            $user =  $this->Utilisateur->find( 'all', array('conditions' => array(
                                'LOWER(Utilisateur.mailutilisateur)' => 'LOWER('. $tab["Mail"] .')' , 
                                'Utilisateur.motdepasseutilisateur' => $tab['Mot de passe'] 
                            ))); 
            if (isset($user[0]['Utilisateur']["idutilisateur"])) {
                $this->Session->setFlash(__('Login Successfull'));
                return $this->redirect(array('action' => 'index'));
            }
                $this->Session->setFlash(__('Login Failed'));
        }
    }

}
 
