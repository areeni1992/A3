@extends('layouts.app')

@section('content')
    <section>
        <header>
            <!-- Start header Title -->

            <div class="title-header" style="background-image: url({{ config('app.url').'/storage/images/'.$careerData->background }}) !important;">
                <div class="container h-100 d-flex flex-column justify-content-center">
                    <h3 class="fw-bold">{{ $careerData->translate(app()->getLocale())->page_title ?? '' }}</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ config('app.url') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $careerData->translate(app()->getLocale())->page_title ?? '' }}</li>
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
                    <h5 class="h5-color text-center">{{ $careerData->translate(app()->getLocale())->page_title ?? '' }}</h5>
                    <div class="row">
                        {!! $careerData->translate(app()->getLocale())->desc ?? '' !!}
                    </div>

                </div>

                <form action="{{ route('requestCareer') }}" method="POST" class="row" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <input type="date" name="start_date" value="{{ old('start_date') }}" placeholder="Date" class="form-control mb-3 border-0 shadow-sm p-3" id="date">
                        @error('start_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="date" name="end_date" value="{{ old('end_date') }}" placeholder="Date" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('end_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="position" value="{{ old('position') }}" placeholder="{{__('words.Desired Position')}}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('position')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('words.Name') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="age" value="{{ old('age') }}" placeholder="{{ __('words.age') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('age')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="gender" value="{{ old('gender') }}" placeholder="{{ __('words.gender') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="nationality" value="{{ old('nationality') }}" placeholder="{{ __('words.nationality') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('nationality')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="educational_background" value="{{ old('educational_background') }}" placeholder="{{ __('words.Educational Background') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('educational_background')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="date_of_barth" value="{{ old('date_of_barth') }}" placeholder="{{ __('words.Date Of Birth') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('date_of_barth')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="visa_status" value="{{ old('visa_status') }}" placeholder="{{ __('words.Visa Status') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('visa_status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.0') }}" placeholder="{{ __('words.Do You Have Experience Using Any Software For Work Purposes ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.0'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.0') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.1') }}" placeholder="{{ __('words.List All Software You Have Used That is Related To This Position .') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.1'))
                        <div class="alert alert-danger">{{ $errors->first('general_questions.1') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.2') }}" placeholder="{{ __('words.Are You Able To Communicate ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.2'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.2') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.3') }}" placeholder="{{ __('words.Do You Have A Valid Driver License ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.3'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.3') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.5') }}" placeholder="{{ __('words.Mention Two Or Three Projects / Deals / Work Experience You Have Worked On That Are Relevant To This Position') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.5'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.5') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.6') }}" placeholder="{{ __('words.Can You Provide A Sample Of Your Work ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.6'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.6') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.7') }}" placeholder="{{ __('words.Why Did You Applay For This Position ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.7'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.7') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.8') }}" placeholder="{{ __('words.Why Would You Like To Work With Our Company ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.8'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.8') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.9') }}" placeholder="{{ __('words.How Does This Position Fit In With Your Long - Term Goals ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.9'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.9') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.10') }}" placeholder="{{ __('words.Will You Be Willing To Work Over Time From Time To Time ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.10'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.10') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.11') }}" placeholder="{{ __('words.Where Can You See Yourself In 3 Years ? 5 Years ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.11'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.11') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.12') }}" placeholder="{{ __('words.Prior Experience Releted To Work . Please Include The Number Of Years ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.12'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.12') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
              <textarea  name="general_questions[]" placeholder="{{ __('words.From 1-10 ( Where 1 Is The Lowest And 10 Is The Highest ) , How Will You Rate Your English Proficiency ?
Can You Read And Write In English Arabic ? What Other Languages Do You Speak ?') }}" type="text" class="form-control mb-3 border-0 shadow-sm p-3" rows="2">{{ old('general_questions.13') }}</textarea>
                        @if ($errors->has('general_questions.13'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.13') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input  name="general_questions[]" value="{{ old('general_questions.14') }}" type="text" placeholder="{{ __('words.What Can You Do To Utilize Skills And Help Company ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.14'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.14') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.15') }}" placeholder="{{ __('words.What Are You Expecting From The Company ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.15'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.15') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.16') }}" placeholder="{{ __('words.How Do You Manage Your Time ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.16'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.16') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.17') }}" placeholder="{{ __('words.What Is Your Status In Working With Team ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.17'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.17') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.18') }}" placeholder="{{ __('words.Are You Interested To Sports ? Which Sports Activities Do You Practice ? How Can It Be Relevant To Your Work?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.18'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.18') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.19') }}" placeholder="{{ __('words.What Do You Think Are Your Job Responsibilities At Work ? Give At Least 5') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.19'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.19') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="general_questions[]" value="{{ old('general_questions.20') }}" placeholder="{{ __('words.What Is Your Advantage Among Other Applicants ? Why Should We Hire You ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('general_questions.20'))
                            <div class="alert alert-danger">{{ $errors->first('general_questions.20') }}</div>
                        @endif
                    </div>

                    <!-- Employment Terms Questions  -->
                    <h2 class="fw-bold my-4">{{ __('words.Employment Terms Questions') }}</h2>
                    <div class="col-md-12">
                        <input type="text" name="employment_questions[]" value="{{ old('employment_questions.0') }}" placeholder="{{ __('words.Are You Interester In Full - Time Employment , Part - Time Or Either ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('employment_questions.0'))
                            <div class="alert alert-danger">{{ $errors->first('employment_questions.0') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[]" value="{{ old('employment_questions.1') }}" placeholder="{{ __('words.when is The Earliest You Can Start Working With Us ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('employment_questions.1'))
                            <div class="alert alert-danger">{{ $errors->first('employment_questions.1') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[]" value="{{ old('employment_questions.2') }}" placeholder="{{ __('words.If You are Currently Working  How Much Notice Do You Need To Give To Your Employer ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('employment_questions.2'))
                            <div class="alert alert-danger">{{ $errors->first('employment_questions.2') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[]" value="{{ old('employment_questions.3') }}" placeholder="{{ __('words.What Are Your Salary Expectations ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('employment_questions.3'))
                            <div class="alert alert-danger">{{ $errors->first('employment_questions.3') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[]" value="{{ old('employment_questions.4') }}" placeholder="{{ __('words.Are You Willing To Relocate ? If So , When Would You Be Available ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('employment_questions.4'))
                            <div class="alert alert-danger">{{ $errors->first('employment_questions.4') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="employment_questions[]" value="{{ old('employment_questions.5') }}" placeholder="{{ __('words.Are You Willing To Undertake A Drug Test As Part Of This Hiring Process ?') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                        @if ($errors->has('employment_questions.5'))
                            <div class="alert alert-danger">{{ $errors->first('employment_questions.5') }}</div>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input type="file" name="attachment" class="form-control mb-3 border-0 shadow-sm">
                        {{ old('attachment') }}
                        @if ($errors->has('attachment'))
                            <div class="alert alert-danger">{{ $errors->first('attachment') }}</div>
                        @endif
                    </div>

                    <!-- Privacy Policy -->
                    <div class="col-md-12 mt-5">
                        <div class="form-check">
                            <input class="form-check-input" name="ok" type="checkbox" value="false" id="read">
                            <label class="form-check-label fw-bold label" for="read">
                                {{ __('words.I Hereby That Above Information Is True And My Utmost Knowleedge .') }}
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
