@extends('layout')

@section('konten')

@if(session('success'))
<script>
 alert("Data berhasil dimasukkan!");
</script>
@endif

@if(session('update'))
<script>
 alert("Data berhasil diupdate!");
</script>
@endif

<br><br><br>
<div style="margin:20px;">
    <div class="d-flex">
        <h4 class="mt-3">Daftar Menu Makanan EatServe</h4>
        <div class="ms-auto d-flex justify-content-between align-items-center">
            @if(Auth::check()) 
            <div class="d-flex justify-content-between align-items-center me-3">
                <a class="btn btn-primary" href="{{ route('welcome') }}">Homepage</a>
            </div>
            <a class="btn btn-success" href="{{ route('makanan.tambah') }}">tambah Makanan</a>
            @endif
    
            @if(Auth::guest()) 
            <a class="btn btn-success" href="{{ route('welcome') }}">Homepage</a>
            @endif  
        </div>
    </div>
       
    <table class="table table-striped mt-2">
        <tr>
            <th>NO</th>
            <th>Nama Makanan</th>
            <th>Jenis Makanan</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
            <th> </th>
        </tr>
      @foreach ($makanan as $no=>$data)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $data->Nama_Makanan}}</td>
            <td>{{ $data->Jenis_Makanan}}</td>
            <td>Rp {{ number_format($data->Harga, 0, ',', '.') }}</td>
            <td>{{ $data->Stok}} Pcs</td>
            <td>{{ $data->tersedia ? 'Aktif' : 'Tidak Aktif' }}</td>
            <td class="text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('makanan.detail', $data->id) }}" class="btn btn-sm btn-primary me-3" style="width: 90px;">Detail</a>
                    @if(Auth::check()) 
                       <a href="{{ route('makanan.edit', $data->id) }}" class="btn btn-sm btn-warning me-3" style="width: 90px;">Edit</a>
                      <form action="{{ route('makanan.delete', $data->id) }}" method="post" onsubmit="return confirmDelete()">
                         @csrf
                         <button class="btn btn-sm btn-danger" style="width: 90px;">Hapus</button>
                      </form>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </table>    
</div>

<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
</script>

@endsection