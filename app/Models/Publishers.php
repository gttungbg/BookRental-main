<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class publishers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','description'];
    protected $table = 'publishers';
    public function Books()
    {
        return $this->hasMany(Books::class,'publishers_id');
    }

}
