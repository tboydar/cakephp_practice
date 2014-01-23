<?php
class PostsController extends AppController{
	public $helpers = array('Html', 'Form');

	public function index(){
		$this->set('posts', $this->Post->find('all'));
	//	print_r("hi:".$posts);
	}
}
?>
