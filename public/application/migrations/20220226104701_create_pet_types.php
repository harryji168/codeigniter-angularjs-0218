<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Migration_Create_pet_types extends CI_Migration { 
    public function up() { 

       
        $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'pet_type_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '10'
            ),
            'description' => array(
                    'type' => 'TEXT',
                    'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('pet_types');
        print_r($this->dbforge); 
        // print_r($this->dbforge);
        // die("dfgdf");
    }

    public function down()
    {
        $this->dbforge->drop_table('pet_types');
    }
}