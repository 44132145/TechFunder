<?php
namespace app\models;

use Yii;
use yii\base\Model;

class FormAncet extends Model
{
    public $ice_cream;
    public $superhero;
    public $movie_star;
    public $world_will_end;
    public $super_bowl;

    public function rules()
    {
        return [
                ['world_will_end', 'date', 'format' =>  'yyyy-mm-dd', 'message' => 'error data format'],
                [['world_will_end', 'ice_cream', 'superhero', 'movie_star', 'super_bowl'], 'required', 'message' => 'must bee not empty'],
        ];
    }
}
?>