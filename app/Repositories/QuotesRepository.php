<?php
namespace App\Repositories;

use App\Models\Quote;

class QuotesRepository extends Repository
{
    public  function __construct(Quote $quote)
    {
        $this->model = $quote;
    }
}