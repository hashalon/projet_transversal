<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property integer $reg_no
 * @property string $reg_name
 *
 * @property Departement[] $departements
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reg_no', 'reg_name'], 'required'],
            [['reg_no'], 'integer'],
            [['reg_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reg_no' => 'Reg No',
            'reg_name' => 'Reg Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartements()
    {
        return $this->hasMany(Departement::className(), ['region_reg_no' => 'reg_no']);
    }
}
