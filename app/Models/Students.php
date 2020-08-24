<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Students extends Model
{
    protected $table = 'students'; // kết nối bảng lớp
    protected $primaryKey = 'id'; // đổi khóa chính thành id

    protected $fillable = ['first_name','last_name','date','level','address','phone','email','gender','password','is_class']; //khai báo cột cần 

    public function getFullNameAttribute()
        {
            return "{$this->first_name} {$this->last_name}";
        }
    protected $attributes = [
        'level' => 3,
        'password' => 1,
    ];
    public $timestamps = false; // chỉnh time chắc phải bắt buộc
    public function setPasswordAttribute($password){

        $this->attributes['password'] = Hash::make($password);
    }
}
