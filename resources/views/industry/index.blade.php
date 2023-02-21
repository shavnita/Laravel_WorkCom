
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Industry') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <a href="{{ route ('industry.create') }}" 
                class="btn btn-primary rounded-pill">Add New Industry</a>
                <br><br>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($industries as $industry )
                        <tr>
                            <td>{{ $industry->name }}</td>
                            <td><a href="{{ route('industry.edit', $industry) }}" class="btn btn-secondary rounded-pill float-start me-3">Edit</a>
                                <form action="{{ route('industry.destroy', $industry )}}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger rounded-pill">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



