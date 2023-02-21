
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accident Notification Details') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <a href="{{ route ('notification.create') }}" class="btn btn-primary rounded-pill">Add New Accident</a>
                <br><br>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Workman Name</th>
                            <th>Employer</th>
                            <th>Accident Place</th>
                            <th>Accident Agency</th>
                            <th>Injury Nature</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($notifications as $notification )
                        <tr>
                            <td>{{ $notification->workman_name }}</td>
                            <td>{{ $notification->employer->emp_name }}</td>
                            <td>{{ $notification->accidentplace->acc_place }}</td>
                            <td>{{ $notification->accident->acc_agency }}</td>
                            <td>{{ $notification->injury->inj_nature }}</td>
                            <td><a href="{{ route('notification.show', $notification) }}" class="btn btn-secondary rounded-pill float-start me-3">View</a></td>
                            <td><a href="{{ route('notification.edit', $notification) }}" class="btn btn-secondary rounded-pill float-start me-3">Edit</a></td>
                            <td>
                                <form action="{{ route('notification.destroy', $notification )}}" method="POST">
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



