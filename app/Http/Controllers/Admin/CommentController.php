<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function penddingIndex()
    {
       $comment = Comment::join('books','isbn','=','comments.book_id')->select('books.title','comments.*')
            ->get();
        $comments = Comment::with(['books','users'])->get();
        return view('admin.comment.pendding_index',compact('comments'));
    }
     public function successIndex()
    {
         $comment = Comment::join('books','isbn','=','comments.book_id')->select('books.title','comments.*')
            ->get();
         $comments = Comment::with(['books','users'])->get();
        return view('admin.comment.success_index',compact('comments'));
    }
     public function successComment($id)
    {
        $comment =Comment::find($id);
        $comment->save();
        return redirect()->back()->with('success','Bình luận đã được duyệt !!!');
    }
     public function deleteComment($id)
    {
        $comment =Comment::where('id',$id)->delete();
        return redirect()->back()->with('danger','Bình luận đã được xóa !!!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
