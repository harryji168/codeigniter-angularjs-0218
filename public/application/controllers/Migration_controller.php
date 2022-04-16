<?php
 defined(' BASEPATH ') OR exit('No direct script access allowed'); 
 class Migration_controller extends CI_Migration 
 {
 public function down()
         {
         echo "<title> Tutorial and Example </title>"; 
         $this->load->library('migration'); // load migration class
         $delete_table = $this->dbforge->drop_table('students'); // pass the table name
         if($delete_table == true)
         {
         echo "Your table has been successfully deleted ";
         }
         else 
         {
                 echo "Table is not deleted";
         }
         }
 }
 ?> 