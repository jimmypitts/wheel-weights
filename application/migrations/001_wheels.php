<?php

class Migration_Wheels extends CI_Migration {
    public function up(){
        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
                'auto_increment' => TRUE,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ),
            'width' => array(
                'type' => 'DECIMAL',
                'constraint' => '2,1',
                'null' => FALSE,
            ),
            'height' => array(
                'type' => 'INT',
                'constraint' => 2,
                'null' => FALSE,
            ),
            'weight' => array(
                'type' => 'DECIMAL',
                'constraint' => '2,2',
                'null' => FALSE,
            ),
            'method' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key(array('name', 'width', 'height'));
        $this->dbforge->create_table('wheels');        
    }
 
    public function down(){
        $this->dbforge->drop_table('wheels');
    }
}
