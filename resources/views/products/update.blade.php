<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <form method="POST" action="{{route('products.update',$product->id)}}">
    <div class="mb-3 mt-3">
    @csrf
      <label for="product">Product:</label>
      <input type="text" id="product" placeholder="Enter Product" name="name" value="{{$product->name}}" class="@error('name') is-invalid @enderror">
     
      @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   
    </div>

    
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
