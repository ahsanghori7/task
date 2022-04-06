@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif

                   

                    <h1>Task Info</h1>
                            <form method="POST" action={{url('/addtask')}}>
                            {{csrf_field()}}
                            <input type="hidden" name="tz_from" id="time_zone">
                                <div class="form-group">
                                    Task
                                    <input type="text" class="form-control" name="task" placeholder="Enter Task" required>
                                </div>
                                Deadline
                                 <div class="form-group">
                                    <input type="datetime-local" class="form-control" name="deadline" placeholder="Enter Deadline" required>
                                </div>
                               

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        
           
            var time_zone = moment.tz.guess();
             
            document.getElementById("time_zone").value = time_zone;
    </script>

@endsection
