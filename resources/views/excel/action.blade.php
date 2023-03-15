<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($actions as $action)
            <tr>
                <td>{{ $action->id }}</td>

                <td>{{ $action->created_at }}</td>
                <td>{{ $action->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>