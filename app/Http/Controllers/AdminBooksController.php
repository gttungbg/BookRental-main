<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Book_images;
use App\Models\Books;
use App\Models\Category;
use App\Models\publishers;
use App\Traits\StorageImagetraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBooksController extends Controller
{
    use StorageImagetraits;
    private $category;
    private $books;
    private $publishers;
    public function __construct(Category $category,Books $books,publishers $publishers)
    {
        $this->category=$category;
        $this->books=$books;
        $this->publishers=$publishers;

    }

    public function index(){
        return view('books.index');
    }
    public function create(){
        $htmlOption= $this->getCategory($parentId = '');
        return view('books.add',compact('htmlOption'));
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption= $recusive->categoryRecusive($parentId);
        return $htmlOption;

    }
    public function store(Request $request){
        //cái pushlisher_id đâu thì chưa có đấy
//        đag nghuên cưua
        //truyền vào mới có chứ
        $dataBookCreate=[
            'isbn'=>$request->isbn,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'slug'=>$request->slug,
            'description'=>$request->contents,
            'size'=>$request->size,
            'num_of_page'=>$request->numOfPage,
            'quantity'=>$request->quantity,
            'publish_date'=>$request->publish_date,
            'price'=>$request->price,
            'view_count'=>$request->view_count,
            'creator_id'=>auth()->id(),
            'publisher_id' => 1
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request,'feature_image_path','books');
          if(!empty( $dataUploadFeatureImage)){
              $dataBookCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
              $dataBookCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
          }
          $books= $this->books->create($dataBookCreate);

//          publishers::create([
//             'publisher_id'=>$books->publishers_id
//          ]);
          dd($books);

    }
}
