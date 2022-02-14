<!doctype html>
<html lang="en">

<head>
    <title> Create Post </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-12 text-right">
            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('save_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('failed') }}
                        </div>
                    @endif

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="form-group">
                                <label> Title </label>
                                <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                                    placeholder="Enter the Title">
                            </div>
                            <div class="form-group">
                                <label> Email Addres </label>
                                <input type="text" class="form-control" value="{{ old('email') }}" name="email"
                                    placeholder="Enter the Title">
                            </div>
                            {{-- @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                            <div class="form-group">
                                <label> Description </label>
                                <textarea class="form-control" id="description" placeholder="Enter the Description"
                                    name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label> Url Insert </label>
                                <input class="form-control" type="text" name="url" id="url">
                            </div>
                            <div class="form-group">
                                <label> Number One</label>
                                <input class="form-control" type="number" name="numbers" id="numbers">
                            </div>
                            <div class="form-group">
                                <label> Number Two</label>
                                <input class="form-control" type="number" name="numbers_two" id="numbers_two">
                            </div>
                            <div class="form-group">
                                <label> Password</label>
                                <input class="form-control" type="text" name="password" id="url">

                            </div>
                            <div class="form-group">
                                <label> Confirm Password</label>
                                <input class="form-control" type="text" name="password_confirmation" id="url">

                            </div>
                            <div class="form-group">
                                <label> Select Start Date</label>
                                <input class="form-control" type="date" name="start_date" id="start_date">
                            </div>
                            <div class="form-group">
                                <label> Select End Date</label>
                                <input class="form-control" type="date" name="finish_date" id="finish_date">
                            </div>

                            <div class="form-group">
                                <label> Publis Now : </label>
                                <input class="" type="radio" name="post_status" value="1"
                                    id="post_status">
                                <label for="Yes"> Yes </label>
                                <input class="" type="radio" name="post_status" value="0">
                                <label for="no">No</label>
                            </div>
                            <div class="form-group">
                                <label> Select Files To Upload </label>
                                <input class="form-control" type="file" name="image_upload" id="image_upload">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="chk_terms_condition" id="chk_terms_condition"> Please
                                Accept The Terms And Condition
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Save </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
