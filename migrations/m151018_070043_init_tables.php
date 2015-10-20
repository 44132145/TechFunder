<?php

use yii\db\Schema;
use yii\db\Migration;

class m151018_070043_init_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(50)->notNull(),
            'lastname'  => $this->string(50)->notNull(),
            'email'     => $this->string()->notNull()->unique(),
            'birthday'  => $this->date(),
            'shoesize'  => $this->integer(),
        ], $tableOptions);
        $this->safeUp();

        $this->createTable('{{%questionnaire}}', [
            'id'         => $this->primaryKey(),
            'type'       => "enum('text', 'date') NOT NULL DEFAULT 'text'",
            'post_index' => $this->string(25),
            'title'      => $this->string(50)->notNull()->unique(),
            'dateAdd'    => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ], $tableOptions);

        $this->createTable('{{%user_questionnaire}}', [
            'user_id'       => $this->integer(),
            'id_Q'          => $this->integer(),
            'user_response' => $this->string(50)->notNull(),
        ], $tableOptions);

        $this->createIndex('UniqueRow', '{{%user}}', ['firstname', 'lastname', 'email'], true);
        $this->addForeignKey('UQ2User', '{{%user_questionnaire}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('UQ2Ques', '{{%user_questionnaire}}', 'id_Q', '{{%questionnaire}}', 'id');

        return true;
    }

    public function down()
    {
        $this->dropForeignKey('UQ2User', '{{%user_questionnaire}}');
        $this->dropForeignKey('UQ2Ques', '{{%user_questionnaire}}');

        $this->dropTable('{{%user}}');
        $this->dropTable('{{%questionnaire}}');
        $this->dropTable('{{%user_questionnaire}}');

        return true;
    }
}
