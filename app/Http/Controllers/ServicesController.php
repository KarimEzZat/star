<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::latest()->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {
        //
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')) {
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());
            $file->move('assets/services/img', $name);
            $input['image'] = $name;
        }
        Service::create($input);
        session()->flash('success', 'تم اضافة الخدمة بنجاح');

        return redirect()->route('services.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('services.create', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')){
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());
            $oldImage = 'assets/services/img/' . $service->image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $file->move('assets/services/img', $name);
            $input['image'] = $name;
        }
        $service->update($input);
        session()->flash('success', 'تم تحديث الخدمة بنجاح');

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $oldImage = 'assets/services/img/' . $service->image;
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }
        $service->delete();
        session()->flash('success', 'تم حذف الخدمة بنجاح');

        return redirect()->route('services.index');
    }
}
