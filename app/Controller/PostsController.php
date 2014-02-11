<?php
class PostsController extends AppController{
    public $helpers = array('Html', 'Form');
    public function index(){
        $this->set('posts', $this->Post->find('all'));
        //	print_r("hi:".$posts);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
    public function add() {
        echo "test";
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');

            $this->Post->create();

            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    public  function edit ($id = null) {
        if(!$id){
            throw new NotFoundException(__('Inval Post'));
        }
        $post = $this->Post->findById($id);
        if(!$post){
            throw new NotFoundException(__('Invalid post'));
        }

        if($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }

        if(!$this->request->data){
            $this->request->data = $post;
        }
        // body
    }

}
?>
