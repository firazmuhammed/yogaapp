<!DOCTYPE html>
<html >
	<head>
		<title>Francis- @yield('title')</title>
		<!--meta rules-->

		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!--Fav icon-->
	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="{{url('css/front-end/style.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{url('css/front-end/custom.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{url('css/front-end/custom2.css')}}"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="{{url('css/front-end/aos.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
		<link rel="stylesheet" href="{{url('admin-lte/plugins/toastr/toastr.min.css')}}">
	
     
		@livewireStyles
	

	</head>

	<body>
		<header>
			<div class="top-header">
				<div class="fa-container-fluid">
					<div class="full-block">
						<div class="left-block">
							<ul>
								<li><a href="{{url('contact-us')}}">Contact Us</a></li>
								<li><a href="{{url('store-locator')}}">Store Locator</a></li>
							</ul>
						</div>
						<div class="right-block">
							<ul>
								<li>
								
										@if(!Auth::check())
										<a href="{{url('login')}}">	<img class="profile" src="{{url('images/front-end/profile.png')}}" alt=""><span>sign in/ register</span>	</a>
										@else
										<a href="{{url('myaccount/profile')}}">	<img class="profile" src="{{url('images/front-end/profile.png')}}" alt=""><span>{{ Auth::user()->name }}</span></a>
										@endif
								
								</li>
								<li>
									<a href="{{ url('wishlist') }}">
										@if(Cart::instance('wishlist')->count()>0)
										<img src="{{ url('images/front-end/filled-heart.png') }}"   alt="">
										@else
										<img class="like" src="{{url('images/front-end/like.png')}}" alt="">
										@endif
									</a>
								</li>
								<li>
									<livewire:cart-count-component/>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="logo-part">
				<div class="fa-container">
					<div class="img_block">
						<a href="{{url('/')}}"><img src="{{url('images/front-end/logo.png')}}" alt=""></a>
					</div>
					<div class="mob-breadcrumb">
						<span></span>
					</div>
				</div>
			</div>
			<div class="menu-items">
				<div class="fa-container">
					<div class="menu-inner">
						<ul>
							<li class="submenu"><a href="{{ url('shop/jewellery') }}">Jewellery</a>
								<div class="megamenu-wrap jewellery-wrap">
									<div class="fa-container">
										<div class="megamenu-detail-wrap">
											<div class="megamenu-detail">
												<p>Earring</p>
												<ul>
													<li>Stud</li>
													<li>Hoop</li>
													<li>Drop</li>
													<li>Jhumka</li>
												</ul>
											</div>
											<div class="megamenu-detail">
												<p>Pendant</p>
												<ul>
													<li>Daily</li>
													<li>Party</li>
													<li>Work wear</li>
													<li>Traditional</li>
												</ul>
											</div>
											<div class="megamenu-detail">
												<p>Finger Ring</p>
												<ul>
													<li>Daily</li>
													<li>Solitaries</li>
													<li>Casual</li>
												</ul>
											</div>
										</div>
										<div class="megamanu-image-wrap">
											<div class="megamanu-image">
												<p>Buy from our collection</p>
												<div class="collection-image-wrap">
													<div class="collection-image">
														<img src="{{url('images/front-end/braselet-collection.png')}}" alt="">
														<p>Pendant Collection</p>
													</div>
													<div class="collection-image">
														<img src="images/front-end/braselet-collection.png" alt="">
														<p>Pendant Collection</p>
													</div>
													<div class="collection-image">
														<img src="images/front-end/braselet-collection.png" alt="">
														<p>Pendant Collection</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="submenu"><a href="{{ url('shop/diamond') }}">Diamonds</a>
								<div class="megamenu-wrap diamonds-wrap">
									<div class="fa-container">
										<div class="megamenu-detail-wrap">
											<div class="megamenu-detail">
												<p>Shop by collection</p>
												<ul>
													<li>Diamonds</li>
													<li>Wedding</li>
													<li>Antique</li>
													<li>Gifting</li>
												</ul>
											</div>
											<div class="megamenu-detail">
												<p>Shop by category</p>
												<ul>
                                                                                                    @foreach($subcategories as $subcategory)
                                                                                                    @if($subcategory->pslug == 'diamond')
                                                                                                    <a  href="{{ url('shop/'.$subcategory->slug) }}"><li>{{Str::ucfirst($subcategory->name)}}</li></a>
                                                                                                    @endif
                                                                                                    @endforeach
