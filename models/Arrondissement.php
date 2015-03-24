<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arrondissement".
 *
 * @property string $arr_code
 * @property string $arr_name
 * @property string $departement_dep_no
 *
 * @property Departement $departementDepNo
 */
class Arrondissement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arrondissement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arr_code', 'arr_name'], 'required'],
            [['arr_code', 'arr_name', 'departement_dep_no'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'arr_code' => 'Arr Code',
            'arr_name' => 'Arr Name',
            'departement_dep_no' => 'Departement Dep No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartementDepNo()
    {
        return $this->hasOne(Departement::className(), ['dep_no' => 'departement_dep_no']);
    }
}
