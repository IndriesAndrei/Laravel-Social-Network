@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
 

<h1>Dashboard</h1>
<hr>

<div class="row new-post">
    <div class="col-md-6 offset-3">
        <header><h3>What do you have to say?</h3></header>
        @include('includes.messages')
        @include('includes.errors')

        <form action="{{ route('post.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="body" id="new-post" cols="30" rows="10" placeholder="Your Post"></textarea>
                <br>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </div>
        </form>

    </div>
</div>
<hr>

<div class="row posts">
    <div class="col-md-6 offset-3">
        <header><h3>What other people say...</h3></header>
        
        @foreach ($posts as $post)
        <article class="post" data-postid="{{ $post->id }}">
                {{ $post->body }}
                <div class="info">Posted by <strong>{{ $post->user->first_name }}</strong> {{ $post->created_at->diffForHumans() }}</div>
                <div class="interaction">
                    <a href="" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'}}</a> |
                    <a href="" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'}}</a> |
                    @if (Auth::user() == $post->user)
                        <a href="#" class="edit">Edit</a> |
                        <a href="{{ route('post.delete', ['id' => $post->id]) }}">Delete</a>
                    @endif
                   
                </div>
            </article>
        @endforeach
        
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="">
                  <div class="form-group">
                      <label for="post-body">Edit the Post</label>
                      <textarea class="form-control" name="post-body" id="post-body" cols="30" rows="5"></textarea>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <script>
          var token = '{{ Session::token() }}';
          var url = '{{ route('edit') }}';
          var urlLike = '{{ route('like') }}'
      </script>
@endsection