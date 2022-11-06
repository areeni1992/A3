@extends('layouts.app')

@section('content')
    <section>
        <header>
            <!-- Start header Title -->
            <div class="title-header" style="background-image: url({{ config('app.url').'/storage/images/'.$careerData->background }}) !important;">
                <div class="container h-100 d-flex flex-column justify-content-center">
                    <h3 class="fw-bold">{{ $careerData->translate(app()->getLocale())->page_title }}</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ config('app.url') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $careerData->translate(app()->getLocale())->page_title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End header Title -->
        </header>
    </section>

    <!-- Start Form Input -->
    <section>
        <div class="message my-5">
            <div class="container">
                <div class="mb-4">
                    <h5 class="h5-color text-center">{{ $careerData->translate(app()->getLocale())->page_title }}</h5>
                    <div class="row">
                        {!! $careerData->translate(app()->getLocale())->desc !!}
                    </div>

                </div>

                <form action="{{ route('requestCareer') }}" method="POST" class="row" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <input type="date" name="start_date" placeholder="Date" class="form-control mb-3 border-0 shadow-sm p-3" id="date">
                        @error('start_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="date" name="end_date" placeholder="Date" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('end_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="position" placeholder="Desired Position" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('position')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="Name" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="age" placeholder="Age" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('age')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="gender" placeholder="Gender" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="nationality" placeholder="Nationality" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('nationality')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="educational_background" placeholder="Educational Background" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('educational_background')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="date_of_barth" placeholder="Date Of Birth" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('date_of_barth')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="visa_status" placeholder="Visa Status" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('visa_status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[a]" placeholder="Do You Have Experience Using Any Software For Work Purposes ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[b]" placeholder="List All Software You Have Used That's Related To This Position ." class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[c]" placeholder="Are You Able To Communicate ? " class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*c')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[d]" placeholder="Do You Have A Valid Driver's License ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*d')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[e]" placeholder="Do You Have A Valid Driver's License ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*e')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[f]" placeholder="Mention Two Or Three Projects / Deals / Work Experience You Have Worked On That Are Relevant To This Position" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*f')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[j]" placeholder="Can You Provide A Sample Of Your Work ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*j')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[h]" placeholder="Why Did You Applay For This Position ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*h')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[i]" placeholder="Why Would You Like To Work With Our Company ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*i')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[g]" placeholder="How Does This Position Fit In With Your Long - Term Goals ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*g')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[k]" placeholder="Will You Be Willing To Work Over Time From Time To Time ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*k')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[l]" placeholder="Where Can You See Yourself In 3 Years ? 5 Years ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*l')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[m]" placeholder="Prior Experience Releted To Work . Please Include The Number Of Years ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*m')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
              <textarea  name="general_questions[n]" placeholder="From 1-10 ( Where 1 Is The Lowest And 10 Is The Highest ) , How Will You Rate Your English Proficiency ?
Can You Read And Write In English Arabic ? What Other Languages Do You Speak ?" type="text" class="form-control mb-3 border-0 shadow-sm p-3" rows="2"></textarea>
                        @error('general_questions.*n')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input  name="general_questions[o]" type="text" placeholder="What Can You Do To Utilize Skills And Help Company ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*o')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[p]" placeholder="What Are You Expecting From The Company ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*p')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[q]" placeholder="How Do You Manage Your Time ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*q')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[r]" placeholder="What Is Your Status In Working With Team ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*r')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[s]"placeholder="Are You Interested To Sports ? Which Sports Activities Do You Practice ? How Can It Be Relevant To Your Work?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*s')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[t]" placeholder="What Do You Think Are Your Job Responsibilities At Work ? Give At Least 5" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*t')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[u]" placeholder="What Is Your Advantage Among Other Applicants ? Why Should We Hire You ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('general_questions.*u')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Employment Terms Questions  -->
                    <h2 class="fw-bold my-4">Employment Terms Questions</h2>
                    <div class="col-md-12">
                        <input type="text" name="employment_questions[a]" placeholder="Are You Interester In Full - Time Employment , Part - Time Or Either ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('employment_questions')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[b]" placeholder="when's The Earliest You Can Start Working With Us ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('employment_questions.*')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[c]" placeholder="If You're Currently Working , How Much Notice Do You Need To Give To Your Employer ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('employment_questions.*c')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[d]" placeholder="What Are Your Salary Expectations ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('employment_questions.*d')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[e]" placeholder="Are You Willing To Relocate ? If So , When Would You Be Available ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('employment_questions.*e')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[f]" placeholder="Are You Willing To Undertake A Drug Test As Part Of This Hiring Process ?" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('employment_questions.*f')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="file" name="attachment" class="form-control mb-3 border-0 shadow-sm">
                        @error('attachment')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Privacy Policy -->
                    <div class="col-md-12 mt-5">
                        <div class="form-check">
                            <input class="form-check-input" name="ok" type="checkbox" value="false" id="read">
                            <label class="form-check-label fw-bold label" for="read">
                                I Hereby That Above Information Is True And My Utmost
                                Knowleedge .
                            </label>
                        </div>
                        @error('ok')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button onclick="this.parentElement.style.display = 'none';" type="button" id="closeMessage" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="col-lg-12 text-center mt-5">
                        <input type="submit" value="Submit" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Form Input -->


    <!-- Start Contact Info -->
    <section>
        <div class="contact-info mt-5">
            <div class="container text-center">
                <div class="row mt-4">
                    <div class="col-md-4 p-0">
                        <div class="info rounded-2 d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-telephone-fill fs-4"></i>
                            <h5 class="fw-bold">Telephone</h5>
                            <p>{{ $settings['telephone'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="email rounded-3 d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-envelope-fill fs-4"></i>
                            <h5>Email</h5>
                            <p>{{ $settings['email'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="info rounded-2 d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-whatsapp fs-4"></i>
                            <h5 class="fw-bold">WhatsApp</h5>
                            <p>{{ $settings['whatsapp'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info -->
@endsection
