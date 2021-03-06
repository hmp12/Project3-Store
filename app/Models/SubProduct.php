<?php

    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class SubProduct extends Model {
        protected $table = 'subproduct';

        public function product() {
            return $this->belongsTo(Product::Class);
        }

        public function cart() {
            return $this->hasMany(Cart::Class, 'subproduct_id');
        }

        public function orderDetails() {
            return $this->hasMany(OrderDetail::Class, 'subproduct_id');
        }
    }
?>