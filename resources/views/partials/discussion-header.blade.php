   <div class="card-header">
       <div class="d-flex justify-content-between">
           <div class="">
               <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}"
                   alt="">
               <strong class="ml-2">{{ $discussion->user->name }}</strong>
           </div>
           <div class="">
               <a href="{{ route('discussion.index') }}" class="btn btn-success btn-very-small">Back</a>
           </div>
       </div>
   </div>
