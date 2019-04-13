<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Response;
use FeedbackTransformer;

class FeedbackController extends Controller
{
    protected $FeedbackTransformer;

    /**
     * FeedbackController constructor.
     * @param $FeedbackTransformer
     */
    public function __construct(FeedbackTransformer $FeedbackTransformer)
    {
        $this->FeedbackTransformer = $FeedbackTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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





    public function feedbackDetails($id)
    {
        $feedback = Appointment::find($id)->feedback;
        if(!$feedback)
        {
            return Response::json([
                'error'  => [ 'message' => 'Feedback Not Found']
            ], 404);
        }

        return Response::json([
            'data' => $this->FeedbackTransformer->transform($feedback)
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

    }
}
