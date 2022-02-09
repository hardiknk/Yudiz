<!DOCTYPE html>
<html>

<head>
    <title>Mail Template</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{!! $post_description !!}</p>
    {{-- <h1>{{ $url }}</h1> --}}
    <a href="{{ $url }}"> Click Here To Unsubscribe</a>
    

    <p>Thank you</p>
</body>

</html>
