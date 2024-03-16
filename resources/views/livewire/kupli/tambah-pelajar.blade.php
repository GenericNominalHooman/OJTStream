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
                <h4 class="p-4">Tambah rekod pelajar</h4>
            </div>

            {{-- NAV BUTTON BEGIN --}}
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
                            <a class="nav-link mb-0 px-0 py-1 {{ $activeTab == 'dokumen' ? 'active' : '' }}"
                                href="javascript:;" role="tab" wire:click="switchTab('dokumen')"
                                aria-selected="{{ $activeTab == 'dokumen' ? 'true' : 'false' }}">
                                <i class="fas fa-folder"></i>
                                <span class="ms-1">Dokumen</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- NAV BUTTON ENDS --}}
            
        </div>

        {{-- BIODATA PELAJAR SECTION BEGIN --}}
        <div class="card card-plain h-100 {{ $activeTab == 'biodata' ? 'd-block' : 'd-none' }}">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Maklumat Biodata Pelajar</h6>
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
                <form wire:submit.prevent='create'>
                    <div class="row">
                        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Username</label>
                            <input wire:model.lazy="pelajar_user.username" type="text" class="form-control border border-2 p-2">
                            @error('pelajar_user.username')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama</label>
                            <input wire:model.lazy="pelajar_user.name" type="text" class="form-control border border-2 p-2">
                            @error('pelajar_user.name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Email</label>
                            <input wire:model.lazy="pelajar_user.email" type="email" class="form-control border border-2 p-2">
                            @error('pelajar_user.email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nombor Matrik</label>
                            <input wire:model.lazy="pelajar.matrix_number" type="text"
                                class="form-control border border-2 p-2">
                            @error('pelajar.matrix_number')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Semester</label>
                            <div>
                                <input wire:model='pelajar.semester' type="radio" name="semester_1" id="semester_1"
                                    value="1" class="form-check-input">
                                <label for="semester_1" class="form-check-label">Semester 1</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.semester' type="radio" name="semester_2" id="semester_2"
                                    value="2" class="form-check-input">
                                <label for="semester_2" class="form-check-label">Semester 2</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.semester' type="radio" name="semester_3" id="semester_3"
                                    value="3" class="form-check-input">
                                <label for="semester_3" class="form-check-label">Semester 3</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.semester' type="radio" name="semester_4" id="semester_4"
                                    value="4" class="form-check-input">
                                <label for="semester_4" class="form-check-label">Semester 4</label>
                            </div>
                            @error('pelajar.semester')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror

                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kohort</label>
                            <input wire:model.lazy="pelajar.cohort" type="date"
                                class="form-control border border-2 p-2">
                            @error('pelajar.cohort')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nombor Telefon</label>
                            <input wire:model.lazy="pelajar_user.phone" type="text" class="form-control border border-2 p-2">
                            @error('pelajar_user.phone')
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

                            <label class="form-label">Program</label>
                            <div>
                                <input wire:model='pelajar.program' type="radio" name="program_kpd" id="program_kpd"
                                    value="KPD" class="form-check-input">
                                <label for="program_kpd" class="form-check-label">KPD</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.program' type="radio" name="program_ksk" id="program_ksk"
                                    value="KSK" class="form-check-input">
                                <label for="program_ksk" class="form-check-label">KSK</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.program' type="radio" name="program_hbp" id="program_hbp"
                                    value="HBP" class="form-check-input">
                                <label for="program_hbp" class="form-check-label">HBP</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.program' type="radio" name="program_bpp" id="program_bpp"
                                    value="BPP" class="form-check-input">
                                <label for="program_bpp" class="form-check-label">BPP</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.program' type="radio" name="program_mtk" id="program_mtk"
                                    value="MTK" class="form-check-input">
                                <label for="program_mtk" class="form-check-label">MTK</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.program' type="radio" name="program_wtp" id="program_wtp"
                                    value="WTP" class="form-check-input">
                                <label for="program_wtp" class="form-check-label">WTP</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.program' type="radio" name="program_bap" id="program_bap"
                                    value="BAP" class="form-check-input">
                                <label for="program_bap" class="form-check-label">BAP</label>
                            </div>
                            @error('pelajar.program')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror

                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Jantina</label>
                            <div>
                                <input wire:model='pelajar_user.gender' type="radio" name="gender_male" id="gender_male"
                                    value="male" class="form-check-input">
                                <label for="gender_male" class="form-check-label">Male</label>
                            </div>
                            <div>
                                <input wire:model='pelajar_user.gender' type="radio" name="gender_female" id="gender_female"
                                    value="female" class="form-check-input">
                                <label for="gender_female" class="form-check-label">Female</label>
                            </div>
                            @error('pelajar_user.gender')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Jenis pengajian</label>
                            <div>
                                <input wire:model='pelajar.study_type' type="radio" name="study_svm" id="study_svm"
                                    value="SVM" class="form-check-input">
                                <label for="study_svm" class="form-check-label">SVM</label>
                            </div>
                            <div>
                                <input wire:model='pelajar.study_type' type="radio" name="study_dvm" id="study_dvm"
                                    value="DVM" class="form-check-input">
                                <label for="study_dvm" class="form-check-label">DVM</label>
                            </div>
                            @error('pelajar.study_type')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">

                            <label for="floatingTextarea2">Alamat Kediaman</label>
                            <textarea wire:model.lazy="pelajar_user.location" class="form-control border border-2 p-2"
                                placeholder=" Sila masukkan alamat kediaman anda" id="floatingTextarea2" rows="4"
                                cols="50"></textarea>
                            @error('pelajar_user.location')
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
        {{-- BIODATA PELAJAR SECTION ENDS --}}

        {{-- PENGURUSAN DOKUMEN SECTION BEGINS --}}
        <div class="card card-plain h-100 {{ $activeTab == 'dokumen' ? 'd-block' : 'd-none' }}">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Maklumat Dokumen OJT Pelajar</h6>
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
                <p class="text font-weight-normal">Untuk menyunting dokumen OJT pelajar, boleh ke halaman Sunting Templat Dokumen Pelajar</p>

                {{-- ITERATE DOKUMEN OJT PELAJAR BEGIN --}}
                <div class="row">
                    <a href="{{route("kupli pengurusan dokumen")}}" class="btn btn-primary">Sunting Templat Dokumen OJT</a>
                </div>
            </div>

            {{-- PENGURUSAN DOKUMEN SECTION ENDS --}}

        </div>
        {{-- PENGURUSAN DOKUMEN SECTION ENDS --}}

    </div>
</div>
{{-- PELAJAR SECTION ENDS --}}