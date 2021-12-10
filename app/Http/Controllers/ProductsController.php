<?php

namespace App\Http\Controllers;

use App\Category;
use App\Group;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_menu']= 'Products';
        $this->data['sub_menu'] = 'Products';
    }

    public function index()
    {
       $this->data['products']= Product::all();
        return view('products.products', $this->data);
    }


    public function create()
    {

        //$this->data['categories']   = Category::arrayForSelect();
        $this->data['categories']   = Category::get();
        $this->data['mode']         = 'create';
        $this->data['headline']     = 'Add New Product';

        return view('products.form', $this->data);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $formData = $request->all();
        if (Product::create($formData))
        {
            Session:: flash('message', 'Products created Successfully');
        };

        return redirect()->to('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product'] =Product::find($id);

        return view('products.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['products'] = Product::findOrFail($id);

        $this->data['categories'] = Category::arrayForSelect();   /**  Used in create  */

        $this->data['headline']     = 'Update Product Information';

        return view('products.edit', $this->data );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data                   = $request->all();
        $product                = Product::find($id);
        $product->category_id   = $data['category_id'];
        $product->title         = $data['title'];
        $product->description   = $data['description'];
        $product->cost_price    = $data['cost_price'];
        $product->price         = $data['price'];
        $product->has_stock     = $data['has_stock'];

        if( $product->save() ) {
            Session::flash('message', 'Product Updated Successfully');
        }

        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Product::find($id)->delete() ) {
            Session::flash('message', 'Product Deleted Successfully');
        }

        return redirect()->to('products');
    }
}
