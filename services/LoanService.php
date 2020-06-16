<?php

namespace app\services;

use app\models\Loan;
use app\models\LoanForm;
use app\repositories\LoanRepository;


class LoanService
{
    public $loans;

    public function __construct(LoanRepository $loans)
    {
        $this->loans = $loans;
    }

    public function create(LoanForm $form): Loan
    {

        $month_percent = $_ENV['MONTH_PERCENT'] ;
        $percent_sum = ($form->sum * $month_percent * $form->month_term) / 100;


        $loan = Loan::create(
            $form->start_date,
            $form->sum,
            $percent_sum,
            $form->month_term,
            $month_percent * 12,
            $form->sum + $percent_sum
        );
        $this->loans->save($loan);
        return $loan;
    }
}
