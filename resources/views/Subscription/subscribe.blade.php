@extends('layouts.master')

@section('content')

@include('header.school') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            

  @if(session()->has('message'))
  <div class="alert alert-success message">
      
    <i class="fas fa-check-circle text-success"></i> {{ session()->get('message') }}
    </div>
  @endif



  @if(session()->has('warning'))
  <div class="alert alert-warning ">
      
    <i class="fas fa-check-circle text-success"></i> {{ session()->get('warning') }}
    </div>
  @endif

            <div class="alert alert-success"> New Subcription</div>

            <div class="card ">
              

                <div class="card-body">
                    <form method="POST" action="{{ route('subscription.subscribeHandle') }}">
                        @csrf

           
                        <div class="form-group row">
                            <label for="students" class="col-md-4 col-form-label text-md-right">Plan name</label>

                            <div class="col-md-6">
                                <input id="plan_name" type="text" class="form-control" name="plan_name" value="{{$plan->name}}"  readonly>

                                  
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="plan_price" class="col-md-4 col-form-label text-md-right">Plan price</label>

                            <div class="col-md-6">
                                <input id="plan_price" type="text" class="form-control" name="plan_price" value="{{ $plan->price }}" readonly>

                                  
                            </div>
                        </div>

                        <input id="students" type="hidden" name="plan_id" value="{{ $plan->id }}" >

                        <div class="form-group row">
                            <label for="students" class="col-md-4 col-form-label text-md-right">Number of student</label>

                            <div class="col-md-6">
                                <input id="students" type="number" class="form-control @error('students') is-invalid @enderror" name="students" value="{{ old('students') }}" required autocomplete="students">

                                @error('students')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       


                       

                   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                
                                <button  type="submit" class="">
                               subsribe
                                 </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection