@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->all())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $er)
                    <div>
                        {{ $er }}
                    </div>
                @endforeach
            </div>
        @endif

        @auth
        <form method="post">
            @csrf
            <div class="mb-2">
                <label>Title</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-2">
                <label>Content</label>
                <input type="text" name="content" class="form-control">
            </div>

            <div class="mb-2">
                <label>Category</label>
                <select name="category_id" class="form-select">
                    @foreach ($addCategories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <input type="submit" value="Add Items" class="btn btn-primary">
        </form>
        @endauth
    </div>
@endsection
