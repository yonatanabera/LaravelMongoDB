@extends ('layouts.app') 

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h4>Edit Item</h4>
                    </div>
                    

                    <div class="card-body">
                        <form method="post" action="{{route('item.update', $item->id)}}">
                            <input type="hidden" name="_method" value="put" >
                            @csrf
                            <div class="form-group">
                                
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" name="name" value="{{$item->name}}" aria-describedby="emailHelp" placeholder="Enter name">
                              <small id="emailHelp" class="form-text text-muted">Enter name of the item</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <input type="text" class="form-control" name="type" value="{{$item->type}}" aria-describedby="emailHelp" placeholder="Enter type">
                                <small id="emailHelp" class="form-text text-muted">Item type</small>
                            </div>
        
                            <div class="form-group">
                                <label for="exampleInputEmail1">QTY</label>
                                <input type="number" class="form-control" name="qty" value="{{$item->qty}}" aria-describedby="emailHelp" placeholder="Enter Quantity" min="0">
                                <small id="emailHelp" class="form-text text-muted">Item Quantity</small>
                            </div>
                            <div class="modal-footer">
                               
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
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
                
            </div>
            
        </div>
        </div>
    </div>
@endsection