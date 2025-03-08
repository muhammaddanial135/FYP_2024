@extends('layout')

@section('title', 'Voter - Soft Voting System')

@section('content')

@php
$admin = session('admin'); // This is just an example variable. In a real application, you would check the actual login status.
@endphp
@if ($admin==null )
<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="288" height="212" viewBox="0 0 866.52362 637.05628" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M971.73819,768.52814v-72.34S999.92985,747.47411,971.73819,768.52814Z" transform="translate(-166.73819 -131.47186)" fill="#f1f1f1"/><path d="M973.47966,768.51541,920.19,719.59417S977.03523,733.5097,973.47966,768.51541Z" transform="translate(-166.73819 -131.47186)" fill="#f1f1f1"/><path d="M743.26636,577.44241a9.09535,9.09535,0,0,1,9.85146-9.872l9.60661-18.431,12.62434,3.10614-13.932,25.83764a9.14461,9.14461,0,0,1-18.15045-.64078Z" transform="translate(-166.73819 -131.47186)" fill="#ffb7b7"/><polygon points="633.871 625.527 623.218 625.526 618.15 584.437 633.873 584.438 633.871 625.527" fill="#ffb7b7"/><path d="M803.32565,767.32462l-34.34883-.00127v-.43446a13.37025,13.37025,0,0,1,13.36952-13.36931h.00085l20.9791.00085Z" transform="translate(-166.73819 -131.47186)" fill="#2f2e41"/><polygon points="719.549 617.569 709.271 620.371 693.57 582.063 708.739 577.927 719.549 617.569" fill="#ffb7b7"/><path d="M891.62477,758.288,858.486,767.32462l-.11432-.41915a13.37025,13.37025,0,0,1,9.38068-16.416l.00082-.00022L887.99322,744.97Z" transform="translate(-166.73819 -131.47186)" fill="#2f2e41"/><polygon points="614.423 448.033 609.109 528.727 620.524 619.261 639.221 613.554 640.009 532.663 654.966 486.018 699.25 610.602 719.521 603.123 702.792 522.232 693.345 446.262 614.423 448.033" fill="#2f2e41"/><path d="M832.82255,437.80621,801.33678,442.449,789.994,453.66711l-3.5219,40.30669,2.18745,35.702-9.11869,62.959s22.93018-12.72919,40.70053,3.20519,42.63547,2.816,43.147-7.784Z" transform="translate(-166.73819 -131.47186)" fill="#cbcbcb"/><path d="M816.83429,488.35732l-.00043-.04526,15.64133-50.984.20211-.01318c1.11327-.07248,27.33679-1.618,33.20236,11.33006l.02836.06246-1.78163,52.983,2.45371,82.97939-48.50061,10.50471-.35252.07678Z" transform="translate(-166.73819 -131.47186)" fill="#2f2e41"/><path d="M799.50072,484.833l2.86926-43.2209c-20.40666,1.2694-20.09926,15.73786-20.07577,16.3687l-.223,64.64973-4.08709,69.1641,14.86038-1.11441Z" transform="translate(-166.73819 -131.47186)" fill="#2f2e41"/><path d="M753.48519,563.47709l18.11738-42.04748L784.248,498.208l6.60212,41.88934-22.9224,34.38352Z" transform="translate(-166.73819 -131.47186)" fill="#2f2e41"/><path d="M828.36,548.00623a9.09534,9.09534,0,0,1,12.32532-6.52638l14.61634-14.77674,11.14617,6.69216L845.51367,553.973A9.14461,9.14461,0,0,1,828.36,548.00623Z" transform="translate(-166.73819 -131.47186)" fill="#ffb7b7"/><path d="M840.65123,536.08544,870.45248,503.393,850.72593,475.2442l2.03043-13.762L864.38293,447.12l.2269.29336c1.23932,1.60372,30.36218,39.43935,31.19784,53.76257.83853,14.37622-41.02087,50.74162-42.80336,52.28232l-.24766.21428Z" transform="translate(-166.73819 -131.47186)" fill="#2f2e41"/><circle cx="647.9164" cy="281.61187" r="21.18132" fill="#ffb7b7"/><path d="M834.57593,396.15035l1.02686-2.06675-5.1669-2.56715s-5.69991-9.27437-16.01412-6.66807-14.95472,4.16612-14.95472,4.16612l-5.15383,2.59323,2.58668,2.57367-4.6404,1.55986,3.10011,1.54028-3.60707,2.07328,1.94177,10.62831s3.22513-8.06117,9.42537-4.98062,17.5414-1.59245,17.5414-1.59245l9.853,19.06862s2.03267-6.6845,5.65681-4.9021C836.17091,417.57661,845.42963,402.83144,834.57593,396.15035Z" transform="translate(-166.73819 -131.47186)" fill="#2f2e41"/><path d="M594.90728,516.06962,272.80489,604.901,166.73819,220.3032l322.10239-88.83134Z" transform="translate(-166.73819 -131.47186)" fill="#fff"/><path d="M594.90728,516.06962,272.80489,604.901,166.73819,220.3032l322.10239-88.83134ZM276.92016,597.65144l310.73759-85.69709-102.93244-373.233-310.7376,85.6971Z" transform="translate(-166.73819 -131.47186)" fill="#f1f1f1"/><path d="M418.744,303.76532l-80.741,22.26726a4.46018,4.46018,0,0,1-5.47917-3.11031l-22.26725-80.74105a4.46017,4.46017,0,0,1,3.11031-5.47917l80.74105-22.26725a4.46016,4.46016,0,0,1,5.47916,3.11031l22.26726,80.74105A4.46016,4.46016,0,0,1,418.744,303.76532ZM313.8406,238.42a2.676,2.676,0,0,0-1.86619,3.2875l22.26726,80.74105a2.676,2.676,0,0,0,3.2875,1.86619l80.741-22.26726a2.676,2.676,0,0,0,1.86619-3.2875l-22.26726-80.741a2.676,2.676,0,0,0-3.2875-1.86619Z" transform="translate(-166.73819 -131.47186)" fill="#e5e5e5"/><path d="M398.2766,320.03913l-80.741,22.26726a4.01409,4.01409,0,0,1-4.93125-2.79928L290.337,258.76606a4.01409,4.01409,0,0,1,2.79928-4.93125l80.741-22.26726a4.01409,4.01409,0,0,1,4.93125,2.79928l22.26726,80.74105A4.01408,4.01408,0,0,1,398.2766,320.03913Z" transform="translate(-166.73819 -131.47186)" fill="#86c647"/><rect x="263.48929" y="361.96862" width="233.72825" height="9.03209" transform="translate(-250.48374 -17.16149) rotate(-15.41811)" fill="#f1f1f1"/><rect x="269.75017" y="384.67055" width="233.72825" height="9.03209" transform="translate(-256.29398 -14.67996) rotate(-15.41811)" fill="#f1f1f1"/><rect x="276.01104" y="407.37248" width="233.72825" height="9.03209" transform="translate(-262.10422 -12.19843) rotate(-15.41811)" fill="#f1f1f1"/><rect x="287.03019" y="447.32789" width="233.72825" height="9.03209" transform="translate(-272.33023 -7.83093) rotate(-15.41811)" fill="#f1f1f1"/><rect x="293.29106" y="470.02982" width="233.72825" height="9.03209" transform="translate(-278.14047 -5.34939) rotate(-15.41811)" fill="#f1f1f1"/><rect x="299.55194" y="492.73176" width="233.72825" height="9.03209" transform="translate(-283.9507 -2.86786) rotate(-15.41811)" fill="#f1f1f1"/><path d="M698.0144,603.61617H363.88724V204.66055H698.0144Z" transform="translate(-166.73819 -131.47186)" fill="#fff"/><path d="M698.0144,603.61617H363.88724V204.66055H698.0144Zm-328.23263-5.89454H692.11986V210.55508H369.78177Z" transform="translate(-166.73819 -131.47186)" fill="#e5e5e5"/><rect x="279.40817" y="244.69464" width="191.03421" height="9.03209" fill="#86c647"/><rect x="279.40817" y="268.17807" width="191.03421" height="9.03209" fill="#86c647"/><rect x="279.40817" y="291.66149" width="191.03421" height="9.03209" fill="#86c647"/><circle cx="263.87741" cy="250.53394" r="5.89453" fill="#86c647"/><rect x="279.40817" y="143.50512" width="191.03421" height="9.03209" fill="#e5e5e5"/><rect x="279.40817" y="166.98855" width="191.03421" height="9.03209" fill="#e5e5e5"/><rect x="279.40817" y="190.47198" width="191.03421" height="9.03209" fill="#e5e5e5"/><circle cx="263.87741" cy="148.36201" r="5.89453" fill="#e5e5e5"/><rect x="279.40817" y="346.86657" width="191.03421" height="9.03209" fill="#e5e5e5"/><rect x="279.40817" y="370.35" width="191.03421" height="9.03209" fill="#e5e5e5"/><rect x="279.40817" y="393.83343" width="191.03421" height="9.03209" fill="#e5e5e5"/><circle cx="263.87741" cy="351.72346" r="5.89453" fill="#e5e5e5"/><circle cx="515.67691" cy="438.20509" r="68.29339" fill="#86c647"/><path d="M701.33633,565.32032V552.25311a18.92123,18.92123,0,1,0-37.84245,0v13.06721a9.83809,9.83809,0,0,0-9.39555,9.82325v30.87926h56.63355V575.14357A9.83809,9.83809,0,0,0,701.33633,565.32032ZM682.4151,539.99384a12.27276,12.27276,0,0,1,12.25846,12.25927v13.04444H670.15665V552.25311A12.27275,12.27275,0,0,1,682.4151,539.99384Z" transform="translate(-166.73819 -131.47186)" fill="#fff"/><path d="M687.50571,580.56948a5.09061,5.09061,0,1,0-7.95433,4.207v11.065H685.278v-11.065A5.08421,5.08421,0,0,0,687.50571,580.56948Z" transform="translate(-166.73819 -131.47186)" fill="#86c647"/><path d="M1032.26181,768.12193h-381a1,1,0,0,1,0-2h381a1,1,0,0,1,0,2Z" transform="translate(-166.73819 -131.47186)" fill="#cbcbcb"/></svg>

