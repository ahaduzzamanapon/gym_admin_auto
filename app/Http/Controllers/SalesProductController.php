<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales_productModel;
use App\Models\Sales_product_itemModel;
use App\Models\Product;
use App\Models\Member;
use App\Models\SiteSetting;
use Str;


class SalesProductController extends Controller
{
    public function index()
    {
        $sales = Sales_productModel::with(['member' => function($q) {
            $q->leftJoin('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
              ->select('members.*', 'multi_branchs.branch_name');
        }])->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $members = Member::leftJoin('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
                         ->select('members.*', 'multi_branchs.branch_name')
                         ->get();
        $products = Product::leftJoin('multi_branchs', 'products.branch_id', '=', 'multi_branchs.id')
                           ->select('products.*', 'multi_branchs.branch_name')
                           ->get();
        return view('sales.create', compact('members', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'sale_date' => 'required|date',
            'payment_method' => 'required',
            'status' => 'required',
        ]);
        $sale = Sales_productModel::create([
            'sale_id' =>  time(),
            'member_id' => $request->member_id,
            'sale_date' => $request->sale_date,
            'subtotal' => $request->sub_total,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'total_amount' => $request->grand_total,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
            'payment_note' => $request->payment_note,
        ]);

        foreach ($request->product_id as $key => $item) {

            $products = Product::find($item);
            $products->update([
                'product_qty' => $products->product_qty - $request->quantity[$key]
            ]);



            Sales_product_itemModel::create([
                'sale_id' => $sale->id,
                'product_id' => $item,
                'product_name' => '',
                'quantity' => $request->quantity[$key],
                'unit_price' => $request->price[$key],
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }
    public function edit($id)
    {
        $sale = Sales_productModel::with(['items.product', 'member'])->findOrFail($id);
        $members = Member::all();
        $products = Product::all();
        return view('sales.edit', compact('sale', 'members', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required',
            'sale_date' => 'required|date',
            'payment_method' => 'required',
            'status' => 'required',
        ]);
        $sale = Sales_productModel::findOrFail($id);
        $sale->update([
            'member_id' => $request->member_id,
            'sale_date' => $request->sale_date,
            'subtotal' => $request->sub_total,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'total_amount' => $request->grand_total,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
            'payment_note' => $request->payment_note,
        ]);

        $products = Product::all();
        foreach ($products as $product) {
            $product->update([
                'product_qty' => $product->product_qty + $sale->items->where('product_id', $product->id)->first()->quantity
            ]);
        }
        Sales_product_itemModel::where('sale_id', $sale->id)->delete();

        foreach ($request->product_id as $key => $item) {

            $products = Product::find($item);
            $products->update([
                'product_qty' => $products->product_qty - $request->quantity[$key]
            ]);
           
                Sales_product_itemModel::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item,
                    'product_name' => '',
                    'quantity' => $request->quantity[$key],
                    'unit_price' => $request->price[$key],
                ]);
            
        }

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function invoice($id)
    {
        $SiteSetting=SiteSetting::first(); 
        $sale = Sales_productModel::with(['items' => function($q) {
            $q->with('product:id,product_name')->select('id', 'sale_id', 'product_id', 'quantity', 'unit_price');
        }, 'member'])->findOrFail($id);
        //dd($sale);
        return view('sales.invoice', compact('sale'));
    }
}
