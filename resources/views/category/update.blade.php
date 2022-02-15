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
  <h2>Update Category</h2>
  <form method="POST" action="{{route('categories.update',$category->id)}}">
    <div class="mb-3 mt-3">
    @csrf
      <label for="category">Category:</label>
      <input type="text"  id="category" placeholder="Enter category" name="name" value="{{$category->name}}"class="@error('name') is-invalid @enderror">
      @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
   
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
