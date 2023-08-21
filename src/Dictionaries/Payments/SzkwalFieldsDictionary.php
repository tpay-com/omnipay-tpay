<?php

namespace Omnipay\Tpay\Dictionaries\Payments;

use Omnipay\Tpay\Dictionaries\FieldsConfigDictionary;

class SzkwalFieldsDictionary
{
    /** List of supported fields for szkwal payment request */
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
            FieldsConfigDictionary::FILTER => 'name',
        ],
        // Client email
        'cli_email' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING, 'maxlength_128'],
            FieldsConfigDictionary::FILTER => 'mail',
        ],
        // Client phone
        'cli_phone' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING, 'maxlength_32'],
            FieldsConfigDictionary::FILTER => FieldsConfigDictionary::PHONE,
        ],
        // Title the client will be paying with; according to agreed format;
        'title' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING],
        ],
        // Optional field sent in notifications
        'crc' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING, 'maxlength_64'],
            FieldsConfigDictionary::FILTER => FieldsConfigDictionary::TEXT,
        ],
        // Client account number
        'cli_account' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING, 'minlength_26', 'maxlength_26'],
            FieldsConfigDictionary::FILTER => FieldsConfigDictionary::NUMBERS,
        ],
        // Checksum
        'hash' => [
            FieldsConfigDictionary::REQUIRED => true,
            FieldsConfigDictionary::VALIDATION => [
                FieldsConfigDictionary::STRING,
                FieldsConfigDictionary::MINLENGTH_40,
                FieldsConfigDictionary::MAXLENGTH_40,
            ],
            FieldsConfigDictionary::FILTER => 'sign',
        ],
    ];

    /** List of fields available in szkwal payment response */
    const RESPONSE_FIELDS = [
        // Unique SZKWał payment ID
        'pay_id' => [
            FieldsConfigDictionary::REQUIRED => false,
            FieldsConfigDictionary::TYPE => FieldsConfigDictionary::INT,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::INT],
        ],
        // Unique SZKWał notification ID
        'not_id' => [
            FieldsConfigDictionary::REQUIRED => false,
            FieldsConfigDictionary::TYPE => FieldsConfigDictionary::INT,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::INT],
        ],
        // The title of payment in agreed format
        'title' => [
            FieldsConfigDictionary::REQUIRED => false,
            FieldsConfigDictionary::TYPE => FieldsConfigDictionary::STRING,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING],
        ],
        // Additional client field
        'crc' => [
            FieldsConfigDictionary::REQUIRED => false,
            FieldsConfigDictionary::TYPE => FieldsConfigDictionary::STRING,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::STRING],
        ],
        // Transaction amount
        FieldsConfigDictionary::AMOUNT => [
            FieldsConfigDictionary::REQUIRED => false,
            FieldsConfigDictionary::TYPE => FieldsConfigDictionary::FLOAT,
            FieldsConfigDictionary::VALIDATION => [FieldsConfigDictionary::FLOAT],
        ],
        // Message checksum
        'hash' => [
            FieldsConfigDictionary::REQUIRED => false,
            FieldsConfigDictionary::TYPE => FieldsConfigDictionary::STRING,
            FieldsConfigDictionary::VALIDATION => [
                FieldsConfigDictionary::STRING,
                FieldsConfigDictionary::MAXLENGTH_40,
                FieldsConfigDictionary::MINLENGTH_40,
            ],
        ],
    ];
}
