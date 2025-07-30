<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'establishment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'city',
        'state',
        'country',
        'address',
        'neighborhood',
        'number',
        'postcode'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Um estabelecimento possui vários registros 
     */
    public function registroEstabelecimento()
    {
        return $this->hasMany(Purchase::class, 'id_establishment', 'id');
    }

    public function getAllEstablishment()
    {
        return Establishment::all();
    }

    public function createEstablishment($request)
    {
        return Establishment::create($request);
    }

    public function getEstablishmentById($id)
    {
        return Establishment::find($id);
    }

    public function updateEstablishment($id, $request)
    {
        $establishment = Establishment::findOrFail($id);
        return $establishment->update($request);
    }

    public function deleteEstablishment($id)
    {
        $establishment = Establishment::findOrFail($id);
        return $establishment->delete();
    }
}
