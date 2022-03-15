<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Perusahaans;

class GlobalController extends Controller
{
    /*
        $table -> refer nama table,
        $isdeleted -> refer ke kolom deleted_at (jika table menggunakannya),
        $limit -> jumlah data yang ditampilkan,
        $select -> custom select yang dipilih (harus 2) format seperti dibawah
        $where -> custom where dengan kondisi "=", contoh: id=1&name=andre
    */
    function getData($table, $isdeleted = false, $limit = '', $select = '0=id&1=nama', $where = '')
    {
        $select = str_replace('amp;','', $select);
        $where  = str_replace('amp;','', $where);
        parse_str($select, $select);
        parse_str($where, $where);
        // $where must json/string type
        $id     = $select[0];
        $name   = $select[1];
        $limit  = $limit == '' ? 99 : $limit;
        $where  = $where ?? [];
        
        $result = DB::table($table)
            ->select($id, $name)
            ->where($name, 'like', '%'.@$_GET['q'].'%')            
            ->limit($limit);
        if ($name == 'code') {
            $result->orderByRaw('code::int asc');
        } else {
            $result->orderBy($name, 'ASC');
        }

        if ($isdeleted == 'true') {
            $result->whereNull('deleted_at');
        }
        
        if (!empty($where)) {
            foreach ($where as $key => $value) {
                $result->where($key, $value);
            }
        }

        $result = $result->get()->sortBy($name, SORT_REGULAR, true)->toArray();
        
        if (!empty($result)) {
            $result = json_decode(json_encode($result), true); //merubah object multidimensi menjadi array
            for ($i = 0; $i < count($result); $i++) {
                $data[$i] = [
                    'id'   => $result[$i][$id],
                    'text' => $result[$i][$name]
                ];
            }
        } else {
            $data = [];
        }

        echo json_encode(['items' => $data]);
    }
}
