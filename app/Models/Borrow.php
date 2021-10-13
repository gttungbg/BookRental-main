<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\StatusAttribute;

class Borrow extends BaseModel
{
    use HasFactory,StatusAttribute;

    protected $table = 'borrows';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'request_date',
        'borrow_date',
        'return_date',
        'amount',
        'deposit',
        'status',
        'note'
    ];

    public function users()
    {
        return $this->beLongsTo(User::class,'user_id');
    }
}