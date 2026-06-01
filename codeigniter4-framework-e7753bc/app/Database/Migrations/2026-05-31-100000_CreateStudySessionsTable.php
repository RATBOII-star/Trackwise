<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStudySessionsTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'subject' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'topic' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'hours' => [
                'type'       => 'INT',
                'constraint' => 3,
                'default'    => 0,
            ],
            'minutes' => [
                'type'       => 'INT',
                'constraint' => 3,
                'default'    => 0,
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->addKey('created_at');
        $this->forge->createTable('study_sessions', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('study_sessions', true);
    }
}
