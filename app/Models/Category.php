<?php

    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class Category extends Model {
        protected $table = 'category';

        public function children() {
            return $this->hasMany(Category::Class, 'parent_id');
        }

        public function parent() {
            return $this->belongsTo(Category::Class, 'parent_id');
        }

        public function products() {
            return $this->hasMany(Product::Class);
        }

    }
    
?>