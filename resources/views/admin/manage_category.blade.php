@extends('admin.layout');
@section('container')
<h1 >Manage Category</h1>
<a href="/admin/category">
    <button  type="submit" class="btn btn-success">Back</button>
</a>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">  
                <form action="{{route('category.insert')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                        <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('category_name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                        <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                        @error('category_slug')
                        <div class="alert alert-danger">
                            {{$message}}

                        </div>
                        @enderror
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection