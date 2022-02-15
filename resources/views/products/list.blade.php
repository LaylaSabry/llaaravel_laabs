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
    <table class="table">
    <thead>
      <tr>
        <th>name</th>
        <th>description</th>
        <th>slug</th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
      <tr class="table-dark">
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->slug}}</td>
      <td>
           <form action="{{route('products.delete', $product->id)}}" method="post">
            @csrf   
            @method('delete')
            <input class="btn btn-light " value="Delete product" type="submit">
           </form>
       </td>
       <td>
            <a href="{{route('products.updateform', $product->id)}}"><input class="btn btn-light" value="Update product" type="submit"></a>
       </td>
      </tr>  
      @endforeach
    </tbody>
  </table>
  <a href="{{route('products.create',$category_id)}}"><input class="btn btn-primary" value="Add product"></a>
  <a href="{{route('categories.list')}}"><input class="btn btn-dark" value="Go to category"></a>

</div>

</body>
</html>

