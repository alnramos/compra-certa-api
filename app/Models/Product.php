<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'brand',
        'id_category'
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
     * Produto pertence a uma categoria
     */
    public function produto()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    /**
     * Um produto possui vários registros 
     */
    public function registroProduto()
    {
        return $this->hasMany(Purchase::class, 'id_product', 'id');
    }

    public function getAllProduct()
    {
        return Product::all();
    }

    public function createProduct($request)
    {
        return Product::create($request);
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function updateProduct($id, $request)
    {
        $product = Product::findOrFail($id);
        return $product->update($request);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        return $product->delete();
    }

}
