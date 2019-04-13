<?php

namespace App\Http\Controllers;
use App\Doctor;
use Illuminate\Http\Request;
use Response;
use AppointmentSlotTransformer;
use SlotTransformer;
use DoctorTransformer;
class DoctorController extends Controller
{
    protected $AppointmentSlotTransformer;
    protected  $DoctorTransformer;
    protected   $SlotTransformer;

    /**
     * DoctorController constructor.
     * @param $AppointmentSlotTransformer
     */
    public function __construct(AppointmentSlotTransformer $AppointmentSlotTransformer, DoctorTransformer $DoctorTransformer,SlotTransformer $slotTransformer)
    {
        $this->AppointmentSlotTransformer = $AppointmentSlotTransformer;
        $this->DoctorTransformer = $DoctorTransformer;
        $this->SlotTransformer = $slotTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::All();
        return Response::json([
            'data' => $this->DoctorTransformer->transformCollection($doctors->toArray())
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
        return  Doctor::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor:: find($id);
        if(!$doctor)
        {
            return Response::json([
                'error'  => [ 'message' => 'Doctor Doesnt exist']
            ], 404);
        }

        return Response::json([
            'data' => $this->DoctorTransformer->transform($doctor)
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
        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

        return $doctor;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function showAppointmentslots($id)
    {
        $appointmentslots = Doctor::find($id)->appointmentslots;

        if(!$appointmentslots)
        {
            return Response::json([
                'error'  => [ 'message' => 'No Appointment slot found']
            ], 404);
        }

        return Response::json([
            'data' => array_filter($this->AppointmentSlotTransformer->transformCollection($appointmentslots->toArray()))
        ], 200);

    }




    public function showFreeslots($id)
    {
        $allslots = Doctor::find($id)->appointmentslots;

        if(!$allslots)
        {
            return Response::json([
                'error'  => [ 'message' => 'No Appointment slot found']
            ], 404);
        }

        return Response::json([
            'data' => array_filter($this->SlotTransformer->TransformCollection($allslots->toArray()))
        ], 200);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = doctor::findorFail($id);
        $doctor->delete();
        return 204;
    }
}
