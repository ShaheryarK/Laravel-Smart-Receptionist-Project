<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use DoctorTransformer;
use Response;
class DepartmentController extends Controller
{
    protected $DoctorTransformer;

    /**
     * DepartmentController constructor.
     * @param $DoctorTransformer
     */
    public function __construct(DoctorTransformer $DoctorTransformer)
    {
        $this->DoctorTransformer = $DoctorTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::all();
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
        return Department::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Department::find($id);
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
        $department = Department::findOrFail($id);
        $department->update($request->all());

        return $department;
    }

    public function departmentDoctors($id)
    {
        $doctors = Department::find($id)->doctor;

        return Response::json([
            'data' => $this->DoctorTransformer->transformCollection($doctors->toArray())
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
        $department = Department::findorFail($id);
        $department->delete();
        return 204;
    }
}
