@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">
    <p><span>{{ $date }}日</span><span class="ml-3">{{ $part }}部</span></p>
    <div class="border">
      <table class="w-100">
        <tr class="text-center reserve">
          <th class="w-5">ID</th>
          <th class="w-30">名前</th>
          <th class="w-30">場所</th>
        </tr>
        @foreach($reservePersons as $reservePerson)
        @foreach($reservePerson-> users as $user)
        <tr class="text-center reserve-user">
          <td class="w-5">{{$user->id}}</td>
          <td class="w-30">{{$user->over_name}}{{$user->under_name}}</td>
          <td class="w-30">リモート</td>
        </tr>
        @endforeach
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
