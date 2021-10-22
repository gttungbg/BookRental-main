<?php

namespace App\Http\Controllers;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    protected $borrow;

    public function __construct(Borrow $borrow)
    {
        $this->borrow = $borrow;

    }

    public function index()
    {
        $borrows = $this->borrow->with(['users'])->get();
        return view('borrow.index', compact('borrows'));
    }

    public function updateStatus(Request $request, $id)
    {
        $borrowUpdate = $this->borrow->findOrFail($id);
        $borrowUpdate->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('success',__('Updated status success'));
    }

}
