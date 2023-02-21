<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Body Location') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('categories.update', $category)}}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <label for="catname">Body Location :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value="{{$category->name}}"
                                    name="catname" placeholder="Body Location" required>
                            </div>
                            
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Save</button>
                                
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
