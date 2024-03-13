<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::join('categories', 'products.category', '=', 'categories.id')
                    ->join('sub_category', 'products.sub_category', '=', 'sub_category.id')
                    ->select('products.id','products.name','categories.name as category','products.featured_img','products.is_featured','products.is_flash_sale','products.is_active','products.created_at','products.created_by','sub_category.title as subcategory')
                    ->latest()
                    ->paginate(10);
        return view('admin.product.index', compact('products'));
    }
    public function create(Request $request)
    {
        $attributes = Attribute::where('status', 'active')->get();
        $categories = Category::where('status','=','active')->get();
        return view('admin.product.create',compact('categories','attributes'));
    }
    public function store(Request $request)
    {
        $product = new Product();
        try {
            $proposedSlug = Str::slug($request->productName);
            if (Product::where('slug', $proposedSlug)->exists()) {
                $count = 1;
                while (Product::where('slug', $proposedSlug . '-' . $count)->exists()) {
                    $count++;
                }
                $slug = $proposedSlug . '-' . $count;
            } else {
                $slug = $proposedSlug;
            }
            $jsonColorArray = json_decode($request->input('colorArray'));
            if($jsonColorArray){
                foreach($jsonColorArray as $key=>$item){
                    if ($request->file('colorImage_'.($key+1))) {
                        $file = $request->file('colorImage_'.($key+1));
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('images/products'), $fileName);
                        $item->image = asset('images/products') .'/'. $fileName;
                    }
                }
            }
            $jsonSizeArray = json_decode($request->input('sizeArray'));
            if($jsonSizeArray){
                foreach($jsonSizeArray as $key=>$item){
                    if ($request->file('sizeImage_'.($key+1))) {
                        $file = $request->file('sizeImage_'.($key+1));
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('images/products'), $fileName);
                        $item->image = asset('images/products') .'/'. $fileName;
                    }
                }
            }
            $jsonWeightArray = json_decode($request->input('weightArray'));
            if($jsonWeightArray){
                foreach($jsonWeightArray as $key=>$item){
                    if ($request->file('weightImage_'.($key+1))) {
                        $file = $request->file('weightImage_'.($key+1));
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('images/products'), $fileName);
                        $item->image = asset('images/products') .'/'. $fileName;
                    }
                }
            }
            $jsonUnitArray = json_decode($request->input('unitArray'));
            if($jsonUnitArray){
                foreach($jsonUnitArray as $key=>$item){
                    if ($request->file('unitImage_'.($key+1))) {
                        $file = $request->file('unitImage_'.($key+1));
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('images/products'), $fileName);
                        $item->image = asset('images/products') .'/'. $fileName;
                    }
                }
            }
            // Set attributes
            $product->name = $request->input('productName');
            $product->slug = $slug;
            $product->short_Desc = $request->input('shortDesc');
            $product->mrp = $request->input('productMrp');
            $product->selling = $request->input('productSelling');
            $product->size = $request->input('productSize');
            $product->weight = $request->input('productWeight');
            $product->color = $request->input('productColor');
            $product->unit = $request->input('productUnit');
            $product->desc = $request->input('desc');
            $product->category = $request->input('categoryName');
            $product->sub_category = $request->input('subCategoryName');
            $product->meta_title = $request->input('metaTitle');
            $product->meta_desc = $request->input('metaDesc');
            $product->is_featured = $request->has('is_featured');
            $product->is_flash_sale = $request->has('is_flash_sale');
            $product->is_active = $request->has('is_active');
            $product->sizeArray = json_encode($jsonSizeArray);
            $product->colorArray = json_encode($jsonColorArray);
            $product->unitArray = json_encode($jsonUnitArray);
            $product->weightArray = json_encode($jsonWeightArray);
            $product->created_by = Auth::user()->name;
            
            // Handle file upload (featured image)
            if ($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/products'), $fileName);
                $product->featured_img = $fileName;
            }
            // dd($product);
            // Save the product
            $product->save();

            return response()->json(['message' => 'Form submitted successfully','status' => true]);

        }catch (\Exception $e) {
            // An exception occurred while sending the mail
            // Log the exception or handle it as needed
            // For example, you might log the error and show a user-friendly message
        
            \Log::error('Error while saving the category: ' . $e->getMessage());
        
            // You can customize the response based on your requirements
            return response()->json(['error' => 'Error while saving the category.','status' => false,'message' => $e->getMessage()], 500);
        }
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $attributes = Attribute::where('status', 'active')->get();
        $categories = Category::get();
        return view('admin.product.edit',compact('categories','attributes','product'));
    }

    public function update(Request $request){
        $product = Product::findOrFail($request->productId);        

                
        $jsonColorArray = json_decode($request->input('colorArray'));
        if ($jsonColorArray) {
            foreach ($jsonColorArray as $key => $item) {
                if (isset($item->image)) {
                    // Handle file upload if a new image is provided
                    if ($request->file('colorArray' . ($key + 1))) {
                        $file = $request->file('colorArray' . ($key + 1));
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('images/products'), $fileName);
                        $item->image = asset('images/products') . '/' . $fileName;
                    }
                } elseif ($item->image === null) {
                    // If no new image provided, retain the existing image URL
                    $existingImage = json_decode($product->colorArray)[$key]->image;
                    if ($existingImage) {
                        $item->image = $existingImage;
                    }
                }
            }
        }

        $jsonSizeArray = json_decode($request->input('sizeArray'));
        if ($jsonSizeArray) {
            foreach ($jsonSizeArray as $key => $item) {
                if (isset($item->image)) {
                    // Handle file upload if a new image is provided
                    if ($request->file('sizeImage_' . ($key + 1))) {
                        $file = $request->file('sizeImage_' . ($key + 1));
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('images/products'), $fileName);
                        $item->image = asset('images/products') . '/' . $fileName;
                    }
                } elseif ($item->image === null) {
                    // If no new image provided, retain the existing image URL 
                    $existingImage = json_decode($product->sizeArray)[$key]->image;
                    if ($existingImage) {
                        $item->image = $existingImage;
                    }
                }
            }
        }
        // dd(json_encode($jsonSizeArray));
        
        $jsonWeightArray = json_decode($request->input('weightArray'));
        if ($jsonWeightArray) {
            foreach ($jsonWeightArray as $key => $item) {
                if (isset($item->image)) {
                    // Handle file upload if a new image is provided
                    if ($request->file('weightImage_' . ($key + 1))) {
                        $file = $request->file('weightImage_' . ($key + 1));
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('images/products'), $fileName);
                        $item->image = asset('images/products') . '/' . $fileName;
                    }
                } elseif ($item->image === null) {
                    // If no new image provided, retain the existing image URL
                    $existingImage = json_decode($product->weightArray)[$key]->image;
                    if ($existingImage) {
                        $item->image = $existingImage;
                    }
                }
            }
        }
        
        $jsonUnitArray = json_decode($request->input('unitArray'));
        if ($jsonUnitArray) {
            foreach ($jsonUnitArray as $key => $item) {
                if (isset($item->image)) {
                    // Handle file upload if a new image is provided
                    if ($request->file('unitArray' . ($key + 1))) {
                        $file = $request->file('unitArray' . ($key + 1));
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('images/products'), $fileName);
                        $item->image = asset('images/products') . '/' . $fileName;
                    }
                } elseif ($item->image === null) {
                    // If no new image provided, retain the existing image URL
                    $existingImage = json_decode($product->unitArray)[$key]->image;
                    if ($existingImage) {
                        $item->image = $existingImage;
                    }
                }
            }
        }
        try {
            // Set attributes 
            $product->name = $request->input('productName');
            $product->slug = $request->input('productSlug');
            $product->short_Desc = $request->input('shortDesc');
            $product->mrp = $request->input('productMrp');
            $product->selling = $request->input('productSelling');
            $product->size = $request->input('productSize');
            $product->weight = $request->input('productWeight');
            $product->color = $request->input('productColor');
            $product->unit = $request->input('productUnit');
            $product->desc = $request->input('desc');
            $product->category = $request->input('categoryName');
            $product->sub_category = $request->input('subCategoryName');
            $product->meta_title = $request->input('metaTitle');
            $product->meta_desc = $request->input('metaDesc');
            $product->is_featured = $request->has('is_featured');
            $product->is_flash_sale = $request->has('is_flash_sale');
            $product->is_active = $request->has('is_active');
            $product->sizeArray = json_encode($jsonSizeArray);
            $product->colorArray = json_encode($jsonColorArray);
            $product->unitArray = json_encode($jsonUnitArray);
            $product->weightArray = json_encode($jsonWeightArray);
            $product->created_by = Auth::user()->name;
            
            // Handle file upload (featured image)
            if ($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/products'), $fileName);
                $product->featured_img = $fileName;
            }
            // dd($product);
            // Save the product
            $product->save();

            return response()->json(['message' => 'Form submitted successfully','status' => true]);

        }catch (\Exception $e) {
            // An exception occurred while sending the mail
            // Log the exception or handle it as needed
            // For example, you might log the error and show a user-friendly message
        
            \Log::error('Error while saving the category: ' . $e->getMessage());
        
            // You can customize the response based on your requirements
            return response()->json(['error' => 'Error while saving the category.','status' => false,'message' => $e->getMessage()], 500);
        }
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Category Updated Successfully','status' => true]);
    }

    public function status(Request $request, $id)
    {
        // Find the category by ID
        $product = Product::findOrFail($id);
        
        // Check if the current status is "active"
        if ($product->is_active) {
            // Update the status to "inactive"
            $product->is_active = 0;
        } else {
            // Update the status to "active"
            $product->is_active = 1;
        }
    
        // Save the changes to the product
        $product->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
    public function flashSaleStatus(Request $request, $id)
    {
        // Find the category by ID
        $product = Product::findOrFail($id);
        
        // Check if the current status is "active"
        if ($product->is_flash_sale) {
            // Update the status to "inactive"
            $product->is_flash_sale = 0;
        } else {
            // Update the status to "active"
            $product->is_flash_sale = 1;
        }
    
        // Save the changes to the product
        $product->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
    public function featuredStatus(Request $request, $id)
    {
        // Find the category by ID
        $product = Product::findOrFail($id);
        
        // Check if the current status is "active"
        if ($product->is_featured) {
            // Update the status to "inactive"
            $product->is_featured = 0;
        } else {
            // Update the status to "active"
            $product->is_featured = 1;
        }
    
        // Save the changes to the product
        $product->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
}
