<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Accident Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('updates.update', $update)}}" method="POST">
                        @method('PUT')
                        @csrf

                        
                        <div class="row">
                            <div class="col-md-4">
                                <label for="accidentnum">Accident Serial Number :</label>
                            </div>
                            <div class="col-md-8 form-group">                            
                                <select class="form-select" name="accidentnum" required>
                                    @foreach ($accidents as $accident )

                                    <option value="{{ $accident->id }}" @selected($accident->id == $update->notification_id)>{{ $accident->accident_serial_number }} - {{ $accident->workman_name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="actiontype">Action Type :</label>
                            </div>
                            <div class="col-md-8 form-group">
                            <select name="actiontype" class="form-select" required>
                                    @foreach ($actions as $action )
                                        <option value="{{ $action->id }}" @selected($action->id == $update->updatestatus_id)>{{ $action->action_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label for="remarks">Updates on Accident :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea name="remarks" id="remarks" rows="5" placeholder="Remarks" class="form-control" required>{{ $update->remarks }}</textarea>                               
                            </div>
                        </div>

                        <div class="row">                            
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