<div class="form-container">
    <div class="form-header">
        <h3 class="form-title">Get in touch with the Wealthman team:</h3>
    </div>
    <div class="form-item feedback-height">

        @if(isset($ajax))
            <form class="js-feedback-form" action="{{route('feedback.send')}}" method="post" data-type="json">
        @else
            <form>
        @endif
            <div class="form-row">
                <div class="form-col-medium">
                    <div class="form-group">
                        <input class="form-control" type="text" name="email_phone" placeholder="Email / Phone" autocomplete="off">
                        <span class="form-error js-email-phone-error"></span>
                    </div>
                </div>
                <div class="form-col-medium">
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Your Name" autocomplete="off">
                        <span class="form-error js-name-error"></span>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col-large">
                    <div class="form-group">
                        <textarea class="form-control" name="message" placeholder="Message" autocomplete="off"></textarea>
                        <span class="form-error js-message-error"></span>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col-large">
                    <div class="form-btn-group text-center">
                        @if(isset($ajax))
                            <button class="button button_blue" type="submit">Send</button>
                        @else
                            <button class="button button_blue" type="button">Send</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
        <div class="form-success-message js-feedback-success">The letter was received. WealthMan team will contact you soon!</div>
    </div>
</div>