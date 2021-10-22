<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Book_images;
use App\Models\Books;
use App\Models\Category;
use App\Models\Publishers;
use App\Models\Book_authors;
use App\Models\Authors;
use App\Traits\StorageImagetraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Dotenv\Validator;
use App\Http\Requests\Books\BookRequest;

class AdminBooksController extends Controller
{
    use StorageImagetraits;

    private $category;
    private $books;
    private $publishers;
    private $books_image;
    private $authors;
    private $book_authors;

    public function __construct(Category $category, Books $books, Publishers $publishers, Book_images $books_image, Authors $authors, Book_authors $book_authors)
    {
        $this->category = $category;
        $this->books = $books;
        $this->publishers = $publishers;
        $this->books_image = $books_image;
        $this->authors = $authors;
        $this->book_authors = $book_authors;

    }

    public function index()
    {
        $books = $this->books->latest()->paginate(3);

        return view('books.index', compact('books'));
    }

    public function create()
    {

        $data = DB::table('publishers')->get();
        $htmlOption = $this->getCategory($parentId = '');
        return view('books.add', compact('htmlOption', 'data'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;

    }

    public function store(Request $request)
    {
        $data = $this->books->all();
        $dataBookCreate = [
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->contents,
            'size' => $request->size,
            'num_of_page' => $request->numOfPage,
            'quantity' => $request->quantity,
            'publish_date' => $request->publish_date,
            'price' => $request->price,
            'view_count' => $request->view_count,
            'creator_id' => auth()->id(),
            'publisher_id' => $request->publisher_id
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'books');
        if (!empty($dataUploadFeatureImage)) {
            $dataBookCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataBookCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $books = $this->books->create($dataBookCreate);
        //insert data to books_image
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataBooksImagesDetail = $this->storageTraitUploadMutible($fileItem, 'Books');
                $books->images()->create([
                    'title' => $request->title,
                    'image_path' => $dataBooksImagesDetail['file_path'],
                    'image_name' => $dataBooksImagesDetail['file_name']

                ]);

            }
        }
        //insert authors for books
        foreach ($request->authorsIds as $authorsItem) {
            //insert to books authors
            $authorsInstance = $this->authors->firstOrCreate([
                'name' => $authorsItem,
                'date_of_birth' => $request->date_of_birth
            ]);

            $authorsIds[] = $authorsInstance->id;
        }
        $books->authors()->attach($authorsIds);
        return redirect()->route('books.index');

    }

    public function edit($id)
    {
        $books = $this->books->find($id);
        $htmlOption = $this->getCategory($books->category_id);
        $data = DB::table('publishers')->get();

        return view('books.edit', compact('htmlOption', 'data', 'books'));

    }

    public function update(Request $request, $id)
    {
        $data = $this->books->all();
        $dataBookUpdate = [
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->contents,
            'size' => $request->size,
            'num_of_page' => $request->numOfPage,
            'quantity' => $request->quantity,
            'publish_date' => $request->publish_date,
            'price' => $request->price,
            'view_count' => $request->view_count,
            'creator_id' => auth()->id(),
            'publisher_id' => $request->publisher_id
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'books');
        if (!empty($dataUploadFeatureImage)) {
            $dataBookUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataBookUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->books->find($id)->update($dataBookUpdate);
        $books = $this->books->find($id);


        //insert data to books_image
        if ($request->hasFile('image_path')) {
            $this->books_image->where('book_id', $id)->delete();
            foreach ($request->image_path as $fileItem) {
                $dataBooksImagesDetail = $this->storageTraitUploadMutible($fileItem, 'Books');
                $books->images()->create([
                    'title' => $request->title,
                    'image_path' => $dataBooksImagesDetail['file_path'],
                    'image_name' => $dataBooksImagesDetail['file_name']

                ]);

            }
        }
        //insert authors for books
        foreach ($request->authorsIds as $authorsItem) {
            //insert to books authors
            $authorsInstance = $this->authors->firstOrCreate([
                'name' => $authorsItem,
                'date_of_birth' => $request->date_of_birth
            ]);

            $authorsIds[] = $authorsInstance->id;
        }
        $books->authors()->attach($authorsIds);
        return redirect()->route('books.index');

    }

    public function delete($id)
    {
        try {
            $this->books->find($id)->delete();
            return response()->json([
                'code' => 200,
                'messager' => 'success',

            ], 200);

        } catch (\Exception $exception) {
            Log::error('Massager' . $exception->getMessager() . '---line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'messager' => 'fail',

            ], 500);
        }

    }

}
