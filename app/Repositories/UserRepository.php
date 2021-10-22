<?php


namespace App\Repositories;

use App\Clients;
use App\Telephones;

class UserRepository
{
    public function getClients()
    {
        return Clients::paginate(3);
    }

    public function addClient($data)
    {
        //add newly created client
        $client = new Clients();
        $client->name = $data['name'];
        $client->email = $data['email'];
        $client->address = $data['address'];
        $client->dob = $data['dob'];
        $client->gender = $data['gender'];
        $client->save();

        //add newly created client phone(s)
        $clientNumbers = array();
        foreach ($data['phone'] as $number) {
            array_push($clientNumbers, ['client_id' => $client->id, 'number' => $number]);
        }

        Telephones::insert($clientNumbers);
        return $client->id;
    }
}
