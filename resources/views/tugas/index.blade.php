@foreach($allTugas as $item)
    <p>{{ $item->nama_tugas }}</p>

    @if(auth()->user()->role == 'admin')
        <form action="/tugas/{{ $item->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" style="color: red;">Hapus Data</button>
        </form>
    @endif
@endforeach