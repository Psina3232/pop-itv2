<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    use HasFactory;

    public $timestamps = false;

    public function getId(): int
    {
        return $this->ID;
    }
}