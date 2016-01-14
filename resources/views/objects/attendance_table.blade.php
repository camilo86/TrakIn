<table class="table table-striped table-hover">
    <thead>
        <tr href="/">
            <th>Name</th>
            <th>Group</th>
            <th>Hours*</th>
        </tr>
    </thead>
    <tbody>

        @foreach($meeting->getAttandance() as $user)
        <tr href="#">
            <td>{{ $user->name }}</td>
            <td>{{ $user->group }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
