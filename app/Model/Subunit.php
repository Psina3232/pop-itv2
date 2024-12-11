<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'subunit';
    protected $fillable = [
        'Name',
        'Description',
    ];
 
    public function getId(): int
    {
        return $this->ID;
    }

}