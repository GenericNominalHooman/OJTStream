@auth
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('assets') }}/img/ojthub/logo_cropped.png" class="navbar-brand-img h-100 d-block" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white p-0 m-0">{{auth()->user()->name}}</span>
            <span class="ml-2 font-weight-light text-white p-0 m-0">
                <p class="d-inline"></p>
                <ul class="m-0">
                    @foreach (auth()->user()->getRoles() as $role)
                        @if ($role == "Kupli")
                            <li>Pensyarah</li>
                        @else
                            <li>{{$role}}</li>
                        @endif
                    @endforeach
                </ul>
            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            {{-- KUPLI/PENSYARAH SIDEBAR BEGIN --}}
            @if (auth()->user()->isKupli())
            <section>
                {{-- <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'notifications' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('notifications') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">notifications</i>
                        </div>
                        <span class="nav-link-text ms-1">Notifikasi</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli penguguman' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli penguguman') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <span class="nav-link-text ms-1">Penguguman</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli dashboard' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li> --}}
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Profil</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli profil' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli profil') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil Pengguna</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Pelajar
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli senarai pelajar' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli senarai pelajar') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Pelajar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli tambah pelajar' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli tambah pelajar') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tambah Pelajar</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan OJT
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli pengurusan dokumen' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli pengurusan dokumen') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-folder"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengurusan Dokumen OJT</span>
                    </a>
                </li>
            </section>
            @endif
            {{-- KUPLI/PENSYARAH SIDEBAR END --}}

            {{-- KPKJ BEGIN --}}
            @if (auth()->user()->isKetuaJabatanDanKetuaProgram())
            <section>
                {{-- <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'notifications' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('notifications') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">notifications</i>
                        </div>
                        <span class="nav-link-text ms-1">Notifikasi</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli penguguman' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli penguguman') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <span class="nav-link-text ms-1">Penguguman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kpkj dashboard' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kpkj dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Profil</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kpkj profil' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kpkj profil') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil Pengguna</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Pelajar
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli senarai pelajar' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli senarai pelajar') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Permintaan Organisasi Latihan</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan Organisasi Latihan
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli pengurusan dokumen' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli pengurusan dokumen') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Organisasi Latihan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'kupli pengurusan dokumen' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('kupli pengurusan dokumen') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-folder"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tambah Organisasi Latihan</span>
                    </a>
                </li>
            </section>
            @endif
            {{-- KPKJ END --}}

            {{-- PENYELARAS PROGRAM SIDEBAR BEGIN --}}
            @if (auth()->user()->isPenyelarasProgram())
            <section>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Pelajar
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Pelajar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="nav-link-text ms-1">Lantik Pelajar</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Pensyarah</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Pensyarah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="nav-link-text ms-1">Lantik Pensyarah</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Pensyarah Penilai OJT</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Pensyarah Penilai OJT</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="nav-link-text ms-1">Lantik Pensyarah Penilai OJT</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Pensyarah Penilai</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Pensyarah Penilai</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="nav-link-text ms-1">Lantik Pensyarah Penilai</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Janji Temu
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Janji Temu</span>
                    </a>
                </li>
            </section>
            @endif
            {{-- PENYELARAS PROGRAM SIDEBAR END --}}

            {{-- PENSYARAH PENILAI OJT SIDEBAR BEGIN --}}
            {{-- @if (auth()->user()->isPensyarahPenilaiOJT())
            <section>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Pelajar
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Pelajar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="nav-link-text ms-1">Lantik Pelajar</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Janji Temu
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Janji Temu</span>
                    </a>
                </li>
            </section>
            @endif --}}
            {{-- PENSYARAH PENILAI OJT SIDEBAR END --}}

            {{-- PENSYARAH PENILAI SIDEBAR BEGIN --}}
            @if (auth()->user()->isPensyarahPenilai())
            <section>
                {{-- Prevent displaying pengurusan pelajar twice if user is also a PPO --}}
                @if(!auth()->user()->isPensyarahPenilaiOJT())
                {{-- <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan
                        Pelajar
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Senarai Pelajar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('tables') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="nav-link-text ms-1">Lantik Pelajar</span>
                    </a>
                </li> --}}
                @endif
            </section>
            @endif
            {{-- PENSYARAH PENILAI SIDEBAR END --}}

            {{-- Pelajar SIDEBAR BEGIN --}}
            @if (auth()->user()->isPelajar())
            <section>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'pelajar notifikasi' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('pelajar notifikasi') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <span class="nav-link-text ms-1">Penguguman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'pelajar dashboard' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('pelajar dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Profil</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'user-profile' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('user-profile') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil Pengguna</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengurusan OJT
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'pelajar pengurusan dokumen' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('pelajar pengurusan dokumen') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-folder"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengurusan Dokumen OJT</span>
                    </a>
                </li>

            </section>
            @endif
            {{-- Pelajar SIDEBAR ENDS --}}
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a href="javascript:;"
                class="nav-link text-body font-weight-bold px-0 btn bg-gradient-primary w-100 text-white">
                <span class="m-2"><i class="fas fa-door-open"></i></span>
                <livewire:auth.logout />
            </a>
        </div>
    </div>
</aside>
@endauth