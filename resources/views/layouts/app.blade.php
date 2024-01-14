<x-layouts.base>
    @if (in_array(request()->route()->getName(),['static-sign-in', 'static-sign-up', 'register', 'login','password.forgot','reset-password']))
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <x-navbars.navs.guest></x-navbars.navs.guest>
                </div>
            </div>
        </div>
        @if (in_array(request()->route()->getName(),['static-sign-in', 'login','password.forgot','reset-password']))
        <main class="main-content  mt-0">
            <div class="page-header page-header-bg align-items-start min-vh-100">
                    <span class="mask bg-gradient-dark opacity-6"></span>
            {{ $slot }}
            <x-footers.guest></x-footers.guest>
             </div>
        </main>
        @else
        {{ $slot }}
        @endif

    @elseif (in_array(request()->route()->getName(),['rtl']))
    {{ $slot }}
    @elseif (in_array(request()->route()->getName(),['virtual-reality']))
    <div class="virtual-reality">
        <x-navbars.navs.auth></x-navbars.navs.auth>
        <div class="border-radius-xl mx-2 mx-md-3 position-relative"
            style="background-image: url('{{ asset('assets') }}/img/vr-bg.jpg'); background-size: cover;">
            <x-navbars.sidebars.sidebar></x-navbars.sidebars.sidebar>
            <main class="main-content border-radius-lg h-100">
                {{  $slot }}
        </div>
        <x-footers.auth></x-footers.auth>
        </main>
        <x-plugins></x-plugins>
    </div>
    @else
    
    {{-- SIDEBAR BEGIN --}}
        {{-- PELAJAR SIDEBAR BEGIN --}}
            @if (in_array("Pelajar", auth()->user()->getRoles()))
                <x-navbars.sidebars.sidebar_pelajar></x-navbars.sidebars.sidebar_pelajar>
            @endif
        {{-- PELAJAR SIDEBAR ENDS --}}
        
        {{-- PENSYARAH PENILAI OJT SIDEBAR BEGIN --}}
            @if (in_array("Pensyarah Penilai OJT", auth()->user()->getRoles()))
                <x-navbars.sidebars.sidebar_pensyarah_penilai_ojt></x-navbars.sidebars.sidebar_pensyarah_penilai_ojt>
            @endif
        {{-- PENSYARAH PENILAI OJT SIDEBAR ENDS --}}
        
        {{-- PENSYARAH PENILAI SIDEBAR BEGIN --}}
            @if (in_array("Pensyarah Penilai", auth()->user()->getRoles()))
                <x-navbars.sidebars.sidebar_pensyarah_penilai></x-navbars.sidebars.sidebar_pensyarah_penilai>
            @endif
        {{-- PENSYARAH PENILAI SIDEBAR ENDS --}}
        
        {{-- PENYELARAS PROGRAM SIDEBAR BEGIN --}}
            @if (in_array("Penyelaras Program", auth()->user()->getRoles()))
                <x-navbars.sidebars.sidebar_penyelaras_program></x-navbars.sidebars.sidebar_penyelaras_program>
            @endif
        {{-- PENYELARAS PROGRAM SIDEBAR ENDS --}}

        {{-- KUPLI SIDEBAR BEGIN --}}
            @if (in_array("Kupli", auth()->user()->getRoles()))
                <x-navbars.sidebars.sidebar_kupli></x-navbars.sidebars.sidebar_kupli>
            @endif
        {{-- KUPLI SIDEBAR ENDS --}}
    {{-- SIDEBAR ENDS --}}

    <x-navbars.sidebars.sidebar></x-navbars.sidebars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth></x-navbars.navs.auth>

        {{ $slot }}

        <x-footers.auth></x-footers.auth>
    </main>
    <x-plugins></x-plugins>
    @endif
</x-layouts.base>