@php
use Illuminate\Support\Carbon;
$penguguman_user = $penguguman->Kupli;
@endphp
<tr>
    <td>
        <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">{{ $iteration }}</h6>
        </div>
    </td>
    <td>
        <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">{{ $penguguman->tajuk }}</h6>
        </div>
    </td>
    <td>
        <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">{{ $penguguman_user->User->name }}</h6>
        </div>
    </td>
    <td class="align-middle text-center">
        <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">{{ Carbon::parse($penguguman->created_at)->format("d/m/Y") }}</h6>
        </div>
    </td>
    <td class="align-middle">
        <a href="{{route('kupli penguguman sunting', [
                        'penguguman' => $penguguman,
                    ])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
            data-original-title="Edit user">
            DKemaskini
        </a>
    </td>
</tr>