<?php
    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class Role extends Model {
        protected $table = 'role';

        public function users() {
            return $this->hasMany(User::Class);
        }
    }
?>