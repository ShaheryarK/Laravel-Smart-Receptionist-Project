<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\Timetable;
use App\Timeslot;
use Response;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;
use TimetableTransformer;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    Protected $TimetableTransformer;

    /**
     * TimetableController constructor.
     * @param $TimetableTransformer
     */
    public function __construct(TimetableTransformer $TimetableTransformer)
    {
        $this->TimetableTransformer = $TimetableTransformer;
    }

    public function index()
    {
        $timetable = Timetable::all();

        return Response::json([
            'data' => $this->TimetableTransformer->transformCollection($timetable->toArray())
        ], 200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timetable=Timetable::find($id);

        if(!$timetable)
        {
            return Response::json([
                'error'  => [ 'message' => 'Timetable Doesnt exist']
            ], 404);
        }

        return Response::json([
            'data' => $this->TimetableTransformer->transform($timetable)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timetable = Timetable::findorFail($id);
        $timetable->delete();
        return 204;
    }

 /** Showing Doctor timetable */
    public function dshow($id)
    {
        $tms = Doctor::find($id)->timeslots;
        return $tms;
    }

}
