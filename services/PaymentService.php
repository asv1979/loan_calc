<?php

namespace app\services;

use app\models\Loan;
use app\models\Payment;
use app\repositories\PaymentRepository;

class PaymentService
{
    public $payments;

    public function __construct(PaymentRepository $payments)
    {
        $this->payments = $payments;
    }

    public function create(Loan $model): void
    {
        $dateStart = $model->start_date;
        $body_sum = $model->sum / $model->month_term;
        $month_percent = $_ENV['YEAR_PERCENT'] / 12;

        for ($i = 1; $i <= $model->month_term; $i++) {
            $date = ($i !== 1) ?
                date('d-m-Y', strtotime('+' . $i . ' months', strtotime($dateStart))) :
                date('d-m-Y', strtotime('+1 month', strtotime($dateStart)));
            $stay = $model->sum - ($model->sum / $model->month_term) * $i;

            $percent_sum = ($i === 1) ?
                ($model->sum * $month_percent) / 100 :
                (($model->sum - $body_sum * ($i - 1)) * $month_percent) / 100;
            $payment = Payment::create(
                $model->id,
                $date,
                intval($body_sum + $percent_sum),
                intval($body_sum),
                intval($percent_sum),
                intval($stay)
            );
            $this->payments->save($payment);
        }
    }
}
