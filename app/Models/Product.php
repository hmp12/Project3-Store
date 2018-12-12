<?php

    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class Product extends Model {
        protected $table = 'product';

        public function photos() {
            return $this->hasMany(Photo::Class);
        }

        public function subProducts() {
            return $this->hasMany(SubProduct::Class);
        }

        public function category() {
            return $this->belongsTo(Category::Class);
        }
    }
    
?>