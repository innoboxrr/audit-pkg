<table>
    <thead>
        <tr>
            <th>id</th>
            <th>before</th>
            <th>after</th>
            <th>route</th>
            <th>ip_address</th>
            <th>user_agent</th>
            <th>loggable_id</th>
            <th>loggable_type</th>
            <th>user_id</th>
            <th>action_id</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($actions as $action)
            <tr>
                <td>{{ $action->id }}</td>
                <td>{{ $action->before }}</td>
                <td>{{ $action->after }}</td>
                <td>{{ $action->route }}</td>
                <td>{{ $action->ip_address }}</td>
                <td>{{ $action->user_agent }}</td>
                <td>{{ $action->loggable_id }}</td>
                <td>{{ $action->loggable_type }}</td>
                <td>{{ $action->user_id }}</td>
                <td>{{ $action->action_id }}</td>
                <td>{{ $action->created_at }}</td>
                <td>{{ $action->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>