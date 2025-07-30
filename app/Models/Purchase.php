<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var array<int, string>
     */
    protected $table = 'purchase';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_product',
        'id_establishment',
        'id_user',
        'price',
        'purchased_at'
    ];

    protected $casts = [
        'price' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * RegistroCompra possui um produto 
     */
    public function produtoRegisto()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    /**
     * RegistroCompra possui um estabelecimento 
     */
    public function estabelecimentoRegistro()
    {
        return $this->belongsTo(Establishment::class, 'id_establishment', 'id');
    }

    /**
     * RegistroCompra possui um estabelecimento 
     */
    public function usuarioRegistro()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function getAllPurchase()
    {
        return Purchase::all();
    }

    public function createPurchase($request)
    {
        return Purchase::create($request);
    }

    public function getPurchaseById($id)
    {
        return Purchase::find($id);
    }

    public function updatePurchase($id, $request)
    {
        $purchase = Purchase::findOrFail($id);
        return $purchase->update($request);
    }

    public function deletePurchase($id)
    {
        $purchase = Purchase::findOrFail($id);
        return $purchase->delete();
    }

    public function getRegistro()
    {
        return Purchase::select([
            'purchase.id',
            'category.name as category',
            'product.name as product_name',
            'product.brand as product_brand',
            'establishment.name as establishment_name',
            'establishment.city as establishment_city',
            'establishment.state as establishment_state',
            'establishment.country as establishment_country',
            'establishment.address as establishment_address',
            'establishment.neighborhood as establishment_neighborhood',
            'establishment.number as establishment_number',
            'establishment.postcode as establishment_postcode',
            'purchase.price',
            'purchase.updated_at',
            'purchase.purchased_at',
            'users.name as user_name',
            'users.username as username',
            'users.city as user_city',
            'users.state as user_state'
        ])
        ->join('product', 'purchase.id_product', '=', 'product.id')
        ->join('category', 'product.id_category', '=', 'category.id')
        ->join('establishment', 'purchase.id_establishment', '=', 'establishment.id')
        ->join('users', 'purchase.id_user', '=', 'users.id')
        ->orderBy('purchase.updated_at', 'DESC')
        ->get();
    }

    public function getRegistroByUser($idUser)
    {
        return Purchase::select([
            'purchase.id',
            'category.name as category',
            'product.name as product_name',
            'product.brand as product_brand',
            'establishment.name as establishment_name',
            'establishment.city as establishment_city',
            'establishment.state as establishment_state',
            'establishment.country as establishment_country',
            'establishment.address as establishment_address',
            'establishment.neighborhood as establishment_neighborhood',
            'establishment.number as establishment_number',
            'establishment.postcode as establishment_postcode',
            'purchase.price',
            'purchase.updated_at',
            'purchase.purchased_at',
            'users.name as user_name',
            'users.username as username',
            'users.city as user_city',
            'users.state as user_state'
        ])
        ->join('product', 'purchase.id_product', '=', 'product.id')
        ->join('category', 'product.id_category', '=', 'category.id')
        ->join('establishment', 'purchase.id_establishment', '=', 'establishment.id')
        ->join('users', 'purchase.id_user', '=', 'users.id')
        ->where('purchase.id_user', '=', $idUser)
        ->orderBy('purchase.updated_at', 'DESC')
        ->get();
    }
}
