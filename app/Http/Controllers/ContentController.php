<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    //
    public function index()
    {
        $contents = Content::all();
        return view('content.index', compact('contents'));
    }

    public function update(Request $request, Content $content)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
        $input = $request->all();
        $file = $request->file('photo');
        if ($request->hasFile('photo')) {
            $oldImage = 'assets/Images/' . $content->photo;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());
            $file->move('assets/Images', $name);
            $input['photo'] = $name;
        }
        $content->update($input);
        session()->flash('success', 'تم التحديث بنجاح');

        return redirect()->back();
    }
}
