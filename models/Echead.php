<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec_head".
 *
 * @property string $NORDEN
 * @property integer $IDCLI
 * @property integer $DNI
 * @property string $EMAIL
 * @property string $FECHA
 * @property string $IMPORTE
 * @property string $MEDIO_PAGO
 * @property string $TARJETA
 * @property string $BANCO
 * @property integer $CUOTAS
 * @property integer $BIN
 * @property integer $CUPON
 * @property string $AUTH
 * @property string $METODO_ENVIO
 * @property string $VALOR_ENVIO
 * @property string $VALOR_DESC
 * @property string $VALOR_INTERESES
 * @property string $STORE_CREDIT
 * @property integer $IF_REMITO
 * @property string $ID_REMITO
 * @property integer $IF_FE_ID
 * @property string $ID_FE_ID
 * @property integer $IF_FACTURA
 * @property string $ID_FACTURA
 * @property integer $IF_DEL
 * @property integer $IF_AUTH
 * @property integer $MARK
 * @property integer $EOR
 */
class Echead extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec_head';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbStadio');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NORDEN'], 'required'],
            [['NORDEN', 'EMAIL', 'MEDIO_PAGO', 'TARJETA', 'BANCO', 'AUTH', 'METODO_ENVIO', 'ID_REMITO', 'ID_FE_ID', 'ID_FACTURA'], 'string'],
            [['IDCLI', 'DNI', 'CUOTAS', 'BIN', 'CUPON', 'IF_REMITO', 'IF_FE_ID', 'IF_FACTURA', 'IF_DEL', 'IF_AUTH', 'MARK', 'EOR'], 'integer'],
            [['FECHA'], 'safe'],
            [['IMPORTE', 'VALOR_ENVIO', 'VALOR_DESC', 'VALOR_INTERESES', 'STORE_CREDIT'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NORDEN' => 'Norden',
            'IDCLI' => 'Idcli',
            'DNI' => 'Dni',
            'EMAIL' => 'Email',
            'FECHA' => 'Fecha',
            'IMPORTE' => 'Importe',
            'MEDIO_PAGO' => 'Medio  Pago',
            'TARJETA' => 'Tarjeta',
            'BANCO' => 'Banco',
            'CUOTAS' => 'Cuotas',
            'BIN' => 'Bin',
            'CUPON' => 'Cupon',
            'AUTH' => 'Auth',
            'METODO_ENVIO' => 'Metodo  Envio',
            'VALOR_ENVIO' => 'Valor  Envio',
            'VALOR_DESC' => 'Valor  Desc',
            'VALOR_INTERESES' => 'Valor  Intereses',
            'STORE_CREDIT' => 'Store  Credit',
            'IF_REMITO' => 'If  Remito',
            'ID_REMITO' => 'Id  Remito',
            'IF_FE_ID' => 'If  Fe  ID',
            'ID_FE_ID' => 'Id  Fe  ID',
            'IF_FACTURA' => 'If  Factura',
            'ID_FACTURA' => 'Id  Factura',
            'IF_DEL' => 'If  Del',
            'IF_AUTH' => 'If  Auth',
            'MARK' => 'Mark',
            'EOR' => 'Eor',
        ];
    }
}
