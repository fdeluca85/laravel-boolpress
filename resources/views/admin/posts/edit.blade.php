@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>Modifica post: {{$post->title}}</h2></div>
                <div class="card-body">
                    <form action="{{route("posts.update", $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                                        {{-- TITLE --}}
                        <div class="form-group">
                          <label for="title">Titolo</label>
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title') ? old('title') : $post->title}}">
                            @error('title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                                        {{-- CONTENT --}}
                        <div class="form-group">
                            <label for="content">Testo</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci il contenuto del post" rows="5">{{old('content') ? old('content') : $post->content}}</textarea>
                            @error('content')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace( 'content' );
                        </script>
                                        {{-- CATEGORY --}}
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                <option value="">Seleziona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old("category_id", $post->category_id) == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach                                
                              </select>
                              @error('category_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                                            {{-- TAGS --}}
                        <div class="form-group">
                            <p>Tags</p>
                            @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                
                                @if (old("tags"))
                                    <input class="form-check-input @error('tags') is-invalid @enderror" form-check" type="checkbox" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}}>
                                    
                                @else
                                    <input class="form-check-input @error('tags') is-invalid @enderror" form-check" type="checkbox" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'checked' : ''}}>
                                
                                @endif
                                

                                <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                            </div>
                            @endforeach
                            @error('tags')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                                            {{-- IMAGE --}}
                        @if ($post->image)
                        <img class="mb-2" width="100" src="{{asset("storage/{$post->image}")}}" alt=""> 
                        @endif
                        <div class="custom-file mb-2 ">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                            <label class="custom-file-label" for="customFile">Aggiungi immagine</label>
                            @error('image')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                                            {{-- PUBLISHED --}}
                        <div class="form-group form-check">
                            @php
                                $published = old('published') ? old('published') : $post->published;
                            @endphp
                            <input class="form-check-input @error('published') is-invalid @enderror" type="checkbox" id="published" name="published" {{$published ? 'checked' : ''}}>                            
                            <label class="form-check-label" for="published">Pubblica</label>
                            @error('published')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror                           
                        </div>
                        <button type="submit" class="btn btn-primary">Modifica</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection