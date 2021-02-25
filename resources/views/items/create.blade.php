@extends('layouts.app')
@section('content')
{{$slot = ""}}
<div class="d-flex justify-content-center">
    <div class="card mx-5 px-5 py-5 mt-5" style="width: 75%;">
        <form action="{{route('items.store')}}" method="POST">
            @csrf
            @method('post')
            <div class="mb-3">
              <label for="name" class="form-label">Item</label>
              <input type="text" name="name" class="form-control mx-3" id="name" aria-describedby="namehelp">
              <div id="namehelp" class="form-text mx-3">Arduino, WEMOS, Resistor</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Category</label>
                <select name="category" class="form-select mx-3" aria-describedby="categoryhelp">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <div id="categoryhelp" class="form-text mx-3">Pilih Kategori</div>
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Date</label>
              <input type="date" name="date" class="form-control mx-3" id="date" aria-describedby="datehelp">
              <div id="datehelp" class="form-text mx-3">tanggal</div>
            </div>
            <div class="mb-3">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="number" name="quantity" class="form-control mx-3" id="quantity" aria-describedby="quantityhelp">
              <div id="quantityhelp" class="form-text mx-3">jumlah</div>
            </div>
            <div class="mb-3">
              <label for="unit" class="form-label">Unit</label>
              <input type="text" name="unit" class="form-control mx-3" id="unit" aria-describedby="unithelp">
              <div id="unithelp" class="form-text mx-3">keterangan satuan</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection