<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionsRequest;
use App\Models\Section;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.sections')->with('sections', $sections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionsRequest $request)
    {
        Section::create([
            'name'        => $request->name,
            'description' => $request->description,
            'created_by'  => auth()->id(),
        ]);
        return redirect()
            ->route('sections.index')
            ->with('success', 'تم إضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionsRequest $request, Section $section)
    {
        $section->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('sections.index')
            ->with('success', 'تم تحديث القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()
            ->route('sections.index')
            ->with('success', 'تم حذف القسم بنجاح');
    }
}
