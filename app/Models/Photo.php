<?php

    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class Photo extends Model {
        protected $table = 'photo';

        public function banner() {
            return $this->hasOne(Banner::Class);
        }

        public function product() {
            return $this->belongsTo(Product::Class);
        }
    }
    
?>