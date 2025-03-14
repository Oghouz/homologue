@if (is_plugin_active('newsletter'))
    <div class="col-lg-3 col-md-4">
        <div class="footer-widget footer-col-5 mt-30">
            @if($title = Arr::get($config, 'title'))
                <h4 class="footer-widget__title">{!! BaseHelper::clean($title) !!}</h4>
            @endif
            @if($subtitle = Arr::get($config, 'subtitle'))
                <p style="margin-bottom: 0;">{!! BaseHelper::clean($subtitle) !!}</p>
            @endif
            <div class="footer-widget__newsletter">
                <form action="{{ route('public.newsletter.subscribe') }}" method="post" class="newsletter-form">
                    @csrf
                    <input type="email" name="email" placeholder="{{ __('Enter email address') }}" required>

                    @if (setting('enable_captcha') && is_plugin_active('captcha'))
                        <div class="mb-3">
                            {!! Captcha::display() !!}
                        </div>
                    @endif

                    <button type="submit" class="btn-link" style="font-size: 12px">
                        {{ __('Subscribe Now') }}
                        <i class="fal fa-long-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endif
