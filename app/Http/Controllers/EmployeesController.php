<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        return view('employees.index');
     }

     /*
     AJAX request
     */
     public function getEmployees(Request $request){

       ## Read value
       $draw = $request->get('draw');
       $start = $request->get("start");
       $rowperpage = $request->get("length"); // Rows display per page

       $columnIndex_arr = $request->get('order');
       $columnName_arr = $request->get('columns');
       $order_arr = $request->get('order');
       $search_arr = $request->get('search');

       $columnIndex = $columnIndex_arr[0]['column']; // Column index
       $columnName = $columnName_arr[$columnIndex]['data']; // Column name
       $columnSortOrder = $order_arr[0]['dir']; // asc or desc
       $searchValue = $search_arr['value']; // Search value

       // Total records
       $totalRecords = Employees::select('count(*) as allcount')->count();
       $totalRecordswithFilter = Employees::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

       // Fetch records
       $records = Employees::orderBy($columnName,$columnSortOrder)
         ->where('employees.name', 'like', '%' .$searchValue . '%')
         ->select('employees.*')
         ->skip($start)
         ->take($rowperpage)
         ->get();

       $data_arr = array();

       foreach($records as $record){
          $id = $record->id;
          $username = $record->username;
          $name = $record->name;
          $email = $record->email;

          $data_arr[] = array(
            "id" => $id,
            "username" => $username,
            "name" => $name,
            "email" => $email
          );
       }

       $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordswithFilter,
          "aaData" => $data_arr
       );

       echo json_encode($response);
       exit;
     }
}
