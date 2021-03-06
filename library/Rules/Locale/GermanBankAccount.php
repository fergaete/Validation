<?php
namespace Respect\Validation\Rules\Locale;

use malkusch\bav\BAV;
use Respect\Validation\Rules\AbstractRule;

/**
 * Validates a german bank account.
 *
 * This validator depends on the composer package "malkusch/bav".
 *
 * @author Markus Malkusch <markus@malkusch.de>
 * @see    BAV::isValidBankAccount()
 */
class GermanBankAccount extends AbstractRule
{
    /**
     * @var string
     */
    public $bank;

    /**
     * @var BAV
     */
    public $bav;

    /**
     * @param BAV $bav
     */
    public function __construct($bank, BAV $bav = null)
    {
        if (null === $bav) {
            $bav = new BAV();
        }
        $this->bav  = $bav;
        $this->bank = $bank;
    }

    /**
     * @return boolean
     */
    public function validate($input)
    {
        return $this->bav->isValidBankAccount($this->bank, $input);
    }
}
