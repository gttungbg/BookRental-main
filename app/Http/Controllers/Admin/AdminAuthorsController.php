<?php

namespace App\Http\Controllers\Admin;

use App\Models\Authors;
use App\Models\Publishers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use App\Http\Requests\Author\AuthorRequest;

class AdminAuthorsController extends Controller
{
    private $authors;

    public function __construct(Authors $authors)
    {
        $this->authors=$authors;

    }
    public function index(){
        $authors = $this->authors->paginate(5);
        return view('authors.index',compact('authors'));
    }
    public function create(){
        return view('authors.add');
    }
    public function store(AuthorRequest $request){

        $this->authors->create($request->all());
//        $this->authors->create([
//              'name' =>$request->name,
//              'date_of_birth'=>$request->date_of_birth
//        ]);
        return redirect()->route('authors.index');
    }
    public function edit($id){
        $data = DB::table('authors')->find($id);
        return view('authors.edit',compact('data'));

    }
    public function update(Request $request,$id){
        $data = Authors::find($id);
        $data->name = $request->name;
        $data->date_of_birth=$request->date_of_birth;
        $data->save();
        return redirect()->route('authors.index');
    }

    public function delete(Request $request,$id){
       $this->authors->where('id',$id)->delete();
        return redirect()->route('authors.index');
    }
}
