<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contributions Controller
 *
 * @property \App\Model\Table\ContributionsTable $Contributions
 */
class ContributionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

//On récupère l'utilisateur connecté
        $this->loadModel('Users');
        $user =  $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Commands', 'Roles', 'Contributions']
        ]);

// Si l'utilisateur connecté a pour role "family", alors les contributions qu'il peut consulter sont les siennes
        if ($user->role->typ == 'family') {
             $this->paginate = [
            'contain' => ['Users', 'Commands'],
            'conditions' => ['Contributions.user_id' => $this->Auth->user('id')]
            ];
        }
// Sinon, Si l'utilisateur connecté est un "patient", alors il peut seulement consulter les contributions liées à toutes ses commandes
       elseif ($user->role->typ == 'patient') {
// On cherche les id des commandes qu'un patient a passé
            $this->loadModel('Commands');
             $commands_id = $this->Commands->find()
        ->select(['id'])->where(['Commands.user_id' => $this->Auth->user('id')]);

//On récupère les contributions liées aux commandes qu'il a passées
            $this->paginate = [
            'contain' => ['Users', 'Commands'],
            'conditions' => ['Contributions.command_id IN' => $commands_id]
            ];
       }

        $contributions = $this->paginate($this->Contributions);

        $this->set(compact('contributions', 'user'));
        $this->set('_serialize', ['contributions']);
    }

    /**
     * View method
     *
     * @param string|null $id Contribution id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contribution = $this->Contributions->get($id, [
            'contain' => ['Users', 'Commands']
        ]);

        $this->loadModel('Commands');
        $command =  $this->Commands->get($contribution->command_id, [
            'contain' => ['Users', 'Pharmacies', 'Contributions']
        ]
        );

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

// On récupère l'utilisateur connecté
        $this->loadModel('Users');
        $user_connect =  $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Commands', 'Roles', 'Contributions']
        ]);
        $this->set(compact('contribution', 'user_connect', 'command', 'rest'));
        $this->set('_serialize', ['contribution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($command_id=null)
    {
        $contribution = $this->Contributions->newEntity();

// On récupère les informations de la commande qui sera liée à la contribution
        $this->loadModel('Commands');
        $command =  $this->Commands->get($command_id, [
            'contain' => ['Users', 'Pharmacies', 'Contributions']
        ]
        );

// On récupère les informations de l'utilisateur connecté puisque c'est lui qui effectue la contribution ou le paiement
        $this->loadModel('Users');
        $user =  $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Roles', 'Commands', 'Contributions']
        ]
        );

 // Cette contribution est liée à la commande pour laquelle on visualisait les détails "$command_id"
        $contribution->command_id = $command_id;
        
 // Le contributeur c'est l'utilisateur connecté
        $contribution->user_id = $this->Auth->user('id');
       
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

        if ($this->request->is('post')) {
            $contribution = $this->Contributions->patchEntity($contribution, $this->request->data);
    
    // On vérifie si la contribution paie la totalitée de la commande
            if ($contribution->amount < $command->amount) {
                $contribution->status = 'Partielle' ;
            }
// On enregistre la contribution
            if ($this->Contributions->save($contribution)) {
                $this->Flash->success(__('The contribution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contribution could not be saved. Please, try again.'));
        }

        $users = $this->Contributions->Users->find('list', ['limit' => 200]);
        $commands = $this->Contributions->Commands->find('list', ['limit' => 200]);
        $this->set(compact('contribution', 'users', 'commands', 'user', 'pharmacy', 'command', 'rest'));
        $this->set('_serialize', ['contribution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contribution id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contribution = $this->Contributions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contribution = $this->Contributions->patchEntity($contribution, $this->request->data);
            if ($this->Contributions->save($contribution)) {
                $this->Flash->success(__('The contribution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contribution could not be saved. Please, try again.'));
        }
        $users = $this->Contributions->Users->find('list', ['limit' => 200]);
        $commands = $this->Contributions->Commands->find('list', ['limit' => 200]);
        $this->set(compact('contribution', 'users', 'commands'));
        $this->set('_serialize', ['contribution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contribution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contribution = $this->Contributions->get($id);
        if ($this->Contributions->delete($contribution)) {
            $this->Flash->success(__('The contribution has been deleted.'));
        } else {
            $this->Flash->error(__('The contribution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
