<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Tresor Crest</title>
        @include('layouts.admindashboardhead')
    </head>
    <body class="menu-position-side menu-side-left full-screen">
        <div class="all-wrapper solid-bg-all">
            
            @include('layouts.admindashboardheader')
            <div class="layout-w">
                @include('layouts.adminmenu')
                                           
                <div class="content-w">
                    <ul class="breadcrumb"><li class="breadcrumb-item"><a href="index.html">Home</a></li><li class="breadcrumb-item"><a href="index.html">Products</a></li><li class="breadcrumb-item"><span>Laptop with retina screen</span></li></ul>    
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h6 class="element-header">Add Transactions</h6>
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        
                                    </div>
                                
                                @endif
                                @if(Session::has('message'))
                                    <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show " role="alert">
                                        <strong>{{ Session::get('message') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                                    </div>
                                @endif
                                <div class="element-box">
                                    <form method="POST" action="{{ route('admin.user.transaction.store') }}">
                                        @csrf
                                        <h5 class="form-header">Transactions</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Account Name</label>
                                                    <input class="form-control" value="{{ $user->firstname }} {{ $user->lastname }}" placeholder="" required="required" type="text" readonly="">
                                                    <input value="{{ $user->id }}"required="required" type="hidden" name="user_id">
                                                    
                                                </div>
                                            </div>       
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Account Number</label>
                                                    <input value="{{ $user->accountnumber }}" class="form-control @error('accountnumber') is-invalid @enderror" accept="image" required="required" type="number" name="accountnumber" readonly="">
                                                    @error('accountnumber') 
                                                        <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                    @enderror
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Date and Time</label>
                                                    <input name="date" class="form-control"  placeholder="yy/mm/dd hr:min:sec"  required="required" type="dateTime-local" >
                                                   
                                                    
                                                </div>
                                            </div>       
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Transaction Type</label>
                                                    <select class="form-control" name="trans_type">
                                                        <option selected disabled>Choose a Transaction type</option>
                                                        <option value="debit">Debit</option>
                                                        <option value="credit">Credit</option>
                                                    </select> 
                                                    @error('trans_type') 
                                                        <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                    @enderror
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Amount</label>
                                                    <input class="form-control" name="amount" placeholder="" required="required" type="text" >
                                                    @error('amount') 
                                                        <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                    @enderror
                                                    
                                                </div>
                                            </div>       
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Transaction Description</label>
                                                    <input class="form-control @error('description') is-invalid @enderror" accept="image" required="required" type="text" name="description">
                                                    @error('description') 
                                                        <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                    @enderror
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" type="submit" name="register">Add Transaction</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>

                            {{-- customizers start --}}
                            @include('layouts.admincustomizers')
                            {{-- customizers end --}}
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="display-type"></div>
        </div>

        @include('layouts.adminscripts')
        
    </body>
</html> 