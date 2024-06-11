@extends('layouts.app')
@section('content')
    <div class="pt-5 text-center">
        <form method="post" action="/import-xml" enctype="multipart/form-data">
            @csrf
            <input type="file" name="xml">
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                               icon="fas fa-lg fa-save"/>
            @error('xml')
            <div style="color: #FF2D20" class="error">{{ $message }}</div>
            @enderror
        </form>
        @if(session('message'))
            <x-adminlte-alert class="m-5" theme="success" title="Success">
                {!! session('success') !!}
            </x-adminlte-alert>
        @endif
        <a class="btn btn-success mt-5" methods="post" href="{{route('export.excel')}}">
            <i class="fas fa-download"></i>
            Download
        </a>
    </div>


@endsection
