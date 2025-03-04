<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function __construct(private Testimonial $testimonial) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Testimonial";
        $data = $this->testimonial->latest()->get();
        return view("admin.testimonial.index", compact("title", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Testimonial";
        return view("admin.testimonial.create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:30|unique:testimonials",
            "message" => "required|min:50"
        ]);

        $pic = Storage::disk("public")->put("testimonials", $request->pic);

        $this->testimonial->create([
            "name" => $request->name,
            "pic" => $pic,
            "message" => $request->message,
            "active" => $request->active
        ]);
        return redirect()->route('admin-testimonial');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->testimonial->find($id);
        $title = "Update Testimonial";
        return view("admin.testimonial.update", compact("title", 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->testimonial->find($id);
        if ($data->name !== $request->name)
            $request->validate([
                "name" => "required|min:3|max:30|unique:testimonials",
                "message" => "required|min:50"
            ]);

        if ($request->pic) {
            Storage::disk("public")->delete("testimonials", $data->pic);
            $pic = Storage::disk("public")->put("testimonials", $request->pic);
        } else
            $pic = $data->pic;


        $data->update([
            "name" => $request->name,
            "pic" => $pic,
            "message" => $request->message,
            "active" => $request->active
        ]);
        return redirect()->route('admin-testimonial');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->testimonial->find($id);
        Storage::disk("public")->delete("testimonials", $data->pic);
        $data->delete();
        return redirect()->route("admin-testimonial");
    }
}
