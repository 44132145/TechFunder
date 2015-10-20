<?php

use yii\db\Schema;
use yii\db\Migration;

class m151019_063052_update_questionnaire extends Migration
{
    public function up()
    {
        $this->addColumn('{{%questionnaire}}', 'formName', $this->string(25));
    }

    public function down()
    {
        echo "m151019_063052_update_questionnaire cannot be reverted.\n";

        return false;
    }
}
