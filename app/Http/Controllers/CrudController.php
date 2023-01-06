<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function index()
    {
        return view('crud.crud');
    }

    // Fetch records
    public function getUsers()
    {
        // Call getuserData() method of Crud Model
        $userData['data'] = Crud::getuserData();

        echo json_encode($userData);
        exit;
    }

    // Insert record
    public function addUser(Request $request)
    {

        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');

        if ($name != '' && $username != '' && $email != '') {
            $data = array('name' => $name, "username" => $username, "email" => $email);

            // Call insertData() method of Crud Model
            $value = Crud::insertData($data);
            if ($value) {
                echo $value;
            } else {
                echo 0;
            }
        } else {
            echo 'Fill all fields.';
        }

        exit;
    }

    // Update record
    public function updateUser(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $editid = $request->input('editid');

        if ($name != '' && $email != '') {
            $data = array('name' => $name, "email" => $email);

            // Call updateData() method of Crud Model
            Crud::updateData($editid, $data);
            echo 'Update successfully.';
        } else {
            echo 'Fill all fields.';
        }

        exit;
    }

    // Delete record
    public function deleteUser($id = 0)
    {
        // Call deleteData() method of Crud Model
        Crud::deleteData($id);

        echo "Delete successfully";
        exit;
    }
}
