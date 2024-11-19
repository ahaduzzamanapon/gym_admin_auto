<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use File;

class ProductController extends AppBaseController
{
    /**
     * Display a listing of the Product.
     *
     * @param ProductDataTable $productDataTable
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('products.index');
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('product_img_url')) {
            $path = storage_path('app/public/images/products');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('product_img_url');
            $input['product_img_url'] = $file->store('images/products', 'public');
        }else{
            unset($input['product_img_url']);
        }



        /** @var Product $product */
        $product = Product::create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Product $product */
        $product = Product::find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Product $product */
        $product = Product::find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        /** @var Product $product */
        $product = Product::find($id);

        $input = $request->all();

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }
        if ($request->hasFile('product_img_url')) {
            $path = storage_path('app/public/images/products');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('product_img_url');
            $input['product_img_url'] = $file->store('images/products', 'public');
        }else{
            unset($input['product_img_url']);
        }

        $product->fill($input);
        $product->save();

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Product $product */
        $product = Product::find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product->delete();

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
