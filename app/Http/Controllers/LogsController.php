<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Logs::orderBy('date', 'desc')->paginate(8);
        return view("admin.logs.index", compact("logs"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.logs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Logs::create($request->all());
        return redirect()->route("admin.logs.index")->with("success", "Logs created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function show(Logs $logs)
    {
        return view("admin.logs.show", compact("logs"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logs $logs
     * @return \Illuminate\Http\Response
     */
    public function edit(Logs $logs)
    {
        return view("admin.logs.edit", compact("logs"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logs $logs)
    {
        $logs->update($request->all());
        return redirect()->route("admin.logs.index")->with("success", "Logs updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logs $logs)
    {
        $logs->delete();
        return redirect()->route("admin.logs.index")->with("success", "Logs deleted successfully.");
    }
}
