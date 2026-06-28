<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public array $barangKeluar = [
    'produk_id' => [
        'rules' => 'required|integer',
        'errors' => [
            'required' => 'Produk wajib dipilih.',
            'integer'  => 'Produk tidak valid.'
        ]
    ],
    'jumlah' => [
        'rules' => 'required|integer|greater_than[0]',
        'errors' => [
            'required'      => 'Jumlah wajib diisi.',
            'integer'       => 'Jumlah harus berupa angka.',
            'greater_than'  => 'Jumlah minimal 1.'
        ]
    ]
];
}
