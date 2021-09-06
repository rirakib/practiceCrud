<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
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
        .delete{
            background-color:red;
            color:#fff;
            text-align:center;
            display:inline-block;
            cursor: pointer;
            padding:5px 10px;
        }
    </style>
<body>
    <h1>Index</h1>
    <a href="{{route('index.create')}}">Create</a>

    <div class="index">
        <table border="1">
            <thead>
                <th>profile</th>
                <th>name</th>
                <th>email</th>
                <th>show</th>
                <th>edit</th>
                <th>delete</th>
            </thead>
            @foreach($indexData as $data)
            <tr>
                <td><img src="{{url($data->img)}}" alt=""></td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td><a href="{{route('index.show',$data->id)}}">Show</a></td>
                <td><a href="{{route('index.edit',$data->id)}}">Edit</a></td>
                <td>
                    <form action="{{route('index.destroy',$data->id)}}" method="post">
                        @method('DELETE')
                        @csrf 
                        <input type="submit" value="Delete" class="delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>