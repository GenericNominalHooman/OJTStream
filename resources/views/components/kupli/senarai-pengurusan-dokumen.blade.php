@php
use Illuminate\Support\Carbon;
@endphp
<tr>
    <td>
        <div class="d-flex px-2 py-1">
            <div>
                <i class="fas fa-file p-2"></i>
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ pathinfo($dokumen->document_name, PATHINFO_FILENAME) }}</h6>
                <p class="text-xs text-secondary mb-0">{{ $dokumen->document_description }}
                </p>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">{{ $dokumen->document_type }}</h6>
            </p>
        </div>
    </td>
    <td class="align-middle text-center">
        @php
        $submitted_at = Carbon::parse($dokumen->created_at);
        @endphp
        <span class="text-secondary text-xs font-weight-bold">{{$submitted_at->format('d/m/Y')}}</span>
    </td>
    <td class="align-middle">
        <a href="{{route('kupli penyuntingan dokumen', [
                        'dokumen_ojt' => $dokumen,
                    ])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
            data-original-title="Edit user">
            Sunting
        </a>
    </td>
</tr>