@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CSV Import</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('import_parse') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 {{ $errors->has('csv_file') ? ' has-error' : '' }}">
                            <label for="csv_file" class="col-md-4 col-form-label text-md-end">CSV file to import</label>

                            <div class="col-md-6">
                                <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                                @error('csv_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input" type="checkbox" name="header" checked> File contains header row?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Parse CSV
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-4">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50">
                            <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">First name</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Last name</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    @foreach($customers as $customer)
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                {{ $customer->firstname }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                {{ $customer->lastname }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                {{ $customer->email }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($customers->hasPages())
            <div class="pagination">

                {{ $customers->links() }}

            </div>
            <a href="{{route('customer.excel')}}" class="btn btn-success">Export Excel</a>
            <a href="{{route('customer.csv')}}" class="btn btn-success">Export CSV</a>
        @endif
        </div>
    </div>
</div>
@endsection
