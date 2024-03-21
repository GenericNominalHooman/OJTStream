<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\Pelajar;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $no_matrik = '';
    public $login_type = '';
    public $username_input = '';

    // 
    // COMPONENT FUCNTIONS
    // 
    public function render()
    {
        // Display login page based on user type
        switch ($this->login_type) {
            case "pelajar":
                return view('livewire.auth.login_pelajar');;
            case "kupli":
                return view('livewire.auth.login_kupli');;
            case "pensyarah":
                return view('livewire.auth.login_pensyarah');;
            case "streamlined":
                return view('livewire.auth.login_streamlined');;
            default:
                return view('livewire.auth.login_dashboard');;
        }
    }

    public function mount(Request $request)
    {
        // Sets login type based on login page accessed
        $this->login_type = $request->login_type;

        // Autofill login credentials for debugging
        switch ($this->login_type) {
            case "pelajar":
                $this->fill(["no_matrik" => "AKV0222KA009", "password" => "password"]);
            case "kupli":
                $this->fill(["email" => "kupli_1@email.com", "password" => "password"]);
            case "streamlined":
                $this->fill(["username_input" => "", "password" => "password"]);
            case "pensyarah":
            default:
        }
    }

    public function store()
    {
        $status = ''; // Error handler for incorrect login credentials

        // Get user type
        switch ($this->login_type) {
                // Authenthicate based on user type
            case "pelajar":
                // Validate user input
                $this->validate([
                    'no_matrik' => 'required|min:12|max:12',
                    'password' => 'required',
                ]);

                // Authenthicate pelajar
                $status = $this->pelajarLogin();
            break;
            case "streamlined":
                // Validate user input
                $this->validate([
                    'username_input' => 'required',
                    'password' => 'required',
                ]);

                // Authenthicate user                
                $status = $this->streamlinedLogin();
            break;
            case "kupli":
            case "pensyarah":
                // Validate user input
                $this->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);
            break;
            default:
                // Invalid user login type
                return view('livewire.auth.login')->with(["status" => "Jenis pengguna tidak wujud"]);
        }

        // Regenerate session to avoid persisitent session attack
        session()->regenerate();

        // Redirect to dashboard or to the latest page with an error message
        if(empty($status)){
            switch($this->login_type){
                case "kupli":
                    return redirect()->route('kupli dashboard');
                break;
                case "pelajar":
                    return redirect()->route('pelajar dashboard');
                break;
                case "ketua jabatan dan ketua program":
                    return redirect()->route('kjkp dashboard');
                break;
                default:
                    // Invalid user login type
                    return view('livewire.auth.login')->with(["status" => "Jenis pengguna tidak wujud"]);
                break;
            }
        }else{
            return back()->with(["status" => $status]);
        }
    }

    // 
    // Login functions
    // 
    public function pelajarLogin()
    {
        // Joins user row & student row where students.user_id == users.id and no_matrik matched based on the user input
        $student = Pelajar::join('users', 'pelajars.user_id', '=', 'users.id')
            ->where('pelajars.matrix_number', $this->no_matrik)
            ->first();

        // Check student password
        if ($student) {
            if (Hash::check($this->password, $student->password)) {
                // Loging in the user
                auth()->loginUsingId($student->user_id);
            } else {
                return 'Kata kunci yang dimasukkan adalah salah';
            }
        } else {
            return 'Nombor matrik yang dimasukkan tidak wujud';
        }
    }

    public function pensyarahLogin()
    {
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (!auth()->attempt($credentials)) {
            return 'Email atau kata laluan yang dimasukkan adalah salah';
        }
    }

    public function streamlinedLogin(){
        $credentials = ['username' => $this->username_input, 'password' => $this->password];
        $status = $this->getLoginTypeFromStreamlined();

        if($status == null){
            // VALID USER
            if (!auth()->attempt($credentials)) {
                return $status = 'Username atau kata laluan yang dimasukkan adalah salah';
            }
        }
        return $status;
    }

    // 
    // MISC FUNCTIONS
    // 
    public function getLoginTypeFromStreamlined(){
        // CHECK WHETHER USERNAME RECORDS EXIST IN EACH USER TYPE TABLES
        if($login_user = User::where("username", $this->username_input)->first()){
            if($login_user->Kupli != null){
                $this->login_type = "kupli";
            }elseif($login_user->Pelajar != null){
                $this->login_type = "pelajar";
            }elseif($login_user->KetuaJabatanDanKetuaProgram != null){
                $this->login_type = "ketua jabatan dan ketua program";
            }else{
                $this->login_type = "invalid";
            }
        }else{
            return 'Username yang dimasukkan tidak wujud';
        }
    }
}
