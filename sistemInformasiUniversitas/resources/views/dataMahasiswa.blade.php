@extends('layout/template')

@section('content')
<div class="container">
    <h1 class="text-center mt-3 mb-2">Data Mahasiswa</h1>
    <div class="form-group">

      <input type="search" class="form-control mb-2" name="search" id="search" placeholder="Search" style="width: 200px">
      
      </div>
    <table class="table table-striped table-hover text-center border">
        <thead>
            <tr>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">No Telepon</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                    <td>{{ $mahasiswa->no_telepon }}</td>
                    <td>{{ $mahasiswa->jurusan->nama_jurusan }}</td>
                    <td>
                        <a href="{{ route('editDataMahasiswa',$mahasiswa->id_mahasiswa) }}"><button type="button" class="btn btn-success" style="font-size: 10px">Edit</button></a>
                        <a href="{{ route('deleteDataMahasiswa',$mahasiswa->id_mahasiswa) }}"><button type="button" class="btn btn-danger" style="font-size: 10px">Hapus</button></a>
                    </td>
                </tr>
            @endforeach
          </tbody>    
    </table>
    <script type="text/javascript">

      $('#search').on('keyup',function(){
      
      $value=$(this).val();
      
      $.ajax({
      
      type : 'get',
      
      url : '{{URL::to('search')}}',
      
      data:{'search':$value},
      
      success:function(data){
      
      $('tbody').html(data);
      
      }
      
      });
      
      
      
      })
      
      </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</div>
        
@endsection