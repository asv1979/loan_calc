<?php

namespace app\repositories;

use app\models\Loan;

/**
 * Class LoanRepository
 * @package app\repositories
 */
class LoanRepository
{
    /**
     * @param Loan $loan
     */
    public function save(Loan $loan): void
    {
        if (!$loan->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}
