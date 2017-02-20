<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "push_record".
 *
 * @property string $id
 * @property string $name
 * @property string $department
 * @property string $guy_name
 * @property string $guy_phone
 * @property string $guy_email
 */
class PushRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'push_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'department', 'guy_name', 'guy_email'], 'string', 'max' => 50],
            [['guy_phone'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'department' => 'Department',
            'guy_name' => 'Guy Name',
            'guy_phone' => 'Guy Phone',
            'guy_email' => 'Guy Email',
        ];
    }
}
