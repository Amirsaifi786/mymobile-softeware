<?php

namespace App\Http\Controllers\Admin\Product;

use \App\Models\Product;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use \App\Models\Stock;




class ProductController extends Controller
{

    public function index()
    {
        $metatitle = "Product";
        $products = Product::all();
        $categories = Category::all();
        return view('Admin.Product.index', compact('metatitle', 'products', 'categories'));
    }

    public function getProductAjax(Request $request)
    {
        if ($request->ajax()) {
            $draw = intval($request->input('draw'));
            $start = intval($request->input('start'));
            $length = intval($request->input('length'));
            $orderColIndex = intval($request->input('order.0.column'));
            $orderCol = $columns[$orderColIndex] ?? 'id';
            $orderDir = $request->input('order.0.dir') ?? 'asc';
            $searchValue = $request->input('search.value');

            $recordsTotal = Product::count();
            $records = Product::with('category')->whereIn('status', [0, 1]);

            if (!empty($searchValue)) {
                $records->where(function ($q) use ($searchValue) {
                    $q->where('products.name', 'like', "%{$searchValue}%")
                        ->orWhere('products.id', 'like', "%{$searchValue}%");
                });
            }

            $recordsFiltered = $records->count();

            $record = $records->select('products.*')->orderBy($orderCol, $orderDir)->offset($start)->limit($length)->get();
            $dataArr = [];
            $key = 0;
            foreach ($record as $key => $data) {
                $url = '';

            if (!empty($data->image) && File::exists(public_path('uploads/products/thumbnails/' . $data->image))) {
                  $url = url('public/uploads/products/thumbnails/' . $data->image);
             }
                $dataArr[$key]['id'] = !empty($data->id) ? $data->id : '';
                $image = !empty($url) ? '<div class="d-flex align-items-center">
                            <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                <img src="' . $url . '" alt="' . $data->name . ' Category" ">
                            </a>
                        </div>' : '';

                        $dataArr[$key]['name'] = !empty($data->name)
                        ? (count($w = explode(' ', $data->name)) > 15
                        ? implode(' ', array_slice($w, 0, 15)) . '...'
                        : $data->name)
                        : '';
                $dataArr[$key]['image'] = $image;
                $dataArr[$key]['category'] = !empty($data->category) ? $data->category->name : '';

                if ($data->status == true) {

                    $dataArr[$key]['status'] = '<a href="javascript:void(0);" 
                            class="badge bg-success fw-medium fs-10 status-toggle-btn" 
                            data-id="' . $data->id . '" 
                            data-current-status="' . $data->status . '" 
                            data-next-status="0"> Active</a>';
                } else {

                    $dataArr[$key]['status'] = '<a href="javascript:void(0);" 
                            class="badge bg-danger fw-medium fs-10 status-toggle-btn" 
                            data-id="' . $data->id . '" 
                            data-current-status="' . $data->status . '" 
                            data-next-status="1"> Inactive</a>';
                }

                $action = '';
                $action .= '<div class="edit-delete-action float-end">
                            <a href="' . route('product.edit', $data->id) . '" class="me-2 p-2 text-success">
                                <i data-feather="edit" class="feather-edit"></i>
                            </a>
                            <a href="javascript:void(0);" class="p-2 text-danger remove-item-btn" data-id="' . $data->id . '">
                                <i data-feather="trash-2" class="feather-trash-2"></i>
                            </a>
                        </div>';

                $dataArr[$key]['action'] = $action;
                $key++;
            }

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $dataArr,
            ]);
        }
    }

    public function create()
    {

        $categories = Category::all();
        $subcategories = Subcategory::all();
        $producttypes = ProductType::all();
        $brands = Brand::all();
        return view('Admin.Product.create', compact('categories', 'subcategories', 'producttypes', 'brands'));
    }
