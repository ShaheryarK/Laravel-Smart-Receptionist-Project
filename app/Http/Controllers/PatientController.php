<?php

namespace App\Http\Controllers;

use App\AppointmentSlot;
use App\Patient;
use Illuminate\Http\Request;
use PatientTransformer;
use AppointmentTransformer;
use App\Appointment;
use App\Doctor;
use Response;

class PatientController extends Controller
{
    Protected $PatientTransformer;
    protected $AppointmentTransformer;

    /**
     * PatientController constructor.
     * @param $PatientTransformer
     */
    public function __construct(PatientTransformer $PatientTransformer, AppointmentTransformer $AppointmentTransformer)
    {
        $this->PatientTransformer = $PatientTransformer;
        $this->AppointmentTransformer = $AppointmentTransformer;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::All();

        return Response::json([
            'data' => $this->PatientTransformer->transformCollection($patient->toArray())
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Patient::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient:: find($id);
        if (!$patient) {
            return Response::json([
                'error' => ['message' => 'Patient Doesnt exist']
            ], 404);
        }

        return Response::json([
            'data' => $this->PatientTransformer->transform($patient)
        ], 200);
    }

    public function patientAppointments($id)
    {
           $appointment = Patient::find($id)->appointment;

        if (!$appointment) {
            return Response::json([
                'error' => ['message' => 'Patient have no Appointment history']
            ], 404);
        }


        return Response::json([
            'data' => array_map([$this,'showapp'],$appointment->toArray())
        ], 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return $patient;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findorFail($id);
        $patient->delete();
        return 204;
    }

    public function showapp($appointment)
    {
        $doctor = Doctor::find($appointment["doctor_id"]);
        $patient= Patient::find($appointment["patient_id"]);
        $startT = AppointmentSlot::find($appointment["appointmentslot_id"]);
        $app =Appointment::find($appointment["id"]);
        return $appointmentdetail = ['patient name' => $patient['firstname'],'Appointment' => $app['id'],'doctorname'=> $doctor['firstname'],'starttime'=> date("H:i A",strtotime($startT['start_time'])),"endtime" =>date("h:i A",strtotime($appointment["end_time"]))];
    }
}
