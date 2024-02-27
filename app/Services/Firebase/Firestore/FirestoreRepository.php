<?php

namespace App\Services\Firebase\Firestore;

use App\Models\Buildings;
use App\Models\Grave;
use App\Models\Offices;
use App\Models\SystemUsers;
use App\Services\Firebase\Contracts\FireStore;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

final class FirestoreRepository implements FireStore
{
    public function create(string $collection, array $data): array
    {
        $firestore = app('firebase.firestore')
            ->database()
            ->collection($collection)
            ->newDocument();

        return $firestore->set($data);
    }

    public function fetch(string $collection): Collection
    {
        $data = app('firebase.firestore')
            ->database()
            ->collection($collection)
            ->documents();

        if ($data->isEmpty()) {
            return collect();
        }

        return collect($data->rows());
    }

    public function edit(string $collection, string $document, array $data): array
    {
        $firestore = app('firebase.firestore')
            ->database()
            ->collection($collection)
            ->document($document);

        $document = $firestore->set($data);

        return $document;
    }

    public function destroy(string $collection, string $document): void
    {
        app('firebase.firestore')
            ->database()
            ->collection($collection)
            ->document($document)
            ->delete();
    }


    public function login(string $email, string $password): array
    {
        $data = app('firebase.firestore')
            ->database()
            ->collection('users')
            ->where('username', '=', $email)
            ->documents();


        if ($data->isEmpty()) {
            return array();
        }

        $result = array();
        foreach ($data as $d) {
            $eachData = $d->data();
            if (password_verify($password, $eachData["password"])) {
                $newUser = new SystemUsers();
                $newUser->userID = $d->id();
                $newUser->username = $eachData['username'];
                $newUser->email = $eachData['email'];
                $newUser->password = $eachData['password'];
                $newUser->firstName = $eachData['firstName'];
                $newUser->lastName = $eachData['lastName'];
                $newUser->userType = $eachData['userType'];
                array_push($result, $newUser->toArray());
            }
        }
        return $result;
    }

    public function checkIfThereIsAnAdmin(): bool
    {
        $data = app('firebase.firestore')
            ->database()
            ->collection('user')
            ->where('userType', '=', 1)
            ->documents();

        if ($data->isEmpty()) {
            $newUser = new SystemUsers();
            $newUser->email = 'admin@demo.com';
            $newUser->password = Hash::make('admin123');
            $newUser->firstName = 'Administrator';
            $newUser->middleName = 'Administrator';
            $newUser->lastName = 'Administrator';
            $newUser->secret = 'Administrator';
            $newUser->userType = 1;

            $createdArray = $this->create('user', $newUser->toArray());
            return true;
        }

        return true;
    }



    public function fetchWithWhere(string $collection, string $fieldName, string $whereOperator, int $intValue, string $strValue): array
    {

        if ($intValue) {
            $actualValue = $intValue;
        }

        if ($strValue != "") {
            $actualValue = $strValue;
        }

        $data = app('firebase.firestore')
            ->database()
            ->collection($collection)
            ->where($fieldName, $whereOperator, $actualValue)
            ->documents();

        $result = array();
        foreach ($data as $d) {
            $eachData = $d->data();
            array_push($result, $eachData);
        }

        return $result;
    }

    public function fetchUsers(): array
    {
        $data = app('firebase.firestore')
            ->database()
            ->collection('users')
            ->where('userType', '=', 2)
            ->documents();

        $result = array();

        foreach ($data as $d) {
            $eachData = $d->data();
            $newUser = new SystemUsers();
            $newUser->userID = $d->id();
            $newUser->email = $eachData['email'];
            $newUser->password = $eachData['password'];
            $newUser->firstName = $eachData['firstName'];
            $newUser->lastName = $eachData['lastName'];
            $newUser->username = $eachData['username'];
            $newUser->userType = $eachData['userType'];
            $newUser->registeredDate = $eachData['registeredDate'];
            array_push($result, $newUser->toArray());
        }

        return $result;
    }

    public function createUser(SystemUsers $user): bool
    {
        $results = $this->fetchWithWhere('users', 'username', '=', 0, $user->username);
        if (count($results) > 0) {
            session()->put('errorUserExist', true);
            return false;
        } else {
            $data = $this->create('users', $user->toArray());
            if ($data) {
                session()->put('successCreate', true);
                return true;
            } else {
                session()->put('errorCreate', true);
                return false;
            }
        }
    }

    public function getGraves(): array
    {
        $results = app('firebase.firestore')
            ->database()
            ->collection("graves")
            ->documents();

        if ($results->isEmpty()) {
            return array();
        }

        $graves = array();
        foreach ($results as $r) {
            $eachData = $r->data();
            $grave = new Grave();
            try {
                $grave->graveID = $r->id();
                $grave->name = $eachData['name'];
                $grave->died = $eachData['died'];
                $grave->born = $eachData['born'];
                $grave->block_name = $eachData['block_name'];
                try {
                    $grave->lotNo = $eachData['lotNo'];
                } catch (Exception $e2) {
                    $grave->lotNo = 0;
                }
                $grave->capacity = $eachData['capacity'];
                $grave->lat_long1 = $eachData['lat_long1'];
                $grave->lat_long2 = $eachData['lat_long2'];
                $grave->lat_long3 = $eachData['lat_long3'];
                $grave->lat_long4 = $eachData['lat_long4'];
                $grave->reservationDate = $eachData['reservationDate'];
                try {
                    $grave->lastUpdated = $eachData['lastUpdated'];
                } catch (Exception $e) {
                    $grave->lastUpdated = false;
                }
                $grave->status = $eachData['status'];
                array_push($graves, $grave->toArray());
            } catch (Exception $e) {
                error_log($eachData);
            }
        }

        return $graves;
    }

    public function getAvailableGrave(array $data): array
    {

        $availableArr = array();
        foreach ($data as $d) {
            if ($d['name'] == "Available") {
                if (array_key_exists($d['block_name'], $availableArr)) {
                    $availableArr[$d['block_name']] = $availableArr[$d['block_name']] + 1;
                } else {
                    $availableArr[$d['block_name']] = 1;
                }
            }
        }

        return $availableArr;
    }

    public function getReservedGrave(array $data): array
    {
        $availableArr = array();
        foreach ($data as $d) {
            if ($d['name'] != "Available") {
                if (array_key_exists($d['block_name'], $availableArr)) {
                    $availableArr[$d['block_name']] = $availableArr[$d['block_name']] + 1;
                } else {
                    $availableArr[$d['block_name']] = 1;
                }
            }
        }

        return $availableArr;
    }

    public function getLastUpdated(array $data): string
    {
        $result = "";
        foreach ($data as $d) {
            if ($d['lastUpdated'] != null) {
                if ($d['lastUpdated'] != false) {
                    $result = $d['block_name'];
                    break;
                }
            }
        }

        return $result;
    }

    public function getLastUpdatedData(array $data): array
    {
        $result = array();
        foreach ($data as $d) {
            if ($d['lastUpdated'] != null) {
                if ($d['lastUpdated'] != false) {
                    $result = $d;
                    break;
                }
            }
        }

        return $result;
    }
}
