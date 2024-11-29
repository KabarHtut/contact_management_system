<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactSearchService
{
    public function getSearchData($params)
    {
        if($params == null){
            return null;
        }
        $search = Contact::with('group')
                ->where('name', 'LIKE', "%$params%")
                ->orWhere('phone', 'LIKE', "%$params%")
        ->whereHas('group', function ($query) use ($params) {
            $query->where('name', 'LIKE', "%$params%");
        });
        return $search->paginate(6);
    }
}