@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li>Community
        <li>FAQ
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'FAQ', 'desc' => ''])

    <table>
        <tr class="header">
            <th colspan="3">General Information</th>
        </tr>

        <tr>
            <td width="20%">Skill rate</td>
            <td>{{ config_lua('rateSkill') }}x</td>
        </tr>

        <tr>
            <td>Magic rate</td>
            <td>{{ config_lua('rateMagic') }}x</td>
        </tr>

        <tr>
            <td>Loot rate</td>
            <td>{{ config_lua('rateLoot') }}x</td>
        </tr>

        <tr>
            <td>Protection Level</td>
            <td>{{ config_lua('protectionLevel') }}</td>
        </tr>

        <tr class="header">
            <th colspan="3">Frags</th>
        </tr>

        <tr>
            <td width="20%">Red skull</td>
            <td>{{ config_lua('killsToRedSkull') }} frags</td>
        </tr>

        <tr>
            <td width="20%">Black skull</td>
            <td>{{ config_lua('killsToBlackSkull') }} frags</td>
        </tr>
    </table>
@endsection
