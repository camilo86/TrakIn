<table class="table table-striped table-hover">
    <thead>
        <tr href="/">
            <th>List Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lists as $list)
        <tr href="#">
            <td>{{ $list->name }}</td>
            <td>{{ $list->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
