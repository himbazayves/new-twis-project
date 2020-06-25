<div>
    
    
   
    <div style="margin-top:100px" class="container">
    
    
    
    
    
        <div class="row justify-content-center">
           
    
    
    
    
    
    
    
            <div class="col-md-4">
    
             
                <div class="card">
                    <div class="alert"> Persanal info </div>
    
                    <div class="card-body">
                    
    
         
                    
    
                       
                         
    
                            
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right"> Names</label>
    
                                <div class="col-md-8">
                                <input type="text" class="form-control bg-white @error('username') is-invalid @enderror" name="last_name" value="{{$teacher->name}}" required autocomplete="last_name" autofocus readonly>
    
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Level</label>
    
                                <div class="col-md-8">
                                <input type="text" class="form-control bg-white @error('level') is-invalid @enderror" name="level" value="{{$teacher->level->name}}" required autocomplete="level" autofocus readonly>
    
                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                   
    
                        
    
                     
                    </div>
                </div>
            </div>
    
    
    
         
    
        </div>
    </div>
    @endsection
    


</div>
