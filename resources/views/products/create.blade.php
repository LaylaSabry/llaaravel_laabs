<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <form method="POST" action="{{route('products.store',$categoryid)}}">
    <div class="mb-3 mt-3">
    @csrf
    <label for="cat">Product:</label>
      <input type="text" id="cat" placeholder="Enter product" name="name" class="@error('name') is-invalid @enderror">
     
      @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
      @enderror
     
      <label for="cat1">Description:</label>
      <input type="text" id="cat1" placeholder="Enter description" name="description" class="@error('description') is-invalid @enderror">
    
      @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
      @enderror
     
      <label for="cat2">slug:</label>
      <input type="text" id="cat2" placeholder="Enter slug" name="slug" class="@error('slug') is-invalid @enderror">
      
      @error('slug')
    <div class="alert alert-danger">{{ $message }}</div>
      @enderror
     
    </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
