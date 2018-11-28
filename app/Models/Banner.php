<?php

    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class Banner extends Model {
        protected $table = 'banner';

        public function Photo() {
            return $this->hasOne('App\Models\Photo');
        }
    }
    
?>