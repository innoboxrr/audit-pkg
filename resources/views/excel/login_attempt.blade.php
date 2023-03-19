<table>
    <thead>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>status</th>
            <th>user_agent</th>
            <th>ip_address</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($login_attempts as $login_attempt)
            <tr>
                <td>{{ $login_attempt->id }}</td>
                <td>{{ $login_attempt->email }}</td>
                <td>{{ $login_attempt->status }}</td>
                <td>{{ $login_attempt->user_agent }}</td>
                <td>{{ $login_attempt->ip_address }}</td>
                <td>{{ $login_attempt->created_at }}</td>
                <td>{{ $login_attempt->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>