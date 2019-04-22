<div class = "row mt-4">
    <div class = "col-md-12">
        <div class = "card">
            <div class = "card-body">
                <div class = "card-title">
                    <h3>Your Answer</h3>
                </div>
                <hr>
                <form action = " " method = "post">
                    @csrf
                    <div class= "form-group">
                        <textarea class = "form-control" rows = "7" name = "body"><textarea>

                    </div>
                    <div class= "form-group">
                        <button class = "btn btn-lg btn-outline-primary" type = "submit">Submit</button>   
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>