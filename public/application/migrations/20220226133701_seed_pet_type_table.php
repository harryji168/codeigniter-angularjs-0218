<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Seed_pet_type_table extends CI_Migration {

    public function up()
    {
        foreach ($this->seedData as $seed ) {
            $sql = 'INSERT INTO pet_types VALUES '.$seed;
            echo $sql.'<br>';
            $this->db->query($sql);
        }
    }

    public function down()
    {
        foreach ($this->seedData as $seed) {
            $hash = substr($seed, 2, 32);
            $sql = 'DELETE FROM pet_types WHERE hash = \''.$hash.'\'';
            $this->db->query($sql);
        }
    }

    private $seedData = array(
        '("1", "Dog","")',
        '("2", "Cat","")',
        '("3", "Rabbit","")',
        '("4", "Bird","")',
    );
}