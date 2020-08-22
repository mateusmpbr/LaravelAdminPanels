<div class="table-responsive-sm">
    <table class="table table-striped" id="foos-table">
        <thead>
            <tr>
                <th>Data</th>
        <th>Confirmed</th>
        <th>Name</th>
        <th>Date</th>
        <th>Date Time</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($foos as $foo)
            <tr>
                <td>{{ $foo->data }}</td>
            <td>{{ $foo->confirmed }}</td>
            <td>{{ $foo->name }}</td>
            <td>{{ $foo->date }}</td>
            <td>{{ $foo->date_time }}</td>
                <td>
                    {!! Form::open(['route' => ['foos.destroy', $foo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('foos.show', [$foo->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('foos.edit', [$foo->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>