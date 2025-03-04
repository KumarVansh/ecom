<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\Subcategory;

class AdminSubcategoryController extends Controller
{
    public function __construct(private Subcategory $subcategory) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Subcategory";
        $data = $this->subcategory->latest()->get();
        return view("admin.subcategory.index", compact("title", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Subcategory";
        return view("admin.subcategory.create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:30|unique:subcategories",
            "pic" => "required"
        ]);

        $pic = Storage::disk("public")->put("subcategories", $request->pic);

        $this->subcategory->create([
            "name" => $request->name,
            "pic" => $pic,
            "active" => $request->active
        ]);
        return redirect()->route('admin-subcategory');
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
        $data = $this->subcategory->find($id);
        $title = "Update Subcategory";
        return view("admin.subcategory.update", compact("title", 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->subcategory->find($id);
        if($data->name !== $request->name)
            $request->validate([
                "name" => "required|min:3|max:30|unique:subcategories",
            ]);

        if ($request->pic) {
            Storage::disk("public")->delete("subcategories", $data->pic);
            $pic = Storage::disk("public")->put("subcategories", $request->pic);
        } else
            $pic = $data->pic;


        $data->update([
            "name" => $request->name,
            "pic" => $pic,
            "active" => $request->active
        ]);
        return redirect()->route('admin-subcategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->subcategory->find($id);
        Storage::disk("public")->delete("subcategories", $data->pic);
        $data->delete();
        return redirect()->route("admin-subcategory");
    }
}
