<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Maincategory;
use App\Models\Subcategory;
use App\Models\Brand;


class AdminProductController extends Controller
{
    public function __construct(private Product $product, private Maincategory $maincategory, private Subcategory $subcategory, private Brand $brand, private ProductImage $productImage,) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Product";
        $data = $this->product->latest()->get();
        return view("admin.product.index", compact("title", "data"));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Product";
        $maincategories = $this->maincategory->where("active", true)->latest()->get();
        $subcategories = $this->subcategory->where("active", true)->latest()->get();
        $brands = $this->brand->where("active", true)->latest()->get();
        return view("admin.product.create", compact("title", "maincategories", "subcategories", "brands"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
         $request->validate([
            "name" => "required|min:3|max:30",
            "color" => "required",
            "size" => "required",
            "basePrice" => "required|numeric|min:1",
            "discount" => "required|numeric|min:0|max:100",
            "stockQuantity" => "required|numeric|min:0",
            "pic" => "required",
            "pic.*" => "required|image|mimes:jpeg,jpg,png,gif|max:1024"
        ]);

        $picName = [];
        foreach ($request->file("pic") as $img) {
            array_push($picName, Storage::disk("public")->put("products", $img));
        }
        
        $product = $this->product->create([
            "name" => $request->name,
            "maincategory_id" => $request->maincategory_id,
            "subcategory_id" => $request->subcategory_id,
            "brand_id" => $request->brand_id,
            "color" => $request->color,
            "size" => $request->size,
            "basePrice" => $request->basePrice,
            "discount" => $request->discount,
            "finalPrice" => intval($request->basePrice - $request->basePrice * $request->discount / 100),
            "discription" => $request->discription,
            "stock" => $request->stock,
            "stockQuantity" => $request->stockQuantity,
            "active" => $request->active
        ]);

        foreach ($picName as $img) {
            $this->productImage->create([
                'pic' => $img,
                'product_id' => $product->id
            ]);
        }
        return redirect()->route('admin-product');
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
        $data = $this->product->find($id);
        $title = "Update Product";
        return view("admin.product.update", compact("title", 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->product->find($id);
        if ($data->name !== $request->name)
            $request->validate([
                "name" => "required|min:3|max:30|unique:products",
            ]);

        if ($request->pic) {
            Storage::disk("public")->delete("products", $data->pic);
            $pic = Storage::disk("public")->put("products", $request->pic);
        } else
            $pic = $data->pic;


        $data->update([
            "name" => $request->name,
            "pic" => $pic,
            "active" => $request->active
        ]);
        return redirect()->route('admin-product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->product->find($id);
        Storage::disk("public")->delete("products", $data->pic);
        $data->delete();
        return redirect()->route("admin-product");
    }
}
