<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Migration_Create_owners extends CI_Migration { 
    public function up() {        
        $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'owner_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'pet_type_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '10'
            ) 
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('owners');     
        print_r($this->dbforge); 
    }

    public function down()
    {
        $this->dbforge->drop_table('owners');
    }
}