<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
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
        $records = Record::select('id','name', 'age', 'gender')->where('is_delete', 0)->get();

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

    public function updateRecord(Request $request, $id){

        $updateRecord = Record::find($id);

        if (request()->has('name')) {
            $updateRecord->name = request('name');
        }
     
        if (request()->has('age')) {
            $updateRecord->age = request('age');
        }

        if (request()->has('gender')) {
            $updateRecord->gender = request('gender');
        }
     
        $updateRecord->save();

        return Response::json($updateRecord);

    }

    public function deleteRecord($id){

        try {

            // $deleteRecord = Record::where('id', $id)->update(['is_delete' => 1,]);

            $deleteRecord = Record::where('id', $id)->delete();
            return response()->json($deleteRecord);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

}
