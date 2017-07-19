<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "places".
 *
 * @property integer $place_id
 * @property string $place_name
 * @property string $place_city_name
 *
 * @property Packages[] $packages
 */
class Places extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'places';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_name', 'place_city_name'], 'required'],
            [['place_name'], 'string', 'max' => 30],
            [['place_city_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'place_id' => 'Place ID',
            'place_name' => 'Place Name',
            'place_city_name' => 'Place City Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(Packages::className(), ['places_place_id' => 'place_id']);
    }
}
