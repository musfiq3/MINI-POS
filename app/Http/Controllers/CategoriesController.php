<?php

namespace App\Http\Controllers;

use App\Category;

use App\Http\Requests\CategoryRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_menu']= 'Products';
        $this->data['sub_menu'] = 'Categories';
    }

    public function index()
    {
        $this->data['categories']= Category::all();

        return view('category.categories', $this->data);
    }


    public function create()
    {
        $this->data['headline']= "Add New Category";
        $this->data['categories']= 'create';

        return view('category.form', $this->data);
    }


    public function store(CategoryRequest $request)
    {
        $formData = $request->all();
        if (Category::create($formData))
        {
            Session:: flash('message', $formData['title'], 'Category Added Successfully');
        };

        return redirect()->to('categories');

    }


    public function edit($id)
    {
        $this->data['categories'] = Category::find($id);


        return view('category.edit', $this->data );

    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $category->title = $data['title'];

        if( $category->save() ) {
            Session::flash('message', 'Category Updated Successfully');
        }

        return redirect()->to('categories');
    }


    public function destroy($id)
    {
        $category   = Category::find($id);
        $category-> delete();

        Session::flash('message', 'Category Deleted Successfully');

        return redirect()->to('categories');
    }
}
