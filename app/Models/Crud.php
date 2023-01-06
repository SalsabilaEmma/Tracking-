<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Crud extends Model
{
    use HasFactory;
    // protected $table = 'crud';
    // protected $fillable = [
    //     'title',
    //     'content'
    // ];
    public static function getuserData($id = null)
    {

        $value = DB::table('crud')->orderBy('id', 'asc')->get();
        return $value;
    }

    public static function insertData($data)
    {

        $value = DB::table('crud')->where('username', $data['username'])->get();
        if ($value->count() == 0) {
            $insertid = DB::table('crud')->insertGetId($data);
            return $insertid;
        } else {
            return 0;
        }
    }

    public static function updateData($id, $data)
    {
        DB::table('crud')->where('id', $id)->update($data);
    }

    public static function deleteData($id = 0)
    {
        DB::table('crud')->where('id', '=', $id)->delete();
    }
}
