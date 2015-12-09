<table class="table table-striped table-hover">
    <thead>
        <tr href="/">
            <th>Name</th>
            <th>Group</th>
            <th>Total Hours in meeting</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users_in_list as $user)
        <tr href="/list/{{ $list->id }}">
            <td>{{ $user->name }}</td>
            <td>{{ $user->group }}</td>
            <td>{{ $user->hours }}></td>
        </tr>
        @endforeach
    </tbody>
</table>
