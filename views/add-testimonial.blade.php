@extends('base')

@section('browsertitle')
    Acme: Add Testimonial
@stop

@section('content')
<div class="row">
    <div class="col-md-2">

    </div>

    <div class="col-md-8">

        <h1>Add Testimonial</h1>

        <form name="testimonialform" id="testimonialform" action="/add-testimonial" method="post" class="form-horizontal">

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control required" id="title" name="title" placeholder="Title">
                </div>
            </div>
        
            <div class="form-group">
                <label for="testimonial" class="col-sm-2 control-label">Testimonial</label>
                <div class="col-sm-10">
                    <textarea class="form-control required" id="testimonial"  name="testimonial"></textarea>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        
        </form>

    </div>

    <div class="col-md-2">
    </div>

</div>
@stop

@section('bottomjs')
<script>
    // $(document).ready(function(){
    //     $("#testimonialform").validate();
    // });
</script>
@stop