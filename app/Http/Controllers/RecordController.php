<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;

use Response;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::select('name', 'age', 'gender')->get();

        return Response::json($records);
    }

    public function record(string $id){

        $getrecord = Record::select('id', 'name', 'age', 'gender')->find($id);

        //return 404 if item not exist
        if(empty($getrecord)){
            return Response::json($getrecord, 404);
        }
        return Response::json($getrecord);

    }


}
