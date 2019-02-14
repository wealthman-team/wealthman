@extends('layouts.app')

@section('content')
    @include('layouts/header')
    <div class="content contacts">

        @include('components/parallax', ['bg' => '/images/header-bg4.jpg', 'hidden_stock' => true])

        <div class="container">
            <div class="topic">
                @include('components/breadcrumbs', [
                    'theme' => 'dark-theme',
                    'breadcrumbs' => [[
                        'name' => 'Home',
                        'link' => route('home'),
                    ],[
                        'name' => 'Contacts',
                    ]]
                ])
                @include('components/page-header', [
                    'header' => 'Contacts',
                    'sub_header' => ''
                ])
            </div>

            <div class="main-top flex-center">
                <div class="sidebar sidebar__left">
                    <h2 class="block-header">Follow us:</h2>
                    <div class="block-sub-header margin-none">Follow Our company news now</div>
                </div>
                <div class="main-content">
                    <div class="panel">
                        <ul class="contact-share">
                            <li class="contact-share__item">
                                <a class="contact-share__link link" href="https://t.me/wealthman_global" target="_blank">
                                    @svg('sh-tel-dark')
                                    <span>Telegram</span>
                                </a>
                            </li>
                            <li class="contact-share__item">
                                <a class="contact-share__link link" href="https://bitcointalk.org/index.php?topic=2006205" target="_blank">
                                    @svg('sh-bit-dark')
                                    <span>Bitcointalk</span>
                                </a>
                            </li>
                            <li class="contact-share__item">
                                <a class="contact-share__link link" href="https://www.facebook.com/Wealthman.io" target="_blank">
                                    @svg('sh-fac-dark')
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li class="contact-share__item">
                                <a class="contact-share__link link" href="https://www.instagram.com/wealthman_platform/" target="_blank">
                                    @svg('sh-ins-dark')
                                    <span>Instagram</span>
                                </a>
                            </li>
                            <li class="contact-share__item">
                                <a class="contact-share__link link" href="https://www.reddit.com/r/Wealthman_io/" target="_blank">
                                    @svg('sh-red-dark')
                                    <span>Reddit</span>
                                </a>
                            </li>
                            <li class="contact-share__item">
                                <a class="contact-share__link link" href="https://twitter.com/wealthman_io" target="_blank">
                                    @svg('sh-twit-dark')
                                    <span>Twitter</span>
                                </a>
                            </li>
                            <li class="contact-share__item">
                                <a class="contact-share__link link" href="https://www.linkedin.com/company/wealthman-io" target="_blank">
                                    @svg('sh-lin-dark')
                                    <span>Linkedin</span>
                                </a>
                            </li>
                            <li class="contact-share__item">
                                <a class="contact-share__link link" href="https://www.youtube.com/c/wealthman" target="_blank">
                                    @svg('sh-you-dark')
                                    <span>YouTube</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main flex-center">
                <div class="sidebar sidebar__left">
                    <h2 class="block-header">Have some questions?</h2>
                    <div class="block-sub-header">If you have any questions regarding the Wealthman project do not hesitate to contact us using the contact form! We will be glad to answer any questions about our project.</div>
                    <div class="contacts-block">
                        <span class="contacts-name">ICO, Media\PR inquiries:</span>
                        <a class="contacts-email link_blue" href="mailto:office@wealthman.io">office@wealthman.io</a>
                    </div>
                    <div class="contacts-block margin-none">
                        <span class="contacts-name">General questions:</span>
                        <a class="contacts-email link_blue" href="mailto:info@wealthman.io">info@wealthman.io</a>
                    </div>
                </div>
                <div class="main-content">
                    <div class="panel panel_padding">
                        <div class="js-feedback-container">
                            @include('contacts/_form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
