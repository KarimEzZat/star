<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    public function update(Request $request, Company $company)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'phone' => 'required|numeric',
            'keywords' => 'required'
        ]);
        $input = $request->all();
        $file = $request->file('photo');
        if ($request->hasFile('photo')) {
            $oldImage = 'assets/Images/' . $company->photo;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());
            $file->move('assets/Images', $name);
            $input['photo'] = $name;
        }
        $company->update($input);
        session()->flash('success', 'تم تحديث وصف الشركة بنجاح');

        return redirect()->back();
    }
}
