<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Commands Controller
 *
 * @property \App\Model\Table\CommandsTable $Commands
 */
class CommandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Users');
        $user =  $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Commands', 'Roles', 'Contributions']
        ]);

//  Si l'uilisateur connecté est  un contributeur (family)
        if ($user->role_id == 2) {
    // On cherche les id des commandes pour les quelles un membre de la famille a contribué
          //  $this->loadModel('Contributions');
             $command_id_contributions = $this->Commands->Contributions->find()
        ->select(['command_id'])->where(['Contributions.user_id' => $this->Auth->user('id')]);

    //On prend uniquement les commandes où il a contribuées
             $this->paginate = [
            'contain' => ['Users', 'Pharmacies'],
            'conditions' => [
            'Commands.id IN' => $command_id_contributions,
             ]
            ];
        } 
//Sinon, si c'est un patient on prend uniquement les commandes qu'il a passé
        elseif ($user->role_id == 1) {
            $this->paginate = [
            'contain' => ['Users', 'Pharmacies'],
            'conditions' => [
            'Commands.user_id' => $this->Auth->user('id'),
             ]
            ];
        }


        $commands = $this->paginate($this->Commands);

        $this->set(compact('commands', 'user'));
        $this->set('_serialize', ['commands']);
    }

    /**
     * View method
     *
     * @param string|null $id Command id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $command = $this->Commands->get($id, [
            'contain' => ['Users', 'Pharmacies', 'Contributions']
        ]);

// Onrécupère le user connecté        
        $this->loadModel('Users');
        $user_connect = $this->Users->newEntity();
        if ($this->Auth->user('id')) {
            $user_connect =  $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Commands', 'Roles', 'Contributions']
        ]);
        }
        
// On compte ce qui a déjà été payé pour une commande
        $pay=0;
        foreach ($command->contributions as $contrib) {
            $pay += $contrib->amount;
        } 
// On calcul le reste à payer
        $rest= $command->amount - $pay ;
        if ($rest < 0) {
            $rest=0;
        }

        $this->set(compact('command','rest', 'user_connect'));
        $this->set('_serialize', ['command']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $command = $this->Commands->newEntity();
        if ($this->request->is('post')) {
            $command = $this->Commands->patchEntity($command, $this->request->data);
            if ($this->Commands->save($command)) {
                $this->Flash->success(__('The command has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The command could not be saved. Please, try again.'));
        }
        $users = $this->Commands->Users->find('list', ['limit' => 200])->where(['Users.role_id' => 1]);
        $pharmacies = $this->Commands->Pharmacies->find('list', ['limit' => 200]);
        $this->set(compact('command', 'users', 'pharmacies'));
        $this->set('_serialize', ['command']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Command id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $command = $this->Commands->get($id, [
            'contain' => []
        ]);
        $pharmacy_id = $command->pharmacy_id ;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $command = $this->Commands->patchEntity($command, $this->request->data);
            if ($this->Commands->save($command)) {
                $this->Flash->success(__('The command has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The command could not be saved. Please, try again.'));
        }
        $users = $this->Commands->Users->find('list', ['limit' => 200])->where(['id' => $this->Auth->user('id')]);
        $pharmacies = $this->Commands->Pharmacies->find('list', ['limit' => 200])->where(['id' => $pharmacy_id]);
        $this->set(compact('command', 'users', 'pharmacies'));
        $this->set('_serialize', ['command']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Command id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $command = $this->Commands->get($id);
        if ($this->Commands->delete($command)) {
            $this->Flash->success(__('The command has been deleted.'));
        } else {
            $this->Flash->error(__('The command could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function initialize()
    {
        parent::initialize();
        // Ajoute logout à la liste des actions autorisées.
        $this->Auth->allow(['view', 'add']);
    }

}
