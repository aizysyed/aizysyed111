<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $schedule_id
 * @property integer $packages_package_id
 * @property integer $day
 * @property string $description
 *
 * @property Packages $packagesPackage
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['packages_package_id', 'day', 'description'], 'required'],
            [['packages_package_id', 'day'], 'integer'],
            [['description'], 'string'],
            [['packages_package_id'], 'exist', 'skipOnError' => true, 'targetClass' => Packages::className(), 'targetAttribute' => ['packages_package_id' => 'package_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'schedule_id' => 'Schedule ID',
            'packages_package_id' => 'Packages Package ID',
            'day' => 'Day',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackagesPackage()
    {
        return $this->hasOne(Packages::className(), ['package_id' => 'packages_package_id']);
    }
}
