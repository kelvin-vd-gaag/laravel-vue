<?php

namespace App\Http\Controllers;

use App\Gratitude;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GratitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $lists = Gratitude::where('user_id', Auth::user()->id)->paginate(6)->groupBy(function($val) {
//            return Carbon::parse($val->created_at)->format('yy-m-d');
//        });;

        return view('gratitude.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $get_total_Gratitude = Gratitude::where('user_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->count();
        if ($get_total_Gratitude >= 3) {
            return "Maximum amount of 3 posts per day have exceeded";
        }
//        $gratitude = new Gratitude();
        $gratitude = Gratitude::updateOrCreate(
            ['id' => $request->id],
            ['content' => $request->content, 'user_id' => Auth::user()->id]
        );
        $gratitude->save();



    }

    /**
     * Display the specified resource.
     *
     * @param \App\GratitudeController $gratitudeController
     * @return \Illuminate\Http\Response
     */
    public function show(GratitudeController $gratitudeController)
    {
//        $lists = Gratitude::where('user_id', Auth::user()->id)->paginate(6)->groupBy(function ($val) {
//            return Carbon::parse($val->created_at)->format('yy-m-d');
//        });

        $lists = Gratitude::where('user_id', Auth::user()->id)->paginate(6);


        return view('gratitude.history', compact('lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\GratitudeController $gratitudeController
     * @return \Illuminate\Http\Response
     */
    public function edit(GratitudeController $gratitudeController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\GratitudeController $gratitudeController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GratitudeController $gratitudeController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\GratitudeController $gratitudeController
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Gratitude::destroy($request->id);
    }
}
