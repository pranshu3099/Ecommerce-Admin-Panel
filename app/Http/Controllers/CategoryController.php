<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index()

    {
        $result['data'] = Category::all();
        return view('admin.category', $result);
    }


    public function manage_category()
    {
        return view('admin.manage_category');
    }

    public function manage_category_process(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
        ]);
        session()->flash('message', 'Category Added Successfully');
        return redirect('/admin/category');
    }

    public function destroy($id)
    {
        $res = Category::find($id);
        $res->delete();
        session()->flash('message', 'item Deleted Successfully');
        return redirect('/admin/category');
    }

    public function edit($id)
    {
        $model['data']  = Category::find($id);
        return view('admin.categoryedit', $model);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories,category_slug,' . $id,
        ]);

        $model = Category::find($id);
        $model->category_name = $request->category_name;
        $model->category_slug = $request->category_slug;
        $model->save();
        session()->flash('message', 'Updated Successfully');
        return redirect('/admin/category');
    }
}
