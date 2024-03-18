<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Models\Advertisement;
use App\Models\Statistics;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = Event::all();
        $news = News::all();
        $advertisements = Advertisement::all();
        $users = User::all();
        $reports = Report::all();
        return view("admin.statistics.index", compact("events", "news", "advertisements", "users", "reports"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.statistics.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Statistics::create($request->all());
        return redirect()->route("admin.statistics.index")->with("success", "Statistics created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function show(Statistics $statistics)
    {
        return view("admin.statistics.show", compact("statistics"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statistics $statistics
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistics $statistics)
    {
        return view("admin.statistics.edit", compact("statistics"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistics $statistics)
    {
        $statistics->update($request->all());
        return redirect()->route("admin.statistics.index")->with("success", "Statistics updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statitics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistics $statistics)
    {
        $statistics->delete();
        return redirect()->route("admin.statistics.index")->with("success", "Statistics deleted successfully.");
    }
}
