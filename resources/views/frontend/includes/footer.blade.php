<footer class="footer-section">
    <div class="footer__top-wrapper">
        <div class="container">
            <a href="index.html" class="footer__brand-logo-outer">
                <img src="{{asset('frontend/assets/images/logo.png')}}" height="65" width="65" class="footer__brand-logo-inner" />
            </a>
        </div>
    </div>    
    <div class="footer__main-wrapper">
        <div class="container">        
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__item-wrap">
                        <h4 class="footer__item-title">
                            Policy
                        </h4>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="{{url('/privacy/policy')}}" class="footer__list-item-link">
                                    Privacy Policy
                                </a>
                            </li>
                            <li class="footer__list-item">
                                <a href="{{url('/terms/Conditions')}}" class="footer__list-item-link">
                                    Terms & Conditions
                                </a>
                            </li>
                            <li class="footer__list-item">
                                <a href="{{url('/refund/policy')}}" class="footer__list-item-link">
                                    Refund Policy
                                </a>
                            </li>
                            <li class="footer__list-item">
                                <a href="#" class="footer__list-item-link">
                                    Payment Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer__item-wrap">
                        <h4 class="footer__item-title">
                           Contacts
                        </h4>
                        <ul class="footer__contact-info-list">
                            <li class="footer__contact-info-list-item">
                                <p class="footer__contact-info-list-item-label">
                                    Address:                                   
                                </p>
                                <p class="footer__contact-info-list-item-value">
                                    Uttara, Dhaka                                 
                                </p>
                            </li>
                            <li class="footer__contact-info-list-item">
                                <p class="footer__contact-info-list-item-label">
                                    Phone:                                   
                                </p>
                                <a href="tel:0123456857" class="footer__contact-info-list-item-value">
                                    0123456857
                                </a>
                            </li>
                            <li class="footer__contact-info-list-item">
                                <p class="footer__contact-info-list-item-label">
                                    Email:                                   
                                </p>
                                <a href="mailto:info@gmail.com" class="footer__contact-info-list-item-value">
                                    info@gmail.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>                
                <div class="col-lg-3 col-md-6">
                    <div class="footer__item-wrap">
                        <h4 class="footer__item-title">
                            Others
                        </h4>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="{{url('/about-us')}}" class="footer__list-item-link">
                                    About Us
                                </a>
                            </li>
                            <li class="footer__list-item">
                                <a href="{{url('/contact-us')}}" class="footer__list-item-link">
                                    Contact Us
                                </a>
                            </li>
                            <li class="footer__list-item">
                                <a href="{{url('/blog-page')}}" class="footer__list-item-link">
                                    Blog
                                </a>
                            </li>
                            <li class="footer__list-item">
                                <a href="{{url('/careers-page')}}" class="footer__list-item-link">
                                    Careers
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="social-wrapper">
                        <ul class="m-0 list-unstyled d-flex justify-content-start justify-content-sm-end gap-2">
                          <li>
                            <a href="{{$frontendSettings->facebook}}" target="_blank"  class="btn btn-dark bsb-btn-circle bsb-btn-circle-xs link-opacity-75-hover link-light">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a href="{{$frontendSettings->twitter}}" target="_blank"  class="btn btn-dark bsb-btn-circle bsb-btn-circle-xs link-opacity-75-hover link-light">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a href="{{$frontendSettings->linkedin}}" target="_blank" class="btn btn-dark bsb-btn-circle bsb-btn-circle-xs link-opacity-75-hover link-light">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom-wrapper">
        <div class="container">
            <p class="footer__bottom-text">
                © 2024, All rights reserved
                <strong class="text-brand">Nitto Mart</strong>
            </p>
        </div>
    </div>
</footer>