<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\Brand;

class AdminBrandController extends Controller
{
    public function __construct(private Brand $brand) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Brand";
        $data = $this->brand->latest()->get();
        return view("admin.brand.index", compact("title", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Brand";
        return view("admin.brand.create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:30|unique:brands",
            "pic" => "required"
        ]);

        $pic = Storage::disk("public")->put("brands", $request->pic);

        $this->brand->create([
            "name" => $request->name,
            "pic" => $pic,
            "active" => $request->active
        ]);
        return redirect()->route('admin-brand');
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
        $data = $this->brand->find($id);
        $title = "Update Brand";
        return view("admin.brand.update", compact("title", 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->brand->find($id);
        if($data->name !== $request->name)
            $request->validate([
                "name" => "required|min:3|max:30|unique:brands",
            ]);

        if ($request->pic) {
            Storage::disk("public")->delete("brands", $data->pic);
            $pic = Storage::disk("public")->put("brands", $request->pic);
        } else
            $pic = $data->pic;


        $data->update([
            "name" => $request->name,
            "pic" => $pic,
            "active" => $request->active
        ]);
        return redirect()->route('admin-brand');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->brand->find($id);
        Storage::disk("public")->delete("brands", $data->pic);
        $data->delete();
        return redirect()->route("admin-brand");
    }
}
