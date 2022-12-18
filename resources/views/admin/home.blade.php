@extends('layouts.admin.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">

            <h1>@lang('site.categories')</h1>
            <ol class="breadcrumb">
                <li><a href="{"> <i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>
                </li>
                <li><i class="fa fa-categories">@lang('site.categories')</i>

            </ol>


        </section>

        <section>
            <h2> hello in admin</h2>
            <h2> hello in admin</h2>
        </section>


    </div>


@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endpush
