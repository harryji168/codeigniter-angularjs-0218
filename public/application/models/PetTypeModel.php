<?php
defined('BASEPATH') OR exut('No direct script access allowed');

class PetTypeModel extends CI_Model {

    public function __construct(){

        $this->load->database();

    }

    public function save(){

        $json = file_get_contents('php://input');

        $data = json_decode($json);

        $field = array(
 
            'pet_type_name'=>$data->pet_type_name, 
            'description'=>$data->description, 

        );

        $id = $data->id;

        if($id == 0){

            $this->db->insert("pet_types", $field);

            $id = $this->db->insert_id();

        }        else{

            $this->db->where("id", $id);

            $this->db->update("pet_types", $field);

        }

    }

    public function lists(){

        $data = $this->db->get("pet_types");

        return $data->result();

    }

    public function getbyid($id){

        $this->db->where("id", $id);

        $data = $this->db->get("pet_types");

        return $data->result()[0];

    }

    public function delete($id){

        $this->db->where("id", $id);

        $this->db->delete("pet_types");

    }

}