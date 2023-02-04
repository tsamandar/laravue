<?php

namespace App\Http\Controllers;

use App\Laravue\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Resources\FacilityResource;
use Illuminate\Support\Facades\Validator;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FacilityResource::collection(Facility::all());
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
    $validator = Validator::make(
        $request->all(),
        [
            'title_uz' => ['required'],
            'title_ru' => ['required'],
        ]
    );

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 403);
    } else {
        $params = $request->all();
        $facility = Facility::create([
            'title_ru' => $params['title_ru'],
            'title_uz' => $params['title_uz'],
        ]);
        
        return new FacilityResource($facility);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Laravue\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laravue\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laravue\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        if ($facility === null) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'title_ru' => ['required'],
                'title_uz' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
            $params = $request->all();
            $facility->title_ru = $params['title_ru'];
            $facility->title_uz = $params['title_uz'];
            $facility->save();
        }

        return new FacilityResource($facility);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laravue\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
{
    try {
        $facility->delete();
    } catch (\Exception $ex) {
        response()->json(['error' => $ex->getMessage()], 403);
    }

    return response()->json(null, 204);
}
}
