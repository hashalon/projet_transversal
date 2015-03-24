<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departement".
 *
 * @property string $dep_no
 * @property string $dep_name
 * @property integer $region_reg_no
 *
 * @property Arrondissement[] $arrondissements
 * @property Region $regionRegNo
 */
class Departement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dep_no', 'dep_name'], 'required'],
            [['region_reg_no'], 'integer'],
            [['dep_no', 'dep_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dep_no' => 'Dep No',
            'dep_name' => 'Dep Name',
            'region_reg_no' => 'Region Reg No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrondissements()
    {
        return $this->hasMany(Arrondissement::className(), ['departement_dep_no' => 'dep_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionRegNo()
    {
        return $this->hasOne(Region::className(), ['reg_no' => 'region_reg_no']);
    }
}
