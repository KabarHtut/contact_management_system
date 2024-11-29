<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $with = ['group'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search']??false, function ($query,$search){
                $query->where(function ($query) use ($search){
                    $query->where('name', 'LIKE', '%'. $search . '%')
                        ->orWhere('phone', 'LIKE', '%'. $search . '%');
                });
            });
        $query->when($filter['group']??false, function ($query,$id){
                $query->whereHas('group', function ($query) use ($id){
                    $query->where('id', $id);
                });
            });
    }

    public function Group(){
        return $this->belongsTo(Group::class);
    }
}
