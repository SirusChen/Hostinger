<?php
namespace app\models;
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
class PushRecord extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'push_record';
    }

    public function rules() {
        return [
            [['name', 'department', 'guy_name', 'guy_email'], 'string', 'max' => 50],
            [['guy_phone'], 'string', 'max' => 11],
        ];
    }

    public function attributeLabels() {
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

/*
 *
 CREATE TABLE `push_record` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(50) NOT NULL DEFAULT '' ,
    `department` VARCHAR(50) NOT NULL DEFAULT '' ,
    `guy_name` VARCHAR(50) NOT NULL DEFAULT '' ,
    `guy_phone` VARCHAR(11) NOT NULL DEFAULT '' ,
    `guy_email` VARCHAR(50) NOT NULL DEFAULT '' ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `push_record` (`name`, `department`, `guy_name`, `guy_phone`, `guy_email`) VALUES ('陈思宇', '花海仓', '周杰伦', '13822192563', 'siruschen@foxmail.com')
 */