<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEducoreTables extends Migration
{
    public function up()
    {
        // --- school_personnel table ---
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'auto_increment' => true],
            'firstname'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'middlename'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'lastname'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'           => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'password'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'role'            => ['type' => 'ENUM', 'constraint' => ['Administrator', 'Faculty']],
            'department'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'school_id'       => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'contact_number'  => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'created_at'      => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at'      => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
                'on update' => 'CURRENT_TIMESTAMP'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('school_personnel');

        // --- students_account table ---
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'student_id' => ['type' => 'VARCHAR', 'constraint' => 15, 'unique' => true],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'password'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('students_account');

        // --- students_information table ---
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'student_id'  => ['type' => 'INT'],
            'program'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'firstname'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'middlename'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'lastname'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'age'         => ['type' => 'INT', 'null' => true],
            'birthday'    => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('student_id', 'students_account', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('students_information');
    }

    public function down()
    {
        $this->forge->dropTable('students_information');
        $this->forge->dropTable('students_account');
        $this->forge->dropTable('school_personnel');
    }
}
