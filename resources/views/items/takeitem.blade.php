@extends('layouts.app')
@section('content')
{{$slot = ""}}
<div class="d-flex justify-content-center">
    <div class="card mx-5 px-5 py-5 mt-5" style="width: 75%;">
        <form method="post" action={{ route("items.updateUser", $item) }}>
            @csrf
            @method('patch')
            <div class="mb-3">
              <label for="quantity" class="form-label">Quantity saat ini <?php echo($item->quantity)?></label>
              <input type="number" name="quantity" class="form-control mx-3" id="quantity" aria-describedby="quantityhelp">
              <div id="quantityhelp" class="form-text mx-3">jumlah</div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection