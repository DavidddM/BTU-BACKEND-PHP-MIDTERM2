@extends("layout.layout")
@section("content")
    <div style="width: 450px; margin:0 auto;">
        <form  method="post" enctype="multipart/form-data" action="{{route('questions.save')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Question Title</label>
                    <input type="name" class="form-control"  placeholder="Title" name="questionTitle">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Question Content</label>
                    <textarea type="text" class="form-control"  placeholder="Content" name="questionContent"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer 1</label>
                    <input type="name" class="form-control"  placeholder="Answer" name="answer0">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer 2</label>
                    <input type="name" class="form-control"  placeholder="Answer" name="answer1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer 3</label>
                    <input type="name" class="form-control"  placeholder="Answer" name="answer2">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer 4</label>
                    <input type="name" class="form-control"  placeholder="Answer" name="answer3">
                </div>
                <div class="form-group">
                    <label for="correctAnswer">Correct Answer</label>
                    <select name="correctAnswer" name="cars">
                        <option value=0>Answer 1</option>
                        <option value=1>Answer 2</option>
                        <option value=2>Answer 3</option>
                        <option value=3>Answer 4</option>
                    </select>
                </div>
            </div>
            @csrf
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
