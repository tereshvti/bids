<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RequestForm is the model behind the request form.
 */
class RequestForm extends Model
{
    public $urgency;
    public $description;
    public $tel;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['urgency', 'description', 'tel'], 'required'],
        ];
    }
}
