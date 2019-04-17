<?php

namespace App\Http\Controllers;

use App\Timeslot;
use Illuminate\Http\Request;
use TimeslotTransformer;
use DateTime;
use App\Doctor;
use Response;
use App\AppointmentSlot;
class TimeslotController extends Controller
{
    protected  $TimeslotTransformer;

    /**
     * TimeslotController constructor.
     * @param $TimeslotTransformer
     */
    public function __construct( TimeslotTransformer $TimeslotTransformer)
    {
        $this->TimeslotTransformer = $TimeslotTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Timeslots = Timeslot::all();

        return Response::json([
            'data' => $this->TimeslotTransformer->transformCollection($Timeslots->toArray())
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Timeslot = Timeslot::create($request->all());
        $this->AddAppointmentSlots($Timeslot,15);

        return Response::json([
            'data' => $this->TimeslotTransformer->transform($Timeslot->toArray())
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @param $id
     * @return Doctor's time slots
     */
    public function dshow($id)
    {
        $tms = Doctor::find($id)->timeslot;
        if(!$tms)
        {
            return Response::json([
                'error'  => [ 'message' => 'no time slots found']
            ], 404);
        }
        else {
            return Response::json([
                'data' => $this->TimeslotTransformer->transformCollection($tms->toArray())
            ], 200);
        }
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
        $Timeslot = Timeslot::findOrFail($id);
        $Timeslot->update($request->all());

        return $Timeslot;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeslot = Timeslot::findorFail($id);
        $timeslot->delete();
        return 204;
    }

    public function AddAppointmentSlots($time,$interval)
    {
        $startT = new DateTime($time["start_time"]);
        $end   = new DateTime($time["end_time"]);

        while($startT < $end)
        {
            AppointmentSlot::create( ["timeslot_id"=>$time["id"],"start_time"=>$startT->format('Y-m-d H:i:s'),]);
            $startT->add(new \DateInterval('PT'.$interval.'M'));
        }
        return;
    }
}
