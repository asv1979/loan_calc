<?php

namespace app\services;

use app\models\Loan;
use app\models\Payment;
use app\repositories\PaymentRepository;

/**
 * Class PaymentService
 * @package app\services
 */
class PaymentService
{
    /**
     * @var PaymentRepository
     */
    public $payments;

    /**
     * PaymentService constructor.
     * @param PaymentRepository $payments
     */
    public function __construct(PaymentRepository $payments)
    {
        $this->payments = $payments;
    }

    /**
     * @param Loan $model
     */
    public function create(Loan $model): void
    {
        $dateStart = $model->start_date;
        $sum_start = $model->sum;
        $month_percent = $_ENV['YEAR_PERCENT'] / 12;
        $debt_amount_repaid = 0;
        $reduced_body = 0;

        $exponentiation = $model->month_term - ($model->month_term * 2);
        $annuity_ratio = $sum_start * ($month_percent / 100) / (1 - pow((1 + $month_percent / 100), $exponentiation));

        for ($i = 1; $i <= $model->month_term; $i++) {
            $date = ($i !== 1) ?
                date('d-m-Y', strtotime('+' . $i . ' months', strtotime($dateStart))) :
                date('d-m-Y', strtotime('+1 month', strtotime($dateStart)));

            $percent_sum = ($i === 1) ?
                ($sum_start * $month_percent) / 100 :
                (($sum_start - $debt_amount_repaid) * $month_percent) / 100;

            $body_sum = $annuity_ratio - $percent_sum;

            $debt_amount_repaid += $body_sum;

            $reduced_body = ($i === 1) ? $sum_start - $body_sum : $sum_start - $debt_amount_repaid;

            $payment = Payment::create(
                $model->id,
                $date,
                intval($annuity_ratio),
                intval($body_sum),
                intval($percent_sum),
                intval($reduced_body)
            );
            $this->payments->save($payment);
        }
    }
}
