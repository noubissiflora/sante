<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 */
class PatientsController extends AppController
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
        $patients = $this->paginate($this->Patients);

        $this->set(compact('patients'));
        $this->set('_serialize', ['patients']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patient = $this->Patients->get($id, [
            'contain' => ['Roles', 'Commands', 'Contributions', 'Users']
        ]);

        $this->set('patient', $patient);
        $this->set('_serialize', ['patient']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($role = 1)
    { 
       //$role = $this->request->params['pass'];
        $this->loadModel('Users');
        $password='';
        $login='';
        $status='';

        $user = $this->Users->newEntity();
        $patient = $this->Patients->newEntity();
        if ($this->request->is('post')) {
            $patient = $this->Patients->patchEntity($patient, $this->request->data);
            
            $patient->role_id=$role;
            $patient = $this->Patients->save($patient);
            if ($patient) {
                $this->Flash->success(__('The patient has been saved.'));
               // return $this->redirect([ 'action' => 'index']);
                 return $this->redirect(['controller' => 'Commands', 'action' => 'index', $patient->id]);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $roles = $this->Patients->Roles->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'roles', 'role'));
        $this->set(compact('password', 'login', 'status'));
        $this->set('_serialize', ['patient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patient = $this->Patients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity($patient, $this->request->data);
            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The patient has been saved.'));
                return $this->redirect(['controller' => 'Commands','action' => 'index', $this->Auth->user('patient_id')]);
                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $roles = $this->Patients->Roles->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'roles'));
        $this->set('_serialize', ['patient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);
        if ($this->Patients->delete($patient)) {
            $this->Flash->success(__('The patient has been deleted.'));
        } else {
            $this->Flash->error(__('The patient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

 public function initialize()
{
    parent::initialize();
    // Ajoute logout à la liste des actions autorisées.
    $this->Auth->allow(['logout', 'add','index','edit']);
}

}
