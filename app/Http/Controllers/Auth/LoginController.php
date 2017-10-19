<?php

namespace app\Http\Controllers\Auth;
use Auth;
use App\User;
use App\Usuarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use  \App\Traits\AuthenticateOpenLdap, AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/incorporar';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Crea la autenticación y extración de roles del ldap.
     *
     * @return void
     */

    public function username()
    {
        return 'username';
    }

    public function login(Request $request){

        $login = $this->loginOpenLdap($request);

        if ($login->status() === 200) {
            $data = json_decode($login->content());
            return redirect()->to('/incorporar');
        }else if($login->status() === 401){
            $error = json_decode($login->content());
            return view('auth.login', ['error' => $error->error]);
        }else if($login->status() === 503){
            $error = json_decode($login->content());
            return view('auth.login', ['error' => $error->error]);
        }
    }
}
?>
