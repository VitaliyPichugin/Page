<?php

class Index extends AController
{
    public function __construct(){}

    public function get_body(){

        $db = new Model(HOST, USER, PASS, DB);

        $messages = $db->get_all_messages();

        if($_POST['submit']){
            $db->add_message($_POST['submit']);
        }

        if($_POST['msg_id']){
            $db->add_comment($_POST['msg'], $_POST['msg_id']);
        }

        if($_POST['msg_editId']){
            $db->edit_message($_POST['msg_edit'], $_POST['msg_editId']);
        }

        return $this->render('index', array('title' => 'Messages',
            'messages' => $messages));
    }

}