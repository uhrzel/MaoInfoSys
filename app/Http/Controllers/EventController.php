<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')
            ->orderBy('event_time', 'desc')
            ->paginate(3);
        return view("admin.events.index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.events.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_description' => 'required|string',
            'eventImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eventDate' => 'required|date_format:Y-m-d', // Adjust the date format as needed
            'eventTime' => 'required|date_format:H:i',
            'event_visibility' => ['required', 'in:public,private'],
        ]);

        // Handle file upload
        if ($request->hasFile('eventImage')) {
            $image = $request->file('eventImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/events_images', $imageName); // Add 'public/' to the path
        } else {
            $imagePath = null;
        }

        // Create Events record in the database
        Event::create([
            'event_name' => $request->input('event_name'),
            'event_description' => $request->input('event_description'),
            'event_image' => $imagePath,
            'event_date' => $request->input('eventDate'),
            'event_time' => $request->input('eventTime'),
            'status' => $request->input('event_visibility'),
        ]);


        return redirect()->route("admin.events")->with("success", "Event created successfully.");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view("admin.events.show", compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view("admin.events.edit", compact("event"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Event $event)
    {
        $rules = [
            'event_name' => 'sometimes|string|max:255',
            'event_description' => 'sometimes|string',
            'eventDate' => 'sometimes|date_format:Y-m-d',
            'eventTime' => 'sometimes|date_format:H:i',
            'event_visibility' => ['required', 'in:public,private'],
        ];

        if ($request->hasFile('eventImage')) {
            $rules['eventImage'] = 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $request->validate($rules);


        if ($request->hasFile('eventImage')) {
            $image = $request->file('eventImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/events_images', $imageName);
        } else {

            $imagePath = $event->event_image;
        }


        $event->update([
            'event_name' => $request->input('event_name'), // Corrected input name
            'event_description' => $request->input('event_description'),
            'event_image' => $imagePath,
            'event_date' => $request->input('eventDate'),
            'event_time' => $request->input('eventTime'),
            'status' => $request->input('event_visibility'),
        ]);

        return redirect()->route("admin.events")->with("success", "Events updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route("admin.events")->with("success", "Event deleted successfully.");
    }
}
