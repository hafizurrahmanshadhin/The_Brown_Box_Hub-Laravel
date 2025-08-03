@extends('frontend.app')

@section('title', 'Contact')

@push('styles')
    <style>
        .error-message {
            color: red !important;
            font-size: 0.875em !important;
            margin-top: 0.25em !important;
        }
    </style>
@endpush

@section('content')
    <section class="contact-us" id='Reviews'>
        <div class="my-container">
            <div class="contact-us-header">
                <p data-aos="fade-down">Contact us</p>
                <h2 data-aos="fade-up">Get In touch with our friendly team.</h2>
            </div>

            <div class="contact-us-content">
                <div class="contact-us-content-left" data-aos="fade-right">
                    <h2>Reach out to us today</h2>
                    <p>
                        {!! $systemSettings->description ?? '' !!}
                    </p>

                    <div class="contact-information">
                        <h3>Contact Information</h3>

                        <div class="info-details-wrapper">
                            <div class="info-details">
                                <div class="info-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"
                                        viewBox="0 0 46 46" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M23.0014 1.84958C13.3586 1.84958 5.5293 9.67891 5.5293 19.3217C5.5293 24.1789 7.89263 29.2035 10.9355 33.4023C14.9973 39.0072 20.0734 43.0984 20.1176 43.1343C20.9349 43.7918 21.9524 44.1503 23.0014 44.1503C24.0504 44.1503 25.0679 43.7918 25.8852 43.1343C25.9293 43.0984 31.0054 39.0072 35.0672 33.4023C38.1101 29.2035 40.4735 24.1789 40.4735 19.3217C40.4735 9.67891 32.6441 1.84958 23.0014 1.84958ZM23.0014 3.68875C31.6298 3.68875 38.6343 10.6932 38.6343 19.3217C38.6343 23.8147 36.3924 28.4393 33.5775 32.3227C29.6472 37.7464 24.732 41.7006 24.732 41.7006V41.7016C24.2415 42.0961 23.6309 42.3111 23.0014 42.3111C22.3719 42.3111 21.7613 42.0961 21.2707 41.7016V41.7006C21.2707 41.7006 16.3556 37.7464 12.4253 32.3227C9.61041 28.4393 7.36846 23.8147 7.36846 19.3217C7.36846 10.6932 14.3729 3.68875 23.0014 3.68875Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M23.0009 11.0454C18.4333 11.0454 14.7246 14.7541 14.7246 19.3217C14.7246 23.8892 18.4333 27.5979 23.0009 27.5979C27.5684 27.5979 31.2771 23.8892 31.2771 19.3217C31.2771 14.7541 27.5684 11.0454 23.0009 11.0454ZM23.0009 12.8846C26.5532 12.8846 29.4379 15.7693 29.4379 19.3217C29.4379 22.874 26.5532 25.7587 23.0009 25.7587C19.4485 25.7587 16.5638 22.874 16.5638 19.3217C16.5638 15.7693 19.4485 12.8846 23.0009 12.8846Z"
                                            fill="white" />
                                    </svg>
                                </div>

                                <div class="info-desc">
                                    <h4>Office Address</h4>
                                    <p>{{ $systemSettings->address ?? '' }}</p>
                                </div>
                            </div>

                            <div class="info-details">
                                <div class="info-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"
                                        viewBox="0 0 46 46" fill="none">
                                        <path
                                            d="M32.1969 38.6329H13.8052C8.28771 38.6329 4.60938 35.8742 4.60938 29.4371V16.5629C4.60938 10.1258 8.28771 7.36708 13.8052 7.36708H32.1969C37.7144 7.36708 41.3927 10.1258 41.3927 16.5629V29.4371C41.3927 35.8742 37.7144 38.6329 32.1969 38.6329Z"
                                            stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M32.1983 17.4825L26.4417 22.0804C24.5474 23.5885 21.4392 23.5885 19.5448 22.0804L13.8066 17.4825"
                                            stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <div class="info-desc">
                                    <h4>Email</h4>
                                    <p>{{ $systemSettings->email ?? '' }}</p>
                                </div>
                            </div>

                            <div class="info-details">
                                <div class="info-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"
                                        viewBox="0 0 46 46" fill="none">
                                        <path
                                            d="M40.9621 33.186C40.9318 33.1481 35.1791 27.7085 35.1419 27.6706C34.2996 27.0352 33.2439 26.7509 32.1965 26.8774C31.149 27.0038 30.1913 27.5311 29.5244 28.3485C26.5808 32.0397 19.9136 25.1511 17.2859 20.713C15.901 17.6266 17.8383 16.4238 18.0031 16.2742C20.3067 14.1244 19.5267 11.7271 18.7604 10.7222L13.4995 4.74052C10.1441 1.37899 5.82532 6.99028 5.22598 8.02688C0.194022 15.8824 13.3022 29.7969 14.3437 30.9093C14.9078 31.599 29.5733 46.2204 37.3709 41.3298C38.382 40.787 44.2195 36.6765 40.9621 33.186ZM40.5249 35.8296C40.2538 37.6434 37.6468 39.5594 36.6654 40.1443C29.6678 44.3134 16.2003 30.8279 15.3734 29.99C15.1754 29.7824 1.88169 15.8652 6.38397 8.7752C7.00262 7.81791 9.00685 5.28883 10.8352 5.08192C11.1408 5.04833 11.4501 5.08575 11.7388 5.19126C12.0276 5.29678 12.2881 5.46753 12.5001 5.69022L17.69 11.5905C17.828 11.7767 18.9673 13.4492 17.1024 15.2279C16.0527 15.9452 14.5485 18.0743 16.0527 21.3296C16.6493 22.3716 17.3353 23.3597 18.1031 24.2828C19.8464 26.6012 22.0251 28.5574 24.5172 30.0417C27.6767 31.6452 29.8575 30.221 30.6127 29.1982C32.4645 27.4009 34.0915 28.5982 34.2308 28.7051L39.9566 34.1309C40.1765 34.3507 40.3423 34.6187 40.4409 34.9136C40.5395 35.2085 40.5683 35.5216 40.5249 35.8296Z"
                                            fill="white" />
                                    </svg>
                                </div>

                                <div class="info-desc">
                                    <h4>Phone</h4>
                                    <p>{{ $systemSettings->phone_number ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-us-content-right" data-aos="fade-left">
                    <form class="contact-us-form" id="contactForm">
                        @csrf
                        <div class="form-group-wrapper">
                            <div class="form-group">
                                <input type="text" name="firstName" placeholder="First Name"
                                    value="{{ old('firstName') }}" />
                                <div class="error-message" id="firstNameError"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastName" placeholder="Last Name"
                                    value="{{ old('lastName') }}" />
                                <div class="error-message" id="lastNameError"></div>
                            </div>
                        </div>
                        <input type="text" name="phone_number" placeholder="Phone" value="{{ old('phone_number') }}" />
                        <div class="error-message" id="phoneNumberError"></div>
                        <textarea name="Message" placeholder="Message">{{ old('Message') }}</textarea>
                        <div class="error-message" id="messageError"></div>

                        <button class="btn-common btn--primary" type="submit">Submit</button>
                    </form>
                    <div id="successMessage" style="color: green; display: none;">Your message has been sent successfully!
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Clear previous error messages
            document.getElementById('firstNameError').innerText = '';
            document.getElementById('lastNameError').innerText = '';
            document.getElementById('phoneNumberError').innerText = '';
            document.getElementById('messageError').innerText = '';

            const formData = new FormData(this);

            axios.post('{{ route('contact.store') }}', formData)
                .then(response => {
                    toastr.success('Your message has been sent successfully!');
                    document.getElementById('contactForm').reset();
                })
                .catch(error => {
                    if (error.response && error.response.data.errors) {
                        const errors = error.response.data.errors;
                        if (errors.firstName) {
                            document.getElementById('firstNameError').innerText = errors.firstName[0];
                        }
                        if (errors.lastName) {
                            document.getElementById('lastNameError').innerText = errors.lastName[0];
                        }
                        if (errors.phone_number) {
                            document.getElementById('phoneNumberError').innerText = errors.phone_number[0];
                        }
                        if (errors.Message) {
                            document.getElementById('messageError').innerText = errors.Message[0];
                        }
                        toastr.error('Please fix the errors and try again.');
                    } else {
                        toastr.error('An unexpected error occurred. Please try again later.');
                    }
                });
        });
    </script>
@endpush
