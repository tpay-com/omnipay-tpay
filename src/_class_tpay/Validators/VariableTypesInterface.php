<?php

namespace Omnipay\Tpay\_class_tpay\Validators;

interface VariableTypesInterface
{
    /**
     * @param string $name
     *
     * @return void
     */
    public function validateType($value, $name);
}
