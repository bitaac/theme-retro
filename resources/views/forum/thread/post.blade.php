
<?php $group = config('bitaac.server.groups')[$post->player->group_id]; ?>

<tr class="{{ $oddeven }} {{ ($post->player->group_id > 3) ? 'forum-post-gamemaster-top' : '' }}">
	<td width="20%" valign="top">
		@if (isset($i))
			<a name="{{ $i }}"></a>
		@endif

		{{-- Author name field. --}}
		<a href="{{ url_e('/character/:name', ['name' => $post->player->name]) }}">{{ $post->player->name }}</a>

		<br>

		@if (isset($group))
			<small>{{ $group['presentable'] }}</small><br>
			@if ($group['image'] != false)
				<img src="{{ asset('bitaac/retro-theme/images/'.$group['image']) }}"><br>
			@endif
		@endif

		<br>

		<small>
			{{-- Author vocation field. --}}
			<strong>Vocation</strong> {{ vocation($post->player->vocation) }}<br>

			{{-- Author level field. --}}
			<strong>Level</strong> {{ $post->player->level }}<br>

			{{-- Author posts field. --}}
			<strong>Posts</strong> {{ $post->player->posts() }}

			{{-- Author guild field. --}}
			{{-- @if ($post->player->guild)
				<br><br>

				{{ trans_choice('pandaac::forum.thread.field.membership', (int) (bool) $post->player->nick, [
					'rank'	 => $post->player->guild->rank->name,
					'guild'	 => $post->player->guild->name,
					'nick'	 => $post->player->nick,
					'link'	 => slug('guild', $post->player->guild->name)
				]) }}
			@endif --}}
		</small>
	</td>
	<td valign="top" class="forum-post-content">
		{{-- Post content field. --}}
		<div class="post-content" style="width:720px;word-wrap: break-word;">
			{!! strip_tags($post->content, '<p><h1><h2><strong><em><b><i><ul><ol><li><u><strike><hr><br><a><img>') !!}
		</div>
	</td>
</tr>

<tr class="{{ $oddeven }} forum-post-footer {{ ($post->player->group_id > 3) ? 'forum-post-gamemaster-bot' : '' }}">
	{{-- Post date field. --}}
	<td>
		<small>
			<abbr title="{{ date('M d Y, H:i:s T', strtotime($post->created_at)) }}">{{ ago(strtotime($post->created_at)) }}</abbr>

			@if ($post->edited_at)
				<br><strong>Edited</strong>
				<abbr title="{{ date('M d Y, H:i:s T', strtotime($post->updated_at)) }}">{{ ago(strtotime($post->updated_at)) }}</abbr>
			@endif
		</small>
	</td>

	{{-- Post buttons. --}}
	<td align="right">
		<small>
			{{-- @if (Auth::check() and $post->player->account->id === Auth::id())
				<a href="{{ slug('forum/post', $post->id, 'edit') }}">{{ lang('pandaac::forum.thread.button.edit') }}</a> &ndash;
			@endif--}}

			@if (auth()->check() && auth()->user()->isAdmin())
				<a href="{{ $post->hotlink($thread, $i) }}">Delete</a> &ndash;
			@endif

			@if (isset($i))
				<a href="{{ $post->hotlink($thread, $i) }}">#{{ $i }}</a>
			@endif
		</small>
	</td>
</tr>
