@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li><a href="{{ url('account') }}">Account</a>
        <li>Create Character
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Account', 'desc' => 'View and edit your account.'])

    <p>Please choose a name and gender for your character. In any case the name must not violate the naming conventions stated in the rules, or your character might get deleted or name locked.</p>

    <form method="POST">
        {{ csrf_field() }}

        <table>
            <tr class="header">
                <th colspan="2">Create Character</th>
            </tr>

            {{-- Name field. --}}
            <tr>
                <th width="20%"><label>Name:</label></th>
                <td>
                    <input type="text" name="name">

                    @if ($errors->has('name'))
                        <em class="error">{{ $errors->first('name') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Gender field (shows the options set in bitaac.character.genders config). --}}
            <tr>
                <th>Gender:</th>
                <td>
                    <?php $first = true; ?>
                    @foreach (config('bitaac.character.create-genders', []) as $gender)
                        <label>
                            <input type="radio" name="gender" value="{{ $gender }}" {{ ($first ? 'checked' : '') }}> {{ gender($gender) }}
                        </label>
                        <?php $first = false; ?>
                    @endforeach

                    @if ($errors->has('gender'))
                        <em class="error">{{ $errors->first('gender') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Vocation field (visibility depends on the pandaac::app.vocations config value). --}}
            <tr>
                <th valign="top">Vocation:</th>
                <td>
                    <table>
                        <tr class="transparent nopadding">
                            <td>
                                <?php $first = true; ?>
                                @foreach (config('bitaac.character.create-vocations') as $vocation)
                                    <label>
                                        <input type="radio" name="vocation" value="{{ $vocation }}" {{ ($first ? 'checked' : '') }}> {{ vocation($vocation) }}
                                    </label>
                                    <?php $first = false; ?>
                                @endforeach
                            </td>
                            <td>
                                @if ($errors->has('vocation'))
                                    <em class="error">{{ $errors->first('vocation') }}</em>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <th valign="top">Town:</th>
                <td>
                    <table>
                        <tr class="transparent nopadding">
                            <td>
                                <?php $first = true; ?>
                                @foreach (config('bitaac.character.create-towns') as $town)
                                    <label>
                                        <input type="radio" name="town" value="{{ $town }}" {{ ($first) ? 'checked' : '' }}>{{ town($town) }}
                                    </label>
                                    <?php $first = false; ?>
                                @endforeach
                            </td>
                            <td>
                                @if ($errors->has('town'))
                                    <em class="error">{{ $errors->first('town') }}</em>
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
                    <input type="submit" class="button" value="Submit">
                    <a class="button" href="{{ url('/account') }}">Back</a>
                </td>
            </tr>
        </table>

    </form>
@endsection
