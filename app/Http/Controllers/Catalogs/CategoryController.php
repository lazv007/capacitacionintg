<?php

namespace App\Http\Controllers\Catalogs;

use App\Core\Eloquent\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Facades\App\Core\Facades\AlertCustom;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Holis";
       // dd(request()); metodo helper 
       //return view('categories.index');
      // $categories=Category::all(); //trae todo mis datos de la base
    

      $categories=Category::where('name','ILIKE',"%".request()->get('filter')."%")->paginate(3); //crea la paginacion
       return view('categories.index',compact('categories'));
       //$category=Category::all();
       //return view('categories.index')->with(['categories'=>Category::all()]); hace lo mismo pero renombro la variable
//return view('categories.index')->with(['categories'=>Category::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all(); //trae todo mis datos de la base
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
       // dd($request);
       //Category::create($request->all());//no es recomendable
       //Category::create($request->only(['name','description']));
       Category::create($request->validated());
       AlertCustom::success('Guardado correctamente');
       return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Eloquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Eloquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Eloquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //objeto de base de datos $category
        $category->fill($request->validated());
        $category->save();
        AlertCustom::success('Actualizado correctamente');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Eloquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        AlertCustom::success('Eliminado correctamente');
        return redirect()->route('categories.index');
    }
}
