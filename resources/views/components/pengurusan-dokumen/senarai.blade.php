@php
use Illuminate\Support\Carbon;
@endphp
@php
$dokumens_pelajar = auth()->user()->Pelajar->Dokumen_OJT_Pelajar->where("dokumen_ojt_id", $dokumen->id);
@endphp
{{-- DETECT WHETHER PELAJAR HAS UPLOADEDD A FILE BEFORE --}}
@foreach ($dokumens_pelajar as $dokumen_pelajar)
    @if ($dokumen_pelajar->document_path != null)
        {{-- PELAJAR HAS UPLOADED DOC --}}
        <tr>
            <td>
                <div class="d-flex px-2 py-1">
                    <div>
                        <img src="{{ asset('assets') }}/img/team-2.jpg"
                            class="avatar avatar-sm me-3 border-radius-lg"
                            alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $dokumen->document_name }}</h6>
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
            <td>
                @php
                    $currentTime = Carbon::now();
                    $deadlineDate = Carbon::parse($dokumen_pelajar->deadline_date);
                @endphp
                <p class="text-xs font-weight-bold mb-0">{{ $deadlineDate->format('d/m/Y') }}</p>
                @if ($currentTime->lt($deadlineDate))
                    @if ($deadlineDate->diffInDays() < 5)
                        <p class="text-xs text-secondary mb-0 d-inline text-warning">{{ $deadlineDate->diffInDays() }} Hari Lagi.</p> 
                    @else
                        <p class="text-xs text-secondary mb-0 d-inline">{{ $deadlineDate->diffInDays() }} Hari Lagi.</p>
                    @endif
                @elseif ($currentTime->eq($deadlineDate))
                    <p class="text-xs text-secondary mb-0 d-inline text-yellow-500 text-warning">{{ $deadlineDate->diffInDays() }} Hari Ini.</p>
                @else
                    <p class="text-xs text-secondary mb-0 d-inline text-danger">{{ $deadlineDate->diffInDays() }} Hari Lepas.</p>
                @endif
            </td>
            <td class="align-middle text-center text-sm">
                {{-- PELAJAR HAS UPLOADED FILE --}}
                <span class="badge badge-sm bg-gradient-success">Sudah Dimuat Naik</span>
            </td>
            <td class="align-middle text-center">
                @php
                    $submitted_at = Carbon::parse($dokumen_pelajar->submitted_at);
                @endphp
                <span class="text-secondary text-xs font-weight-bold">{{$submitted_at->format('d/m/Y')}}</span>
            </td>
            <td class="align-middle">
                <a href="javascript:;"
                    class="text-secondary font-weight-bold text-xs"
                    data-toggle="tooltip" data-original-title="Edit user">
                    Sunting
                </a>
            </td>
        </tr>    
    @else   
        {{-- PELAJAR HAVENT UPLOADED DOC --}}
        <tr>
            <td>
                <div class="d-flex px-2 py-1">
                    <div>
                        <img src="{{ asset('assets') }}/img/team-2.jpg"
                            class="avatar avatar-sm me-3 border-radius-lg"
                            alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $dokumen->document_name }}</h6>
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
            <td>
                @php
                    $currentTime = Carbon::now();
                    $deadlineDate = Carbon::parse($dokumen_pelajar->deadline_date);
                @endphp
                <p class="text-xs font-weight-bold mb-0">{{ $deadlineDate->format('d/m/Y') }}</p>
                @if ($currentTime->lt($deadlineDate))
                    @if ($deadlineDate->diffInDays() < 5)
                        <p class="text-xs text-secondary mb-0 d-inline text-warning">{{ $deadlineDate->diffInDays() }} Hari Lagi.</p> 
                    @else
                        <p class="text-xs text-secondary mb-0 d-inline">{{ $deadlineDate->diffInDays() }} Hari Lagi.</p>
                    @endif
                @elseif ($currentTime->eq($deadlineDate))
                    <p class="text-xs text-secondary mb-0 d-inline text-yellow-500 text-warning">{{ $deadlineDate->diffInDays() }} Hari Ini.</p>
                @else
                    <p class="text-xs text-secondary mb-0 d-inline text-danger">{{ $deadlineDate->diffInDays() }} Hari Lepas.</p>
                @endif
            </td>
            <td class="align-middle text-center text-sm">
                <span class="badge badge-sm bg-gradient-secondary">Belum Dimuat Naik</span>
            </td>
            <td class="align-middle text-center">
                <span
                    class="text-secondary text-xs font-weight-bold">-</span>
            </td>
            <td class="align-middle">
                <a href="javascript:;"
                    class="text-secondary font-weight-bold text-xs"
                    data-toggle="tooltip" data-original-title="Edit user">
                    Sunting
                </a>
            </td>
        </tr>    
    @endif
@endforeach