@extends('admin.layouts.app')
@section('title', 'Custom send SMS page')
@push('styles')
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')

    @php
        use App\Models\SmsLog;

        $totalSms = config('sms.total_sms_limit'); // Get limit from config
        $totalSendSms = SmsLog::sum('total_message'); // Total sent SMS (all)
        $totalSentSms = SmsLog::where('delivery_report', 'success')->sum('total_message'); // Successfully sent SMS
        $remainingSms = max(0, $totalSms - $totalSentSms); // Ensure remaining SMS is never negative
    @endphp


    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">

                <div class="button-demo">
                    <a href="{{ route('mobile.sms') }}"
                        class="btn btn-raised btn-primary waves-effect text-white text-uppercase active open">Send SMS</a>
                    <a href="{{ route('custom.sms') }}"
                        class="btn btn-raised btn-primary waves-effect text-white text-uppercase">Custom SMS</a>
                    <a href="{{ route('sms_report.sms') }}"
                        class="btn  btn-raised btn-primary waves-effect text-white text-uppercase">SMS Report</a>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h4 style="display: inline-block"> Custom SMS</h4>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="card-body">

                        <blockquote class="form-head">

                            <!--h4>Send Custom SMS</h4-->

                            <ol style="font-size: 14px; margin-bottom: 0;">
                                <li>Total SMS: <strong>2500</strong> &nbsp; Total Send SMS:
                                    <strong>{{ $totalSendSms }}</strong> &nbsp;
                                    {{-- Remaining SMS: <strong>{{ $remainingSms }}</strong> --}}
                                </li>
                            </ol>

                        </blockquote>
                        <hr>

                        <form action="{{ route('send.custom_sms') }}" method="POST">
                            @csrf

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 form-control-label">
                                    <label for="mobile_numbers"><b>Mobile Number <span
                                                style="color:red">*</span></b></label>
                                </div>
                                <div class="col-lg-9 col-md-4">
                                    <div class="form-group">
                                        <div class="form-line access_info">
                                            <textarea id="mobile_numbers" class="form-control" rows="4" name="mobile_numbers"
                                                placeholder="Without +88 And use Comma(,) Separator"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 form-control-label">
                                    <label for="message"><b>Message <span style="color:red">*</span></b></label>
                                </div>
                                <div class="col-lg-9 col-md-4">
                                    <div class="form-group">
                                        <div class="form-line access_info">
                                            <textarea id="message" class="form-control" rows="4" name="message"
                                                placeholder="Type your message, Maximum Characters Length 1080"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix">
                                <p style="float: right" class="mb-3">
                                    <span>
                                        <strong>Total Characters:</strong>
                                        <input id="total_characters" name="total_characters" class="sms" type="text"
                                            value="0" readonly>
                                    </span>
                                    &nbsp;

                                    <span>
                                        <strong>Total Messages:</strong>
                                        <input id="total_messages" name="total_messages" class="sms" type="text"
                                            value="1" readonly>
                                    </span>
                                    &nbsp;

                                    <span>
                                        <strong>Total Numbers:</strong>
                                        <input id="total_numbers" name="total_numbers" class="sms" type="text"
                                            value="0" readonly>
                                    </span>
                                </p>
                            </div>
                            <div id="message_limit_warning" class="text-danger" style="text-align: right; display: none;">
                                Maximum character limit (1080) reached.
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-8">
                                    <button type="submit"
                                        class="btn btn-primary btn-lg custom_btn text-white text-uppercase text-bold right">SEND
                                        SMS</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('scripts')
    <script>
    $(document).ready(function () {

        function calculateSmsParts(message) {
            let totalCharacters = message.length;
            let maxLength = 1080;

            // Determine if message contains non-ASCII (i.e., Unicode like Bangla)
            let isUnicode = /[^\x00-\x7F]/.test(message);

            // Define character limit per SMS
            let singleLimit = isUnicode ? 70 : 160;
            let multiLimit = isUnicode ? 67 : 153;

            // Enforce max length
            if (totalCharacters > maxLength) {
                message = message.substring(0, maxLength);
                $("#message").val(message);
                totalCharacters = maxLength;
            }

            // Calculate SMS parts
            let totalParts = totalCharacters <= singleLimit ? 1 : Math.ceil(totalCharacters / multiLimit);

            return { totalCharacters, totalParts };
        }

        function updateCharacterCount() {
            let message = $("#message").val();
            let result = calculateSmsParts(message);

            $("#total_characters").val(result.totalCharacters);
            $("#total_messages").val(result.totalParts);

            if (result.totalCharacters >= 1080) {
                $("#message_limit_warning").show();
            } else {
                $("#message_limit_warning").hide();
            }
        }

        function updateTotalNumbers() {
            let numbers = $("#mobile_numbers").val();
            let numberList = numbers.replace(/\s+/g, '').split(',').filter(n => n.trim() !== "");
            $("#total_numbers").val(numberList.length);
        }

        // Event Bindings
        $("#message").on("input", updateCharacterCount);
        $("#mobile_numbers").on("input", updateTotalNumbers);

        // Initialize on load
        updateCharacterCount();
        updateTotalNumbers();
    });
</script>

@endpush
