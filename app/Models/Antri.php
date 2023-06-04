<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Antri extends Model {
    use HasFactory;

    public static function createAntri($data) {
        $result = DB::select('SELECT id_keperluan FROM keperluan WHERE keperluan=?', [$data["keperluan"]]);
        if ($result !== NULL) {
            return DB::table('antris')->insertGetId([
                "nik" => $data["nik"],
                "nama" => $data["nama"],
                "email" => $data["email"],
                "no_hp" => $data["no-hp"],
                "keperluan" => $result[0]->id_keperluan,
                "status" => 1
            ]);
        }
    }
    
    public static function resetAntri() {
        DB::table('antris')->truncate();
    }

    public static function updateStatusById($id, $status) {
        // $idStatus = DB::table('status_antri')->select('id_status')->where('status', '=', $status)->get()[0]->id_status;
        
        $affected = DB::table('antris')
                        ->where('id_antri', '=', $id)
                        ->update(['status' => $status]);
        
        return $affected;
    }

    public static function getAntris() {

        return [
            "data" => DB::table('antris')->select('*')->get(),
            "keperluan" => DB::table('keperluan')->select('*')->get(),
            "status" => DB::table('status_antri')->select('*')->get(),
        ];
    }
}
