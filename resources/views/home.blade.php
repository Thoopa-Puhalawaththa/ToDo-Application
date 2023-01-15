<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" />
    <<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>

</head>

<body class="bg-dark">

    <div class="container w-50 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-Do List</h3>
                <form action="{{ route('store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your todo">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fa fa-plus"></i>ADD</button>
                    </div>
                </form>
                @if (count($todolists))
                    <ul class="list-group list-group-flust mt-3">
                        @foreach ($todolists as $todolist)
                            <li class="list-group-item">
                                <form action="{{ route('destroy', $todolist->id) }}" method="post">
                                    {{ $todolist->content }}
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link btn-sm float-end"><i class="fa fa-trash"></i></button>
                                </form>    
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center mt-3">No todo list</p>
                @endif
            </div>
            @if (count($todolists))
                <div class="card-footer">
                  You have {{ count($todolists) }} Pending Tasks
                </div>
            @endif
        </div>
    </div>

</body>

</html>
