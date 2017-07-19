<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "packages".
 *
 * @property integer $package_id
 * @property string $package_name
 * @property integer $package_days
 * @property integer $places_place_id
 * @property integer $package_total_amount
 *
 * @property Places $placesPlace
 * @property Schedule[] $schedules
 */
class Packages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'packages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_name', 'package_days', 'places_place_id', 'package_total_amount'], 'required'],
            [['package_days', 'places_place_id', 'package_total_amount'], 'integer'],
            [['package_name'], 'string', 'max' => 100],
            [['places_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Places::className(), 'targetAttribute' => ['places_place_id' => 'place_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'package_id' => 'Package ID',
            'package_name' => 'Package Name',
            'package_days' => 'Package Days',
            'places_place_id' => 'Places Place ID',
            'package_total_amount' => 'Package Total Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlacesPlace()
    {
        return $this->hasOne(Places::className(), ['place_id' => 'places_place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['packages_package_id' => 'package_id']);
    }
}
