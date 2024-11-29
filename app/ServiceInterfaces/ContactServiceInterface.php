<?php

namespace App\ServiceInterfaces;

interface ContactServiceInterface
{
    public function getAllContacts(array $columns = ['*'], $params);

    public function storeContact(array $params);

    public function getContactById(int $id);

    public function updateContact(int $id, array $params);

    public function destroyContact(int $id);
}