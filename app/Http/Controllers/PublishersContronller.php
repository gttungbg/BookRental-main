<?php

namespace App\Http\Controllers;

// use App\Components\Recusive;
use App\Models\Publishers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Publishers\CreatePublisherRequest;

class PublishersContronller extends Controller
{
    private $publishers;
    private $pub_id;
    public function __construct(Publishers $publishers)
    {
        $this->publishers= $publishers;
    }
    public function index(){

        $publishers = $this->publishers->latest()->paginate(5);
        return view('publishers.index',compact('publishers'));

    }
    public function create(){
        return view('publishers.add');
    }

    public function store(CreatePublisherRequest $request){

        $this->publishers->create([
            'name'=>$request->name,
            'description' =>$request->description
        ]);
        return redirect()->route('publishers.index');
    }
    public function edit($id){

        $data = DB::table('publishers')->find($id);
        return view('publishers.edit',compact('data'));

    }
    public function update(Request $request,$id){
        $data = publishers::find($id);
        $data->name = $request->name;
        $data->description=$request->description;
        $data->save();
        return redirect()->route('publishers.index');
    }
    public function delete($id){
        publishers::where('id',$id)->delete();
        return redirect()->route('publishers.index');

    }
}
