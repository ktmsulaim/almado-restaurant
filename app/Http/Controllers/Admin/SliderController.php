<?php

namespace App\Http\Controllers\Admin;

use App\CentralLogics\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    function index()
    {
        $sliders = Slider::latest()->paginate(config('default_pagination'));
        return view('admin-views.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ], [
            'title.required' => 'Title is required!',
            'description.required' => 'Description is required!',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
 
        return response()->json([], 200);
    }

    public function edit(Slider $slider)
    {
        return view('admin-views.sliders.edit', compact('slider'));
    }

    public function status(Request $request)
    {
        $slider = Slider::find($request->id);
        $slider->status = $request->status;
        $slider->save();
        Toastr::success(trans('messages.slider_status_updated'));
        return back();
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Title is required!',
            'description.required' => 'Description is required!',
        ]);

   
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
        
        Toastr::success(trans('messages.slider_updated_successfully'));
        return redirect('admin/sliders/add-new');
    }

    public function delete(Slider $slider)
    {
        // if (Storage::disk('public')->exists('banner/' . $slider['image'])) {
        //     Storage::disk('public')->delete('banner/' . $slider['image']);
        // }
        $slider->delete();
        Toastr::success(trans('messages.slider_deleted_successfully'));
        return back();
    }

    public function search(Request $request){
        $key = explode(' ', $request['search']);
        
        $sliders = Slider::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('title', 'like', "%{$value}%");
            }
        })->limit(50)->get();

        return response()->json([
            'view'=>view('admin-views.sliders.partials._table',compact('sliders'))->render(),
            'count'=>$sliders->count()
        ]);
    }
}
