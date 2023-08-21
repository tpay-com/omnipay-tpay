<?php

namespace Omnipay\Tpay\Dictionaries\Payments;

use Omnipay\Tpay\Dictionaries\FieldsConfigDictionary;

class WhiteLabelFieldsDictionary
{
    /** List of supported fields for white label payment request */
    const REQUEST_FIELDS = [
        // User api login
        'api_login' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING],
        ],
        // User api password
        'api_password' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING],
        ],
        // Client name
        'cli_name' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING, 'maxlength_96'],
            FieldsConfigDictionary::FILTER => FieldsConfigDictionary::TEXT,
        ],
        // Client email
        'cli_email' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [
                FieldsConfigDictionary::STRING,
                FieldsConfigDictionary::MAXLENGTH_128,
            ],
            FieldsConfigDictionary::FILTER => 'mail',
        ],
        // Client phone
        'cli_phone' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::MAXLENGTH_32],
            FieldsConfigDictionary::FILTER => FieldsConfigDictionary::PHONE,
        ],
        // Order id (payment title) the customer will be paying with; according to agreed format;
        'order' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING],
        ],
        // Transaction amount
        FieldsConfigDictionary::AMOUNT => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::FLOAT],
        ],
        // Message checksum
        'hash' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [
                FieldsConfigDictionary::STRING,
                FieldsConfigDictionary::MAXLENGTH_40,
            ],
            FieldsConfigDictionary::FILTER => 'sign',
        ],
    ];
}
