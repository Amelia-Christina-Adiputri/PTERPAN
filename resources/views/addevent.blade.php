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
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #2e6da4; color: white;">
                        Add Event To Calendar
                    </div>
                    <div class="panel-body">
                        <h1>Task: Add Data</h1>
                        <form method="POST" action="{{action('EventController@store')}}">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                                <label for="">Enter Name of Event</label>
                                <input type="text" ckass="form-control" name="title" placeholder="Enter the name">
                            </div>
                            <div class="form-group w-100">
                                <label for="">Enter Color</label>
                                <input type="color" ckass="form-control" name="color" placeholder="Enter the color">
                            </div>
                            <div class="form-group w-100">
                                <label for="">Enter Start Date of Event</label>
                                <input type="date" ckass="form-control" name="start_date" placeholder="Enter Start Date">
                            </div>
                            <div class="form-group w-100">
                                <label for="">Enter End Date of Event</label>
                                <input type="date" ckass="form-control" name="end_date" placeholder="Enter End Date">
                            </div>
                            <div>
                                <input type="submit" name="submit" class="btn btn-primary" value="Add Event Data">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
