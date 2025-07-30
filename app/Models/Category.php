<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
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
     * Uma categoria possui vários produtos 
     */
    public function produtoCategoria()
    {
        return $this->hasMany(Product::class, 'id_category', 'id');
    }

    public function getAllCategory()
    {
        return Category::all();
    }

    public function createCategory($request)
    {
        return Category::create($request);
    }

    public function getCategoryById($id)
    {
        return Category::find($id);
    }

    public function updateCategory($id, $request)
    {
        $category = Category::findOrFail($id);
        return $category->update($request);
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
