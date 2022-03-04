@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>{{$post->title}}</h2>
                    <p>
                        <a  href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                    </p>
                    <p>
                        <form action="{{route("posts.destroy", $post->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </p>
                </div>
                <div class="card-body">
                    <div class="mb-2"><strong>Stato:</strong> 
                        @if ($post->published)
                        <span class="badge badge-success">Pubblicato</span>
                        @else
                        <span class="badge badge-secondary">Bozza</span>                                                        
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Categoria:</strong>
                                @if ($post->category)
                                    <span class="badge badge-info">{{$post->category->name}}</span>
                                @else
                                    <span class="badge badge-pill badge-secondary">Nessuna categoria</span>  
                                @endif
                    </div>                               
                    
                   @if (count($post->tags) > 0)
                        <div class="mb-3">
                            <strong>Tags:</strong>
                            @foreach ($post->tags as $tag)
                            <span class="badge badge-primary">{{$tag->name}}
                            </span>
                                
                            @endforeach
                        </div>
                       
                   @endif

                    @if ($post->image)
                    <img width="500" src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}"> 
                    @endif
                    <p>{{$post->content}}</p>


                    @if (count($post->comments) > 0)
                    <div>
                        {{-- @dd($post->comments) --}}
                        <h3 class="mt-3">Commenti</h3>
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($post->comments as $comment)
                                <tr>
                                    <td scope="row">{{$comment->content}}</td>
                                    <td>
                                        @if (!$comment->approved)
                                            <form action="{{route('comments.update', $comment->id)}}" method="POST">
                                                @csrf
                                                @method("PATCH")
                                                <input type="hidden" name="approved" value="1">
                                                <button type="submit" class="btn btn-success btn-sm">Approva</button>
                                            </form>
                                        @else
                                        <span class="badge badge-success">Approvato</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="">
                                           
                                            <button type="submit" class="btn btn-danger btn-sm">Cancella</button>
                                        </form>
                                    </td>
                                </tr>
                                    
                                @endforeach
                              
                            </tbody>
                          </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection