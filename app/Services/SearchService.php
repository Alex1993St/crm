<?php

namespace App\Services;

use App\Models\Company;

class SearchService
{
    public static function searchCompany($name)
    {
        return Company::where('name', 'like', '%'.$name.'%')->get();
    }
}
