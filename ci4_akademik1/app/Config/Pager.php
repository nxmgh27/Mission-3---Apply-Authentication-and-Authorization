<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------------
     *
     * Pagination links are rendered out using views to configure their
     * appearance. This array contains aliases and the view names to
     * use when rendering the links.
     *
     * Within each view, the Pager object will be available as $pager,
     * and the desired group as $pagerGroup;
     *
     * @var array<string, string>
     */
    public $templates = [
    'default_full'   => 'CodeIgniter\Pager\Views\default_full',
    'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
    'default_head'   => 'CodeIgniter\Pager\Views\default_head',

    'bootstrap_full'   => 'CodeIgniter\Pager\Views\bootstrap_full',
    'bootstrap_simple' => 'CodeIgniter\Pager\Views\bootstrap_simple',

    'bootstrap4_full'   => 'CodeIgniter\Pager\Views\bootstrap4_full',
    'bootstrap4_simple' => 'CodeIgniter\Pager\Views\bootstrap4_simple',

    'bootstrap5_full'   => 'App\Views\pagers\bootstrap5_full',
    'bootstrap5_simple' => 'CodeIgniter\Pager\Views\bootstrap5_simple',
    ];

    /**
     * --------------------------------------------------------------------------
     * Items Per Page
     * --------------------------------------------------------------------------
     *
     * The default number of results shown in a single page.
     */
    public int $perPage = 20;
}
