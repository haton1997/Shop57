<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Redirect;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = Category::paginate(10);
//        echo "<pre>";
//        var_dump($category);
//        echo "</pre>";
//        exit();
        return view('admin.pages.category.list', compact('category'));
        // CÓ thể viết ['category' => $category] tương đương compact('category')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => to_slug($request->name),
            'status' => $request->status,
        ]);
        return Redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255'
            ],
            [
                'required' => 'Tên không được để trống',
                'min' => 'Tên danh mục dài 2 đến 255 ký tự',
                'max' => 'Tên danh mục dài 2 đến 255 ký tự',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>'true','message'=> $validator->errors()], 200);
        }
        $category = Category::find($id);
        $category->update(
            [
                'name' => $request->name,
                'slug' => to_slug($request->name),
                'status' => $request->status
            ]
        );
        return response()->json(['success'=>'Sửa thành công'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(['success'=>'Xóa thành công'],200);
    }
}
