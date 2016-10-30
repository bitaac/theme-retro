@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li>Community
    	<li>High Score
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'High Score', 'desc' => ''])

    <table>
    	<tr class="transparent noborderpadding">
    		<td align="center">
    			<form method="POST">
                    {!! csrf_field() !!}
                    <select name="skill">
                        @foreach ($highscore->getSkills() as $key => $value)
                            <option value="{{ $key }}" {{ ($highscore->getSkillPresentable($skill) == $highscore->getSkillPresentable($key)) ? 'selected': '' }}>
                                {{ $highscore->getSkillPresentable($key) }}
                            </option>
                        @endforeach
                    </select>
                    <select name="vocation">
                        @foreach (config('bitaac.server.vocations') as $key => $value)
                            <option value="{{ $key }}" {{ ($key == $vocation) ? 'selected': '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                        <option value="all" {{ (is_null($vocation)) ? 'selected' : '' }}>Show all</a>
                    </select>
                    <input type="submit" class="button" value="Submit">
    			</form>
    		</td>
    	</tr>
    </table>

    <br>

    <table>
    	<tr class="header">
    		<th colspan="4">High Score</th>
    	</tr>
    	<tr>
    		<th>#</th>
    		@if ($highscore->getSkill() == 'experience')
    			<th width="76%">Name</th>
    			<th width="8%">Level</th>
    			<th width="16%">Experience</th>
    		@else
    			<th width="84%">Name</th>
    			<th width="16%">{{ $highscore->getSkillPresentable() }}</th>
    		@endif
    	</tr>

    	{{-- Characters. --}}
    	@forelse ($pagination = $highscore->getHighscore() as $key => $character)
    		<tr>
                <td>{{{ (++$key) + (($pagination->currentPage() - 1) * $pagination->perPage()) }}}</td>
                <td>
                    <a href="{{ url_e('/character/:name', ['name' => $character->name]) }}">{{ $character->name }}</a>
                    <em style="font-size: 90%; opacity: .5;">(Level {{ $character->level . ' ' . vocation($character->vocation) }})</em>
                </td>
                <td>{{ $character->value }}</td>
                @if ($highscore->getSkill() == 'experience')
                    <td>{{ $character->experience }}</td>
                @endif
    		</tr>
    	@empty
    		<tr>
    			<td colspan="4">There are no ranked characters as of right now.</td>
    		</tr>
    	@endforelse
    </table>

    <table>
		<tr class="transparent noborderpadding">
			<td>
				@if ($previous = $pagination->previousPageUrl())
					<a href="{{ url($previous) }}">Previous</a>
				@endif
			</td>
			<td align="right">
				@if ($next = $pagination->nextPageUrl())
					<a href="{{ url($next) }}">Next</a>
				@endif
			</td>
		</tr>
	</table>
@endsection