<!--													<a  href="{{ url('shop/rings') }}"><li>Rings</li></a>
													<li>Bangles</li>
													<li>Necklaces</li>
													<li>Earrings</li>
													<li>Mangalsutra</li>
													<li>Pendants</li>-->
												</ul>
											</div>
											<div class="megamenu-detail">
												<p>Shop by price</p>
												<ul>
													<li>Stud</li>
													<li>Hoop</li>
													<li>Drop</li>
													<li>Jhumka</li>
												</ul>
											</div>
											<div class="megamenu-detail">
												<p>Shop by collection</p>
												<ul>
													<li>>5000</li>
													<li>5k to 15k</li>
													<li>15k to 35k</li>
													<li>35k to 50k</li>
													<li>>50,000</li>
												</ul>
											</div>
										</div>
										<div class="megamanu-image-wrap">
											<div class="megamanu-image">
												<p>Buy from our collection</p>
												<div class="collection-image-wrap">
													<div class="collection-image">
														<img src="images/front-end/braselet-collection.png" alt="">
														<p>Pendant Collection</p>
													</div>
													<div class="collection-image">
														<img src="{{ asset('images/front-end/braselet-collection.png') }}" alt="">
														<p>Pendant Collection</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="submenu"><a href="{{ url('shop/gold') }}">Gold</a>
                                                            <div class="megamenu-wrap diamonds-wrap">
									<div class="fa-container">
										<div class="megamenu-detail-wrap">
											<div class="megamenu-detail">
												<p>Shop by collection</p>
												<ul>
													<li>Diamonds</li>
													<li>Wedding</li>
													<li>Antique</li>
													<li>Gifting</li>
												</ul>
											</div>
											<div class="megamenu-detail">
												<p>Shop by category</p>
												<ul>
                                                                                                    @foreach($subcategories as $goldcategory)
                                                                                                    @if($goldcategory->pslug == 'gold')
                                                                                                    <a  href="{{ url('shop/'.$goldcategory->slug) }}"><li>{{Str::ucfirst($goldcategory->name)}}</li></a>
                                                                                                    @endif
                                                                                                    @endforeach
												</ul>
											</div>
											<div class="megamenu-detail">
												<p>Shop by price</p>
												<ul>
													<li>Stud</li>
													<li>Hoop</li>
													<li>Drop</li>
													<li>Jhumka</li>
												</ul>
											</div>
											<div class="megamenu-detail">
												<p>Shop by collection</p>
												<ul>
													<li>>5000</li>
													<li>5k to 15k</li>
													<li>15k to 35k</li>
													<li>35k to 50k</li>
													<li>>50,000</li>
												</ul>
											</div>
										</div>
										<div class="megamanu-image-wrap">
											<div class="megamanu-image">
												<p>Buy from our collection</p>
												<div class="collection-image-wrap">
													<div class="collection-image">
														<img src="images/front-end/braselet-collection.png" alt="">
														<p>Pendant Collection</p>
													</div>
													<div class="collection-image">
														<img src="{{ asset('images/front-end/braselet-collection.png') }}" alt="">
														<p>Pendant Collection</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                                                        </li>
							<li><a href="{{url('/collection?collection=wedding-collection')}}">Wedding</a></li>
							<li><a href="{{url('/collection?collection=antique-collection')}}">Designer Antique</a></li>
							<li><a href="{{url('/collection?collection=gift-collection')}}#">Gifting</a></li>
							<li class="submenu"><a href="#">Collections</a>
								<div class="megamenu-wrap collection-wrap">
									<div class="fa-container">
										<div class="megamenu-detail-wrap">
											<div class="megamenu-detail">
												<ul>
                                                                                                    @foreach($collections as $collection)
                                                                                                    <li><a href="{{url('/collection?collection='.$collection->slug)}}"><span>{{$collection->collection_name}}</span></a></li>
                                                                                                    @endforeach
