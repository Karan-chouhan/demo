<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
    //public $components = array('Flash');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
    }
    
    public function view($id = null) {
    	$this->loadModel('Comment');
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post['Post'] = $this->Post->findById($id);
        $post['Comment'] = $this->Comment->findAllByPost_id($id);
        //debug($comments);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function add() {
            if ($this->request->is('post')) {
                $this->Post->create();
                if ($this->Post->save($this->request->data)) {
                  //  $this->Flash->success(__('Your post has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Unable to add your post.'));
            }
        }
    public function edit($id = null) {


	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $post = $this->Post->findById($id);
	    debug($this->request->data);
	    if (!$post) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('post', 'put'))) {

	        $this->Post->id = $id;
	        if ($this->Post->save($this->request->data)) {
	        	echo 'asdfas';
	            //$this->Flash->success(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        //$this->Flash->error(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $post;
	    }
	}
	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Post->delete($id)) {
	       
	    } else {
	        
	    }

	    return $this->redirect(array('action' => 'index'));
	}
	public function comment($id = null) {
		$this->loadModel('Comment');

		if ($this->request->is('post')) {
		    $this->Comment->create();
		    if ($this->Comment->save($this->request->data)) {
		      //  $this->Flash->success(__('Your post has been saved.'));
		    	$this->Session->setFlash('Your comment is successfully submited', 'default', array(), 'good');
		        return $this->redirect(array('action' => 'index'));
		    }
		    $this->Flash->error(__('Unable to add your post.'));
		}
	}
}	