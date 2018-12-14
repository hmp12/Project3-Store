<?php

    namespace App\Http\Controllers;

    use View;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;
    use Auth;
    // use App\User;
    use App\Models\User;
    use App\Models\Role;

    class UserController extends Controller {
        public function showUsers(Request $request) {
            $data['tab'] = 'user-manage';
            $data['users'] = User::all();

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function updateUser(Request $request) {
            $tab = 'edit-user';
            $id = $request->id;
            $user = User::where('id', $id)->first();
            if (!empty($user)) {
                $name = $user->name;
                $username= $user->username;
                $email = $user->email;
                $roleId = $user->role_id;

            }
            else {
                return "User is not exist";
            }
            
            if ($request->isMethod('post')) {
                $name = $request->name;
                $username= $request->username;
                $email = $request->email;
                $roleId = $request->role;

                $valid = True;
                if (empty($name)) {
                    $valid = False;
                    $nameError = "Fullname is empty";
                }

                if (empty($username)) {
                    $valid = False;
                    $usernameError = "Username is empty";
                }

                if (empty($email)) {
                    $valid = False;
                    $emailError = "Email is empty";
                }

                if (empty($roleId)) {
                    $roleId = 0;
                }
                
                if ($valid) {
                    $user->name = $name;
                    $user->username= $username;
                    $user->email = $email;
                    $user->role_id = $roleId;

                    $user->save();
                }
            }

            $roles = Role::all();
            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function deleteUsers(Request $request) {
            $ids = $request->ids;

            User::destroy($ids);
        }

        // public function login(Request $request) {
        //     if ($request->session()->has('user')) {
        //         return redirect('/store');
        //     }

        //     if ($request->isMethod('post')) {
        //         $username = $request->input('username');
        //         $passwordword = $request->input('pass');
        //         $user = User::getUser($request, $username, $passwordword);

        //         if (!empty($user)) {
        //             $request->session()->put('user', $user);
        //             return redirect('/store');
        //         }
        //         else {
        //             $data['error'] = $request->session()->get('loginError');
        //             $data['user'] = $user;
        //             $data['pass'] = $passwordword;
        //         }             
        //     }
        //     else {
        //         $data = array();
        //     }
            
        //     $view = View::make('user.login', $data);
        //     return $view;
        // }

        public function logout(Request $request) {
            Auth::logout();
            return redirect('/login');
        }

        // public function signUp(Request $request) {
        //     $valid = False;

        //     if ($request->isMethod('post')) {
        //     	$valid = True;
        //     	if (empty($request->name)) {
        //     		$nameError = "Full name is required";
        //     		$valid = False;
        //     	}
        //     	else {
        //     		$name = $this->reForm($request->name);
        //     		if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        //     			$nameError = "Only letter";
        //     			$valid = False;
        //     		}
        //     	}
        //     	if (empty($request->username)) {
        //     		$usernameError = "User name is required";
        //     		$valid = False;
        //     	}
        //     	else {
        //     		$username = $this->reForm($request->username);
        //     		if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        //     			$usernameError = "Only letter and number";
        //     			$valid = False;
        //             }
        //             else if (User::where('username', $username)->count() > 0) {
        //                 $usernameError = "Username has already existed";
        //                 $valid = False;
        //             }
        //     	}
        //     	if (empty($request->email)) {
        //     		$emailError = "Email is required";
        //     		$valid = False;
        //     	}
        //     	else {
        //     		$email = $this->reForm($request->email);
        //     		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     		 	$emailError = "Invalid email format"; 
        //     		 	$valid = False;
        //              }
        //              else if (User::where('email', $email)->count() > 0) {
        //                 $emailError = "This email has already used";
        //                 $valid = False;
        //             }
        //     	}
        //     	if (empty($request->password)) {
        //     		$passwordError = "Password is required";
        //     		$valid = False;
        //     	}
        //     	else {
        //     		$password = $this->reForm($request->password);
        //     		if (empty($request->rePass) || $request->rePass != $password) {
        //     			$rePassError = "Password not match";
        //     			$valid = False;
        //     		}
        //     	}
        //     	if (isset($request->gender)) {
        //     		$gender = $request->gender;
        //     	}       		
            	
        //     	if ($valid) { 
        //             $user = new User();
        //             $user->name = $name;
        //             $user->username = $username;
        //             $user->email = $email;
        //             $user->password = $password;
        //             $user->gender = $gender;
        //             $user->save();

        //             return redirect('/user/login');
        //     	}
        //     }



        //     $data = get_defined_vars();

        //     $view = View::make('user/signup', $data);
        //     return $view;
        // }

        // function reForm($data) {
        //     $data = trim($data);
        //     $data = stripslashes($data);
        //     $data = htmlspecialchars($data);
        //     return $data;
        // }

        public function showUser(Request $request) {
            $user = null;
            if (Auth::check()) {
                $user = Auth::user();
            }

            $view = View::make('store.user-detail', ['user' => $user]);
            return $view;
        }

        public function updateUserInfo(Request $request) {
            $id = Auth::id();
            $user = User::where('id', $id)->first();
            if (!empty($user)) {
                $name = $user->name;
                $address = $user->address;
                $phone = $user->phone;

            }
            else {
                return "User is not exist";
            }
            
            if ($request->isMethod('post')) {
                $name = $request->name;
                $address= $request->address;
                $phone = $request->phone;

                $valid = True;
                if (empty($name)) {
                    $valid = False;
                    $nameError = "Fullname is empty";
                }
                
                if ($valid) {
                    $user->name = $name;
                    $user->address= $address;
                    $user->phone = $phone;

                    $user->save();
                }
            }

            $data = get_defined_vars();

            $view = View::make('store/user-info-update', $data);
            return $view;
        }
    }