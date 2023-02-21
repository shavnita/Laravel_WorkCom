<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Employer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        
                    @endif

                    <form action="{{route('employer.store')}}" method="POST">
                        
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label for="empname">Employer Name :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value=""
                                    name="empname" placeholder="Employer Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="empaddress">Employer Address :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value=""
                                    name="empaddress" placeholder="Address" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="empindustry">Type of Industry :</label>
                            </div>
                            <div class="col-md-8 form-group">                            
                                <select class="form-select" name="empindustry" required>
                                    @foreach ($industries as $industry )
                                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="empinsurance">Name and address of Insurance Company, if insured against accident to workman</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value=""
                                    name="empinsurance" placeholder="Insurance Company">
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Save</button>
                                <button type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
