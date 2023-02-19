@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="fs-3 mb-3 "><i class="fa-solid fa-user-large-slash"></i> {{ __('Account suspension') }}</div>
                    @php
                        $ban = Auth::user()->profile->bans()->latest()->first();

                    @endphp
                    {{$ban->created_at}}
                    @if ($ban->days)
                       Su cuenta estará suspendida hasta el {{date("Y-m-d H:i:s", strtotime($ban->created_at.$ban->days. "day"))}}.
                    @else
                        {{__('Your account has been suspended indefinitely for inappropriate posting.')}}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
