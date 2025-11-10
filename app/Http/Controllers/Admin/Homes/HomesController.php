<?php

namespace App\Http\Controllers\Admin\Homes;

use \App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\File;
class HomesController extends Controller
{
    public function index()
    {
        $metatitle = "Home";
        $sales = DB::table('order_items')
            ->select(DB::raw('SUM(price * quantity) as total_sales_amount'))
            ->first();
            $totalStock = DB::table('products')
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('SUM(products.stock - IFNULL((SELECT SUM(quantity) FROM order_items WHERE order_items.product_id = products.id),0)) as total_stock')
            ->value('total_stock');
        return view('Admin.Dashboard.index', compact('metatitle','sales','totalStock'));
    }

    // public function StockgetAjax(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $draw = intval($request->input('draw'));
    //         $start = intval($request->input('start'));
    //         $length = intval($request->input('length'));
    //         $orderColIndex = intval($request->input('order.0.column'));
    //         $orderCol = $columns[$orderColIndex] ?? 'id';
    //         $orderDir = $request->input('order.0.dir') ?? 'asc';
    //         $searchValue = $request->input('search.value');
    //         $stockFilter = $request->input('stock_filter');
    //         $statusFilter = $request->input('status_filter');

    //         $recordsTotal = Product::count();
    //         $records = Product::with('category')
    //         ->when($stockFilter, function($q) use ($stockFilter) {
    //             if ($stockFilter == 'out') {
    //                 $q->whereRaw('(products.stock - IFNULL((SELECT SUM(quantity) FROM order_items WHERE order_items.product_id = products.id),0)) = 0');
    //             } elseif ($stockFilter == 'low') {
    //                 $q->whereRaw('(products.stock - IFNULL((SELECT SUM(quantity) FROM order_items WHERE order_items.product_id = products.id),0)) BETWEEN 1 AND 4');
    //             } elseif ($stockFilter == 'medium') {
    //                 $q->whereRaw('(products.stock - IFNULL((SELECT SUM(quantity) FROM order_items WHERE order_items.product_id = products.id),0)) BETWEEN 5 AND 20');
    //             } elseif ($stockFilter == 'high') {
    //                 $q->whereRaw('(products.stock - IFNULL((SELECT SUM(quantity) FROM order_items WHERE order_items.product_id = products.id),0)) > 20');
    //             }
    //         });

    //         if (!empty($searchValue)) {
    //             $records->where(function ($q) use ($searchValue) {
    //                 $q->where('products.name', 'like', "%{$searchValue}%")
    //                     ->orWhere('products.id', 'like', "%{$searchValue}%");
    //             });
    //         }
    //        if (isset($statusFilter)) {
    //             if ($statusFilter == '1') { 
    //                 $records->where('products.status', 1);
    //             } elseif ($statusFilter == '0') { 
    //                 $records->where('products.status', 0);
    //             }
    //         }

    //         $recordsFiltered = $records->count();
    //         $record = $records->select('products.*')->orderBy($orderCol, $orderDir)->offset($start)->limit($length)->get();
    //         $dataArr = [];
    //         $key = 0;
           

    //         foreach ($record as $key => $data) {
    //             $url = '';
    //             if (!empty($data->image) && File::exists(public_path('uploads/products/thumbnails/' . $data->image))) {
    //                 $url = url('public/uploads/products/thumbnails/' . $data->image);
    //             }
    //             $dataArr[$key]['id'] = !empty($data->id) ? $data->id : '';
    //             $image = !empty($url) ? '<div class="d-flex align-items-center">
    //                         <a href="javascript:void(0);" class="avatar avatar-md me-2">
    //                             <img src="' . $url . '" alt="' . $data->name . ' Category" ">
    //                         </a>
    //                     </div>' : '';

    //               $orderedQty = DB::table('order_items')->where('product_id', $data->id)->sum('quantity');
    //               $dataArr[$key]['image'] = $image;
    //               $dataArr[$key]['name'] = !empty($data->name) ? $data->name : '';
                  
    //             $dataArr[$key]['stock'] = !empty($data->stock)? max(0, $data->stock - $orderedQty): 0;
    //             $remainingStock = $dataArr[$key]['stock'];
    //             if ($remainingStock == 0) {
    //             $dataArr[$key]['stock_status'] = '<a href="javascript:void(0);" class="badge bg-danger fw-medium fs-10">Out of Stock</a>';
    //             } elseif ($remainingStock <= 4) {
    //                 $dataArr[$key]['stock_status'] = '<a href="javascript:void(0);" class="badge bg-warning text-dark fw-medium fs-10">Low Stock</a>';
    //             } elseif ($remainingStock <= 20) {
    //                 $dataArr[$key]['stock_status'] = '<a href="javascript:void(0);" class="badge bg-info text-dark fw-medium fs-10">Medium Stock</a>';
    //             } else {
    //                 $dataArr[$key]['stock_status'] = '<a href="javascript:void(0);" class="badge bg-success fw-medium fs-10">High Stock</a>';
    //             }
                

    //             if ($data->status == true) {
    //                 $dataArr[$key]['status'] = '<a href="javascript:void(0);" 
    //                         class="badge bg-success fw-medium fs-10 status-toggle-btn" 
    //                         data-id="' . $data->id . '" 
    //                         data-current-status="' . $data->status . '" 
    //                         data-next-status="0"> Active</a>';
    //             } else {
    //                 $dataArr[$key]['status'] = '<a href="javascript:void(0);" 
    //                         class="badge bg-danger fw-medium fs-10 status-toggle-btn" 
    //                         data-id="' . $data->id . '" 
    //                         data-current-status="' . $data->status . '" 
    //                         data-next-status="1"> Inactive</a>';
    //             }
    //             $action = '';
    //             $action .= '<div class="edit-delete-action float-end">
    //                         <a href="' . route('product.edit', $data->id) . '" class="me-2 p-2 text-success">
    //                             <i data-feather="edit" class="feather-edit"></i>
    //                         </a>
    //                         <a href="javascript:void(0);" class="p-2 text-danger remove-item-btn" data-id="' . $data->id . '">
    //                             <i data-feather="trash-2" class="feather-trash-2"></i>
    //                         </a>
    //                     </div>';
    //             $dataArr[$key]['action'] = $action;
    //             $key++;
    //         }

    //         return response()->json([
    //             'draw' => $draw,
    //             'recordsTotal' => $recordsTotal,
    //             'recordsFiltered' => $recordsFiltered,
    //             'data' => $dataArr,
    //         ]);
    //     }
    // }

    //   public function sendmail(Request $request)
    //     {

    //         $data = $request->validate([
    //             'email' => 'required|email',
    //             'phone' => 'required',
    //             'number_of_employee_v1' => 'required',
    //         ]);

    //         Mail::to($data['email'])->send(new ContactMail($data));

    //         return back()->with('success', 'Message sent successfully!');
    //     }


}
