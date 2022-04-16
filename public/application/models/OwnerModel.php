<?php
defined('BASEPATH') OR exut('No direct script access allowed');

class OwnerModel extends CI_Model {

    public function __construct(){

        $this->load->database();

    }

    public function save(){

        $json = file_get_contents('php://input');

        $data = json_decode($json);

        $field = array(

            'owner_name'=>$data->owner_name,

            'pet_type_name'=>$data->pet_type_name, 

        );

        $id = $data->id;

        if($id == 0){

            $this->db->insert("owners", $field);

            $id = $this->db->insert_id();

        }        else{

            $this->db->where("id", $id);

            $this->db->update("owners", $field);

        }

    }

    public function lists(){

        $data = $this->db->get("owners");

        return $data->result();

    }

    public function getbyid($id){

        $this->db->where("id", $id);

        $data = $this->db->get("owners");
        
        return $data->result()[0];

    }

    public function delete($id){

        $this->db->where("id", $id);

        $this->db->delete("owners");

    }

}