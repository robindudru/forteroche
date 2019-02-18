class Pager {
	constructor() {
		this.navListener();
		this.maxScrollLeft = ($('.article-two-pages')[0].scrollWidth - $('.article-two-pages')[0].clientWidth);
		($('.article-two-pages').scrollLeft() === 0) ? $('#prev').css('opacity', '0', 'pointer-events', 'none') : $('#prev').css('opacity', '1');
		($('.article-two-pages').scrollLeft() === this.maxScrollLeft) ? $('#next').css('opacity', '0') : $('#next').css('opacity', '1');		
	}

	navListener() {
		const _this = this;
		$('#prev').on('click', () => {_this.prev()});
		$('#next').on('click', () => {_this.next()});
	}

	prev() {
		const _this = this;
		$('.article-two-pages').fadeTo(600, 0, () => {
			$('.article-two-pages').scrollLeft(($('.article-two-pages').scrollLeft() - $(document).innerWidth()- 16));
			_this.checkStatus();
		});
		$('.article-two-pages').fadeTo(600, 1);
	}

	next() {
		const _this = this;
		$('.article-two-pages').fadeTo(600, 0, () => {
			$('.article-two-pages').scrollLeft(($('.article-two-pages').scrollLeft() + $(document).innerWidth()+ 16));
			_this.checkStatus();
		});
		$('.article-two-pages').fadeTo(600, 1);
	}

	checkStatus() {
		($('.article-two-pages').scrollLeft() === 0) ? $('#prev').animate({opacity: 0}) : $('#prev').animate({opacity:1});
		($('.article-two-pages').scrollLeft() === this.maxScrollLeft) ? $('#next').animate({opacity: 0}) : $('#next').animate({opacity:1});
	}
}