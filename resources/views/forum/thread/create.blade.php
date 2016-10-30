@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li><a href="{{ url('/forum') }}">Forum</a>
    	<li><a href="{{ url_e('/forum/:board', ['board' => $board->title]) }}">{{ $board->title }}</a>
    	<li>Create Thread
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Forum', 'desc' => ''])

    <form method="POST">
        {!! csrf_field() !!}

    	<table>
    		<tr class="header">
    			<th colspan="2">Create thread in {{ $board->title }}</th>
    		</tr>

    		{{-- Title field. --}}
    		<tr>
    			<th width="20%">Title:</th>
    			<td>
    				<input type="text" name="title" value="{{ old('title') }}">

    				@if ($errors->has('title'))
    					<em class="error">{{ $errors->first('title') }}</em>
    				@endif
    			</td>
    		</tr>

    		{{-- Author field. --}}
    		<tr>
    			<th>Author:</th>
    			<td>
    				<select name="author">
                        @foreach ($account->characters as $character)
                            <option value="{{ $character->id }}">
                                {{ $character->name }}
                            </option>
                        @endforeach
                    </select>

    				@if ($errors->has('author'))
    					<em class="error">{{ $errors->first('author') }}</em>
    				@endif
    			</td>
    		</tr>

    		{{-- Content field. --}}
    		<tr>
    			<th valign="top">Content:</th>
    			<td>
    				<textarea name="content" id="reply">{{ old('content') }}</textarea>

    				@if ($errors->has('content'))
    					<br><em class="error up">{{ $errors->first('content') }}</em>
    				@endif
    			</td>
    		</tr>

    		{{-- Submit & back buttons. --}}
    		<tr class="transparent noborderpadding">
    			<td></td>
    			<td>
    				<input type="submit" value="Create" class="button">
    				<a href="{{ url_e('forum/:board', ['board' => $board->title]) }}" class="button">
                        Back
                    </a>
    			</td>
    		</tr>
    	</table>
    </form>
@stop
