<?php

namespace App\Services;

use App\Models\Contact;
use App\ServiceInterfaces\ContactServiceInterface;

class ContactService implements ContactServiceInterface
{
    public function getAllContacts(array $columns = ['*'], $params = null)
    {
        if(!$params) return Contact::all($columns);

        $query = Contact::query();

        if(isset($params['paginate'])) {
            return $query->select($columns)->paginate($params['paginate']);
        } else{
            return $query->get($columns);
        }
    }

    public function storeContact(array $params)
    {
        return Contact::create($params);
    }

    public function getContactById(int $id)
    {
        return Contact::findOrFail($id);
    }

    public function updateContact(int $id, array $params)
    {
        return Contact::findOrFail($id)->update($params);
    }

    public function destroyContact(int $id)
    {
        return Contact::findOrFail($id)->delete();
    }
}
