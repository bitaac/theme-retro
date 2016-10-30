@if (Session::has('success'))
	<div class="success">
		<p>{{{ Session::get('success') }}}</p>
	</div>
@endif

@if (Session::has('error'))
    <div class="errs">
        <ul>
            <li>{{ Session::get('error') }}</li>
        </ul>
    </div>
@endif
