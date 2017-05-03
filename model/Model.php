<?php

class Model
{
    public $db;

    public function __construct($host, $user, $pass, $db){
        $this->db = mysql_connect($host, $user, $pass);
        if(!$this->db){
            exit('No connection with DB');
        }
        if(!mysql_select_db($db, $this->db)){
            exit('No table');
        }
        mysql_query('SET NAMES utf8');

        return $this->db;
    }

    public function get_all_messages(){
        $messages = array();

        $query = 'SELECT * FROM messages ORDER BY if(parent_id=0, -unix_timestamp(date), unix_timestamp(date))';

        $res = mysql_query($query);

        if(!$res){
            return false;
        }

        while($row = mysql_fetch_assoc($res)){
            $messages[$row['id']] = $row;
        }

        $messages = $this->tree($messages);

        $messages = $this->getMessageTemplate($messages);

        return $messages;
    }

    public function add_message($text){
        $message = $this->clearData($text);
        $uid = $_SESSION['userUid'];

        if(!empty($message) && isset($uid)){
            $query = "INSERT INTO messages (text, uid) VALUES ('$text', '$uid')";
            mysql_query($query);
        }else{
            return false;
        }

    }

    public function add_comment($text, $id){
        $message = $this->clearData($text);
        $uid = $_SESSION['userUid'];
        $id = (int)$id;

        if(!empty($message) && isset($uid)){
            $query = "INSERT INTO messages (text, parent_id, uid) VALUES ('$text', '$id', '$uid')";
            mysql_query($query);
        }else{
            return false;
        }

    }

    public function edit_message($text, $id){
        $message = $this->clearData($text);
        $id = (int)$id;

        if(!empty($message)){
            $query = "UPDATE messages SET text = '$text' WHERE id = $id";
            mysql_query($query);
        }else{
            return false;
        }
    }

    private function clearData($var){
        $var = trim(mysql_real_escape_string($var));
        return $var;
    }

    private function tree($data){
        $tree = array();

        foreach($data as $id=>&$row){
            if(empty($row['parent_id'])){
                $tree[$id] = &$row;
            }else{
                $data[$row['parent_id']]['children'][$id] = &$row;
            }
        }

        return $tree;
    }

    private function getMessageTemplate($messages){
        $html = '';

        foreach($messages as $message){
            ob_start();
            include 'view/messages_template.php';
            $html .= ob_get_clean();
        }
        return $html;
    }

}