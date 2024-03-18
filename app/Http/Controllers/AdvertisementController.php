<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::orderBy('created_at', 'desc')->paginate(2);
        return view('admin.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.advertisements.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'adsTitle' => 'required|string|max:255',
            'adsDescription' => 'required|string',
            'adsImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'adsVideo' => 'required|mimes:mp4',

        ]);

        if ($request->hasFile('adsImage')) {
            $image = $request->file('adsImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/ads_images', $imageName); // Add 'public/' to the path
        } else {
            $imagePath = null;
        }

        // Handle file upload for video
        if ($request->hasFile('adsVideo')) {
            $video = $request->file('adsVideo');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $videoPath = $video->storeAs('public/ads_videos', $videoName); // Add 'public/' to the path
        } else {
            $videoPath = null;
        }

        // Create Advertisement record in the database
        Advertisement::create([
            'ads_title' => $request->input('adsTitle'),
            'ads_description' => $request->input('adsDescription'),
            'ads_images' => $imagePath,
            'ads_video' => $videoPath,
        ]);

        return redirect()->route("admin.advertisement")->with("success", "Advertisements created successfully.");
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        return view("admin.advertisements.show", compact("advertisement"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        return view("admin.advertisements.edit", compact("advertisement"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Advertisement $advertisement)
    {
        $rules = [
            'adsTitle' => 'sometimes|string|max:255',
            'adsDescription' => 'sometimes|string',
        ];

        // Add validation rule for image only if a new file is provided
        if ($request->hasFile('adsImage')) {
            $rules['adsImage'] = 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048';
        }
        if ($request->hasFile('adsVideo')) {
            $rules['adsVideo'] = 'sometimes|mimes:mp4';
        }

        $request->validate($rules);

        // Handle file upload only if a new file is provided
        if ($request->hasFile('adsImage')) {
            $image = $request->file('adsImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/ads_images', $imageName);
        } else {
            // Retain the existing file if no new file is provided
            $imagePath = $advertisement->ads_images;
        }

        if ($request->hasFile('adsVideo')) {
            $video = $request->file('adsVideo');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $videoPath = $video->storeAs('public/ads_videos', $videoName);
        } else {

            $videoPath = $advertisement->ads_video;
        }

        // Update only the fillable fields
        $advertisement->update([
            'ads_title' => $request->input('adsTitle'), // Corrected input name
            'ads_description' => $request->input('adsDescription'),
            'ads_images' => $imagePath,
            'ads_video' => $videoPath,

        ]);

        return redirect()->route("admin.advertisement")->with("success", "Advertisements updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route("admin.advertisement")->with("success", "Advertisement deleted successfully.");
    }
}
