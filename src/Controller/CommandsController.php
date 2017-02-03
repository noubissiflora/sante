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
        $this->paginate = [
            'contain' => ['Patients', 'Pharmacies'],
             'conditions' => [
            'Commands.patient_id' => $this->Auth->user('patient_id'),
        ]
        ];
        $commands = $this->paginate($this->Commands);

        $this->set(compact('commands'));
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
            'contain' => ['Patients', 'Pharmacies', 'Contributions']
        ]);

        $this->set('command', $command);
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
        $patients = $this->Commands->Patients->find('list', ['limit' => 200]);
        $pharmacies = $this->Commands->Pharmacies->find('list', ['limit' => 200]);
        $this->set(compact('command', 'patients', 'pharmacies'));
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
        $patient_id= $command->patient_id;
        $pharmacy_id= $command->pharmacy_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $command = $this->Commands->patchEntity($command, $this->request->data);
            if ($this->Commands->save($command)) {
                $this->Flash->success(__('The command has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The command could not be saved. Please, try again.'));
        }
        $patients = $this->Commands->Patients->find('list', ['limit' => 200])->where(['id' => $patient_id]);
        $pharmacies = $this->Commands->Pharmacies->find('list', ['limit' => 200])->where(['id' => $pharmacy_id]);
        $this->set(compact('command', 'patients', 'pharmacies'));
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
    $this->Auth->allow(['index', 'add']);
}


}
