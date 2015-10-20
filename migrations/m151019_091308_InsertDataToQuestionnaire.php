<?php

use yii\db\Schema;
use yii\db\Migration;

class m151019_091308_InsertDataToQuestionnaire extends Migration
{
    public function up()
    {
        $this->insert('{{%questionnaire}}', [
            'type'          =>  'text',
            'post_index'    =>  'firstname',
            'title'         =>  'First Name',
            'formName'      =>  'form1'
        ]);
        $this->insert('{{%questionnaire}}', [
            'type'          =>  'text',
            'post_index'    =>  'lastname',
            'title'         =>  'Last Name',
            'formName'      =>  'form1'
        ]);
        $this->insert('{{%questionnaire}}', [
            'type'          =>  'text',
            'post_index'    =>  'email',
            'title'         =>  'Email address',
            'formName'      =>  'form1'
        ]);
        $this->insert('{{%questionnaire}}', [
            'type'          =>  'date',
            'post_index'    =>  'birthday',
            'title'         =>  'birthday',
            'formName'      =>  'form1'
        ]);
        $this->insert('{{%questionnaire}}', [
            'type'          =>  'text',
            'post_index'    =>  'shoesize',
            'title'         =>  'Shoe size',
            'formName'      =>  'form1'
        ]);

        /**-------------------------------*/

        $this->insert('{{%questionnaire}}', [
            'type'          =>  'text',
            'post_index'    =>  'ice_cream',
            'title'         =>  'What is Your Favorite Ice cream?',
            'formName'      =>  'form2'
        ]);
        $this->insert('{{%questionnaire}}', [
            'type'          =>  'text',
            'post_index'    =>  'superhero',
            'title'         =>  'Who is your favorite superhero?',
            'formName'      =>  'form2'
        ]);
        $this->insert('{{%questionnaire}}', [
            'type'          =>  'text',
            'post_index'    =>  'movie_star',
            'title'         =>  'Who is your favorite movie star?',
            'formName'      =>  'form2'
        ]);
        $this->insert('{{%questionnaire}}', [
            'type'          =>  'date',
            'post_index'    =>  'world_will_end',
            'title'         =>  'when do you think the world will end?',
            'formName'      =>  'form2'
        ]);
        $this->insert('{{%questionnaire}}', [
            'type'          =>  'text',
            'post_index'    =>  'super_bowl',
            'title'         =>  'Who will win the super bowl this year?',
            'formName'      =>  'form2'
        ]);

    }

    public function down()
    {
        $this->delete('{{%questionnaire}}');
        return true;
    }
}
