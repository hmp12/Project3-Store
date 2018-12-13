<?php

    namespace App\Models;

    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Model;
    
    class User extends Model {
        protected $table = 'users';

        public function carts() {
            return $this->hasMany(Cart::Class);
        }

        public function orders() {
            return $this->hasMany(Order::Class);
        }

        public function role() {
            return $this->belongsTo(Role::Class);
        }

        static function getUser($request, $username, $password) {
            if (empty($username)) {
                $request->session()->put('loginError', "Please enter your username");
                return null;
			}
            if (empty($password)) {
                $request->session()->put('loginError', "Please enter your password");
                return null;
            }

            
            if (User::where('username', $username)->count() > 0) {
                if (User::where('password', $password)->count() > 0) {
                    $user = User::where('username', $username)
                        ->where('password', $password)->first();
                    return $user;
                }
                else {
                    $request->session()->put('loginError', "Wrong password");
                    return null;
                }
            }
            else {
                $request->session()->put('loginError', "Invalid username");
                return null;
            }
        }
    }
    
?>