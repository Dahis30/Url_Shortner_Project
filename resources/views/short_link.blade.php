<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short link</title>
</head>
<body>
    <div class="container" >
      <h1>URL Shortener</h1>
        <div class="card-header">
<form action="{{ route('Shortlink.store') }}" method="POST" >
  @csrf
<div class="input-group mb-3">
  <input type="text" name="link" class="form-control" placeholder="Paste the URL to be shortened">
  @error('link')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
  <div class="input-group-append">
    <button class="btn btn-primary" >Generate</button>
  </div>
</div>

</form>
        </div>
        <div class="card-body">
          @if(session('success'))
          <div class="alert alert-success" >
            <p> {{session('success')}}</p>

          </div>
          @endif
            
        <table class="table">
  <thead>
    <tr>
      <th >Original link</th>
      <th >Short link</th>
      <th >Vists number</th>
      <th >Delete</th>
      
    </tr>
  </thead>
  <tbody>
@foreach ( $s as $row)
<tr>
      <td>{{$row->link}}</td>
     
      <td><a href="{{route('show.shorten.link', $row->code)}}"> {{url('').'/'.$row->code}}</a></td>
      <td>{{$row->visits_count}}</td>
      <td>
        <form action="{{ route('Shortlink.destroy',$row->code) }}" method="post">
          @csrf 
          @method('DELETE')
          <button type="submit" class="btn btn-danger" >Delete</button>
        </form>
        
      </td>
      
    </tr>
@endforeach
 
   
  </tbody>
</table>
<div class="d-flex justify-content-center" >
{{ $s->links() }}
</div>
        </div>
<div class="card">

</div>
</div>
</body>
</html> 