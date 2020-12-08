<?php
namespace App\Repositories;

use App\Models\Biography;

class BiographiesRepository extends Repository
{
    public  function __construct(Biography $biography)
    {
        $this->model = $biography;
    }
}
