<?php

/**
 * Class Alanstormdotcom_Helloworld_IndexController
 */
class Alanstormdotcom_Weblog_IndexController extends Mage_Core_Controller_Front_Action {

    // public function testModelAction() {
    //     echo 'Setup!';
    // }

    public function testModelAction() {

        //echo '7777';

        // $blogpost = Mage::getModel('weblog/blogpost');
        // echo get_class($blogpost);

        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        echo("Loading the blogpost with an ID of ".$params['id']);



        $blogpost->load($params['id']);


        $data = $blogpost->getData();
        var_dump($data);

        // echo __FILE__;
        // $file = "shovak.txt";



    }

    /**
     * @throws Exception
     */
    public function createNewPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle('Code Post!');
        $blogpost->setPost('This post was created from code!');
        $blogpost->save();
        echo 'post created';
    }

    /**
     * @throws Exception
     */
    public function editFirstPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(3);
        $blogpost->setTitle("The First post!");
        $blogpost->save();
        echo 'post edited';
    }

    /**
     * @throws Exception
     */
    public function deleteFirstPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(4);
        $blogpost->delete();
        echo 'post removed';
    }


    public function showAllBlogPostsAction() {
        $posts = Mage::getModel('weblog/blogpost')->getCollection();
        foreach($posts as $blog_post){
            echo '<h3>'.$blog_post->getTitle().'</h3>';
            echo nl2br($blog_post->getPost());
        }
    }

}