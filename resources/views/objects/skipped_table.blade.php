<table class="table table-striped table-hover">
    <thead>
        <tr href="/">
            <th>Name</th>
            <th>Group</th>
        </tr>
    </thead>
    <tbody>
        @unless(count($meeting->getSkipped()) <= 0)
            @foreach($meeting->getSkipped() as $user)
            <tr href="#">
                <td>{{ $user->name }}</td>
                <td>{{ $user->group }}</td>
            </tr>
            @endforeach
        @endunless
    </tbody>
</table>
