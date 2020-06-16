<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loans".
 *
 * @property int $id
 * @property string|null $start_date
 * @property int|null $sum
 * @property int|null $percent_sum
 * @property int|null $month_term
 * @property int|null $year_percent
 * @property int|null $whole_sum
 */
class Loan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sum', 'percent_sum', 'month_term', 'year_percent', 'whole_sum'], 'integer'],
            [['start_date'], 'string', 'max' => 10],
        ];
    }

    /**
     * @param $start_date
     * @param $sum
     * @param $percent_sum
     * @param $month_term
     * @param $year_percent
     * @param $whole_sum
     * @return static
     */
    public static function create($start_date, $sum, $percent_sum, $month_term, $year_percent, $whole_sum): self
    {
        $loan = new static();
        $loan->start_date = $start_date;
        $loan->sum = $sum;
        $loan->percent_sum = $percent_sum;
        $loan->month_term = $month_term;
        $loan->year_percent = $year_percent;
        $loan->whole_sum = $whole_sum;
        return $loan;
    }
}
