<?php

use yii\db\Schema;
use yii\db\Migration;

class m151207_193241_create_contactus_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('contactus', [
            'id' => Schema::TYPE_PK,
            'language' => 'string',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'phone' => Schema::TYPE_STRING,
            'subject' => Schema::TYPE_STRING . ' NOT NULL',
            'departmentId' => Schema::TYPE_INTEGER,
            'message' => 'text COLLATE utf8_unicode_ci NOT NULL',
            'createdAt' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updatedAt' => Schema::TYPE_INTEGER .  ' NOT NULL',
        ], $tableOptions);

        $this->createTable('contactus_department', array(
            'id' => Schema::TYPE_PK,
            'language' => 'string',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'createdAt' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updatedAt' => Schema::TYPE_INTEGER .  ' NOT NULL',
        ));
        $this->addForeignKey('FK_department', 'contactus', 'departmentId', 'contactus_department', 'id', 'CASCADE', 'RESTRICT');
    }
    public function down()
    {
        $this->dropForeignKey('FK_department', 'contactus');
        $this->dropTable('contactus_department');
        $this->dropTable('contactus');
    }
}
