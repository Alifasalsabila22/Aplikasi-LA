 @extends('gudangs.layout')
 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Gudang</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('gudangs.create') }}"> Create New gudang</a>
             </div>
         </div>
     </div>

     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif

     <table class="table table-bordered">
         <tr>
             <th>No</th>
             <th>Kode Perwakilan Regional</th>
             <th>Lokasi Gudang</th>
             <th>Nomor Gudang</th>
             <th width="280px">Action</th>
         </tr>
         @foreach ($gudangs as $gudang)
             <tr>
                 <td>{{ ++$i }}</td>
                 <td>{{ $gudang->kode_perwakilan_regional }}</td>
                 <td>{{ $gudang->lokasi_gudang }}</td>
                 <td>{{ $gudang->no_gudang }}</td>
                 <td>
                     <form action="{{ route('gudangs.destroy', $gudang->id) }}" method="POST">

                         <a class="btn btn-info" href="{{ route('gudangs.show', $gudang->id) }}">Show</a>

                         <a class="btn btn-primary" href="{{ route('gudangs.edit', $gudang->id) }}">Edit</a>

                         @csrf
                         @method('DELETE')

                         <button type="submit" class="btn btndanger">Delete</button>
                     </form>
                 </td>
             </tr>
         @endforeach
     </table>

     {!! $gudangs->links() !!}
 @endsection
