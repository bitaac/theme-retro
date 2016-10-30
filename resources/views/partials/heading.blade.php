@section('heading')
	@if (isset($title))
		<table class="heading">
			<tr class="transparent nopadding">
				<td width="50%" valign="middle"><h1>{{ $title }}</h1></td>
				<td valign="middle">
					@if (isset($desc))
						{!! $desc !!}
					@endif
				</td>
			</tr>
		</table>
	@endif
@stop