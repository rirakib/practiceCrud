<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box
        }
        .form_section{
            margin-top:30px;
        }
        input{
            width: 250px;
            margin-top:20px;
            height: 40px;
        }
    </style>
</head>
<body>
    <h1>Edit </h1>
<a href="{{route('index.index')}}">Back</a>
<div class="form_section">
    <form action="{{route('index.update',$editVar->id)}}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('put')
    
        <input type="hidden" name="id" value="{{$editVar->id}}">
        <div class="group">
            <input type="text" name="name" id="name" value="{{$editVar->name}}">
        </div>

        <div class="group">
            <input type="email" name="email" id="email" value="{{$editVar->email}}">
        </div>

        <div class="group">
            <input type="file" name="img" id="img" value="{{$editVar->img}}">
        </div>
        <input type="submit" value="submit">

    </form>
</div>
</body>
</html>
