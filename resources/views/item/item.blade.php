@extends ('layouts.app') 

@section('content')

    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">New </button>
                    </div>
                    

                    <div class="card-body">
                        <div class="alert-success">{{Session::get('message')}}</div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Qty</th>
                            <th scope="col"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php($counter=1)
                                @foreach($items as $item)
                                <tr>
                                    <th scope="row">{{$counter++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary float-left mr-2" href="{{route('item.show', [$item->id])}}">Update</a>
                                        <form action="{{route('item.destroy', [$item->id])}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <button class="btn btn-sm btn-danger delete-confirm" type="submit"  >Delete </button>
                                            
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
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('item.store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name">
                      <small id="emailHelp" class="form-text text-muted">Enter name of the item</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type</label>
                        <input type="text" class="form-control" name="type" aria-describedby="emailHelp" placeholder="Enter type">
                        <small id="emailHelp" class="form-text text-muted">Item type</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">QTY</label>
                        <input type="number" class="form-control" name="qty" aria-describedby="emailHelp" placeholder="Enter Quantity" min="0">
                        <small id="emailHelp" class="form-text text-muted">Item Quantity</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
            </div>
            
        </div>
        </div>
    </div>
@endsection