<?php

namespace App\Http\Livewire\Auth;

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
            default:
                return view('livewire.auth.login_dashboard');;
        }
    }

    public function mount(Request $request)
    {
        // Sets login type based on login page accessed
        $this->login_type = $request->login_type;

        // Autofill login credentials for debugging
        $this->fill(["no_matrik" => "AKV0222KA009", "password" => "password", "email" => "admin@mail.com"]);
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
                $status = $this->pelajarLogin();;
            break;
            case "kupli":
            case "pensyarah":
                // Validate user input
                $this->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                // Authenthicate pensyarah
                $status = $this->pensyarahLogin();
            break;
            default:
                // Invalid user login type
                return view('livewire.auth.login')->with(["status" => "Jenis pengguna tidak wujud"]);
        }

        // Regenerate session to avoid persisitent session attack
        session()->regenerate();

        // Redirect to dashboard or to the latest page with an error message
        if(empty($status)){
            return redirect('/dashboard');
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

}
