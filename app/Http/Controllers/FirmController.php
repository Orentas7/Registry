<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Http\Requests\StoreFirmRequest;
use App\Http\Requests\UpdateFirmRequest;


class FirmController extends Controller
{
    public function index() 
    {
        return view('firms.index', [
            'firms' => Firm::with('employees')->get()
        ]);
    }

    public function create()
    {        
        return view('firms.create');
    }
    
    public function store(StoreFirmRequest $request)
    {   
        $attributes = $request->validated();
        $attributes['logo'] = $request->hasFile('logo') ? request()->file('logo')->store('logos', 'public') : "logos/no-image.png";
        Firm::create($attributes);
        return redirect('/firms')->with('success', __('Firm added!'));
    }

    public function edit(Firm $firm) 
    {
        return view('firms.edit', ['firm' => $firm]);
    } 

    public function update(Firm $firm, StoreFirmRequest $request) 
    {
        $attributes = $request->validated();
        $attributes['logo'] = $request->hasFile('logo') ? request()->file('logo')->store('logos', 'public') : "logos/no-image.png";
        $firm->update($attributes);
        return back()->with('success',  __('Firm updated!'));
    }

    public function destroy(Firm $firm)
    {
        if($firm->employees->count()){
            return redirect()->route('firms.index')->with('info_message', __('This firm still has employees!'));
        }
        $firm->delete();
        return back()->with('success',  __('Firm deleted!'));
    }
}
