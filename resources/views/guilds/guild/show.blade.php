@extends('bitaac::app')

{{-- Page breadcrumbs. --}}
@section('breadcrumbs')
    <li>Community
    <li><a href="{{ url('/guilds') }}">Guilds</a>
    <li>{{ $guild->name }}
@stop

{{-- Page content. --}}
@include('bitaac::partials.heading', ['title' => 'Guilds', 'desc' => 'Information abouts guild on {server}.'])

@section('content')
	<table>
		<tr class="transparent noborderpadding">
			{{-- Left logo field. --}}
			<th valign="middle">
				@if ($guild->bitaac->logo)
					<img src="{{ $guild->logoLink() }}" width="64" height="64">
				@else
					<img src="{{ asset('bitaac/retro-theme/images/guild.gif') }}" width="64" height="64">
				@endif
			</th>

			{{-- Name field. --}}
			<th align="center" valign="middle" width="100%">
				<h1>{{ $guild->name }}</h1>
			</th>

			{{-- Right logo field. --}}
			<th valign="middle">
				@if ($guild->bitaac->logo)
					<img src="{{ $guild->logoLink() }}" width="64" height="64">
				@else
					<img src="{{ asset('bitaac/retro-theme/images/guild.gif') }}" width="64" height="64">
				@endif
			</th>
		</tr>

		{{-- Description field. --}}
		<tr class="transparent noborderpadding">
			<td colspan="3">
				@if ($guild->description)
					<p>{{ nl2br(e(lines($guild->description, 5))) }}</p>
				@endif
			</td>
		</tr>
	</table>

	{{-- Edit & disband guild buttons (leaders & owners only). --}}
	@if ($auth && $hasLeader)
		<table>
			<tr class="transparent noborderpadding">
				<td>
					<a href="{{ URL::current() . '/edit' }}" class="button">Edit</a>
				</td>
				
				{{-- Disbanding guild button (owner only). --}}
				@if ($hasOwner)
					<td align="right">
						<a href="{{ URL::current() . '/disband' }}" class="button">Disband</a>
					</td>
				@endif
			</tr>
		</table>
		<br>
	@endif

	<table>
		<tr class="header">
			<th colspan="4">Members</th>
		</tr>
		<tr>
			<th width="25%">Rank</th>
			<th width="50%">Name</th>
			<th width="9%">Level</th>
			<th>Vocation</th>
		</tr>

		{{-- Ranks. --}}
		<?php $i = 0; ?>
		@foreach ($guild->getRanks as $rank)
			<?php $iteration = $i % 2 == 0 ? 'odd' : 'even'; ?>

			{{-- Rank members. --}}
			@foreach ($rank->getMembers as $k => $member)
				<tr class="{{ $iteration }}">
					{{-- Rank field. --}}
					<td>
						@if ($k == 0)
							{{ $rank->name }}
						@endif
					</td>

					{{-- Character field. --}}
					<td>
						<a href="{{ $member->player->link() }}">{{ $member->player->name }}</a>

						@if ($member->nick)
							({{ $member->nick }})
						@endif
					</td>

					{{-- Level field. --}}
					<td>{{ $member->player->level }}</td>

					{{-- Vocation field. --}}
					<td>{{ vocation($member->player->vocation) }}</td>
				</tr>
			@endforeach

			<?php $i++; ?>
		@endforeach
	</table>

	{{-- Various member buttons. --}}
	@if ($auth and $hasMember)
		<table>
			<tr class="transparent noborderpadding">
				<td>
					{{-- Edit ranks (leaders & owners only). --}}
					@if ($hasViceLeader or $hasOwner or $hasLeader)
						<a href="{{ URL::current() . '/ranks' }}" class="button">Edit Ranks</a>
					@endif

					{{-- Edit members (vice leaders, leaders & owners only). --}}
					@if ($hasViceLeader or $hasOwner or $hasLeader)
						<a href="{{ URL::current() . '/members' }}" class="button">Edit Members</a>
					@endif

					{{-- Leave guild (everyone except the owner). --}}
					@if ($account->getGuildCharactersExpectOwner($guild))
						<a href="{{ URL::current() . '/leave' }}" class="button">Leave Guild</a>
					@endif
				</td>
			</tr>
		</table>
	@endif

	<br>

	{{-- Invites. --}}
	<table>
		<tr class="header">
			<th colspan="3">Invited Characters</th>
		</tr>
		<tr>
			<th width="75%">Name</th>
			<th width="9%">Level</th>
			<th>Vocation</th>
		</tr>

		@forelse ($guild->getInvites as $invite)
			<tr>
				{{-- Name field. --}}
				<td>
                    <a href="{{ $invite->player->link() }}">
                        {{ $invite->player->name }}
                    </a>
                </td>

				{{-- Level field. --}}
				<td>{{ $invite->player->level }}</td>

				{{-- Vocation field. --}}
				<td>{{ vocation($invite->player->vocation) }}</td>
			</tr>
		@empty
			<tr>
				<td colspan="3">There are no invites as of right now.</td>
			</tr>
		@endforelse
	</table>

	@if ($auth and $hasMember or $hasInvite)
		<table>
			<tr class="transparent noborderpadding">
				<td>
					{{-- Join guild button (invitees only). --}}
					@if ($hasInvite)
						<a href="{{ URL::current() . '/join' }}" class="button">Join Guild</a>
					@endif

					{{-- Invite member button (vice leaders, leaders and owners only). --}}
					@if ($hasViceLeader or $hasLeader)
						<a href="{{ URL::current() . '/invite' }}" class="button">Invite Character</a>
					@endif

                    @if ($hasViceLeader or $hasLeader and $guild->getInvites->count() > 0)
                        <a href="{{ URL::current() . '/cancel' }}" class="button">Cancel Invite</a>
                    @endif
				</td>
			</tr>
		</table>
	@endif
@endsection
