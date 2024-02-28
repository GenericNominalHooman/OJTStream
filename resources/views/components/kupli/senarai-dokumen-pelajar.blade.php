@php
use Illuminate\Support\Carbon;
@endphp
@php
$dokumens_pelajar = $pelajar->Dokumen_OJT_Pelajar->where("dokumen_ojt_id", $dokumen->id);
@endphp
{{-- DETECT WHETHER PELAJAR HAS UPLOADEDD A FILE BEFORE --}}
@foreach ($dokumens_pelajar as $dokumen_pelajar)
    @if ($dokumen_pelajar->document_path != null)
        {{-- PELAJAR HAS UPLOADED DOC --}}
        <tr>

            {{-- NAMA DOKUMEN OJT BEGIN --}}
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
            {{-- NAMA DOKUMEN OJT END --}}

            {{-- JENIS DOKUMEN OJT BEGIN --}}
            <td>
                <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ $dokumen->document_type }}</h6>
                    </p>
                </div>
            </td>
            {{-- JENIS DOKUMEN OJT END --}}

            {{-- KEMASKINI DOKUMEN START --}}
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
            {{-- KEMASKINI DOKUMEN END --}}

            {{-- UPLOAD STATUS BEGIN --}}
            <td class="align-middle text-center text-sm">
                {{-- PELAJAR HAS UPLOADED FILE --}}
                <span class="badge badge-sm bg-gradient-success">Sudah Dimuat Naik</span>
            </td>
            {{-- UPLOAD STATUS END --}}
            
            {{-- SUBMITTED AT BEGIN --}}
            <td class="align-middle text-center">
                @php
                    $submitted_at = Carbon::parse($dokumen_pelajar->submitted_at);
                @endphp
                <span class="text-secondary text-xs font-weight-bold">{{$submitted_at->format('d/m/Y')}}</span>
            </td>
            {{-- SUBMITTED AT END --}}

            {{-- LINK BEGIN --}}
            <td class="align-middle">
                <button class="btn btn-success" wire:click="downloadPelajarDokumenOJT('{{$dokumen_pelajar->id}}')">Muat Turun</button>
            </td>
            {{-- LINK END --}}

        </tr>    
    @else   
        {{-- PELAJAR HAVENT UPLOADED DOC --}}
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
                <button class="btn btn-success" wire:click="downloadPelajarDokumenOJT('{{$dokumen_pelajar->id}}')" disabled>Muat Turun</button>
            </td>
        </tr>    
    @endif
@endforeach