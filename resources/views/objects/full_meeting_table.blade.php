<table class="table table-striped table-hover">
    <thead>
        <tr href="/">
            <th>Meeting</th>
            <th>Description</th>
            <th>Starts</th>
            <th>Ends</th>
        </tr>
    </thead>
    <tbody>
        @foreach($meetings as $meeting)
        <tr href="/meeting/{{ $meeting->id }}">
            <td>{{ $meeting->name }}</td>
            <td>{{ $meeting->description }}</td>
            <td>{{ $meeting->start_time }}</td>
            <td>{{ $meeting->end_time }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
