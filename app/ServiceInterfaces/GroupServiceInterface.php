<?php

namespace App\ServiceInterfaces;

interface GroupServiceInterface
{
    public function getAllGroups(array $columns = ['*'], $params);

    public function storeGroup(array $params);

    // public function getContactById(int $id);

    // public function updateContact(int $id, array $params);

    public function destroyGroup(int $id);
}
