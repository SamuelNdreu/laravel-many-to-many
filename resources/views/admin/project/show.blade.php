@extends('layouts.app')

@section('content')
<section class="container text-center mt-5">

  @if (session("message"))
    <div class="alert alert-{{ session('alert-type') }} mb-5">
      {{ session("message") }}
    </div>
  @endif

  <img src="{{ $project->preview }}" alt="{{ $project->title }}">
      <h1>{{ $project->title }}</h1>
      <h3>
        Technoligies:
        @foreach($project->technologies as $technology)
          {{ $technology->technology }}
        @endforeach
      </h3>
      <h3>Author: {{ $project->author }}</h3>
      <div>date: {{ $project->date }}</div>
      <div class="d-flex">
        <a href="{{ route("admin.project.show", $prevProject->slug ?? "") }}" class="@if(!isset($prevProject)) disabled @endisset me-auto btn btn-secondary">Prev</a>

        <a href="{{ route("admin.project.index") }}" class="btn btn-primary">Back</a>

        <a href="{{ route("admin.project.edit", $project->slug) }}" class="btn btn-warning">Edit</a>
        <form class="d-inline delete-element" action="{{ route("admin.project.destroy", $project->slug) }}" method="POST" data-element-name="{{ $project->title }}">
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger" value="delete">Delete</button>
        </form>

        
        <a href="{{ route("admin.project.show", $nextProject->slug ?? "") }}" class="@if(!isset($nextProject)) disabled @endisset btn btn-secondary ms-auto">Next</a>

      </div>
    </section>
@endsection


@section("js")
  @vite('resources/js/deleteConfirm.js')
@endsection