<div>please login to access this feature</div>
@else
<div class="container2">
    <h1>Create Election</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST"   action="{{ url('/') }}/election-store">
        @csrf
        <div class="form-group">
            <label for="election_name">Election Name:</label>
            <input type="text" id="election_name" name="election_name" value="{{ old('election_name') }}" required>
            @error('election_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div id="candidates-container" class="form-group">
            <label for="candidates[]">Candidates:</label>
            <input type="text" id="candidates_0" name="candidates[]" value="{{ old('candidates.0') }}" required>
            @error('candidates.*')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="button" onclick="addCandidateField()">Add Another Candidate</button>
        {{-- <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" id="start_time" name="start_time" value="{{ old('start_time') }}" required>
            @error('start_time')
                <div class="error">{{ $message }}</div>
            @enderror
        </div> --}}
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" id="start_time" name="start_time" value="{{ old('start_time') }}" min="{{ date('Y-m-d\TH:i') }}" required>
            @error('start_time')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="constituency">Constituency:</label>
            <input type="text" id="constituency" name="constituency" value="{{ old('constituency') }}" required>
            @error('constituency')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-buttons">
            <button type="submit">Create Election</button>
        </div>
    </form>
</div>

<script>
    let candidateIndex = 1;

    function addCandidateField() {
        const container = document.getElementById('candidates-container');
        const newCandidate = document.createElement('div');
        newCandidate.innerHTML = `<input type="text" id="candidates_${candidateIndex}" name="candidates[]" required>`;
        container.appendChild(newCandidate);
        candidateIndex++;
    }
    document.addEventListener('DOMContentLoaded', function() {
        const startTimeInput = document.getElementById('start_time');

        startTimeInput.addEventListener('input', function() {
            const selectedDate = new Date(startTimeInput.value);
            const today = new Date();

            if (selectedDate < today) {
                startTimeInput.setCustomValidity('Please select a date and time after the current date and time.');
            } else {
                startTimeInput.setCustomValidity('');
            }
        });
    });
</script>
@endif
   
@endsection
