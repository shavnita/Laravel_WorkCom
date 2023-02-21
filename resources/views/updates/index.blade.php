
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Updates Details') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <a href="{{ route ('updates.create') }}" class="btn btn-primary rounded-pill">Add Accident Update</a>
                <br><br>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Accident #</th>
                            <th>Action Type</th>
                            <th>Remarks</th>
                            <th>User</th>
                            <th>Date Updated</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($updates as $update )
                        <tr>
                            <td>{{ $update->notification->accident_serial_number }} - {{ $update->notification->workman_name }}</td>
                            <td>{{ $update->updatestatus->action_type }}</td>
                            <td>{{ $update->remarks}}</td>
                            <td>{{ $update->username }}</td>
                            <td>{{ $update->update_date }}</td>
                            <td><a href="{{ route('updates.edit', $update) }}" class="btn btn-secondary rounded-pill float-start me-3">Edit</a></td>
                            <td>
                                <form action="{{ route('updates.destroy', $update )}}" method="POST">
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



