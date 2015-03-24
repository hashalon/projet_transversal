<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "commune".
 *
 * @property string $com_code
 * @property string $com_name
 * @property string $epci
 * @property string $arrondissement_arr_code
 * @property integer $zone_demploi_zone_no
 *
 * @property ZoneDemploi $zoneDemploiZoneNo
 */
class Commune extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commune';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_code', 'com_name', 'epci'], 'required'],
            [['zone_demploi_zone_no'], 'integer'],
            [['com_code', 'com_name', 'epci', 'arrondissement_arr_code'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'com_code' => 'Com Code',
            'com_name' => 'Com Name',
            'epci' => 'Epci',
            'arrondissement_arr_code' => 'Arrondissement Arr Code',
            'zone_demploi_zone_no' => 'Zone Demploi Zone No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZoneDemploiZoneNo()
    {
        return $this->hasOne(ZoneDemploi::className(), ['zone_no' => 'zone_demploi_zone_no']);
    }
}