public function store(Request $request)
{
  
    $validated = $request->validate([
        'category_id'     => 'required|integer|exists:categories,id',
        'subcategory_id'  => 'required|integer|exists:subcategories,id',
        'producttype_id'  => 'required|integer|exists:product_types,id',
        'brand_id'        => 'required|integer|exists:brands,id',
        'name'            => 'required|string|max:255',
        'mrp'             => 'required|numeric|min:0',
        'sellprice'       => 'required|numeric|min:0',
        'stock'           => 'required|integer|min:0',
        'guarantee'       => 'nullable|max:100',
        'size'            => 'nullable|string|max:100',
        'description'     => 'nullable',
        'guarantee'       => 'nullable',
        'rating'          => 'nullable|numeric|min:0|max:5',
        'image'           => 'nullable|mimes:jpg,jpeg,png,gif,webp,bmp,svg,tiff,ico,avif|max:4096',

    ]);

    $validated['sku'] = 'SKU-' . date('Ymd') . '-' . strtoupper(Str::random(4)) . '-' . $this->generateUniqueSku($request->name);


    $product = new Product();
      if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $uploadPath = public_path('uploads/products');
            $thumbPath = public_path('uploads/products/thumbnails');
            if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);
            if (!file_exists($thumbPath)) mkdir($thumbPath, 0777, true);
            $originalPath = $file->move($uploadPath, $filename);
            $validated['image'] = $filename;
            $manager = new ImageManager(new Driver());
            $image = $manager->read($originalPath);
            $image->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($thumbPath . '/' . $filename);
        }
        $validated['status'] = $request->has('status') ? 1 : 0;
        
        $product->fill($validated)->save();
             $quantity = (int) $validated['stock'] ?? 0;
            Stock::firstOrCreate(
                ['product_id' => $product->id],
                [
                    'total_stock' => $quantity,
                    'sold_stock' => 0,
                    'remaining_stock' => $quantity,
                ]
                );

    return redirect()->route('product')->with('success', 'Product inserted successfully!');
}

    private function generateUniqueSku($name)
    {
        $prefix = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $name), 0, 3));
        $random = mt_rand(10000, 99999);
        $sku = $prefix . '-' . $random;
        while (Product::where('sku', $sku)->exists()) {
            $random = mt_rand(10000, 99999);
            $sku = $prefix . '-' . $random;
        }
        return $sku;
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $producttypes = ProductType::all();
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        return view('Admin.Product.edit', compact('product', 'categories', 'subcategories', 'producttypes', 'brands'));
    }

public function update(Request $request)
{
    $validated = $request->validate([
        'id'             => 'required|integer|exists:products,id',
        'category_id'    => 'required|integer|exists:categories,id',
        'subcategory_id' => 'required|integer|exists:subcategories,id',
        'producttype_id' => 'required|integer|exists:product_types,id',
        'brand_id'       => 'required|integer|exists:brands,id',
        'name'           => 'required|string|max:255',
        'mrp'            => 'required|numeric|min:0',
        'sellprice'      => 'required|numeric|min:0',
        // 'stock'          => 'required|integer|min:0',
        'guarantee'      => 'nullable|string|max:100',
        'size'           => 'nullable|string|max:100',
        'rating'         => 'nullable|numeric|min:0|max:5',
        'description'    => 'nullable',
        'image'          => 'nullable|mimes:jpg,jpeg,png,gif,webp,bmp,svg,tiff,ico,avif|max:4096',
    ]);
    $product = Product::findOrFail($request->id);

    $product->sku = $product->sku ?? $this->generateUniqueSku($request->name);
    if ($request->hasFile('image')) {
            $oldImagePath = public_path('uploads/products/' . $product->image);
            $oldThumbPath = public_path('uploads/products/thumbnails/' . $product->image);
            if (!empty($product->image)) {
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                if (file_exists($oldThumbPath)) {
                    unlink($oldThumbPath);
                }
            }
            $uploadPath = public_path('uploads/products');
            $thumbPath = public_path('uploads/products/thumbnails');
            if (!file_exists($uploadPath)) mkdir($uploadPath, 0777, true);
            if (!file_exists($thumbPath)) mkdir($thumbPath, 0777, true);
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $originalPath = $file->move($uploadPath, $filename);
            $validated['image'] = $filename;
            try {
                $manager = new ImageManager(new Driver());
                $image = $manager->read($originalPath);
                $image->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($thumbPath . '/' . $filename);
            } catch (\Exception $e) {
                \Log::error('Thumbnail generation failed: ' . $e->getMessage());
            }
        }
            $product->update($validated);
    return redirect()->route('product')->with('success', 'Product updated successfully!');
}

   
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        if ($product->image) {
            $filename = $product->image;
            $basePath = 'uploads/products/';
            $thumbPath = 'uploads/products/thumbnails/';
            $originalFilePath = public_path($basePath . $filename);
            $thumbnailFilePath = public_path($thumbPath . $filename);
            if (file_exists($originalFilePath)) {
                unlink($originalFilePath);
            }
            if (file_exists($thumbnailFilePath)) {
                unlink($thumbnailFilePath);
            }
        }
        $product->delete();
        $stock=Stock::where('product_id',$product->id);
        $stock->delete();


        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|boolean']);
        try {
            $product = Product::findOrFail($id);
            $product->status = $request->status;
            $product->save();

            return response()->json([
                'success' => true,
                'message' => 'Category status updated successfully.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Status update failed for product ID ' . $id . ': ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to update product status.'
            ], 500);
        }
    }
    public function getSubcategories(Request $request)
    {
        $category_id = $request->category_id;
        $subcategories = Subcategory::where('category_id', $category_id)->where('status', 1)->get(['id', 'name']);
        return response()->json($subcategories);
    }
}
