@extends('layouts.app')
@section('content')
{{$slot=""}}
<div class="d-flex justify-content-center">
    @foreach ($categories as $category)
            <a class="btn mx-5 my-3 btn-outline-secondary {{($category->id == intval(request("category"))) ? "active" : ""}}" href="/items?category={{$category->id}}">{{$category->name}}</a>
    @endforeach
</div>
    <div class="d-flex justify-content-center">
        <div class="container my-3">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                    <td>Jumlah</td>
                    <td>Satuan</td>
                    <td>Tindakan</td>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->unit}}</td>
                        <td style="width: 25%">
                            <div class="row">
                                <div class="col mx-0">
                                    <a class="btn btn-sm btn-primary" href="{{route('items.show', $item)}}">Lihat</a>
                                </div>
                                @if ($role == "Admin")
                                <div class="col mx-0">
                                    <a class="btn btn-sm btn-warning" href="{{route('items.edit', $item)}}">Edit</a>
                                </div> 
                                @endif
                                @if ($role == "User")
                                <div class="col mx-0">
                                    <a class="btn btn-sm btn-warning" href="{{route('items.takeitem', $item)}}">Ambil</a>
                                </div>
                                @endif
                                
                                @can('user_item_access')
                                <div class="col mx-0">
                                    <form action="{{route('items.destroy', $item->id)}}", method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');" >
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn btn-sm btn-danger" href="{{route('items.destroy', $item->id)}}">Hapus</button>
                                    </form>
                                </div>
                                @endcan
                                
                              </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="justify-content-center">
                        <a href="{{route('items.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection