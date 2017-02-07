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
        $this->paginate = [
            'contain' => ['Users', 'Commands']
        ];
        $contributions = $this->paginate($this->Contributions);

        $this->set(compact('contributions'));
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

        $this->set('contribution', $contribution);
        $this->set('_serialize', ['contribution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contribution = $this->Contributions->newEntity();
        if ($this->request->is('post')) {
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
