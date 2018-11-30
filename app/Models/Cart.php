<?php

    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class Cart extends Model {
        protected $table = 'cart';

        public function user() {
            return $this->belongsTo(User::Class);
        }

        public function subProduct() {
            return $this->belongsTo(SubProduct::Class, 'subproduct_id');
        }
    }
    
?>