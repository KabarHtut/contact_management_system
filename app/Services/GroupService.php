<?php

namespace App\Services;

use App\Models\Group;
use App\ServiceInterfaces\GroupServiceInterface;

class GroupService implements GroupServiceInterface
{
    public function getAllGroups(array $columns = ['*'], $params = null)
    {
        if(!$params) return Group::all($columns);

        $query = Group::query();

        if(isset($params['paginate'])) {
            return $query->select($columns)->paginate($params['paginate']);
        } else{
            return $query->get($columns);
        }
    }

    public function storeGroup(array $params)
    {
        return Group::create($params);
    }

    // public function getContactById(int $id)
    // {
    //     return Contact::findOrFail($id);
    // }

    // public function updateContact(int $id, array $params)
    // {
    //     return Contact::findOrFail($id)->update($params);
    // }

    public function destroyGroup(int $id)
    {
        return Group::findOrFail($id)->delete();
    }
}