<?php

namespace App\Http\Controllers;
use App\Doctor;
use Illuminate\Http\Request;
use Response;
use AppointmentSlotTransformer;
class DoctorController extends Controller
{
    protected $AppointmentSlotTransformer;

    /**
     * DoctorController constructor.
     * @param $AppointmentSlotTransformer
     */
    public function __construct(AppointmentSlotTransformer $AppointmentSlotTransformer)
    {
        $this->AppointmentSlotTransformer = $AppointmentSlotTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Doctor::All();
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
        return Doctor:: find($id);
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
    public function showAppointmentslots($id)
    {
        $appointmentslots = Doctor::find($id)->appointmentslots;

        return Response::json([
            'data' => $this->AppointmentSlotTransformer->transformCollection($appointmentslots->toArray())
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
