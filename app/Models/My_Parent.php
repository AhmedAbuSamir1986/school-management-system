<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class My_Parent extends Model
{
    use HasTranslations;

    use HasFactory;

    public array $translatable = ['Name_Father', 'Job_Father', 'Name_Mother', 'Job_Mother'];

    protected $table = "my__parents";

    protected $fillable = [
        'Email',
        'Password',
        'Name_Father',
        'National_ID_Father',
        'Passport_ID_Father',
        'Phone_Father',
        'Job_Father',
        'Nationality_Father_id',
        'Blood_Type_Father_id',
        'Religion_Father_id',
        'Address_Father',
        'Name_Mother',
        'National_ID_Mother',
        'Passport_ID_Mother',
        'Phone_Mother',
        'Job_Mother',
        'Nationality_Mother_id',
        'Blood_Type_Mother_id',
        'Religion_Mother_id',
        'Address_Mother',
    ];

    public function fatherBloods()
    {
        return $this->belongsTo(TypeBlood::class, 'Blood_Type_Father_id', 'id');
    }

    public function fatherNationality()
    {
        return $this->belongsTo(Nationalitie::class, 'Nationality_Father_id', 'id');
    }

    public function fatherReligion()
    {
        return $this->belongsTo(Religion::class, 'Religion_Father_id', 'id');
    }

    public function motherBloods()
    {
        return $this->belongsTo(TypeBlood::class, 'Blood_Type_Mother_id', 'id');
    }

    public function motherNationality()
    {
        return $this->belongsTo(Nationalitie::class, 'Nationality_Mother_id', 'id');
    }

    public function motherReligion()
    {
        return $this->belongsTo(Religion::class, 'Religion_Mother_id', 'id');
    }
}
