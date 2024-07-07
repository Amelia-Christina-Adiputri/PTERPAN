<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="jumbotorn">
            <table class="table table-bordered table-hover">
                <thead class"thead">
                    <tr class="warning">
                        <th>Id</th>
                        <th>Title</th>
                        <th>color</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach($events as $event)
                <tbody>
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->color}}</td>
                        <td>{{$event->start_date}}</td>
                        <td>{{$event->end_date}}</td>

                        <th><a href="{{action('EventController@edit',$event['id'])}}" class="btn btn-success">
                            <i class="glyphicon glyphicon-edit"></i>Edit</a>
                        </th>
                    </tr>
                </tbody>
            @endforeach
            </table>
        </div>
    </div>
</body>
</html>
