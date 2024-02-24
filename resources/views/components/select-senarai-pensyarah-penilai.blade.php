@dd($pensyarah_penilai_all)

<div class="row container">
    <div class="mb-3 col-12">

        <label class="form-label">Pensyarah Penilai Pelajar</label>
        <select class="form-control" wire:model='pensyarah_penilai_input'>
            @foreach ($pensyarah_penilai_all as $pensyarah_penilai)
                @php
                    $pensyarah_penilai_user = $pensyarah_penilai->User;
                @endphp
                <option value="{{$pensyarah_penilai->user_id}}">{{$pensyarah_penilai_user->name}}</option>
            @endforeach
        </select>
        @error('pensyarah_penilai_input')
            <p class='text-danger inputerror'>{{ $message }} </p>
        @enderror
    </div>
</div>