<!--													<li>Wedding Collection</li>
													<li>Diamond Collection</li>
													<li>Gold Collection</li>
													<li>Gift Collection</li>
													<li>Antique Collection</li>-->
												</ul>
											</div>
										</div>
										<div class="megamanu-image-wrap">
											<div class="megamanu-image">
												<!-- <p>Buy from our collection</p> -->
												<div class="collection-image-wrap">
                                                                                                    @foreach($collections as $collection1)
                                                                                                   
													<div class="collection-image">
                                                                                                             
														<img src="{{url('images/collections/'.$collection1->image_name)}}" alt="">
														<a href="{{url('/collection?collection='.$collection1->slug)}}"><p>{{$collection1->collection_name}}</p>
                                                                                                              </a>
													</div>
                                                                                                   
                                                                                                     @endforeach
<!--													<div class="collection-image">
														<img src="images/braselet-collection.png" alt="">
														<p>PDiamond Collection</p>
													</div>
													<div class="collection-image">
														<img src="images/braselet-collection.png" alt="">
														<p>Antique Collection</p>
													</div>
													<div class="collection-image">
														<img src="images/braselet-collection.png" alt="">
														<p>Gift Collection</p>-->
													<!--</div>-->
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li><a href="https://www.alukkasonline.com/">Easy Gold</a></li>
							<li><a href="{{ url('gift-card') }}">Gift Card</a></li>
							<!--<li class="search-icon"><img src="{{url('images/front-end/search.png')}}" alt=""></li>-->
						</ul>
					</div>
				</div>
			</div>
		</header>
	
	
			@yield('content')
	
	

	

		<footer>
			<div class="footer-container">
				<div class="footer-fullblock">
					<div class="logo-block">
						<a href="{{ url('/') }}">
							<img src="images/front-end/logo.png" alt="">
						</a>
					</div>
					<div class="menu-block">
						<div class="single">
							<h3>Know Us</h3>
							<ul>
								<li>
									<a href="{{ url('/about-us') }}">About Us</a>
								</li>
								<li>
									<a href="{{ url('/career') }}">Work with Us</a>
								</li>
								<li>
									<a href="https://www.alukkasonline.com/">Easy Gold</a>
								</li>
								<li>
									<a href="{{url('/gold-rate-history')}}">Gold Rate History</a>
								</li>
								<li>
									<a href="{{ url('/store-locator') }}">Our Stores</a>
								</li>
							</ul>
						</div>
						<div class="single">
							<h3>Our Promise</h3>
							<ul>
								<li>
									<a href="{{ url('/our-promise') }}">Easy Gold</a>
								</li>
								<li>
									<a href="{{ url('/our-promise') }}">Only Certified Jewellery</a>
								</li>
								<li>
									<a href="{{ url('/our-promise') }}">100% Hallmarked Jewellery</a>
								</li>
								<li>
									<a href="{{ url('/our-promise') }}">Easy Exchange</a>
								</li>
								<li>
									<a href="{{ url('/our-promise') }}">Detailed Product Pricing</a>
								</li>
								<li>
									<a href="{{ url('/our-promise') }}">Lifetime Product Support</a>
								</li>
							</ul>
						</div>
						<div class="single">
							<h3>Useful Links</h3>
							<ul>
								<li>
									<a href="{{url('/blog')}}">Blog</a>
								</li>
								<li>
									<a href="{{url('/privacy-policy')}}">Privacy Policy</a>
								</li>
								<li>
									<a href="{{url('/return-policy')}}">Return Policy</a>
								</li>
								<li>
									<a href="{{url('/privacy-policy')}}">Terms and Conditions</a>
								</li>
							</ul>
						</div>
						<div class="single">
							<h3>Education</h3>
							<ul>
								<li>
									<a href="{{url('/ring-size-guide')}}">Ring Size Guide</a>
								</li>
								<li>
									<a href="{{url('/bangle-size-guide')}}">Bangle SIze Guide</a>
								</li>
								<li>
									<a href="{{url('/know-gem-stone')}}">Know your Gem Stone</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="subscription-block">
						<div class="title">
							<h3>Subscribe to our newsletter</h3>
						</div>
						<div class="footer-form">
							{!! Form::open(array('url' =>'subscribe-newsletter', 'method'=>'post', 'class' => 'form-horizontal form-validate')) !!}
								<input type="text" name="email" placeholder="Your email id">
								<button>Sign Up</button> 
							{!! Form::close() !!}
							@if($errors->has('email'))
							<small class="form-text text-danger error-msg mt-2"> {{ $errors->first('email') }} </small>
							@endif
						</div>
						<div class="social-media">
							<ul>
								<li>
									<a href="#" class="facebook">
										<svg xmlns="http://www.w3.org/2000/svg" width="20.743" height="22.126" viewBox="0 0 20.743 22.126"><defs><style>.a{fill:#888;}.b{fill:#fff;}</style></defs><rect class="a" width="20.743" height="22.126" rx="6"></rect><path class="b" d="M311.563,210.748l.53-3.458h-3.318v-2.243a1.729,1.729,0,0,1,1.949-1.869h1.509v-2.944a18.4,18.4,0,0,0-2.678-.234c-2.734,0-4.519,1.657-4.519,4.654v2.636H302v3.458h3.037v8.36a12.132,12.132,0,0,0,3.738,0v-8.36Z" transform="translate(-295.808 -197.126)"></path></svg>
									</a>
								</li>
								<li>
									<a href="#" class="instagram">
										<svg xmlns="http://www.w3.org/2000/svg" width="23.525" height="23.525" viewBox="0 0 23.525 23.525"><defs><style>.a{fill:#888;}</style></defs><path class="a" d="M398.227,7148.124a1.383,1.383,0,1,0,1.383,1.383,1.383,1.383,0,0,0-1.383-1.383m-6.149,1.773a5.81,5.81,0,1,0,5.81,5.81,5.816,5.816,0,0,0-5.81-5.81m0,9.531a3.722,3.722,0,1,1,3.722-3.721,3.726,3.726,0,0,1-3.722,3.721m11.723-8.55a7.087,7.087,0,0,0-7.086-7.086h-9.353a7.087,7.087,0,0,0-7.086,7.086v9.353a7.086,7.086,0,0,0,7.086,7.086h9.353a7.085,7.085,0,0,0,7.086-7.086Zm-2.22,9.353a4.866,4.866,0,0,1-4.867,4.867h-9.353a4.867,4.867,0,0,1-4.867-4.867v-9.353a4.868,4.868,0,0,1,4.867-4.867h9.353a4.867,4.867,0,0,1,4.867,4.867Z" transform="translate(-380.276 -7143.792)"></path></svg>
									</a>
								</li>
								<li>
									<a href="#" class="youtube">
										<svg xmlns="http://www.w3.org/2000/svg" width="28.32" height="20.685" viewBox="0 0 28.32 20.685"><defs><style>.a{fill:#888;}.b{fill:#fafafa;}</style></defs><g transform="translate(0 0)"><path class="a" d="M190.665,539.585H173.055a5.358,5.358,0,0,1-5.355-5.355h0v-9.976a5.358,5.358,0,0,1,5.355-5.355h17.611a5.358,5.358,0,0,1,5.355,5.355v9.985a5.355,5.355,0,0,1-5.355,5.345h0" transform="translate(-167.7 -518.9)"></path><path class="b" d="M285.557,575.438,277,570.5v9.886Z" transform="translate(-266.162 -565.383)"></path></g></svg>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="privacy-policy">
					<span>Francis Alukkas © 2021</span>
				</div>
			</div>
		</footer>
	

		<script type="text/javascript" src="{{ url('js/front-end/jquery-3.2.1.min.js') }}"></script>

		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		@stack('scripts')
<script src="{{url('js/front-end/aos.js')}}"></script>


@yield('javascripts-new')
@livewireScripts 
@yield('page-js-script')

		<!--<script>
			AOS.init();
		</script>-->
	
		  
	</body>

</html>