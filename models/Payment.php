<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord as ActiveRecordAlias;

/**
 * This is the model class for table "payments".
 *
 * @property int $id
 * @property int|null $loan_id
 * @property string|null $date
 * @property int|null $whole_sum
 * @property int|null $body_sum
 * @property int|null $percent_sum
 * @property int|null $balance_owed
 */
class Payment extends ActiveRecordAlias
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['loan_id', 'whole_sum', 'body_sum', 'percent_sum', 'balance_owed'], 'integer'],
            [['date'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'loan_id' => 'Loan ID',
            'date' => 'Date',
            'whole_sum' => 'Whole Sum',
            'body_sum' => 'Body Sum',
            'percent_sum' => 'Percent Sum',
            'balance_owed' => 'Balance Owed',
        ];
    }

    /**
     * @param $loan_id
     * @param $date
     * @param $whole_sum
     * @param $body_sum
     * @param $percent_sum
     * @param $balance_owed
     * @return static
     */
    public static function create($loan_id, $date, $whole_sum, $body_sum, $percent_sum, $balance_owed): self
    {
        $payment = new static();
        $payment->loan_id = $loan_id;
        $payment->date = $date;
        $payment->whole_sum = $whole_sum;
        $payment->body_sum = $body_sum;
        $payment->percent_sum = $percent_sum;
        $payment->balance_owed = $balance_owed;
        return $payment;
    }

    /**
     * @return array
     */
    public function transactions()
    {
        return [
            'scenario' => self::OP_ALL,
        ];
    }
}
