jQuery(function ($) {

	// ドロワーメニュー
	$('.js-hamburger').on('click', function () {
		if ($('.js-hamburger').hasClass('open')) {
			$('.js-drawer-menu').fadeOut();
			$('body').removeClass('fixed');  //ドロワー開いたときbody固定スクロールしない
			$(this).removeClass('open');
		} else {
			$('.js-drawer-menu').fadeIn();
			$('body').addClass('fixed');
			$(this).addClass('open');
		}
	});


	//ドロワーリストをクリックしたらメニュー閉じる
	$(".p-drawer-menu__item a").click(function () {
		$(".p-drawer-menu").fadeOut();
		// $(this).removeClass('open');
		$(".js-hamburger").removeClass('open');
	});


	//MV過ぎたらheader透過を無効にする
	let header = $('.js-header');
	let headerHeight = $('.js-header').outerHeight();
	let imgHeight = $('.js-mv').outerHeight() - headerHeight;

	$(window).on('load scroll', function () {
		if ($(window).scrollTop() < imgHeight) {
			header.removeClass('headerColor');
		} else {
			header.addClass('headerColor');
		}
	});


	// mv swiper
	let swipeOption = {
		loop: true,
		effect: 'fade',
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		speed: 2000,
	}
	new Swiper('.swiper__mv-container', swipeOption);


	// works swiper
	let worksSwipeOption = {
		loop: true,
		slidesPerView: 1,
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		speed: 1000,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		}
	}
	new Swiper('.swiper__works-container', worksSwipeOption);


	//single-works swiper
	//メイン
	var slider = new Swiper('.gallery-slider', {
		slidesPerView: 1,
		centeredSlides: true,
		loop: true,
		loopedSlides: 8, //スライドの枚数と同じ値を指定
		speed: 1000,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
	});


	//サムネイル
	var thumbs = new Swiper('.gallery-thumbs', {
		slidesPerView: 'auto',
		spaceBetween: 24,
		loop: true,
		slideToClickedSlide: true,
		// Responsive breakpoints
		breakpoints: {
			// when window width is >= 768px
			768: {
				spaceBetween: 8,
			},
		}
	});


	//4系～
	//メインとサムネイルを紐づける
	slider.controller.control = thumbs;
	thumbs.controller.control = slider;


	// トップへ戻る
	var topBtn = $('.c-to-top');
	topBtn.hide();

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			topBtn.fadeIn();
		} else {
			topBtn.fadeOut();
		}
	});


	// ローディング判定
	jQuery(window).on("load", function () {
		jQuery("body").attr("data-loading", "true");
	});

	jQuery(function () {
		// スクロール判定
		jQuery(window).on("scroll", function () {
			if (100 < jQuery(this).scrollTop()) {
				jQuery("body").attr("data-scroll", "true");
			} else {
				jQuery("body").attr("data-scroll", "false");
			}
		});

		

		/* ドロワー */
		jQuery(".js-drawer").on("click", function (e) {
			e.preventDefault();
			let targetClass = jQuery(this).attr("data-target");
			jQuery("." + targetClass).toggleClass("is-checked");
			return false;
		});

		/* スムーススクロール */
		jQuery('a[href^="#"]').click(function () {
			let header = jQuery(".js-header").height();
			let speed = 300;
			let id = jQuery(this).attr("href");
			let target = jQuery("#" == id ? "html" : id);
			let position = jQuery(target).offset().top - header;
			if ("fixed" !== jQuery("#header").css("position")) {
				position = jQuery(target).offset().top;
			}
			if (0 > position) {
				position = 0;
			}
			jQuery("html, body").animate(
				{
					scrollTop: position
				},
				speed
			);
			return false;
		});

		/* 電話リンク */
		let ua = navigator.userAgent;
		if (ua.indexOf("iPhone") < 0 && ua.indexOf("Android") < 0) {
			jQuery('a[href^="tel:"]')
				.css("cursor", "default")
				.on("click", function (e) {
					e.preventDefault();
				});
		}
	});
});
