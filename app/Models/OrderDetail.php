<?php
    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class OrderDetail extends Model {
        protected $table = 'order_detail';

        public function order() {
            return $this->belongsTo(Order::Class);
        }

        public function subProduct() {
            return $this->belongsTo(SubProduct::Class, 'subproduct_id');
        }
    }
?>