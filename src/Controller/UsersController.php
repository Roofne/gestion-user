<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController{
    public function index()
    {
        $this->loadComponent('Paginator');
        // Recuperation info personne connecté
        // $user = $this->Authentication->getIdentity();
        // $attr = $this->Authentication->getIdentity()->attr;
        $identity = $this->Authentication->getIdentity();
        $user = $identity->getOriginalData();

        $this->set(compact('user'));
    }

    public function view($slug = null)
    {
        $user = $this->Users->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();

        if($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user))
            {
                $this->Flash->success('Your user has been added');
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('Unable to add user');
        }

        $this->set(compact('user'));
    }

    public function edit($slug = null)
    {
        //$user = $this->Users->findBySlug($slug)->firstOrFail();
        $identity = $this->Authentication->getIdentity();
        $user = $identity->getOriginalData();
        //$user = $this->Users->newEmptyEntity();

        if($this->request->is(['post','put']))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user))
            {
                $this->Flash->success('Your account has been updated');
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('Unable to edit account');

        }

        $this->set(compact('user'));
    }
    
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configurez l'action de connexion pour ne pas exiger d'authentification,
        // évitant ainsi le problème de la boucle de redirection infinie
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            // rediriger vers /articles après la connexion réussie
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // afficher une erreur si l'utilisateur a soumis un formulaire
        // et que l'authentification a échoué
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
?>
