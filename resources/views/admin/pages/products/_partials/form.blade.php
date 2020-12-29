@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    
@endif

<!-- Input proprio do laravel para inputar a chave (token) de acesso dos POSTs -->
@csrf
<div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="name" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <input type="text" name="price" class="form-control" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <input type="text" name="description" class="form-control" value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">
    <input type="file" name="image" id="image">
</div>
