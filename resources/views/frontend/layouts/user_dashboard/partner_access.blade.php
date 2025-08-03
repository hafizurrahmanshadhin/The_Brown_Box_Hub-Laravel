@extends('frontend.user_dashboard')

@section('title', 'Partner Access')

@section('content')
    <section class="custom-content">
        <form class="form-container">
            <div class="form-section-wrapper">
                <div class="form-group-wrapper">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" placeholder="Jon" />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" placeholder="Smith " />
                    </div>
                </div>
                <div class="form-group-wrapper">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" placeholder="jonsmith@gmail.com" />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="email" placeholder="+8801" />
                    </div>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn-common btn--primary">
                        Access
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
