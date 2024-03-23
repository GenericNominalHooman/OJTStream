@php
    use Illuminate\Support\Facades\Storage;
    use Carbon\Carbon;
@endphp
{{-- KPKJ SECTION BEGIN --}}
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
                        {{ $kpkj_user->name }}
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        <ul class="m-0 p-0">
                            @foreach ($kpkj_user->getRoles() as $user_role)
                                <li>{{$user_role}}</li>
                            @endforeach
                        </ul>
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
                            <a class="nav-link mb-0 px-0 py-1 {{ $activeTab == 'password' ? 'active' : '' }}"
                                href="javascript:;" role="tab" wire:click="switchTab('password')"
                                aria-selected="{{ $activeTab == 'password' ? 'true' : 'false' }}">
                                <i class="fas fa-key"></i>
                                <span class="ms-1">Ubah Kata Laluan</span>
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
                        <h6 class="mb-3">Maklumat KPKJ</h6>
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
                <form wire:submit.prevent='update'>
                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama</label>
                            <input wire:model.lazy="kpkj_user.name" type="text" class="form-control border border-2 p-2">
                            @error('kpkj_user.name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Email</label>
                            <input wire:model.lazy="kpkj_user.email" type="hidden" class="hidden">
                            <input wire:model.lazy="kpkj_user.email" type="email" class="form-control border border-2 p-2">
                            @error('kpkj_user.email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nombor Telefon</label>
                            <input wire:model.lazy="kpkj_user.phone" type="text" class="form-control border border-2 p-2">
                            @error('kpkj_user.phone')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Jantina</label>
                            <div>
                                <input wire:model='kpkj_user.gender' type="radio" name="gender_male" id="gender_male"
                                    value="male" class="form-check-input">
                                <label for="gender_male" class="form-check-label">Lelaki</label>
                            </div>
                            <div>
                                <input wire:model='kpkj_user.gender' type="radio" name="gender_female" id="gender_female"
                                    value="female" class="form-check-input">
                                <label for="gender_female" class="form-check-label">Perempuan</label>
                            </div>
                            @error('kpkj_user.gender')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">

                            <label for="floatingTextarea2">Alamat Kediaman</label>
                            <textarea wire:model.lazy="kpkj_user.location" class="form-control border border-2 p-2"
                                placeholder=" Sila masukkan alamat kediaman anda" id="floatingTextarea2" rows="4"
                                cols="50"></textarea>
                            @error('kpkj_user.location')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                </form>

            </div>
        </div>
        <div class="card card-plain h-100 {{ $activeTab == 'password' ? 'd-block' : 'd-none' }}">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Kata laluan</h6>
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
                <form wire:submit.prevent='updatePassword'>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kata laluan Lama</label>
                            <input wire:model="old_password" type="password" class="form-control border border-2 p-2">
                            @error('old_password')
                            <p class='text-danger inputerror'>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kata laluan Baharu</label>
                            <input wire:model.lazy="new_password" type="password" class="form-control border border-2 p-2">
                            @error('new_password')
                            <p class='text-danger inputerror'>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kata laluan Baharu</label>
                            <input wire:model.lazy="new_password_confirmation" type="password" class="form-control border border-2 p-2">
                            @error('new_password_confirmation')
                            <p class='text-danger inputerror'>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- KPKJ SECTION ENDS --}}