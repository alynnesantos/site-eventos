@extends('layouts.main')

@section('title', $event->title)
@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/events/{{ $event->image }}" class="image-fluid" alt="{{ $event->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1> {{ $event->title }} </h1>
        <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event-> city }} </p>
        <p class="event-date"><ion-icon name="calendar-outline"></ion-icon> {{ date('d/m/Y', strtotime($event->date)) }} </p>
        @if($event->private == 0)
        <p class="event-private"><ion-icon name="lock-open-outline"></ion-icon> O evento não é privado </p>
        @else
        <p class="event-private"><ion-icon name="lock-closed-outline"></ion-icon> Evento privado </p>
        @endif
        <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} participantes</p>
        <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }} </p>
        @if(!$hasUserJoined)
          <form action="/events/join/{{ $event->id}}" method="POST">
            @csrf
            <a href="/events/join/{{ $event->id}}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault();this.closest('form').submit();"> Confirmar presença</a>
          </form>   
        @else
          <p class="already-joined-msg">Você está participando deste evento!</p>
        @endif
        <ul id="items-list"> Itens de infraestutura:
          @foreach($event->items as $items)
            <li><ion-icon name="play-outline"></ion-icon> <span> {{ $items }} </span></li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-12" id="description-container">
          <h3>Sobre o evento:</h3>
          <p class="event-description"> {{ $event->description}} </p>
      </div>
    </div>
  </div>




@endsection