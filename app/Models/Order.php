<?php
    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class Order extends Model {
        protected $table = 'order';

        public function user() {
            return $this->belongsTo(User::Class);
        }

        public function orderDetails() {
            return $this->hasMany(OrderDetail::Class);
        }
    }
?>