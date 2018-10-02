<?php
namespace Stories\Controller;

use Stories\Controller\AppController;

/**
 * Stories Controller
 *
 * @property \Stories\Model\Table\StoriesTable $Stories
 */
class StoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'order' => ['created' => 'DESC']
        ];
        $stories = $this->paginate($this->Stories);

        $this->set(compact('stories'));
        $this->set('_serialize', ['stories']);
    }

    /**
     * View method
     *
     * @param string|null $id Story id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $story = $this->Stories->get($id, [
            'contain' => ['Users', 'Phinxlog']
        ]);

        $this->set('story', $story);
        $this->set('_serialize', ['story']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $story = $this->Stories->newEntity();
        if ($this->request->is('post')) {
            $story = $this->Stories->patchEntity($story, $this->request->data);
            if ($this->Stories->save($story)) {
                $this->Flash->success(__('The story has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The story could not be saved. Please, try again.'));
            }
        }
        $users = $this->Stories->Users->find('list', ['limit' => 200]);
        $phinxlog = $this->Stories->Phinxlog->find('list', ['limit' => 200]);
        $this->set(compact('story', 'users', 'phinxlog'));
        $this->set('_serialize', ['story']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Story id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $story = $this->Stories->get($id, [
            'contain' => ['Phinxlog']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $story = $this->Stories->patchEntity($story, $this->request->data);
            if ($this->Stories->save($story)) {
                $this->Flash->success(__('The story has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The story could not be saved. Please, try again.'));
            }
        }
        $users = $this->Stories->Users->find('list', ['limit' => 200]);
        $phinxlog = $this->Stories->Phinxlog->find('list', ['limit' => 200]);
        $this->set(compact('story', 'users', 'phinxlog'));
        $this->set('_serialize', ['story']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Story id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $story = $this->Stories->get($id);
        if ($this->Stories->delete($story)) {
            $this->Flash->success(__('The story has been deleted.'));
        } else {
            $this->Flash->error(__('The story could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
