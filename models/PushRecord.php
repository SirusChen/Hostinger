<?php
/**
 * Created by PhpStorm.
 * User: Sirus
 * Date: 2017/2/16
 * Time: 23:51
 */
namespace app\models;

use yii\db\ActiveRecord;

class PushRecord extends ActiveRecord {

}

/*
 *
 CREATE TABLE `vip_push` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(50) NOT NULL DEFAULT '' ,
    `department` VARCHAR(50) NOT NULL DEFAULT '' ,
    `guy_name` VARCHAR(50) NOT NULL DEFAULT '' ,
    `guy_phone` VARCHAR(11) NOT NULL DEFAULT '' ,
    `guy_email` VARCHAR(50) NOT NULL DEFAULT '' ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `vip_push` (`name`, `department`, `guy_name`, `guy_phone`, `guy_email`) VALUES ('陈思宇', '花海仓', '周杰伦', '13822192563', 'siruschen@foxmail.com')
 */