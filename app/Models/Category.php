<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Todo::class);
    }

    public $name;
    public $description;
    public $categories;

    public function mount()
    {
        // Load categories from the database and assign them to the $categories property
        $this->categories = $this->pluckCategories();
    }

    public function pluckCategories()
    {
        // Assuming you have a 'categories' table in the database
        return Category::pluck('name', 'id')->toArray();
    }

    public function render()
    {
        return view('livewire.category');
    }
}
