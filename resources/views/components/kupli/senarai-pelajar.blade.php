@php
use Illuminate\Support\Carbon;
$pelajar_user = $pelajar->User;
@endphp
<tr>
    <td class="align-middle text-center">
        {{$iteration}}
    </td>
    <td class="align-middle text-center">
        {{$pelajar_user->name}}
    </td>
    <td class="align-middle text-center">
        <h6 class="mb-0 text-sm">{{ $pelajar->matrix_number }}</h6>
    </td>
    <td class="align-middle text-center">
        <h6 class="mb-0 text-sm">@if($pelajar->nric_number) {{ $pelajar->nric_number }} @else - @endif</h6>
    </td>
    <td class="align-middle text-center">
        <h6 class="mb-0 text-sm">@if($pelajar->program) {{ $pelajar->program }} @else - @endif</h6>
    </td>
    <td class="align-middle text-center">
        <h6 class="mb-0 text-sm">
            @php
                $pelajar_pelajar_company = $pelajar->Pelajars_Company;
            @endphp
            @if ($pelajar_pelajar_company != null)
                @if ($pelajar_pelajar_company->ojt_begin_date != null && $pelajar_pelajar_company->ojt_begin_date != null )
                    @php
                        $ojt_begin_date = Carbon::parse($pelajar_pelajar_company->ojt_begin_date);
                        $ojt_end_date = Carbon::parse($pelajar_pelajar_company->ojt_end_date);
                        $current_time = Carbon::parse(now());
                    @endphp
                    @if ($current_time->lt($ojt_begin_date) && $current_time->lt($ojt_end_date))
                        {{-- TAMAT BEROJT --}}
                        <span class="d-block text-nowrap text-muted">Tamat OJT</span>
                    @elseif ($current_time->gt($ojt_begin_date) && $current_time->lt($ojt_end_date))
                        {{-- SEDANG BEROJT --}}
                        <span class="text-nowrap text-primary">{{$ojt_end_date->diffInDays()}}</span>
                        <span class="text-nowrap text-primary"> Hari Lagi Tamat OJT</span>
                    @else
                        {{-- BELUM BEROJT --}}
                        <span class="text-nowrap">{{$ojt_begin_date->diffInDays()}}</span>
                        <span class="text-nowrap"> Hari Lagi Mula OJT</span>
                    @endif
                @endif
            @else
                <p class="text text-muted">Tarikh OJT Belum Ditentukan</p>
            @endif
        </h6>
    </td>
    <td class="align-middle text-center">
        <a href="{{route("kupli sunting pelajar", ["pelajar"=>$pelajar])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
            Kemaskini
        </a>
    </td>
</tr>