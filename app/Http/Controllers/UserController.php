<?php

    namespace App\Http\Controllers;

    use View;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;
    use App\Models\User;

    class UserController extends Controller {
        public function showUsers(Request $request) {
            $data['tab'] = 'users-list';
            $page = 1;
            if (isset($request->page)) {
                $page = $request->page;
            }
            $users = User::all();

            $usersPerPage = 10;
            $data['maxPage'] = count($users)/$usersPerPage + 1;

            $data['users'] = array();
            for ($i = ($page-1)*$usersPerPage; $i < $page*$usersPerPage; $i++) {
                if (empty($users[$i])) {
                    break;
                }
                $data['users'][] = $users[$i];
            }
            $data['page'] = $page;

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function editUser(Request $request) {
            $tab = 'add-user';
            $id = $request->id;
            $user = User::where('id', $id)->first();
            if (!empty($user)) {
                $fullname = $user->fullname;
                $username= $user->username;
                $email = $user->email;
                $pass = $user->pass;
                $gender = $user->gender;

            }
            else {
                return "User is not exist";
            }
            
            if ($request->isMethod('post')) {
                $fullname = $request->fullname;
                $username= $request->username;
                $email = $request->email;
                $pass = $request->pass;
                //$gender = $request->gender;

                $valid = True;
                if (empty($fullname)) {
                    $valid = False;
                    $fullnameError = "Fullname is empty";
                }

                if (empty($username)) {
                    $valid = False;
                    $usernameError = "Username is empty";
                }

                if (empty($email)) {
                    $valid = False;
                    $emailError = "Email is empty";
                }
                
                if (empty($pass)) {
                    $valid = False;
                    $passError = "Password is empty";
                }
                
                if ($valid) {
                    $user->fullname = $fullname;
                    $user->username= $username;
                    $user->email = $email;
                    $user->pass = $pass;
                    $user->gender = $gender;

                    $user->save();
                }
            }

            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;
        }


        public function login(Request $request) {
            if ($request->session()->has('user')) {
                return redirect('/admin');
            }

            if ($request->isMethod('post')) {
                $username = $request->input('username');
                $pass = $request->input('pass');
                $user = User::getUser($request, $username, $pass);
                
                if (!empty($user)) {
                    $request->session()->put('user', $user);
                    return redirect('/store');
                }
                else {
                    $data['error'] = $request->session()->get('loginError');
                    $data['user'] = $user;
                    $data['pass'] = $pass;
                }             
            }
            else {
                $data = array();
            }
            
            $view = View::make('user.login', $data);
            return $view;
        }

        public function logout(Request $request) {
            $request->session()->forget('user');
            return redirect('/user');
        }

        public function signUp(Request $request) {
            $valid = False;

            if ($request->isMethod('post')) {
            	$valid = True;
            	if (empty($request->fullname)) {
            		$fullnameError = "Full name is required";
            		$valid = False;
            	}
            	else {
            		$fullname = $this->reForm($request->fullname);
            		if (!preg_match("/^[a-zA-Z\s]*$/", $fullname)) {
            			$fullnameError = "Only letter";
            			$valid = False;
            		}
            	}
            	if (empty($request->username)) {
            		$usernameError = "User name is required";
            		$valid = False;
            	}
            	else {
            		$username = $this->reForm($request->username);
            		if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            			$usernameError = "Only letter and number";
            			$valid = False;
                    }
                    else if (User::where('username', $username)->count() > 0) {
                        $usernameError = "Username has already existed";
                        $valid = False;
                    }
            	}
            	if (empty($request->email)) {
            		$emailError = "Email is required";
            		$valid = False;
            	}
            	else {
            		$email = $this->reForm($request->email);
            		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            		 	$emailError = "Invalid email format"; 
            		 	$valid = False;
                     }
                     else if (User::where('email', $email)->count() > 0) {
                        $emailError = "This email has already used";
                        $valid = False;
                    }
            	}
            	if (empty($request->pass)) {
            		$passError = "Password is required";
            		$valid = False;
            	}
            	else {
            		$pass = $this->reForm($request->pass);
            		if (empty($request->rePass) || $request->rePass != $pass) {
            			$rePassError = "Password not match";
            			$valid = False;
            		}
            	}
            	if (isset($request->gender)) {
            		$gender = $request->gender;
            	}       		
            	
            	if ($valid) { 
                    $user = new User();
                    $user->fullname = $fullname;
                    $user->username = $username;
                    $user->email = $email;
                    $user->pass = $pass;
                    $user->gender = $gender;
                    $user->save();

                    return redirect('/user/login');
            	}
            }



            $data = get_defined_vars();

            $view = View::make('user/signup', $data);
            return $view;
        }

        function reForm($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function showUser(Request $request) {
            $user = null;
            if ($request->session()->has('user')) {
                $user = $request->session()->get('user');
            }

            $view = View::make('store.user-detail', ['user' => $user]);
            return $view;
        }
    }