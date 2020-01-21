@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bot @if(!empty($messageBack)) : {{ $messageBack }} @endif</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="message" placeholder="Message..."
                                       aria-label="Message..." aria-describedby="button-send">
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="submit" id="button-send">Send
                                    </button>
                                </div>
                            </div>
                        </form>

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
