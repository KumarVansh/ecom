<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Maincategory;
use Illuminate\Support\Facades\Storage;

class AdminMaincategoryController extends Controller
{
    public function __construct(private Maincategory $maincategory) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Maincategory";
        $data = $this->maincategory->latest()->get();
        return view("admin.maincategory.index", compact("title", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Maincategory";
        return view("admin.maincategory.create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:30|unique:maincategories",
            "pic" => "required"
        ]);

        $pic = Storage::disk("public")->put("maincategories", $request->pic);

        $this->maincategory->create([
            "name" => $request->name,
            "pic" => $pic,
            "active" => $request->active
        ]);
        return redirect()->route('admin-maincategory');
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
        $data = $this->maincategory->find($id);
        $title = "Update Maincategory";
        return view("admin.maincategory.update", compact("title", 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->maincategory->find($id);
        if($data->name !== $request->name)
            $request->validate([
                "name" => "required|min:3|max:30|unique:maincategories",
            ]);

        if ($request->pic) {
            Storage::disk("public")->delete("maincategories", $data->pic);
            $pic = Storage::disk("public")->put("maincategories", $request->pic);
        } else
            $pic = $data->pic;


        $data->update([
            "name" => $request->name,
            "pic" => $pic,
            "active" => $request->active
        ]);
        return redirect()->route('admin-maincategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->maincategory->find($id);
        Storage::disk("public")->delete("maincategories", $data->pic);
        $data->delete();
        return redirect()->route("admin-maincategory");
    }
}
