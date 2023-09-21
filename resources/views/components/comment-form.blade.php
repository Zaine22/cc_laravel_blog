 @props(["blog"])
 <form
     action="/blogs/{{ $blog->slug }}/comments"
     method="POST"
 >
     @csrf
     <div class="mb-3">

         <textarea
             required
             name="body"
             class="form-control border border-0"
             cols="10"
             rows="5"
             placeholder="Say Something"
         ></textarea>
         <x-error name="body" />
         <div class="d-flex justify-content-end my-3">
             <button
                 type="submit"
                 class="btn btn-primary"
             >Submit</button>
         </div>
 </form>
