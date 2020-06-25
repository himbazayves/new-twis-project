
<div
x-data="{ isUploading: false, progress: 0 }"
x-on:livewire-upload-start="isUploading = true"
x-on:livewire-upload-finish="isUploading = false"
x-on:livewire-upload-error="isUploading = false"
x-on:livewire-upload-progress="progress = $event.detail.progress"
>

<div style="margin-top:100px">
    <div style="margin-top:100px" class="container">




        <div class="row justify-content-center">
            
            <div class="col-md-6">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
             
                <div class="card">
                    <div style="width:100px" x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
     <div class="alert"  wire:loading wire:target="save"> <center> Updating...</center></div>


                    @if ($avatar)
                    <center> 
                      
                       <img style="border-radius: 50%; height:150px;width:150px" src="{{ $avatar->temporaryUrl() }}">
                    </center> 


                    @else

                    
        <?php 
                        
        $path=Auth::user()->avatar;
        
        ?>  <center> 
                      
                    <img style="border-radius: 50%; height:150px;width:150px" src="{{ asset($path)}}">
        </center> 
                      

                   @endif

    
                    <div class="card-body">
                        <form wire:submit.prevent="save">
                         
    
      
                    
    
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Avatar</label>
    
                                <div class="col-md-6">
                                <input type="file" wire:model="avatar" class="form-control @error('avatar') is-invalid @enderror">
    
                                @error('avatar') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
    
                            
    
    
                          
    
                   
    
                        
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="button">
                                       Update<br>
                                    </button>
    
                                 
    
    
                                    
                                </div>
                                
    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





