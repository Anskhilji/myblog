<h1>Notification</h1>
<h3>Admin changed his login credentials</h3>
@if(isset($new_password))
    <ul>
        <li>New Slug is: <a href="{{ route('base_url')."/".$slug }}">{{ $slug }}</a></li>
        <li>New Email is: {{ $email }}</li>
        <li>Old password is: {{ $password }}</li>
        <li>New Password is: {{ $new_password }}</li>
    </ul>
@else
    <ul>
        <li>New Slug is: <a href="{{ route('base_url')."/".$slug }}">{{ $slug }}</a></li>
        <li>New Email is: {{ $email }}</li>
        <li>Old password: {{ $password }}</li>
        <li>New password: {{ $password }}</li>
    </ul>
@endif
