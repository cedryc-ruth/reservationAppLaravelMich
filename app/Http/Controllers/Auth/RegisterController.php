<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $languages =  Language::all();
        return view('auth.register', compact('languages'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->login = $request->login;
        $user->name = $request->firstname.' '.$request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->language_id = $request->language_id;

        $user->save();
        
        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('home.index')->with('success', "Account successfully registered.");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required','string','max:60'],
            'lastname' => ['required','string','max:60'],
            'login' => ['required','string','max:30'],
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'language_id' => ['required']
        ], [
            'firstname.required' => 'Veuillez indiquer votre prénom.',
            'lastname.required' => 'Veuillez indiquer votre nom.',
            'firstname.string' => 'Votre prénom doit être en caractères alphanumériques(a..z)',
            'lastname.string' => 'Votre nom doit être en caractères alphanumériques(a..z) ',
            'firstname.max' => 'Votre prénom doit comporter 60 caractères au maximum',
            'lastname.max' => 'Votre nom doit comporter 60 caractères au maximum',
            'login.required' => 'Un pseudo est requis pour votre login',
            'login.string' => 'Votre pseudo doit être en caractères alphanumériques(a..z)',
            'login.max' => 'Votre pseudo doit comporter 30 caractères au maximum',
            'email.required' => 'Veuillez indiquer votre adresse email',
            'email.string' => 'Votre adresse email doit être en caractères alphanumériques(a..z)',
            'email.email' => 'Veuillez indiquer une adresse email correcte (mail@mail.com par exemple)',
            'email.max' => 'Votre adresse email doit comporter 255 caractères au maximum.',
            'email.unique' => 'Cette adresse est déjà prise!',
            'password.required' => 'Veuillez choisir un mot de passe',
            'password.min' => 'Votre mot de passe doit comporter 8 caractères au minimum',
            'password.confirmed' => 'Vos deux mots de passe ne sont pas identiques'
        ]);
    }
}
