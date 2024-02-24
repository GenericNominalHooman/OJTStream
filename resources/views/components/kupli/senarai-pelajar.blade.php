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
        <h6 class="mb-0 text-sm">{{ $pelajar->study_type }}</h6>
    </td>
    <td class="align-middle text-center">
        <h6 class="mb-0 text-sm">{{ $pelajar->program }}</h6>
    </td>
    <td class="align-middle text-center">
        @php
        $submitted_at = Carbon::parse($pelajar->created_at);
        @endphp
        <span class="text-secondary text-xs font-weight-bold">{{$submitted_at->format('d/m/Y')}}</span>
    </td>
    <td class="align-middle text-center">
        <a href="{{route("kupli sunting pelajar", ["pelajar"=>$pelajar])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
            Urus
        </a>
    </td>
</tr>