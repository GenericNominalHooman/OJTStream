{{-- PELAJAR SECTION BEGIN --}}
@if (in_array("Pelajar", auth()->user()->getRoles()))
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
                                   href="javascript:;"
                                   role="tab"
                                   wire:click="switchTab('biodata')"
                                   aria-selected="{{ $activeTab == 'biodata' ? 'true' : 'false' }}">
                                    <i class="fas fa-user"></i>
                                    <span class="ms-1">Biodata</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 {{ $activeTab == 'ojt' ? 'active' : '' }}"
                                   href="javascript:;"
                                   role="tab"
                                   wire:click="switchTab('ojt')"
                                   aria-selected="{{ $activeTab == 'ojt' ? 'true' : 'false' }}">
                                    <i class="fas fa-suitcase"></i>
                                    <span class="ms-1">OJT</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 {{ $activeTab == 'organisasi' ? 'active' : '' }}"
                                   href="javascript:;"
                                   role="tab"
                                   wire:click="switchTab('organisasi')"
                                   aria-selected="{{ $activeTab == 'organisasi' ? 'true' : 'false' }}">
                                    <i class="fas fa-users"></i>
                                    <span class="ms-1">Organisasi</span>
                                </a>
                            </li>                        </ul>
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
                                <label class="form-label">Nombor Telefon</label>
                                <input wire:model.lazy="user.phone" type="text" class="form-control border border-2 p-2">
                                @error('user.email_verified_at')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nombor Kad Pengenalan</label>
                                <input wire:model.lazy="pelajar.nric_number" type="text" class="form-control border border-2 p-2">
                                @error('pelajar.nric_number')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nama Penjaga</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nombot Telefon Penjaga</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Sosial Media</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Program</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Jantina</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Kohort</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">

                                <label for="floatingTextarea2">Alamat Kediaman</label>
                                <textarea wire:model.lazy="user.about" class="form-control border border-2 p-2"
                                    placeholder=" Sila masukkan alamat kediaman anda" id="floatingTextarea2" rows="4"
                                    cols="50"></textarea>
                                @error('user.about')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">

                                <label for="floatingTextarea2">Penyakit Kronik</label>
                                <textarea wire:model.lazy="user.about" class="form-control border border-2 p-2"
                                    placeholder=" Sila masukkan alamat kediaman anda" id="floatingTextarea2" rows="4"
                                    cols="50"></textarea>
                                @error('user.about')
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

                                <label class="form-label">Nama Pensyarah Penilai OJT(PPO)</label>
                                <input wire:model.lazy="user.email" type="email" class="form-control border border-2 p-2">
                                @error('user.email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nombor Telefon Pensyarah Penilai OJT(PPO)</label>
                                <input wire:model.lazy="user.phone" type="text" class="form-control border border-2 p-2">
                                @error('user.phone')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Alamat Emel Pensyarah Penilai OJT(PPO)</label>
                                <input wire:model.lazy="user.phone" type="text" class="form-control border border-2 p-2">
                                @error('user.phone')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nama Pensyarah Penilai(PP)</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nombor Telefon Pensyarah Penilai(PP)</label>
                                <input wire:model.lazy="user.phone" type="text" class="form-control border border-2 p-2">
                                @error('user.phone')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Alamat Emel Pensyarah Penilai(PP)</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nama Penyelaras Program</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nombor Telefon Penyelaras Program</label>
                                <input wire:model.lazy="user.phone" type="text" class="form-control border border-2 p-2">
                                @error('user.phone')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Alamat Emel Penyelaras Program</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">

                                <label for="floatingTextarea2">Tarikh Lawatan PPO</label>
                                <textarea wire:model.lazy="user.about" class="form-control border border-2 p-2"
                                    placeholder=" Sila masukkan alamat kediaman anda" id="floatingTextarea2" rows="4"
                                    cols="50"></textarea>
                                @error('user.about')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                    </form>

                </div>
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
                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nama Organisasi Latihan</label>
                                <input wire:model.lazy="user.email" type="email" class="form-control border border-2 p-2">
                                @error('user.email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nombor Telefon</label>
                                <input wire:model.lazy="user.phone" type="text" class="form-control border border-2 p-2">
                                @error('user.phone')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nama Penyelia Organisasi</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Alamat Emel</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Jawatan Diperoleh</label>
                                <input wire:model.lazy="user.location" type="text" class="form-control border border-2 p-2">
                                @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">

                                <label for="floatingTextarea2">Alamat Organisasi Latihan</label>
                                <textarea wire:model.lazy="user.about" class="form-control border border-2 p-2"
                                    placeholder=" Sila masukkan alamat kediaman anda" id="floatingTextarea2" rows="4"
                                    cols="50"></textarea>
                                @error('user.about')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">

                                <label for="floatingTextarea2">Skop Kerja</label>
                                <textarea wire:model.lazy="user.about" class="form-control border border-2 p-2"
                                    placeholder=" Sila masukkan alamat kediaman anda" id="floatingTextarea2" rows="4"
                                    cols="50"></textarea>
                                @error('user.about')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- PELAJAR SECTION ENDS --}}