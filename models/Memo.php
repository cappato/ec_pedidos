<?php

namespace app\models;
use app\models\Gerencias;
use app\models\Sectores;

use Yii;

/**
 * This is the model class for table "memo".
 *
 * @property integer $id
 * @property integer $numero
 * @property string $titulo
 * @property string $texto
 * @property string $tags
 * @property integer $gerencia
 * @property integer $sector
 * @property integer $area
 * @property integer $manual
 * @property string $fechacreacion
 * @property string $fechamodificacion
 * @property string $fechainicio
 * @property string $fechafin
 * @property integer $creador
 * @property integer $vigente
 */
class Memo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memo';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbIntranet');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'gerencia', 'sector', 'area', 'manual', 'creador', 'vigente'], 'integer'],
            [['titulo', 'texto', 'tags'], 'string'],
            [['fechacreacion', 'fechamodificacion', 'fechainicio', 'fechafin'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Número de memo' => 'Numero',
            'Título' => 'Titulo',
            'Texto' => 'Texto',
            'Tags' => 'Tags',
            'Gerencia' => 'Gerencia',
            'Sector' => 'Sector',
            'Area' => 'Area',
            'Manual' => 'Manual',
            'Fecha de Creación' => 'Fechacreacion',
            'Fecha de Modificación' => 'Fechamodificacion',
            'Fecha de Inicio' => 'Fechainicio',
            'Fecha de finalización' => 'Fechafin',
            'Creado por' => 'Creador',
            'Vigente' => 'Vigente',
        ];
    }
        public function getGerencia0()
    {
        return $this->hasOne(Gerencias::className(), ['id' => 'gerencia']);
    }
public function getGerenciaName() {
    return $this->gerencia->nombre;
}
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector0()
    {
        return $this->hasOne(Sectores::className(), ['id' => 'sector']);
    }
}
