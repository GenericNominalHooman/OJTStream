@php
    use Carbon\Carbon;
@endphp
@if ($company != null)
    {{-- PELAJAR SUDAH BERDAFTAR BERSAMA OL --}}
    @if ($company->ojt_begin_date != null && $company->ojt_begin_date != null && $company->ojt_end_date != null)
        @php
            $ojt_begin_date = Carbon::parse($company->ojt_begin_date);
            $ojt_end_date = Carbon::parse($company->ojt_end_date);
            $current_time = Carbon::parse(now());
        @endphp
        @if ($current_time->lt($ojt_begin_date) && $current_time->lt($ojt_end_date))
            {{-- TAMAT BEROJT --}}
            <span class="d-block">Tamat OJT</span>
            <span class="d-block text-nowrap">({{$ojt_begin_date->format("d/m/Y")}} - {{$ojt_end_date->format("d/m/Y")}})</span>
        @elseif ($current_time->gt($ojt_begin_date) && $current_time->lt($ojt_end_date))
            {{-- SEDANG BEROJT --}}
            <span class="d-block">Sedang Ber-OJT</span>
            <span class="d-block text-nowrap">({{$ojt_begin_date->format("d/m/Y")}} - {{$ojt_end_date->format("d/m/Y")}})</span>
        @else
            {{-- BELUM BEROJT --}}
            <span class="d-block">Belum Ber-OJT</span>
            <span class="d-block text-nowrap">({{$ojt_begin_date->format("d/m/Y")}} - {{$ojt_end_date->format("d/m/Y")}})</span>
        @endif
    @endif
@else
    {{-- PELAJAR BELUM BERDAFTAR BERSAMA OL --}}
    <h4 class="mb-0 text text-danger">Tidak Berdaftar Dimana-Mana Tempat OJT</h4>
@endif
