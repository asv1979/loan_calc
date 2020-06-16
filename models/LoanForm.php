<?php

namespace app\models;

use yii\base\Model;

/**
 * Class LoanForm
 * @package app\models
 */
class LoanForm extends Model
{

    /**
     * @var
     */
    public $start_date;

    /**
     * @var
     */
    public $sum;

    /**
     * @var
     */
    public $month_term;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['start_date', 'sum', 'month_term'], 'required'],
            ['start_date', 'date', 'format' => 'dd-MM-yyyy'],
            ['sum', 'integer', 'min' => 1000, 'max' => 100000],
            ['month_term', 'in', 'range' => range(2, 24)],
        ];
    }
}
