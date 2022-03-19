// ローディング判定
jQuery(function ($) {
	jQuery(window).on("load", function() {
		jQuery("body").attr("data-loading", "true");
	});

	jQuery(function() {
		// スクロール判定
		jQuery(window).on("scroll", function() {
			if (100 < jQuery(this).scrollTop()) {
				jQuery("body").attr("data-scroll", "true");
			} else {
				jQuery("body").attr("data-scroll", "false");
			}
		});

		//ナビバートグル
		$('.js-hamburger').on('click', function () {
			if ($('.js-hamburger').hasClass('is-open')) {
				$('.js-drawer-menu').fadeOut();
				$(this).removeClass('is-open');
			} else {
				$('.js-drawer-menu').fadeIn();
				$(this).addClass('is-open');
			}
		});

		/* ドロワー */
		jQuery(".js-drawer").on("click", function(e) {
			e.preventDefault();
			let targetClass = jQuery(this).attr("data-target");
			jQuery("." + targetClass).toggleClass("is-checked");
			return false;
		});

		/* 電話リンク */
		let ua = navigator.userAgent;
		if (ua.indexOf("iPhone") < 0 && ua.indexOf("Android") < 0) {
			jQuery('a[href^="tel:"]')
				.css("cursor", "default")
				.on("click", function(e) {
					e.preventDefault();
				});
		}
		
		// トップへ戻るボタン
		var topBtn = $('.js-to-top');
		topBtn.hide();
		let topHeader = $(".js-top-header");
		let topHeaderHight = $(".js-top-header").outerHeight();
		let mvHight = $(".js-main-visual").outerHeight() - topHeaderHight;
		let subHeader = $(".js-sub-header");
		let subHeaderHight = $(".js-sub-header").outerHeight();
		let svHight = $(".js-sub-visual").outerHeight() - subHeaderHight;
		let singleHeaderHight = $(".js-header-hight").outerHeight();


		// ボタンの表示設定
		$(window).scroll(function () {
			if ($(this).scrollTop() > mvHight || $(this).scrollTop() > svHight || $(this).scrollTop() > singleHeaderHight) {
				// 指定px以上のスクロールでボタンを表示
				topBtn.fadeIn();
			} else {
				// 画面が指定pxより上ならボタンを非表示
				topBtn.fadeOut();
			}
		});

		// ボタンをクリックしたらスクロールして上に戻る
		topBtn.click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 300, 'swing');
			return false;
		});

		// ヘッダーの背景色
		$(window).on('load scroll', function () {
			if($(window).scrollTop() < mvHight || $(window).scrollTop() < svHight) {
				topHeader.removeClass('is-active');
				subHeader.removeClass('is-active');
			} else {
				topHeader.addClass('is-active');
				subHeader.addClass('is-active');
			}
		});

		/* スムーススクロール */
		// jQuery('a[href^="#"]').click(function() {
		// 	jQuery('.js-navigation-header__item').removeClass('is-active');
		// 	let speed = 300;
		// 	let id = jQuery(this).attr("href");
		// 	let target = jQuery("#" == id ? "html" : id);
		// 	let position = jQuery(target).offset().top - topHeaderHight;
		// 	if ("fixed" !== jQuery("#header").css("position")) {
		// 		position = jQuery(target).offset().top;
		// 	}
		// 	if (0 > position) {
		// 		position = 0;
		// 	}
		// 	jQuery("html, body").animate(
		// 		{
		// 			scrollTop: position
		// 		},
		// 		speed
		// 	);
		// 	return false;
		// });

		// 別ページの場合は以下
		var urlHash = location.hash;
		if (urlHash) {
			$('body,html').stop().scrollTop(0);
			setTimeout(function(){
				var headerHight = 50;
				var target = $(urlHash);
				var position = target.offset().top - headerHight;
				$('body,html').stop().animate({scrollTop:position}, 400);
			}, 100);
		}

		// ナビゲーション ホバー
		// jQuery('.js-navigation-header__link').on('click', function () {
		// 	jQuery('.js-navigation-header__link').removeClass('is-active');
		// 	jQuery(this).addClass('is-active');
		// });

		// swiper main-visual
		let slider1 = new Swiper ('.js-main-visual__swiper', {
			loop: true,
			effect: 'fade',
			autoplay: {
				delay: 4000,
				disableOnInteraction: false,
			},
			speed: 2000,
		});

		// swiper card
		let slider2 = new Swiper ('.js-box-card__swiper', {
			loop: true,
			speed: 300,
			autoplay: {
				delay: 3000,
				disableOnInteraction: true,
			},
			pagination: { 
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
			},
		});

		//swiper gallery
		let slider3 = new Swiper ('.js-gallery__slider', {
			slidesPerView: 1,
			centeredSlides: true,
			loop: true,
			loopedSlides: 8,
			speed: 300,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			autoplay: {
				delay: 3000,
				disableOnInteraction: true,
			},
			breakpoints: {
				768: {
					loopedSlides: 8,
				},
			},
		});

		//swiper gallery サムネイル
		let thumbs = new Swiper ('.js-gallery__thumbs', {
			slidesPerView: 'auto',
			spaceBetween: 24,
			centeredSlides: true,
			loop: true,
			slideToClickedSlide: true,
			breakpoints: {
				768: {
					spaceBetween: 8,
					centeredSlides: false,
				},
			},
		});

		//4系～
		//メインとサムネイルを紐づける
		slider3.controller.control = thumbs;
		thumbs.controller.control = slider3;

		/**
		 * file:ctfrm7_btnalive.js
		 * ContactForm7 送信ボタン活性・非活性制御 ＆ EnterKeyで勝手にサブミットさせない
		 * --------------------------------------------------
		 * ※前提条件としてSubmitボタンにはID「#exec-sbmit」を付与しておく
		 * ※本JSファイルは対象固定ページ読み込みする
		 * ※inputTypeによってvalueが正しく取れない場合は適宜取得可能になるよう改修すること
		 * （elem.typeによりタイプ取得可能[27行目]）
		 */
		jQuery(function () {
			// 始めにjQueryで送信ボタンを無効化する
			jQuery("#exec-sbmit").prop("disabled", true);
			jQuery("#exec-sbmit").css("pointer-events", "none");
			jQuery("#exec-sbmit").css("background-color", "#888");

			// フォーム入力に変化があった場合（フォーカスが外れたとき[change]）に発動）
			jQuery("form").change(function () {
				var chkform = true;//フラグの初期化
				/**
				 * コンタクトフォーム７の必須項目にはクラス「wpcf7-validates-as-required」が付与されている
				 * 必須項目分だけループする
				 **/
				jQuery(".wpcf7-validates-as-required").each(function (i, elem) {
					// 必須項目に未入力のものがあるかチェック
					if (elem.value === undefined || elem.value === null || elem.value === "") {
							// 必須項目が未入力の場合、chkformフラグはfalseとしてボタンは非活性
							chkform = false;
					}
				});

				// ボタン活性・非活性判定
				if (chkform === true) {
					// 必須項目すべてが入力の場合、chkformフラグはtrueとしてボタンは活性化
					jQuery("#exec-sbmit").prop("disabled", false);
					jQuery("#exec-sbmit").css("pointer-events", "auto");
					jQuery("#exec-sbmit").css("background-color", "#fff");
				} else {
					// 必須項目が未入力の場合、chkformフラグはfalseとしてボタンは非活性
					jQuery("#exec-sbmit").prop("disabled", true);
					jQuery("#exec-sbmit").css("pointer-events", "none");
					jQuery("#exec-sbmit").css("background-color", "#888");
				}
			});
		});

		/**
		* EnterKeyで勝手にサブミットさせない
		*/
		function submitStop(e) {
			if (!e) var e = window.event;
			if (e.keyCode == 13)
				return false;
		}
		//list[i].type == {htmlのinput type} で対象のtypeでのenter無効を適用させる
		window.onload = function () {
			var list = document.getElementsByTagName("input");
			for (var i = 0; i < list.length; i++) {
				if (list[i].type == 'email' || list[i].type == 'password' || list[i].type == 'text' || list[i].type == 'number') {
					list[i].onkeypress = function (event) {
							return submitStop(event);
					};
				}
			}
		}

		// // スクロールバーを除いた全体幅を取得する
		// let vw = document.body.clientWidth;// スクロールバーを除いた幅を取得
		// document.documentElement.style.setProperty('--vw', vw + 'px');

	});
});
