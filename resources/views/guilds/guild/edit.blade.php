@extends('bitaac::app')

{{-- Page breadcrumbs. --}}
@section('breadcrumbs')
    <li>Community
    <li><a href="{{ url('/guilds') }}">Guilds</a>
    <li><a href="{{ $guild->link() }}">{{ $guild->name }}</a>
    <li>Edit
@stop

{{-- Page content. --}}
@include('bitaac::partials.heading', ['title' => 'Guilds', 'desc' => ''])

@section('content')
   <p>If you want to change the description of your guild, edit the corresponding field and click on the "Submit" button.</p>

    <form action="" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <table>
            <tr class="header">
                <th colspan="2">Edit Guild</th>
            </tr>

            {{-- Description field. --}}
            <tr>
                <th valign="top" width="20%"><label>Description:</label></th>
                <td>
                    <table>
                        <tr class="transparent nopadding">
                            <td valign="top"><textarea name="description">{{ lines($guild->bitaac->description, 5) }}</textarea></td>
                            <td valign="middle">
                                @if ($errors->has('description'))
                                    <em class="error">{{ $errors->first('description') }}</em>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            {{-- Submit & back buttons. --}}
            <tr class="transparent noborderpadding">
                <th></th>
                <td>
                    <input type="submit" value="Submit" class="button">
                    <a href="{{ $guild->link() }}" class="button">Back</a>
                </td>
            </tr>
        </table>

        <br>

        <p>If you want to change the logo of your guild, enter the path to a 64*64 pixels icon (gif, jpg, jpeg, png) and click on the "Submit" button.</p>

        <table>
            <tr class="header">
                <th colspan="2">Edit Logo</th>
            </tr>

            {{-- Current logo field. --}}
            <tr>
                <th valign="top" width="20%">
                    @if ($guild->bitaac->logo)
                        Logo:
                        <small>(<a href="{{ URL::current() . '/deletelogo' }}">Remove</a>)</small>:
                    @else
                        Logo:
                    @endif
                </th>
                <td>
                    @if ($guild->bitaac->logo)
                        <img src="{{ $guild->logoLink() }}" width="64" height="64">
                    @else
                        <img src="{{ asset('bitaac/retro-theme/images/guild.gif') }}" width="64" height="64">
                    @endif
                </td>
            </tr>

            {{-- Upload new logo field. --}}
            <tr>
                <th>New Logo:</th>
                <td>
                    <input type="file" name="logo"> 

                    @if ($errors->has('logo'))
                        <em class="error">{{ $errors->first('logo') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Submit & back buttons. --}}
            <tr class="transparent noborderpadding">
                <th></th>
                <td>
                    <input type="submit" value="Submit" class="button">
                    <a href="{{ $guild->link() }}" class="button">Back</a>
                </td>
            </tr>
        </table>

    </form>
@endsection
