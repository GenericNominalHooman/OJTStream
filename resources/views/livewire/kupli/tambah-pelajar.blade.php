@php
    use Illuminate\Support\Facades\Storage;
    use Carbon\Carbon;
@endphp
{{-- PELAJAR SECTION BEGIN --}}
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ asset('assets') }}/img/bruce-mars.jpg" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->name }}
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        User ROles | OJT STATUS(OJT BEGIN DATE - OJT END DATE)
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 {{ $activeTab == 'biodata' ? 'active' : '' }}"
                                href="javascript:;" role="tab" wire:click="switchTab('biodata')"
                                aria-selected="{{ $activeTab == 'biodata' ? 'true' : 'false' }}">
                                <i class="fas fa-user"></i>
                                <span class="ms-1">Biodata</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 {{ $activeTab == 'ojt' ? 'active' : '' }}"
                                href="javascript:;" role="tab" wire:click="switchTab('ojt')"
                                aria-selected="{{ $activeTab == 'ojt' ? 'true' : 'false' }}">
                                <i class="fas fa-suitcase"></i>
                                <span class="ms-1">OJT</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 {{ $activeTab == 'organisasi' ? 'active' : '' }}"
                                href="javascript:;" role="tab" wire:click="switchTab('organisasi')"
                                aria-selected="{{ $activeTab == 'organisasi' ? 'true' : 'false' }}">
                                <i class="fas fa-users"></i>
                                <span class="ms-1">Organisasi</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card card-plain h-100 {{ $activeTab == 'biodata' ? 'd-block' : 'd-none' }}">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Maklumat Biodata</h6>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                @if (session('status'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('status') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                @if (Session::has('demo'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('demo') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <form wire:submit.prevent='update'>
                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Email</label>
                            <input wire:model.lazy="user.email" type="email" class="form-control border border-2 p-2">
                            @error('user.email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama</label>
                            <input wire:model.lazy="user.name" type="text" class="form-control border border-2 p-2">
                            @error('user.name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nombor Matrik</label>
                            <input wire:model.lazy="pelajar.matrix_number" type="text"
                                class="form-control border border-2 p-2">
                            @error('user.email_verified_at')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Semester</label>
                            <input wire:model.lazy="pelajar.semester" type="text"
                                class="form-control border border-2 p-2">
                            @error('user.email_verified_at')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kohort</label>
                            <input wire:model.lazy="pelajar.cohort" type="date"
                                class="form-control border border-2 p-2">
                            @error('user.email_verified_at')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nombor Telefon</label>
                            <input wire:model.lazy="user.phone" type="text" class="form-control border border-2 p-2">
                            @error('user.email_verified_at')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nombor Kad Pengenalan</label>
                            <input wire:model.lazy="pelajar.nric_number" type="text"
                                class="form-control border border-2 p-2">
                            @error('pelajar.nric_number')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Penjaga</label>
                            <input wire:model.lazy="pelajar.guardian" type="text"
                                class="form-control border border-2 p-2">
                            @error('pelajar.guardian')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nombor Telefon Penjaga</label>
                            <input wire:model.lazy="pelajar.guardian_telephone_number" type="text"
                                class="form-control border border-2 p-2">
                            @error('pelajar.guardian_telephone_number')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">LinkedIn URL</label>
                            <input wire:model.lazy="pelajar.linkedin_url" type="url"
                                class="form-control border border-2 p-2">
                            @error('pelajar.linkedin_url')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Facebook URL</label>
                            <input wire:model.lazy="pelajar.facebook_url" type="url"
                                class="form-control border border-2 p-2">
                            @error('pelajar.facebook_url')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Github URL</label>
                            <input wire:model.lazy="pelajar.github_url" type="url"
                                class="form-control border border-2 p-2">
                            @error('pelajar.github_url')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Program</label>
                            <input wire:model.lazy="pelajar.program" type="text"
                                class="form-control border border-2 p-2">
                            @error('pelajar.program')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Jantina</label>
                            <div>
                                <input wire:model='user.gender' type="radio" name="gender_male" id="gender_male"
                                    value="male" class="form-check-input">
                                <label for="gender_male" class="form-check-label">Male</label>
                            </div>
                            <div>
                                <input wire:model='user.gender' type="radio" name="gender_female" id="gender_female"
                                    value="female" class="form-check-input">
                                <label for="gender_female" class="form-check-label">Female</label>
                            </div>
                            @error('user.gender')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">

                            <label for="floatingTextarea2">Alamat Kediaman</label>
                            <textarea wire:model.lazy="user.location" class="form-control border border-2 p-2"
                                placeholder=" Sila masukkan alamat kediaman anda" id="floatingTextarea2" rows="4"
                                cols="50"></textarea>
                            @error('user.location')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Penyakit Kronik</label>
                            <div>
                                <input type="checkbox" wire:model="pelajar.heart_disease" value="1" id="heartDisease">
                                <label for="heartDisease">Heart Disease</label>
                            </div>
                            <div>
                                <input type="checkbox" wire:model="pelajar.asthma" value="1" id="asthma">
                                <label for="asthma">Asthma</label>
                            </div>
                            <div>
                                <input type="checkbox" wire:model="pelajar.diabetes" value="1" id="diabetes">
                                <label for="diabetes">Diabetes</label>
                            </div>
                            <div>
                                <input type="checkbox" wire:model="pelajar.osteoporosis" value="1" id="osteoporosis">
                                <label for="osteoporosis">Osteoporosis</label>
                            </div>
                            <div>
                                <input type="checkbox" wire:model="pelajar.slipped_disc" value="1" id="slippedDisc">
                                <label for="slippedDisc">Slipped Disc</label>
                            </div>
                            @error('pelajar.penyakit_kronik')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                </form>

            </div>
        </div>
        <div class="card card-plain h-100 {{ $activeTab == 'ojt' ? 'd-block' : 'd-none' }}">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Maklumat OJT</h6>
                    </div>
                </div>
            </div>
            {{-- LAWATAN PPO SECTION BEGIN --}}
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">LAWATAN OJT</h6>
                    </div>
                </div>
                @if (session('status'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('status') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                @if (Session::has('demo'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('demo') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <form wire:submit.prevent='update'>

                    {{-- PENSYARAH PENILAI OJT SECTION ENDS --}}

                    <div class="row">
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Lawatan OJT 1</label>
                            <input disabled value="{{$janji_temu_1->visit_at}}" type="datetime" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Lawatan OJT 2</label>
                            <input disabled value="{{$janji_temu_2->visit_at}}" type="datetime" class="form-control border border-2 p-2">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Maklumat Pensyarah Penilai</h6>
                            </div>
                        </div>

                        {{-- ADD TARIKH LAWATAN1/2 --}}

                        {{-- PENSYARAH PENILAI OJT SECTION ENDS --}}
                        {{-- PENSYARAH PENILAI SECTION BEGIN --}}
        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Pensyarah Penilai(PP)</label>
                            <input disabled value="{{$pensyarah_penilai_ojt->name}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nombor Telefon Pensyarah Penilai(PP)</label>
                            <input disabled value="{{$pensyarah_penilai->phone}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Emel Pensyarah Penilai(PP)</label>
                            <input disabled value="{{$pensyarah_penilai->email}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        {{-- PENSYARAH PENILAI SECTION ENDS --}}
                        {{-- PENYELARAS PROGRAM SECTION BEGIN --}}

                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Maklumat Penyelaras Program</h6>
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Penyelaras Program</label>
                            <input disabled value="{{$penyelaras_program_user->name}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nombor Telefon Penyelaras Program</label>
                            <input disabled value="{{$penyelaras_program_user->phone}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Emel Penyelaras Program</label>
                            <input disabled value="{{$penyelaras_program_user->email}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        {{-- PENYELARAS PROGRAM SECTION ENDS --}}
                    </div>
                </form>
            </div>
            {{-- LAWATAN PPO SECTION END --}}
            
            {{-- PPO SECTION BEGIN --}}
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Maklumat Pensyarah Penilai OJT</h6>
                    </div>
                </div>
                @if (session('status'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('status') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                @if (Session::has('demo'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('demo') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <form wire:submit.prevent='update'>

                    {{-- PENSYARAH PENILAI OJT SECTION ENDS --}}

                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Pensyarah Penilai OJT(PPO)</label>
                            <input disabled value="{{$pensyarah_penilai_ojt->name}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nombor Telefon Pensyarah Penilai OJT(PPO)</label>
                            <input disabled value="{{$pensyarah_penilai_ojt->phone}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Emel Pensyarah Penilai OJT(PPO)</label>
                            <input disabled value="{{$pensyarah_penilai_ojt->email}}" type="text" class="form-control border border-2 p-2">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Maklumat Pensyarah Penilai</h6>
                            </div>
                        </div>

                        {{-- ADD TARIKH LAWATAN1/2 --}}

                        {{-- PENSYARAH PENILAI OJT SECTION ENDS --}}
                        {{-- PENSYARAH PENILAI SECTION BEGIN --}}
        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Pensyarah Penilai(PP)</label>
                            <input disabled value="{{$pensyarah_penilai->name}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nombor Telefon Pensyarah Penilai(PP)</label>
                            <input disabled value="{{$pensyarah_penilai->phone}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Emel Pensyarah Penilai(PP)</label>
                            <input disabled value="{{$pensyarah_penilai->email}}" type="text" class="form-control border border-2 p-2">
                        </div>

                        {{-- PENSYARAH PENILAI SECTION ENDS --}}
                    </div>
                </form>
            </div>
            {{-- PPO SECTION ENDS --}}
        </div>
        <div class="card card-plain h-100 {{ $activeTab == 'organisasi' ? 'd-block' : 'd-none' }}">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Maklumat Organisasi</h6>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                @if (session('status'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('status') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                @if (Session::has('demo'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('demo') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <form wire:submit.prevent='update'>

                    {{-- ORGANISASI LATIHAN BEGIN --}}
                    
                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Organisasi Latihan</label>
                            <input wire:model.lazy="company.comp_name" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nombor Telefon</label>
                            <input wire:model.lazy="company.comp_contact" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_contact')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Penyelia Organisasi</label>
                            <input wire:model.lazy="company.ojt_supervisor" type="text" class="form-control border border-2 p-2">
                            @error('company.ojt_supervisor')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Emel</label>
                            <input wire:model.lazy="company.comp_email" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Jawatan Diperoleh</label>
                            <input wire:model.lazy="pelajars_company.role" type="text" class="form-control border border-2 p-2">
                            @error('pelajars_company.role')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Alamat Syarikat</h6>
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Syarikat: Negeri</label>
                            <input wire:model.lazy="company.comp_address_province" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_address_province')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Syarikat: Jalan</label>
                            <input wire:model.lazy="company.comp_address_street" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_address_street')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Syarikat: Bandar</label>
                            <input wire:model.lazy="company.comp_address_city" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_address_city')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">

                            <label for="skop_kerja_input">Skop Kerja</label>
                            <input wire:model="skop_kerja_input" type="file" class="form-control" id="skop_kerja_input">
                            @error('skop_kerja_input')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            @if (Storage::disk("local")->exists($this->skop_kerja->document_path))
                                <p class="text text-success">Skop Kerja Telah Dimuat Naik({{Carbon::parse($this->skop_kerja->updated_at)->format("d/m/Y - h:i")}})</p>
                            @else
                                <p class="text text-danger">Skop Kerja Belum Dimuat Naik</p>
                            @endif
                            <button type="button" class="btn btn-success" wire:click='downloadSkopKerja()' @if (!(Storage::disk("local")->exists($this->skop_kerja->document_path))) disabled @endif>Muat Turun Skop Kerja</button>
                        </div>
                    </div>

                    {{-- ORGANISASI LATIHAN ENDS --}}

                    <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- PELAJAR SECTION ENDS --}}