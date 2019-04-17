<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\AppointmentSlot;
use AppointmentTransformer;
use Response;

class AppointmentController extends Controller
{

    protected  $AppointmentTransformer;

    /**
     * AppointmentController constructor.
     * @param $AppointmentTransformer
     */
    public function __construct(AppointmentTransformer $AppointmentTransformer)
    {
        $this->AppointmentTransformer = $AppointmentTransformer;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Appointment::all();
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
        $App = Appointment::create($request->all());
         AppointmentSlot::find($request['appointmentslot_id'])->update(array('booking_status' =>1));

        return  $App;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $appointment = Appointment::find($id);
        if(!$appointment)
        {
            return Response::json([
                'error'  => [ 'message' => 'Appointment Doesnt exist']
            ], 404);
        }

        return Response::json([
            'data' => $this->AppointmentTransformer->transform($appointment)
        ], 200);

    }

    public function appointmentDetails($id)
    {
        $doctor = Appointment::find($id)->doctor;
        $patient= Appointment::find($id)->patient;
        $startT = Appointment::find($id)->appointmentslot;
        $appointment =Appointment::find($id);
        return $appointmentdetail = ['patient name' => $patient['firstname'],'doctorname'=> $doctor['firstname'],'starttime'=> date("H:i A",strtotime($startT['start_time'])),"endtime" =>date("h:i A",strtotime($appointment["end_time"]))
        , 'startdate' => date("d-m-Y",strtotime($startT['start_time'])),'enddate'=>date("d-m-Y",strtotime($appointment['end_time'])) ];
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
        $Appointment = Appointment::findOrFail($id);
        $Appointment->update($request->all());

        return $Appointment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Appointment = Appointment::findorFail($id);
        $Appointment->delete();
        return 204;
    }
}
