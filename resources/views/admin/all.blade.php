<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Tresor Union</title>
        @include('layouts.admindashboardhead')
    </head>
    <body class="menu-position-side menu-side-left full-screen">
        <div class="all-wrapper solid-bg-all">
            
            @include('layouts.admindashboardheader')
            <div class="layout-w">
                @include('layouts.adminmenu')
                                           
                <div class="content-w">    
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h6 class="element-header">All registered accounts </h6>
                                <div class="element-box">
                                    <h5 class="form-header">Accounts Overview</h5>
                                    <div class="form-desc">All registered accounts are displayed here including their last login time. all account details are as well displayed here for accounts updating and others</div>
                                    <div class="table-responsive">
                                        @if(Session::has('message'))
                                            <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show " role="alert">
                                                <strong>{{ Session::get('message') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                                            </div>
                                        @endif
                                        <table id="myTable" width="100%" class="table table-striped table-lightfont">
                                            <thead>
                                                
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Account Number</th>
                                                    <th>Account Balance</th>
                                                    <th>Total Credit</th>
                                                    <th>Total Debit</th>
                                                    <th>Actions</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                @if($users->count() > 0)
                                                    @foreach($users as $user)
                                                    <tr>
                                                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->accountnumber }}</td>
                                                        <td>{{ $user->passbooks->sum('amount') }}</td>
                                                        <td>
                                                            @foreach($credits as $keyUserId => $creditAmount)
                                                                @if($keyUserId == $user->id)
                                                                    {{ $creditAmount }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($debits as $debitUserId => $debitAmount)
                                                                @if($debitUserId == $user->id)
                                                                    {{ $debitAmount }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="{{ route('admin.user.activate', $id =  $user->id) }}">Change Password</a></li>
                                                                    <li><a class="dropdown-item" href="{{ route('admin.user.activate', $id =  $user->id) }}">Change Passportd</a></li>
                                                                    <li><a class="dropdown-item" href="{{ route('admin.user.activate', $id =  $user->id) }}">Add Transaction</a></li>
                                                                    <li><a class="dropdown-item" href="{{ route('admin.user.activate', $id =  $user->id) }}">Change Security Question</a></li>
                                                                    <li><a class="dropdown-item" href="{{ route('admin.user.activate', $id =  $user->id) }}">Send Mail</a></li>
                                                                    @if($user->status !== 'active')
                                                                        <li><a class="dropdown-item" href="{{ route('admin.user.activate', $id =  $user->id) }}">Activate Account</a></li>
                                                                    @else
                                                                        <li><a class="dropdown-item" href="{{ route('admin.user.freeze', $id =  $user->id) }}">Freeze Account</a></li> 
                                                                    @endif
                                                                    
                                                                    <li><a class="dropdown-item" href="{{ route('admin.user.destroy', $id = $user->id ) }}"   onclick="if (confirm('You are about to delete a user, would you like to proceed?')) commentDelete(1); return false  ">Delete Account</a></li>
                                                                </ul>
                                                            </div>

                                                            
  
                                                        </td>
                                                       
                                                    </tr> 
                                                    
                                                    @endforeach
                                              
                                                @endif
                                            
                                                
                                            </tbody>
                                        </table>
                                    </div>
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