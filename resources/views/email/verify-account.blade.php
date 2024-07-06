<h3>Hi:{{$account->tenkh}}</h3>
<p>
    Vui lòng verity để đăng nhập tài khoản 
</p>

<p>
    <a href="{{route('account.veryfy',$account->email)}}">Click here to verify your account</a>
</p>