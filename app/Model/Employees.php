<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'Surname',
        'Name',
        'Patronym',
        'Gender',
        'Date_of_Birth',
        'Address',
        // 'department_id',
        'Subunit_ID',
        'Users_ID',
        'Age'
    ];
 
   use HasFactory;
   public $timestamps = false;
   public function getId(): int
   {
       return $this->ID;
   }

}