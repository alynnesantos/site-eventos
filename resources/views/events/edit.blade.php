@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
   <h1>Editando: {{$event->title}}</h1>
   <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="image">Imagem do evento:</label>
        <input type="file" id="image" name="image" class="from-control file" ></input>
        <img src="/img/events/{{$event->image}}" alt="{{$event->id}}" class="img-preview">
      </div>
      <div class="form-group">
        <label for="title">Evento:</label>
        <input type="text"class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{$event->title}}" ></input>
      </div>
      <div class="form-group">
        <label for="title">Cidade:</label>
        <input type="text"class="form-control" id="city" name="city" placeholder="Local do evento" value="{{$event->city}}" ></input>
      </div>
      <div class="form-group">
        <label for="date">Data do evento:</label>
        <input type="date" class="form-control" id="date" name="date" value="{{ date('d/m/Y', strtotime($event->date)) }}">
      </div>
      <div class="form-group">
        <label for="title">O evento é privado?:</label>
        <select name="private" id="private" class="form-control" >
            <option value="0">Não</option>
            <option value="1" >Sim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="title">Descrição:</label>
        <input type="text"class="form-control" id="description" name="description" placeholder="Descrição" value="{{$event->description}}"></input>
      <div class="form-group">
        <label for="title"> Adicione itens de infraestrutura: </label>
        <div class="form-group">
          <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
        </div>
        <div class="form-group">
          <input type="checkbox" name="items[]" value="Palco"> Palco
        </div>
        <div class="form-group">
          <input type="checkbox" name="items[]" value="Open food"> Open food
        </div>
        <div class="form-group">
          <input type="checkbox" name="items[]" value="Brindes"> Brindes
        </div>
      </div>
      <input type="submit" class="btn btn-primary" value="Editar Evento">
   </form>
</div>

@endsection