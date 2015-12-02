
<table class="table table-striped table-hover">
    <thead>
        <tr href="/">
            <th>Meeting</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($meetings as $meeting)
        <tr href="/meeting/{{ $meeting->id }}">
            <td>{{ $meeting->name }}</td>
            <td>{{ $meeting->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
