<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TetimonialController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['check-admin']);
    }
    public function index()
    {
        $testimonials = Testimonial::query()->latest()->paginate(10);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'name' => 'required',
            'content' => 'min:10|required',
            'profession' => 'required',
            'video_id' => ''
        ]);
        try {
            $user = auth()->user();
            $user->testimonials()->create($data);
            return redirect()->route('dashboard')->with('success', 'Create testimonial successfully');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Testimonial $testimonial)
    {
        $data = \request()->validate([
            'name' => 'required',
            'content' => 'min:10|required',
            'profession' => 'required',
            'video_id' => ''
        ]);
        try {
            $testimonial->update($data);
            return redirect()->route('dashboard')->with('success', 'Update testimonial successfully');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function delete(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('dashboard')->with('success', 'Delete testimonial successfully');
    }

}
