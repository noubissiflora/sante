<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Commands', 'Contributions']
        ]);

        $user_connect = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Roles', 'Commands', 'Contributions']
        ]);

        $this->set(compact('user', 'user_connect'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */

    //Pour pouvoir créer son compte, il faut avoir un role "family"
    public function add()
    {
        $user = $this->Users->newEntity();
        $user->role_id = '2';
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->role_id = '2';
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Commands', 'Contributions']
        ]);
// On récupère l'utilisateur connecté
        $user_connect = $this->Users->newEntity();

        if ($this->Auth->user('id')) {
             $user_connect = $this->Users->get($this->Auth->user('id'), [
                 'contain' => ['Roles', 'Commands', 'Contributions']
             ]);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
           
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return  $this->redirect(['action' => 'view', $id]); 
                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'user_connect'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function login()
     {
            
            if ($this->request->is('post')) {    
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error('Votre username ou mot de passe est incorrect.');
        }
         $this->set(compact('phone'));
    }

    public function initialize()
    {
        parent::initialize();
        // Ajoute logout à la liste des actions autorisées.
        $this->Auth->allow(['logout', 'edit', 'add']);
    }


    public function logout()
    {
        $this->Flash->success('Vous êtes maintenant déconnecté.');
        return $this->redirect($this->Auth->logout());
    }


}
