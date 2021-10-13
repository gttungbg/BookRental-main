<?php  

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use HasFactory;


Class Comment extends Model{
	protected $table = 'comments';
	protected $fillable = [
        'book_id',
        'user_id',
        'comment'
    ];
    	public function Books(){
    	return $this->belongsTo('App\Models\Comment','id','book_id');
    }
    public function Users(){
		return $this->hasOne('App\Models\User','id','user_id');
    }
	//Đêm số commet theo từng quyển sách

	public static function commentCount($isbn){
		$commentCount = Comment::where(['isbn'=>$isbn])->count();
		return $commentCount;
  }

}

?>