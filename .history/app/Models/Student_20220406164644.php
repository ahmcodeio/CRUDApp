<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model

{
    use HasFactory;
    protected $table = 'students';

    
    use HasFactory;
    protected $fillable = [
        'student_id',
        'name',
        'email',
        'phone' 
        
    ];
  

    // use HasFactory;
    // protected $tabel = 'student_id';


    public function getMyImageAttribute()
    {
        return 'data:imgae/png;base64' . base64_encode(file_get_contents($this->image));
    }

}



//use app\Models\Students