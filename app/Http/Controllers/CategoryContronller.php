<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;


class CategoryContronller extends Controller
{
    private $category;

    public function __construct(Category $category)
    {

        $this->category =$category;
    }

    public function create(){
        $htmlOption= $this->getCategory($parentId = '');
        return view('category.add',compact('htmlOption'));
    }

    public function index(){
        $categories = $this->category->latest()->paginate(5);
        return view('category.index',compact('categories'));
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption= $recusive->categoryRecusive($parentId);
        return $htmlOption;

    }
    public function store(Request $request){
        $this->category->create([
            'parent_id' =>$request->parent_id,
            'name' =>$request->name,
            'slug' =>str_slug($request->name),
            'description'=>$request->description
        ]);
        return redirect()->route('categories.index');
    }
    public function  edit($id){
        $category = $this->category->find($id);
        $htmlOption= $this->getCategory($category->parent_id);
        return view('category.edit',compact('category','htmlOption'));

    }
    public function update(Request $request,$id){
        $this->category->find($id)->update([
            'parent_id' =>$request->parent_id,
            'name' =>$request->name,
            'slug' =>str_slug($request->name),
            'description'=>$request->description

        ]);
        return redirect()->route('categories.index');

    }
    public  function delete($id){
           $this->category->find($id)->delete();
           return redirect()->route('categories.index');
    }
}
