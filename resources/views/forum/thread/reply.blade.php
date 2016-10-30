@extends('bitaac::app')

@section('content')
    @section('breadcrumbs')
    	<li><a href="{{ url('/forum') }}">Forum</a>
    	<li><a href="{{ url_e('/forum/:board', ['board' => $board->title]) }}">{{ $board->title }}</a>
    	<li><a href="{{ url_e('/forum/:board/:thread', ['board' => $board->title, 'thread' => $thread->title]) }}">{{ $thread->title }}</a>
    	<li>Reply
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Forum', 'desc' => ''])

    <form method="POST">
        {!! csrf_field() !!}
        
        <table>
    		{{-- Title field. --}}
    		<tr class="header">
    			<th colspan="2">{{ $thread->title }}</th>
    		</tr>

    		{{-- Author field. --}}
    		<tr>
    			<th width="20%">Author</th>
    			<td>
    				<select name="author">
                        @foreach ($account->characters as $character)
                            <option value="{{ $character->id }}">{{ $character->name }}</option>
                        @endforeach
                    </select>

    				@if ($errors->has('author'))
    					<em class="error">{{ $errors->first('author') }}</em>
    				@endif
    			</td>
    		</tr>

    		{{-- Content field. --}}
    		<tr>
    			<th valign="top">Content</th>
    			<td>
    				<textarea id="reply" name="content"></textarea>

    				@if ($errors->has('content'))
    					<br><em class="error up">{{ $errors->first('content') }}</em>
    				@endif
    			</td>
    		</tr>

    		{{-- Submit & back buttons. --}}
    		<tr class="transparent noborderpadding">
    			<td></td>
    			<td>
    				<input type="submit" class="button" value="Reply">
    				<a href="{{ url_e('/forum/:board/:thread', ['board' => $board->title, 'thread' => $thread->title]) }}" class="button">
                        Back
                    </a>
    			</td>
    		</tr>
    	</table>
    </form>

@stop
