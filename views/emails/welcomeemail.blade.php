@extends('emails.baseemail')

@section('body')
<p>
    Welcome to Acme!
</p>

<p>
    Please <a href="{!! getenv('HOST') !!}/verify-account?token={!! $token !!}">click here to activate</a> your account
</p>
@stop