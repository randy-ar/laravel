@extends('layouts.app')
@section('content')
{{$slot = ""}}
<div class="d-flex justify-content-center">
    <div class="card mx-5 px-5 py-5 mt-5" style="width: 75%;">
        <form action="/category/store" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Category</label>
              <input type="text" name="name" class="form-control mx-3" id="name" aria-describedby="namehelp">
              <div id="namehelp" class="form-text mx-3">Komponen, Inventaris, Alat.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection