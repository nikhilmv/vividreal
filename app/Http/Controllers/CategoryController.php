<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Yajra\DataTables\Html\Builder;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
 
        return view('admin/category/index' );
        
    }


    public function getCategoryData()
    {
  
        $data = Category::orderBy('id','DESC');
        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('category_name',function($row){
                    return $row->name;
                }) 
        
             
                ->make(true);
     
    return view('admin/category/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (Category::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        Category::create([
            'name'=>$request->name,
            'slug'=>$uniqueSlug,
        ]);
        return redirect()->route('admin.category.index')->with('success','Category created successfully.');
    }

    public function edit($category)
    {
        $data = Category::where('id',decrypt($category))->first();
        return view('admin.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        
        while (Category::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }

        Category::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => $uniqueSlug,
        ]);
        return redirect()->route('admin.category.index')->with('info','Category updated successfully.');   
    }

    public function destroy($id)
    {
        Category::where('id',decrypt($id))->delete();
        return redirect()->route('admin.category.index')->with('error','Category deleted successfully.');   
    }
}
