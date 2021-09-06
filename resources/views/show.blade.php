<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box
        }
        .index{
            margin-top:30px;
        }
        img{
            width:100%;
        }
        th{
            height: 20px;
            width: 120px;
            text-align: center;
        }
        td{
            
            height: 60px;
            width: 120px;
            text-align: center;
        }
        td img{
            height: 80px;
            width: 120px;
        }
    </style>
<body>
    <h1>Show</h1>
    <a href="{{route('index.index')}}">Back</a>

    <div class="index">
        <table border="1">
            <thead>
                <th>profile</th>
                <th>name</th>
                <th>email</th>
            </thead>
            <tr>
                <td><img src="{{url($data->img)}}" alt=""></td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
               
            </tr>
        </table>
    </div>
</body>
</html>