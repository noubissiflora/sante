<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pharmacies Controller
 *
 * @property \App\Model\Table\PharmaciesTable $Pharmacies
 */
class PharmaciesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pharmacies = $this->paginate($this->Pharmacies);
// On récupère toutes les informations de l'utilisateur connecté
        $this->loadModel('Users');
        $user =  $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Commands', 'Roles', 'Contributions']
        ]);

        $this->set(compact('pharmacies', 'user'));
        $this->set('_serialize', ['pharmacies']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacy = $this->Pharmacies->get($id, [
            'contain' => ['Commands']
        ]);

        // On récupère toutes les informations de l'utilisateur connecté
        $this->loadModel('Users');
        $user =  $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Commands', 'Roles', 'Contributions']
        ]);

        $this->set(compact('pharmacy', 'user'));
        $this->set('_serialize', ['pharmacy']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacy = $this->Pharmacies->newEntity();
        if ($this->request->is('post')) {
            $pharmacy = $this->Pharmacies->patchEntity($pharmacy, $this->request->data);
            if ($this->Pharmacies->save($pharmacy)) {
                $this->Flash->success(__('The pharmacy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pharmacy could not be saved. Please, try again.'));
        }
        $this->set(compact('pharmacy'));
        $this->set('_serialize', ['pharmacy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacy = $this->Pharmacies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacy = $this->Pharmacies->patchEntity($pharmacy, $this->request->data);
            if ($this->Pharmacies->save($pharmacy)) {
                $this->Flash->success(__('The pharmacy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pharmacy could not be saved. Please, try again.'));
        }
        $this->set(compact('pharmacy'));
        $this->set('_serialize', ['pharmacy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacy = $this->Pharmacies->get($id);
        if ($this->Pharmacies->delete($pharmacy)) {
            $this->Flash->success(__('The pharmacy has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function initialize()
    {
        parent::initialize();
        // Ajoute logout à la liste des actions autorisées.
        $this->Auth->allow(['add']);
    }


}
