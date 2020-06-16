<?php

namespace app\services;

use app\models\Loan;
use app\models\LoanForm;
use app\repositories\LoanRepository;

/**
 * Class LoanService
 * @package app\services
 */
class LoanService
{
    /**
     * @var LoanRepository
     */
    public $loans;

    /**
     * LoanService constructor.
     * @param LoanRepository $loans
     */
    public function __construct(LoanRepository $loans)
    {
        $this->loans = $loans;
    }

    /**
     * @param LoanForm $form
     * @return Loan
     */
    public function create(LoanForm $form): Loan
    {
        $loan = Loan::create(
            $form->start_date,
            $form->sum,
            $form->month_term,
            $_ENV['YEAR_PERCENT']
        );
        $this->loans->save($loan);
        return $loan;
    }
}
