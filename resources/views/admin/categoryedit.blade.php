@extends('admin.layout');
@section('container')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">  
                    <form action="/category/update/{{$data->id}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_name" class="control-label mb-1">Category Name</label>
                            <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$data->category_name}}" required>
                            @error('category_name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_slug" class="control-label mb-1">Category Slug</label>
                            <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$data->category_slug}}" required >
                            @error('category_slug')
                            <div class="alert alert-danger">
                                {{$message}}
    
                            </div>
                            @enderror
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection